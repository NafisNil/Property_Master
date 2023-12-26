<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingCharge;
use App\Models\BookingParticipant;
use App\Models\BookingPayment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class BookingController extends Controller
{
    function index()
    {
        $user = auth()->user();

        if (\request()->ajax()) {

            $bookings = Booking::with(['requester'])
                ->where('school_id', $user->school_id)
                ->get();

            return DataTables::of($bookings)
                ->addColumn('action', function ($row) {
                    return view('booking.action-button', compact('row'));
                })
                ->editColumn('payment_required', function ($row) {
                    if ($row->payment_required) {
                        return "Yes";
                    }
                    return "No";
                })
                ->editColumn('payment_refundable', function ($row) {
                    if ($row->payment_refundable) {
                        return "Yes";
                    }
                    return "No";
                })
                ->make(true);

        }

        return view('booking.index');
    }

    function create()
    {

        $accountHolders = User::getForDropdown();

        return view('booking.create', compact('accountHolders'));
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $request->validate([
            'date' => 'required',
            'requester_id' => 'required',
        ]);

        $bookingData = $request->only([
            'date', 'requester_id', 'request_type',
            'request_description', 'request_location', 'request_date',
            'special-request', 'additional_note', 'payment_required',
            'payment_refundable', 'tax'
        ]);

        $bookingData['school_id'] = $user->school_id;

        $bookingData['status'] = 'pending';
        $bookingData['amount'] = $request->input('total');

        //dd($request->all());

        DB::beginTransaction();

        try {

            $booking = Booking::create($bookingData);

            $paymentData = [
                'payment_method' => $request->input('payment_method'),
                'amount' => $request->input('paid_amount'),
                'receipt_no' => $request->input('receipt_no'),
                'date' => $request->input('date'),
                'booking_id' => $booking->id,
            ];

            BookingPayment::create($paymentData);

            foreach ($request->input('participants') as $participant) {
                BookingParticipant::create([
                    'booking_id' => $booking->id,
                    'name' => $participant['name'],
                    'type' => $participant['type'],
                ]);
            }

            //dd($request->all());

            foreach ($request->input('charges') as $charge) {
                BookingCharge::create([
                    'booking_id' => $booking->id,
                    'title' => $charge['title'],
                    'amount' => $charge['amount'],
                    'discount' => $charge['discount'],
                    'comment' => $charge['comment'],
                    'net_amount' => $charge['net_amount']
                ]);
            }

            DB::commit();

            return redirect()->route('bookings.index');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    function edit($id)
    {

        $booking = Booking::with(['requester.type', 'participants', 'charges', 'payment'])
            ->findOrFail($id);

        $accountHolders = User::getForDropdown();

        return view('booking.edit', compact('accountHolders', 'booking'));
    }

    function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $user = auth()->user();

        $request->validate([
            'date' => 'required',
            'requester_id' => 'required',
        ]);

        $bookingData = $request->only([
            'date', 'requester_id', 'request_type',
            'request_description', 'request_location', 'request_date',
            'special-request', 'additional_note', 'payment_required',
            'payment_refundable', 'tax'
        ]);

        $bookingData['amount'] = $request->input('total');

        DB::beginTransaction();

        try {

            $booking->update($bookingData);

            $paymentData = [
                'payment_method' => $request->input('payment_method'),
                'amount' => $request->input('paid_amount'),
                'receipt_no' => $request->input('receipt_no'),
                'date' => $request->input('date'),
                'booking_id' => $booking->id,
            ];

            $booking->payment->update($paymentData);

            $booking->participants()->delete();

            foreach ($request->input('participants') as $participant) {
                BookingParticipant::create([
                    'booking_id' => $booking->id,
                    'name' => $participant['name'],
                    'type' => $participant['type'],
                ]);
            }

            //dd($request->all());

            $booking->charges()->delete();

            foreach ($request->input('charges') as $charge) {
                BookingCharge::create([
                    'booking_id' => $booking->id,
                    'title' => $charge['title'],
                    'amount' => $charge['amount'],
                    'discount' => $charge['discount'],
                    'comment' => $charge['comment'],
                    'net_amount' => $charge['net_amount']
                ]);
            }

            DB::commit();

            return redirect()->route('bookings.index');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }

    }

    function show($id)
    {

        $booking = Booking::with(['requester.type', 'participants', 'charges', 'payment'])->findOrFail($id);

        $accountHolders = User::getForDropdown();

        return view('booking.show', compact('accountHolders', 'booking'));
    }

    function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->json(['status' => 'success', 'message' => 'item-has-been-deleted-successfully']);
    }

}
