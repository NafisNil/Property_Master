<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;
use App\Http\Requests\ComplainRequest;
use App\Models\Complaintype;
class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $fileCount = Complain::count();
        $complain = Complain::orderBy('id', 'desc')->get();
        return view('complain.index', ['complain' => $complain, 'fileCount' => $fileCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $complain_type = Complaintype::all();
        $fileCount = Complain::count();
        return view('complain.create', ['fileCount'=>$fileCount, 'complain_type' => $complain_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComplainRequest $request)
    {
        //
        $complain = Complaintype::create([
            'name' => $request->name,
           
        ]);
      //  dd($request->all());
        $complain->save();
        toastr()->success('Information saved!');
        return redirect()->route('complain.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function show(Complain $complain)
    {
        //
        return view('complain.show',['complain' => $complain] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function edit(Complain $complain)
    {
        //
        $fileCount = Complain::count();
        $complain_type = Complaintype::all();
        return view('complain.edit',['complain' => $complain, 'fileCount'=>$fileCount, 'complain_type' => $complain_type] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function update(ComplainRequest $request, Complain $complain)
    {
        //
        $complain->update($request->all());
        toastr()->success('Information updated!');
        return redirect()->route('complain.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complain $complain)
    {
        //
        $complain->delete();
        toastr()->success('Information deleted!');
        return redirect()->route('complain.index');
    }

    public function active($id){
        $complain  =Announcement::find($id);
        if ($complain->status == 0) {
            # code...
            $complain->status = 1;
        }else{
            $complain->status = 0;
        }

        $complain->save();
        toastr()->success('Information updated!');
        return redirect()->route('complain.index');
    }

    public function post($id){
        $complain  =Announcement::find($id);
        if ($complain->post == 0) {
            # code...
            $complain->post = 1;
        }else{
            $complain->post = 0;
        }
      
        $complain->save();
        toastr()->success('Information updated!');
        return redirect()->route('complain.index');
    }
}
