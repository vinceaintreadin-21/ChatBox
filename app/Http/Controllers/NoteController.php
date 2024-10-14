<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function showAllNotes(){
        $notes = Note::orderby('created_by', 'desc')->get();
        return view('notes', ['notes'=>$notes]);
    }

    public function showOneNote(Request $request){
        $note = Note::find($request->id);

        if(!$note){
            return redirect()->route('showAllNotes')->with('error', 'Note Not Found');
        }
        return view('note', ['note'=>$note]);
    }

    public function createNote(){
        return view('create-note');
    }

    public function storeNote(Request $request){
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'desc' => 'nullable|string|max:100000'
        ]);

        $notes = new Note();

        $notes->title = $validated['title'];
        $notes->desc = $validated['desc'];
        $notes->save();

        return redirect()->route('showAllNotes')->with('success', 'Note Successfully Created');
    }

    public function editNote(Request $request){
        $note = Note::find($request->id);

        if(!$note){
            return redirect()->route('showAllNotes')->with('error', 'Note Not Found');
        }
        return view('edit-note', ['note'=>$note]);
    }

    public function updateNote(Request $request){
        $note = Note::find($request->id);

        if(!$note){
            return redirect()->route('showAllNotes')->with('error', 'Note Not Found');
        }

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'desc' => 'nullable|string|max:100000'
        ]);

        $notes = new Note();

        $notes->title = $validated['title'];
        $notes->desc = $validated['desc'];
        $notes->save();

        return redirect()->route('showAllNotes')->with('success', 'Note Successfully Updated');

    }

    public function deleteNote(Request $request){
        $note = Note::find($request->id);

        if($note){
            $note->delete();
            return redirect()->route('showAllNotes', ['id' => $note->id])->with('success', 'Successfully Deleted');
        }

        return redirect()->route('showAllNotes')->with('error', 'No such note is found');



    }
}
