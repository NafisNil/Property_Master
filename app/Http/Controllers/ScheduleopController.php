<?php

namespace App\Http\Controllers;

use App\Models\Scheduleop;
use Illuminate\Http\Request;
use App\Http\Requests\ScheduleopRequest;
use App\Models\Stype;
use App\Models\Recurring;
class ScheduleopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fileCount = Scheduleop::count();
        $scheduleop = Scheduleop::orderBy('id', 'desc')->get();
        return view('scheduleop.index', ['scheduleop' => $scheduleop, 'fileCount' => $fileCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $recurring = Recurring::all();
        $stype = Stype::all();
        $fileCount = Scheduleop::count();
        return view('scheduleop.create', ['fileCount'=>$fileCount, 'recurring' => $recurring, 'stype' => $stype]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleopRequest $request)
    {
        //
        $scheduleop = Scheduleop::create([
            'type_id' => $request->type_id,
            'description' => $request->description,
            'amount' => $request->amount,
            'cycle_id' => $request->cycle_id,
            'property_id' => $request->property_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'next_one' => $request->next_one,
            'instruction' => $request->instruction,
            'contact_person' => $request->contact_person,
           
         ]);
       //  dd($request->all());
         $scheduleop->save();
         toastr()->success('Information saved!');
         return redirect()->route('scheduleop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scheduleop  $scheduleop
     * @return \Illuminate\Http\Response
     */
    public function show(Scheduleop $scheduleop)
    {
        //
        return view('scheduleop.show',['scheduleop' => $scheduleop] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scheduleop  $scheduleop
     * @return \Illuminate\Http\Response
     */
    public function edit(Scheduleop $scheduleop)
    {
        //
        $recurring = Recurring::all();
        $stype = Stype::all();
        $fileCount = Scheduleop::count();
        return view('scheduleop.edit',['scheduleop' => $scheduleop, 'fileCount'=>$fileCount, 'recurring' => $recurring, 'stype' => $stype] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scheduleop  $scheduleop
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleopRequest $request, Scheduleop $scheduleop)
    {
        //
        $scheduleop->update($request->all());
        toastr()->success('Information updated!');
        return redirect()->route('scheduleop.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scheduleop  $scheduleop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scheduleop $scheduleop)
    {
        //
        $scheduleop->delete();
        toastr()->success('Information deleted!');
        return redirect()->route('scheduleop.index');
    }

    public function active($id){
        $scheduleop  =Scheduleop::find($id);
        if ($scheduleop->status == 0) {
            # code...
            $scheduleop->status = 1;
        }else{
            $scheduleop->status = 0;
        }

        $scheduleop->save();
        toastr()->success('Information updated!');
        return redirect()->route('scheduleop.index');
    }

    public function post($id){
        $scheduleop  =Scheduleop::find($id);
        if ($scheduleop->post == 0) {
            # code...
            $scheduleop->post = 1;
        }else{
            $scheduleop->post = 0;
        }
      
        $scheduleop->save();
        toastr()->success('Information updated!');
        return redirect()->route('scheduleop.index');
    }
}
