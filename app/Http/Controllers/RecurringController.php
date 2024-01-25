<?php

namespace App\Http\Controllers;

use App\Models\Recurring;
use Illuminate\Http\Request;
use App\Http\Requests\RecurringRequest;
class RecurringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fileCount = Recurring::count();
        $recurring = Recurring::orderBy('id', 'desc')->get();
        return view('recurring.index', ['recurring' => $recurring, 'fileCount' => $fileCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fileCount = Recurring::count();
        return view('recurring.create', ['fileCount'=>$fileCount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecurringRequest $request)
    {
        //
        $recurring = Recurring::create([
            'name' => $request->name,
           
        ]);
      //  dd($request->all());
        $recurring->save();
        toastr()->success('Information saved!');
        return redirect()->route('recurring.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recurring  $recurring
     * @return \Illuminate\Http\Response
     */
    public function show(Recurring $recurring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recurring  $recurring
     * @return \Illuminate\Http\Response
     */
    public function edit(Recurring $recurring)
    {
        //
        $fileCount = Recurring::count();
        
        return view('recurring.edit',['recurring' => $recurring, 'fileCount'=>$fileCount] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recurring  $recurring
     * @return \Illuminate\Http\Response
     */
    public function update(RecurringRequest $request, Recurring $recurring)
    {
        //
        $recurring->update($request->all());
        toastr()->success('Information updated!');
        return redirect()->route('recurring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recurring  $recurring
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recurring $recurring)
    {
        //
        $recurring->delete();
        toastr()->success('Information deleted!');
        return redirect()->route('recurring.index');
    }
}
