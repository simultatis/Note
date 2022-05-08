<!DOCTYPE HTML>
@extends('layouts.app')
@section('content')
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Notes</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    
    <body>
        Auth::user()->name
        
        <h1 class="title">
            {{ $note->title }}
        </h1>
        <div class="content">
            <div class="content__note">
                <h3>本文</h3>
                <p>{{ $note->body }}</p>    
            </div>
        </div>
        <p class="edit">[<a href="/notes/{{ $note->id }}/edit">edit</a>]</p>
        <div class="footer">
            <a href="/notes">戻る</a>
        </div>
    </body>
</html>
@endsection