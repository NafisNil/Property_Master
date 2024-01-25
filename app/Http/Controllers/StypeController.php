<?php

namespace App\Http\Controllers;

use App\Models\Stype;
use Illuminate\Http\Request;
use App\Http\Requests\StypeRequest;
class StypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                //
                $fileCount = Stype::count();
                $stype = Stype::orderBy('id', 'desc')->get();
                return view('stype.index', ['stype' => $stype, 'fileCount' => $fileCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fileCount = Stype::count();
        return view('stype.create', ['fileCount'=>$fileCount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StypeRequest $request)
    {
        //
        $stype = Stype::create([
            'name' => $request->name,
           
        ]);
      //  dd($request->all());
        $stype->save();
        toastr()->success('Information saved!');
        return redirect()->route('stype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stype  $stype
     * @return \Illuminate\Http\Response
     */
    public function show(Stype $stype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stype  $stype
     * @return \Illuminate\Http\Response
     */
    public function edit(Stype $stype)
    {
        //
        $fileCount = Stype::count();
        
        return view('stype.edit',['stype' => $stype, 'fileCount'=>$fileCount] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stype  $stype
     * @return \Illuminate\Http\Response
     */
    public function update(StypeRequest $request, Stype $stype)
    {
        //
        $stype->update($request->all());
        toastr()->success('Information updated!');
        return redirect()->route('stype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stype  $stype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stype $stype)
    {
        //
        $stype->delete();
        toastr()->success('Information deleted!');
        return redirect()->route('stype.index');
    }
}
