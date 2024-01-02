<?php

namespace App\Http\Controllers;

use App\Models\Welcome;
use Illuminate\Http\Request;
use App\Http\Requests\WelcomeRequest;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fileCount = Welcome::count();
        $welcome = Welcome::orderBy('id', 'desc')->first();
        return view('welcome.index', ['welcome' => $welcome, 'fileCount' => $fileCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('welcome.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WelcomeRequest $request)
    {
        //
        $welcome = Welcome::create([
            'desc' => $request->desc,
            'status' => $request->status,
            'post' => $request->post

        ]);

        $welcome->save();
        toastr()->success('Information saved!');
        return redirect()->route('welcome.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function show(Welcome $welcome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function edit(Welcome $welcome)
    {
        //
        return view('welcome.edit', ['welcome' => $welcome]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function update(WelcomeRequest $request, Welcome $welcome)
    {
        //
        $welcome->update($request->all());
        toastr()->success('Information updated!');
        return redirect()->route('welcome.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Welcome $welcome)
    {
        //
        $welcome->delete();
        toastr()->success('Information deleted!');
        return redirect()->route('welcome.index');
    }

    public function active($id){
        $welcome  =Welcome::find($id);
        if ($welcome->status == 0) {
            # code...
            $welcome->status = 1;
        }else{
            $welcome->status = 0;
        }

        $welcome->save();
        toastr()->success('Information updated!');
        return redirect()->route('welcome.index');
    }

    public function post($id){
        $welcome  =Welcome::find($id);
        if ($welcome->post == 0) {
            # code...
            $welcome->post = 1;
        }else{
            $welcome->post = 0;
        }
      
        $welcome->save();
        toastr()->success('Information updated!');
        return redirect()->route('welcome.index');
    }
}
