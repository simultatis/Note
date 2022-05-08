<!DOCTYPE HTML>
@extends('layouts.app')
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Note</title>
    </head>
    
    <body>
        Auth::user()->name
        
        <h1>Note Name</h1>
        <form action="/notes" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="note[title]" placeholder="タイトル" value="{{ old('note.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('note.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="note[body]" placeholder="今日も1日お疲れさまでした。">{{ old('note.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('note.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/notes">back</a>]</div>
    </body>
</html>
@endsection