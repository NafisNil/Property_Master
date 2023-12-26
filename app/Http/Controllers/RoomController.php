<?php

namespace App\Http\Controllers;

use App\Models\AssetTransfer;
use App\Models\Campus;
use App\Models\Department;
use App\Models\FixedAsset;
use App\Models\Room;
use App\Models\RoomAsset;
use App\Models\RoomType;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RoomController extends Controller
{
    function index()
    {
        $user = auth()->user();


        if (request()->ajax()) {

            $items = Room::with("type", 'subType');

            return DataTables::of($items)
                ->addColumn('actions', function ($row) {
                    return "<a href='/rooms/$row->id/edit' class='btn btn-primary'>Edit</a>
                            <button data-href='/rooms/$row->id' class='btn btn-danger delete-inventory-item-btn'>Delete</button>";
                })
                ->editColumn('type', function ($row) {
                    if (empty($row->type)) {
                        return '';
                    } else {
                        return $row->type->name;
                    }
                })
                ->editColumn('sub_type', function ($row) {
                    if (empty($row->subType)) {
                        return '';
                    } else {
                        return $row->subType->name;
                    }
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('room.index');

    }

    function create()
    {
        $parentTypes = RoomType::whereNull('parent_id')
            ->pluck('name', 'id');

        $campuses = Campus::getForDropdown();

        $departments = Department::getForDropdown();

        $assets = FixedAsset::getForDropdown();

        return view('room.create', compact('parentTypes', 'campuses', 'departments', 'assets'));
    }

    function store(Request $request)
    {
        \request()->validate([
            'room_no' => 'required',
            'name' => 'required|string',
            'location' => 'string'
        ]);

        $user = auth()->user();

        $attachments = (new FileService())->upload($request, $user);

        DB::beginTransaction();

        try {

            $room = Room::create([
                'school_id' => $user->school,
                'name' => \request()->input('name', null),
                'campus_id' => \request()->input('campus_id'),
                'department_id' => \request()->input('department_id'),
                'room_no' => \request()->input('room_no'),
                'location' => \request()->input('location'),
                'type_id' => \request()->input('type_id'),
                'sub_type_id' => \request()->input('sub_type_id'),
                'capacity' => \request()->input('capacity'),
                'temperature' => \request()->input("temperature"),
                "reading_meters" => \request()->input("reading_meters"),
                "schedule_inspection_date" => \request()->input("schedule_inspection_date"),
                'account' => \request()->input("account"),
                'cost_center' => \request()->input("cost_center"),
            ]);

            $room->attachments()->sync($attachments);

            foreach ($request->input("devices") as $device) {
                RoomAsset::create([
                    'room_id' => $room->id,
                    'asset_id' => $device['asset_id'],
                    'location' => $device['location'],
                    'type' => 'asset'
                ]);
            }

            foreach ($request->input("devices") as $device) {
                RoomAsset::create([
                    'room_id' => $room->id,
                    'asset_id' => $device['asset_id'],
                    'location' => $device['location'],
                    'type' => 'device',
                ]);
            }

            toastr()->success('Room created successfully');

            DB::commit();

            return redirect()->route('rooms.index');

        } catch (\Exception $exception) {
            DB::rollBack();

            dd($exception);
        }

    }

    function edit(Request $request, $id)
    {
        $room = Room::with('assets')->findOrFail($id);

        $attachedAssets = $room->assets->where('pivot.type', 'asset');
        $attachedDevices = $room->assets->where('pivot.type', 'device');


        $parentTypes = RoomType::whereNull('parent_id')
            ->pluck('name', 'id');

        $childTypes = RoomType::where('parent_id', $room->type_id)
            ->pluck('name', 'id');


        $campuses = Campus::getForDropdown();

        $departments = Department::getForDropdown();

        $assets = FixedAsset::getForDropdown();

        return view('room.edit', compact('room', 'parentTypes', 'childTypes', 'campuses', 'departments', 'assets', 'attachedAssets', 'attachedDevices'));
    }

    function update(Request $request, $id)
    {
        \request()->validate([
            'name' => 'required|string',
            'room_no' => 'required',
            'location' => 'string'
        ]);

        $user = auth()->user();

        $attachments = (new FileService())->upload($request, $user);


        DB::beginTransaction();

        try {

            $room = Room::findOrFail($id);


            $room['name'] = \request()->input('name', null);
            $room['campus_id'] = \request()->input('campus_id');
            $room['department_id'] = \request()->input('department_id');
            $room['room_no'] = \request()->input('room_no');
            $room['location'] = \request()->input('location');
            $room['type_id'] = \request()->input('type_id');
            $room['sub_type_id'] = \request()->input('sub_type_id');
            $room['temperature'] = \request()->input('temperature');
            $room["reading_meters"] = \request()->input("reading_meters");
            $room["schedule_inspection_date"] = \request()->input("schedule_inspection_date");
            $room['account'] = \request()->input("account");
            $room['cost_center'] = \request()->input("cost_center");

            $room->save();

            $room->attachments()->sync($attachments);

            $room->assets()->delete();


            foreach ($request->input("devices") as $device) {
                RoomAsset::create([
                    'room_id' => $room->id,
                    'asset_id' => $device['asset_id'],
                    'location' => $device['location'],
                    'type' => 'asset'
                ]);
            }

            foreach ($request->input("devices") as $device) {
                RoomAsset::create([
                    'room_id' => $room->id,
                    'asset_id' => $device['asset_id'],
                    'location' => $device['location'],
                    'type' => 'device',
                ]);
            }

            toastr()->success(__('room-updated-successfully'));

            return redirect()->route('rooms.index');

        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    function destroy($id)
    {

        $room = Room::findOrFail($id);

        try {
            $room->delete();
            return response()->json(['status' => 'success', 'message' => __('item-deleted')]);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'failed', 'message' => $exception->getMessage()]);
        }
    }

    function getChildRoomTypes()
    {
        $id = \request()->input('id');

        $types = RoomType::where('parent_id', $id)
            ->select('id', 'name')->get();

        return response()->json($types);
    }

    function getAssetRow(Request $request)
    {
        $id = \request()->input('id');
        $index = \request()->input('index') + 1;
        $item = FixedAsset::findOrFail($id);

        if ($request->input('type') == 'device') {
            return view('room.device-row', compact('item', 'index'));
        }

        return view('room.asset-row', compact('item', 'index'));
    }

    function getTransfer()
    {

        $rooms = Room::getForDropdown();

        return view('room.transfer', compact('rooms',));
    }

    function postTransfer(Request $request)
    {
        $request->validate([
            'to_room_id' => 'required',
            'from_room_id' => 'required',
            'asset_id' => 'required',
        ]);

        $toRoomId = $request->input('to_room_id');
        $fromRoomId = $request->input('from_room_id');
        $assetId = $request->input('asset_id');

        AssetTransfer::create([
            'to_room_id' => $toRoomId,
            'from_room_id' => $fromRoomId,
            'asset_id' => $assetId
        ]);

        //remove the asset from previous room

        RoomAsset::where('asset_id', $assetId)
            ->where('room_id', $fromRoomId)
            ->delete();

        toastr()->success('assets transferred successfully');

        return redirect()->route('rooms.index');

    }

    function getRoomAssets()
    {
        $id = \request()->input('id');
        $room = Room::with('assets')->findOrFail($id);
        $fixedAssets = $room->assets->where('pivot.type', 'asset');

        return response()->json($fixedAssets);
    }

    function safetyDevices(){
        $assets = FixedAsset::with('rooms')
            ->whereHas('rooms')
            ->get();

        return view('room.devices', compact('assets'));
    }

}
