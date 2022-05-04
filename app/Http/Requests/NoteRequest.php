<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
{
    public function rules()
    {
        return [
            'note.title' => 'required|string|max:100',
            'note.body' => 'required|string|max:4000',
        ];
    }
}