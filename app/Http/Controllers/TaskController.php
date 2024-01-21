<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fileCount = Task::count();
        $task = Task::orderBy('id', 'desc')->get();
        return view('task.index', ['task' => $task, 'fileCount' => $fileCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fileCount = Task::count();
        return view('task.create', ['fileCount'=>$fileCount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        //
        $task = Task::create([
           'assigned_by' => $request->assigned_by,
           
            'priority' => $request->priority,
            'subject' => $request->subject,
            'details' => $request->details,
            'required_action' => $request->required_action,
            'due_date' => "$request->due_date",
         
            'receivers' => $request->receivers,
            'acknowledge' => $request->acknowledge
        ]);
      //  dd($request->all());
        $task->save();
        toastr()->success('Information saved!');
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
        return view('task.show',['task' => $task] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        $fileCount = Task::count();
        
        return view('task.edit',['task' => $task, 'fileCount'=>$fileCount] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
        $task->update($request->all());
        toastr()->success('Information updated!');
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();
        toastr()->success('Information deleted!');
        return redirect()->route('task.index');
    }

    public function active($id){
        $task  =Task::find($id);
        if ($task->status == 0) {
            # code...
            $task->status = 1;
        }else{
            $task->status = 0;
        }

        $task->save();
        toastr()->success('Information updated!');
        return redirect()->route('task.index');
    }

    public function post($id){
        $task  =Task::find($id);
        if ($task->post == 0) {
            # code...
            $task->post = 1;
        }else{
            $task->post = 0;
        }
      
        $task->save();
        toastr()->success('Information updated!');
        return redirect()->route('task.index');
    }

}
