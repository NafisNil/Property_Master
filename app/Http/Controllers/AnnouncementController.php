<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Requests\AnnounceRequest;
class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fileCount = Announcement::count();
        $announcement = Announcement::orderBy('id', 'desc')->get();
        return view('announcement.index', ['announcement' => $announcement, 'fileCount' => $fileCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fileCount = Announcement::count();
        return view('announcement.create', ['fileCount'=>$fileCount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnounceRequest $request)
    {
        //
       
        $announcement = Announcement::create([
            'issued_by' => $request->issued_by,
            'priority' => $request->priority,
            'subject' => $request->subject,
            'details' => $request->details,
            'action' => $request->action,
            'due_date' => "$request->due_date",
         
            'receivers' => $request->receivers,
            'acknowledge' => $request->acknowledge
        ]);
      //  dd($request->all());
        $announcement->save();
        toastr()->success('Information saved!');
        return redirect()->route('announcement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
        return view('announcement.show',['announcement' => $announcement] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
     
        $fileCount = Announcement::count();
        
        return view('announcement.edit',['announcement' => $announcement, 'fileCount'=>$fileCount] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(AnnounceRequest $request, Announcement $announcement)
    {
        //
        $announcement->update($request->all());
        toastr()->success('Information updated!');
        return redirect()->route('announcement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
        $announcement->delete();
        toastr()->success('Information deleted!');
        return redirect()->route('announcement.index');
    }

    public function active($id){
        $announcement  =Announcement::find($id);
        if ($announcement->status == 0) {
            # code...
            $announcement->status = 1;
        }else{
            $announcement->status = 0;
        }

        $announcement->save();
        toastr()->success('Information updated!');
        return redirect()->route('announcement.index');
    }

    public function post($id){
        $announcement  =Announcement::find($id);
        if ($announcement->post == 0) {
            # code...
            $announcement->post = 1;
        }else{
            $announcement->post = 0;
        }
      
        $announcement->save();
        toastr()->success('Information updated!');
        return redirect()->route('announcement.index');
    }
}
