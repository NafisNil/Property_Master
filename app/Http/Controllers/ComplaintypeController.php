<?php

namespace App\Http\Controllers;

use App\Models\Complaintype;
use Illuminate\Http\Request;
use App\Http\Requests\ComplaintypeRequest;
class ComplaintypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fileCount = Complaintype::count();
        $complaintype = Complaintype::orderBy('id', 'desc')->get();
        return view('complaintype.index', ['complaintype' => $complaintype, 'fileCount' => $fileCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fileCount = Complaintype::count();
        return view('complaintype.create', ['fileCount'=>$fileCount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComplaintypeRequest $request)
    {
        //
        $complaintype = Complaintype::create([
            'name' => $request->name,
           
        ]);
      //  dd($request->all());
        $complaintype->save();
        toastr()->success('Information saved!');
        return redirect()->route('complaintype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaintype  $complaintype
     * @return \Illuminate\Http\Response
     */
    public function show(Complaintype $complaintype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaintype  $complaintype
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaintype $complaintype)
    {
        //
        $fileCount = Complaintype::count();
        
        return view('complaintype.edit',['complaintype' => $complaintype, 'fileCount'=>$fileCount] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaintype  $complaintype
     * @return \Illuminate\Http\Response
     */
    public function update(ComplaintypeRequest $request, Complaintype $complaintype)
    {
        //
        $complaintype->update($request->all());
        toastr()->success('Information updated!');
        return redirect()->route('complaintype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaintype  $complaintype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaintype $complaintype)
    {
        //
        $complaintype->delete();
        toastr()->success('Information deleted!');
        return redirect()->route('complaintype.index');
    }
}
