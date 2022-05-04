<?php

namespace App\Http\Controllers;

use App\Note;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{
    public function index(Note $note)
    {
        return view('notes/index')->with(['notes' => $note->getPaginateByLimit()]);  
    }
    
    public function show(Note $note)
    {
    return view('notes/show')->with(['note' => $note]);
    }
    
    public function create()
    {
    return view('notes/create');
    }
    
    public function store(Note $note, NoteRequest $request) 
    {
        $input = $request['note'];
        $note->fill($input)->save();
        return redirect('/notes/' . $note->id);
    }
    
    public function edit(Note $note)
    {
    return view('notes/edit')->with(['note' => $note]);
    }
    
    public function update(NoteRequest $request, Note $note)
    {
    $input_note = $request['note'];
    $note->fill($input_note)->save();

    return redirect('/notes/' . $note->id);
    }
    
    public function delete(Note $note)
    {
    $note->delete();
    return redirect('/notes');
}
}
