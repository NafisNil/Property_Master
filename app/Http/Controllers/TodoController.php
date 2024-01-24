<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fileCount = Todo::count();
        $todo = Todo::orderBy('id', 'desc')->get();
        return view('todo.index', ['todo' => $todo, 'fileCount' => $fileCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fileCount = Todo::count();
        return view('todo.create', ['fileCount'=>$fileCount]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        //
       // dd($request->all());
        $todo = Todo::create([
           'assigned_by' => $request->assigned_by,
           'description' => $request->description,
           'objectives' => $request->objectives,
           'person' => $request->person,
           'ch_name' => $request->ch_name,
           'ch_office' => $request->ch_office,
           'ch_email' => $request->ch_email,
           'priority' => $request->priority,
           'deadline' => $request->deadline,
           'location' => $request->location,
           'instruction' => $request->instruction,
           'room_date_one' => $request->room_date_one,
           'room_time_one' => $request->room_time_one,
           'room_date_two' => $request->room_date_two,
           'room_time_two' => $request->room_time_two,
           'room_date_three' => $request->room_date_three,
           'room_time_three' => $request->room_time_three,
        ]);
      //  dd($request->all());
        $todo->save();
        toastr()->success('Information saved!');
        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
        return view('todo.show',['todo' => $todo] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
        $fileCount = Todo::count();
        
        return view('todo.edit',['todo' => $todo, 'fileCount'=>$fileCount] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        //
        $todo->update($request->all());
        toastr()->success('Information updated!');
        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
        $todo->delete();
        toastr()->success('Information deleted!');
        return redirect()->route('todo.index');
    }

    public function active($id){
        $todo  =Todo::find($id);
        if ($todo->status == 0) {
            # code...
            $todo->status = 1;
        }else{
            $todo->status = 0;
        }

        $todo->save();
        toastr()->success('Information updated!');
        return redirect()->route('todo.index');
    }

    public function post($id){
        $todo  =Todo::find($id);
        if ($todo->post == 0) {
            # code...
            $todo->post = 1;
        }else{
            $todo->post = 0;
        }
      
        $todo->save();
        toastr()->success('Information updated!');
        return redirect()->route('todo.index');
    }
}
