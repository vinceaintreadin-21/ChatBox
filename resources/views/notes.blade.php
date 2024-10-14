<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css styles/notes.css')}}">
</head>
<body>
    <header>
        <h1> Notes </h1>
    </header>

    <main>
        <div class="container">
            <div class="button-create">
                <form action="{{Route('createNote')}}" method="GET">
                    <button type="submit" class="create-content">
                        Create Note
                    </button>
                </form>
            </div>
            <div class="note-lists">
                @foreach ($notes as $note)
                    <form action="{{Route('showOneNote', ['id' => $note->id])}}" method="GET">
                    <button type="submit" class="note-lists-buttons">
                        <div>Title: {{$note->title}}</div>
                        <div>Description:{{$note->desc}}</div>
                    </button>
                    </form>
                    <hr>
                @endforeach
            </div>
        </div>
    </main>


</body>
</html>
