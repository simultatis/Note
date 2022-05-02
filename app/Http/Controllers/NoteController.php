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
}
