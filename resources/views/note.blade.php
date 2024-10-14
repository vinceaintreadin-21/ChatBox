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
        <h1>Note Box</h1>
    </header>

        <form action="{{Route('editNote', ['id' =>$note->id])}}" method="GET">
            <button type="submit">
            Edit Note
            </button>
        </form>


        <form action="{{ route('deleteNote', ['id' => $note->id]) }}" method="POST" onsubmit="return confirmDelete();">
            @csrf
            @method('DELETE')
            <button type="submit">
                Delete User
            </button>
        </form>

        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete it?");
            }
        </script>


        <div>Title: {{$note->title}}</div>
        <div>Description:{{$note->desc}}</div>
        <form action="{{Route('showAllNotes')}}">
            <button type="submit">
                Go back
            </button>

</body>
</html>
