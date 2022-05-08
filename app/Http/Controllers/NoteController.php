<?php

namespace App\Http\Controllers;

use App\Note;
use App\Http\Requests\NoteRequest;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request, Note $note)
    {
        $keyword = $request->input('keyword');
        return view('notes/index')->with(['notes' => $note->getPaginateByLimit(), 'keyword' => $keyword]);
    }
    
    public function search(Request $request, Note $note)
    {
        $keyword = $request->input('keyword');
        $query = Note::query();
        if($keyword){
            $spaceConversion = mb_convert_kana($keyword, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            foreach($wordArraySearched as $value) {
                $query->where('title', 'like', '%'.$value.'%');
            }
            $note = $query->orderBy('updated_at', 'DESC')->paginate(20);
        }else{
            echo "見つかりませんでした。";
        }
         return view('notes/index')->with(['notes' => $note, 'keyword' => $keyword]);
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