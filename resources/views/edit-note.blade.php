<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css styles/edit-note.css')}}">
</head>
<body>
    <header>
        <h1>adsadasadadadsa</h1>
    </header>

    <form action="{{Route('updateNote', ['id' => $note->id])}}" method="POST">
    @csrf
    @method('PUT')
        <label for="title"></label>
        <input value="{{$note->title}}" id="title" placeholder="Title" name="title" required>
        <br>
        <label for="desc" ></label>
        <input value="{{$note->desc}} "id="desc" placeholder="Description" name="desc" required>
        <br>
        <button type="submit" class="update-btn">
            Update Note
        </button>
    </form>

    <form action="{{Route('showOneNote', ['id' => $note->id])}}">
        <button type="submit" class="close-btn">
            Close
        </button>
</body>
</html>
