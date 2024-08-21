<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Table</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
       <a href="addbook" > <button class="btn btn-primary">add book</button></a>
        <h1>Library Books</h1>
        @if(isset($books) && count($books) > 0)
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Page Number</th>
                    <th>Genre</th>
                    <th>Publish Year</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr onclick="window.location='{{ route('book.detail', ['id' => $book->bookid]) }}'">
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->page_num }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>{{ $book->year }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <center><h1>no books found :D</h1></center>
    @endif
    </div>
</body>
</html>
