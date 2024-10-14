<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create Note</h1>

    <form action="{{Route('storeNote')}}" method="POST">
        @csrf
        <label for="title">Title: </label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="desc">Description: </label>
        <input type="text" id="desc" name="desc" required>
        <br>
        <button type="submit">
            Create Note
        </button>
    </form>

    <form action="{{Route('showAllNotes')}}">
        <button type="submit">
            Go back
        </button>
    </form>
</body>
</html>
