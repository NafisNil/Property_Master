<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Requests\NoticeRequest;   
use Auth;
class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fileCount = Notice::count();
        $notice = Notice::orderBy('id', 'desc')->get();
        return view('notice.index', ['notice' => $notice, 'fileCount' => $fileCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
                
        $fileCount = Notice::count();
        return view('notice.create', ['fileCount'=>$fileCount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeRequest $request)
    {
        //

        $notice = Notice::create([
            'posted_by' => $request->posted_by,
            'title' => $request->title,
            'pdf' => $request->file
        ]);

        if ($request->hasFile('file')) {
            $this->_uploadfile($request, $notice);
        }

        toastr()->success('Information saved!');
        return redirect()->route('notice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        //
        $fileCount = Notice::count();
        
        return view('notice.edit',['notice' => $notice, 'fileCount'=>$fileCount] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        //
        $notice->update([
            'posted_by' => Auth::user()->name,
            'title' => $request->title,
            'pdf' => $request->file
        ]);
        if ($request->hasFile('file')) {
            @unlink('storage/'.$notice->pdf);
            $this->_uploadfile($request, $notice);
        }
      //  dd($request->all());
        $notice->save();
        toastr()->success('Information updated!');
        return redirect()->route('notice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        //
        $notice->delete();
        toastr()->success('Information deleted!');
        return redirect()->route('notice.index');
    }

    private function _uploadfile($request, $notice)
    {
        # code...
        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            
                  $request->file->move('storage/',$fileName);

         //  dd($fileName);
            $notice->pdf = $fileName;
            $notice->save();
        }
       
    }

    public function active($id){
        $notice  =Notice::find($id);
        if ($notice->status == 0) {
            # code...
            $notice->status = 1;
        }else{
            $notice->status = 0;
        }

        $notice->save();
        toastr()->success('Information updated!');
        return redirect()->route('notice.index');
    }

    public function post($id){
        $notice  =Notice::find($id);
        if ($notice->post == 0) {
            # code...
            $notice->post = 1;
        }else{
            $notice->post = 0;
        }
      
        $notice->save();
        toastr()->success('Information updated!');
        return redirect()->route('notice.index');
    }


}
