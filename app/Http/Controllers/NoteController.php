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
            'title' => 'required|string|max:255',
            'desc' => 'required|string|max:100000'
        ]);

        $notes = new Note();

        $notes->title = $validated['title'];
        $notes->desc = $validated['desc'];
        $notes->save();

        return redirect()->route('showAllNotes')->with('success');
    }

    public function editNote(Request $request){
        $note = Note::find($request->id);

        if(!$note){
            return redirect()->route('showAllNotes')->with('error');
        }
        return view('edit-note', ['note'=>$note]);
    }

    public function updateNote(Request $request, $id){
        $note = Note::find($id);

        if(!$note){
            return redirect()->route('showAllNotes')->with('error');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string|max:100000'
        ]);

        $note->title = $validated['title'];
        $note->desc = $validated['desc'];
        $note->save();

        return redirect()->route('showAllNotes')->with('success');

    }

    public function deleteNote(Request $request){
        $note = Note::find($request->id);

        if($note){
            $note->delete();
            return redirect()->route('showAllNotes', ['id' => $note->id])->with('success');
        }

        return redirect()->route('showAllNotes')->with('error');



    }
}
