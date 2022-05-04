<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Note</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <h1>Note Name</h1>
        <div class='notes'>
            <p>[<a href='/notes/create'>create</a>]</p>
            @foreach ($notes as $note)
            <form action="/notes/{{ $note->id }}" id="form_{{ $note->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button> 
            </form>
                <div class='note'>
                    <h2 class='title'>
                        <a href="/notes/{{ $note->id }}">{{ $note->title }}</a>
                    </h2>
                    <p class='body'>{{ $note->body }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $notes->links() }}
        </div>
    </body>
</html>