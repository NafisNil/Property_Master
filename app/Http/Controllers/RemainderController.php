<?php

namespace App\Http\Controllers;

use App\Models\Remainder;
use Illuminate\Http\Request;
use App\Http\Requests\RemainderRequest;
class RemainderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fileCount = Remainder::count();
        $remainder = Remainder::orderBy('id', 'desc')->get();
        return view('remainder.index', ['remainder' => $remainder, 'fileCount' => $fileCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fileCount = Remainder::count();
        return view('remainder.create', ['fileCount'=>$fileCount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RemainderRequest $request)
    {
        //
        $remainder = Remainder::create([
            'issued_by' => $request->issued_by,
            'priority' => $request->priority,
            'subject' => $request->subject,
            'details' => $request->details,
            'action' => $request->action,
            'due_date' => $request->due_date,
            'location' => $request->location,
            'time' => $request->time,
            'receivers' => $request->receivers,
          
        ]);
      //  dd($request->all());
        $remainder->save();
        toastr()->success('Information saved!');
        return redirect()->route('remainder.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Remainder  $remainder
     * @return \Illuminate\Http\Response
     */
    public function show(Remainder $remainder)
    {
        //
        return view('remainder.show',['remainder' => $remainder] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Remainder  $remainder
     * @return \Illuminate\Http\Response
     */
    public function edit(Remainder $remainder)
    {
        //
        $fileCount = Remainder::count();
        
        return view('remainder.edit',['remainder' => $remainder, 'fileCount'=>$fileCount] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Remainder  $remainder
     * @return \Illuminate\Http\Response
     */
    public function update(RemainderRequest $request, Remainder $remainder)
    {
        //
        $remainder->update($request->all());
        toastr()->success('Information updated!');
        return redirect()->route('remainder.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Remainder  $remainder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Remainder $remainder)
    {
        //
        $remainder->delete();
        toastr()->success('Information deleted!');
        return redirect()->route('remainder.index');
    }

    public function active($id){
        $remainder  =Remainder::find($id);
        if ($remainder->status == 0) {
            # code...
            $remainder->status = 1;
        }else{
            $remainder->status = 0;
        }

        $remainder->save();
        toastr()->success('Information updated!');
        return redirect()->route('remainder.index');
    }

    public function post($id){
        $remainder  =Remainder::find($id);
        if ($remainder->post == 0) {
            # code...
            $remainder->post = 1;
        }else{
            $remainder->post = 0;
        }
      
        $remainder->save();
        toastr()->success('Information updated!');
        return redirect()->route('remainder.index');
    }
}
