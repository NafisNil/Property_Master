<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Models\Sample;
use App\Models\UserManager;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:User Manager']);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status',function($row){
                    return $row->active=='Y' ? '<span  class="badge badge-pill badge-success">Active</span>' : '<span  class="badge badge-pill badge-danger">In-Active</span>';
                })
                ->addColumn('action', function($row){
                    $buttons='';
                    //$buttons .= '<a href="'.route('usermanager.show', $row->id).'"> <button class="btn btn-warning btn-xs">Show</button> </a>';
                    $buttons .= '<a href="'.route('usermanager.edit', $row->id).'"> <button class="btn btn-info btn-xs">Edit</button> </a>';
                    $buttons .= '<button class="btn btn-danger btn-xs" onclick="deleteConfirmation('.$row->id.')">Delete</button>';
                    return $buttons;

                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return view('usermanager.index');
    }

    public function create()
    {
        $permissions = \Spatie\Permission\Models\Permission::all()
            ->where('active','=','Y')
            ->pluck('name');
        return view('usermanager.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
//            'UserID' => 'required|unique:UserManager,UserID',
            'user_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
        ]);

        $data_insert = User::create([
//            'UserID' => $request->UserID,
            'user_name' => $request->user_name,
            'designation' => $request->designation,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'create_by' => Auth::user()->id,
            'active' => isset($request->active) ? $request->active : 'N'
        ]);

        if($data_insert==true){
            if($request->menu!=null) {
                for ($i = 0; $i < count($request->menu); $i++) {
                    $data_insert->givePermissionTo($request->menu[$i]);
                }
            }
            Toastr::success('User creation successful', 'GoodJob!', ["positionClass" => "toast-top-right"]);
        }else{
            Toastr::error('User creation Failed', 'Opps!', ["positionClass" => "toast-top-right"]);
        }

        return redirect()->route('usermanager.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserManager  $usermanager
     * @return \Illuminate\Http\Response
     */
    public function show(UserManager $usermanager)
    {
        return view('usermanager.index.show',compact('usermanager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserManager  $usermanager
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(UserManager $usermanager)
    {
        $permissions = \Spatie\Permission\Models\Permission::all()
            ->where('active','=','Y')
            ->pluck('name');
        $user_permission = User::with('permissions')->where('id',$usermanager->id)->first();

        return view('usermanager.edit',compact('usermanager','permissions','user_permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserManager  $usermanager
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, UserManager $usermanager)
    {
        $request->validate([
            'user_name' => 'required',
            'email' => 'required',
        ]);
        $usermanager = User::where('id','=',$usermanager->id)->first();

        if($request->password!=null){
            $usermanager->password = Hash::make($request->password);
        }

        $usermanager = User::where('id','=',$usermanager->id)->first();
        $usermanager->user_name = $request->user_name;
        $usermanager->designation = $request->designation;
        $usermanager->email = $request->email;
        $usermanager->update_by = Auth::user()->id;
        $usermanager->active = (isset($request->active)||$request->active=='Y') ? $request->active : 'N';

        if($usermanager->save()==true){
            DB::table('user_has_permissions')->where('id',$usermanager->id)->delete();
            if($request->menu!=null) {
                for ($i = 0; $i < count($request->menu); $i++) {
                    $usermanager->givePermissionTo($request->menu[$i]);
                }
            }
            Toastr::success('Data updated successfully', 'GoodJob!', ["positionClass" => "toast-top-right"]);
        }else{
            Toastr::error('Data not updated', 'Opps!', ["positionClass" => "toast-top-right"]);
        }
        return redirect()->route('usermanager.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserManager  $usermanager
     * @return array
     */

    public function destroy(UserManager $usermanager)
    {
        if ($usermanager->delete()) {
            DB::table('user_has_permissions')->where('id',$usermanager->id)->delete();
            $data = array(
                'success' => true,
                'message' => 'User deleted successfully.'
            );
        } else {
            $data = array(

                'success' => false,
                'message' => 'User delete unsuccessful.'
            );
        }
        return $data;
    }
}
