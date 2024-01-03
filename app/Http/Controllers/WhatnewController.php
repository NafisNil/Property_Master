<?php

namespace App\Http\Controllers;

use App\Models\Whatnew;
use Illuminate\Http\Request;
use App\Http\Requests\WhatnewRequest;
use Auth;
class WhatnewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fileCount = Whatnew::count();
        $whatnew = Whatnew::orderBy('id', 'desc')->get();
        return view('whatnew.index', ['whatnew' => $whatnew, 'fileCount' => $fileCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        
        $fileCount = Whatnew::count();
        return view('whatnew.create', ['fileCount'=>$fileCount]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WhatnewRequest $request)
    {
        //
        $whatnew = Whatnew::create([
            'issued_by' => $request->issued_by,
            'subject' => $request->subject,
            'details' => $request->details,
            'receivers' => $request->receivers,
            'acknowledge' => $request->acknowledge
        ]);
      //  dd($request->all());
        $whatnew->save();
        toastr()->success('Information saved!');
        return redirect()->route('whatnew.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Whatnew  $whatnew
     * @return \Illuminate\Http\Response
     */
    public function show(Whatnew $whatnew)
    {
        //
        return view('whatnew.show',['whatnew' => $whatnew] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Whatnew  $whatnew
     * @return \Illuminate\Http\Response
     */
    public function edit(Whatnew $whatnew)
    {
        //
        $fileCount = Whatnew::count();
        
        return view('whatnew.edit',['whatnew' => $whatnew, 'fileCount'=>$fileCount] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Whatnew  $whatnew
     * @return \Illuminate\Http\Response
     */
    public function update(WhatnewRequest $request, Whatnew $whatnew)
    {
        //
        $whatnew->update($request->all());
        toastr()->success('Information updated!');
        return redirect()->route('whatnew.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Whatnew  $whatnew
     * @return \Illuminate\Http\Response
     */
    public function destroy(Whatnew $whatnew)
    {
        //
        $whatnew->delete();
        toastr()->success('Information deleted!');
        return redirect()->route('whatnew.index');
    }
}
