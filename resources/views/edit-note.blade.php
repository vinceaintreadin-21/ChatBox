<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Edit Note</h1>
    </header>

    <form action="{{Route('updateNote', ['id' => $note->id])}}" method="POST">
    @csrf
    @method('PUT')
        <label for="title" >Title: </label>
        <input value="{{$note->title}}" id="title" name="title" required>
        <br>
        <label for="desc" >Description: </label>
        <input value="{{$note->desc}} "id="desc" name="desc" required>
        <br>
        <button type="submit">
            Update Note
        </button>
    </form>

    <form action="{{Route('showOneNote', ['id' => $note->id])}}">
        <button type="submit">
            Go back
        </button>
</body>
</html>
