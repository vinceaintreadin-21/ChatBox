<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('welcome');
});

//showing the notes
Route::get('/noteapp', [NoteController::class, 'showAllNotes'])->name('showAllNotes');

//showing just one note
Route::get('/noteapp/{id}', [NoteController::class, 'showOneNote'])->name('showOneNote');

//creating a note

Route::get('/create-note', [NoteController::class, 'createNote'])->name('createNote');

//storing a note
Route::post('/store-notes', [NoteController::class, 'storeNote'])->name('storeNote');

Route::get('/notes/{id}/edit',[NoteController::class, 'editNote'])->name('editNote');

Route::put('/notes/{id}/update', [NoteController::class, 'updateNote'])->name('updateNote');

Route::delete('/notes/{id}/delete', [NoteController::class, 'deleteNote'])->name('deleteNote');
