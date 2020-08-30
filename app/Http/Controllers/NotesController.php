<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Scopes\FilterScope;
use Illuminate\Http\Request;
use App\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    public function index(Request $request) {

        $notes = Note::all();
        return view('notes.index',compact('notes'));
    }

    public function create() {
        $note = new Note();
        return view('notes.create',compact('note'));
    }

    public function store(NoteRequest $request) {
        Note::create($request->all());
        return redirect()->route('notes.index')->with('message', "Note has been added successfully");
    }

    public function edit(Note $note) {
        return view('notes.edit',compact('note'));
    }

    public function update(Note $note, NoteRequest $request) {
        $note->update($request->all());
        return redirect()->route('notes.index')->with('message', "Note has been updated successfully");
    }

    public function show(Note $note) {
        return view('notes.show' ,compact('note'));
    }

    public function destroy(Note $note) {
        $note->delete();
        return redirect()->route('notes.index')->with('message', "Note has been deleted successfully");
    }
}
