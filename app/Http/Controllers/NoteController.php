<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

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
}
