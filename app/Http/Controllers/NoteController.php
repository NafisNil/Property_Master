<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    function index()
    {
        $user = auth()->user();

        $notes = Note::where('user_id', $user->id)->paginate();

        return view("note.index", compact('notes'));
    }

    function create()
    {
        return view("note.create");
    }

    function store(Request $request)
    {

        $user = auth()->user();

        $request->validate(
            [
                'date' => 'required',
                'title' => 'required'
            ]
        );

        $data = $request->only(['date', 'title', 'content', 'action_date']);

        $user->notes()->create($data);

        toastr()->success(__('note-added'));
        return redirect()->route('notes.index');


    }

    function edit($id)
    {
        $note = Note::findOrFail($id);

        return view("note.edit", compact('note'));
    }

    function update(Request $request, $id)
    {
        $user = auth()->user();

        $request->validate(
            [
                'date' => 'required',
                'title' => 'required'
            ]
        );

        $data = $request->only(['date', 'title', 'content', 'action_date']);

        $note = Note::findOrFail($id);

        $note->update($data);

        toastr()->success(__('note-updated'));

        return redirect()->route('notes.index');


    }

    function destroy($id)
    {
        $note = Note::findOrFail($id);

        $note->delete();

        return response()->json(['status' => 'success', 'message' => __('note-deleted-successfully')]);
    }


}
