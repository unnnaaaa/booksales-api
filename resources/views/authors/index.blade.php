<!DOCTYPE html>
<html>
<head>
    <title>Author List</title>
</head>
<body>
    <h1>List of Authors</h1>
    <ul>
        @foreach ($authors as $author)
            <li>{{ $author->name }} - {{ $author->country }}</li>
        @endforeach
    </ul>
</body>
</html>
