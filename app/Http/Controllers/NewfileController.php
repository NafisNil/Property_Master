<?php

namespace App\Http\Controllers;

use App\Models\Newfile;
use Illuminate\Http\Request;
use App\Http\Requests\NewfileRequest;
use App\Models\Company;
use Auth;
class NewfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fileCount = Newfile::count();
        $newfile = Newfile::orderBy('id', 'desc')->get();
        return view('newfile.index', ['newfile' => $newfile, 'fileCount' => $fileCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $company = Company::where('user_id', Auth::user()->id)->get();
        $last_id = Company::orderBy('id','desc')->first();
        $fileCount = Newfile::count();
        return view('newfile.create', ['fileCount'=>$fileCount, 'company' => $company, 'last_id'=>$last_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewfileRequest $request)
    {
        //
        $newfile = Newfile::create([
            'company' => $request->company,
            'file_no' => $request->file_no,
            'fiscal_year' => $request->fiscal_year,
            'last_user' => $request->last_user
        ]);
      //  dd($request->all());
        $newfile->save();
        toastr()->success('Information saved!');
        return redirect()->route('newfile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newfile  $newfile
     * @return \Illuminate\Http\Response
     */
    public function show(Newfile $newfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newfile  $newfile
     * @return \Illuminate\Http\Response
     */
    public function edit(Newfile $newfile)
    {
        //
        $company = Company::where('user_id', Auth::user()->id)->get();
        $fileCount = Newfile::count();
        $last_id = Company::orderBy('id','desc')->first();
        return view('newfile.edit',['newfile' => $newfile, 'company' => $company, 'fileCount'=>$fileCount, 'last_id'=>$last_id] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newfile  $newfile
     * @return \Illuminate\Http\Response
     */
    public function update(NewfileRequest $request, Newfile $newfile)
    {
        //
        $newfile->update($request->all());
        toastr()->success('Information updated!');
        return redirect()->route('newfile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newfile  $newfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newfile $newfile)
    {
        //
        $newfile->delete();
        toastr()->success('Information deleted!');
        return redirect()->route('newfile.index');
    }
}
