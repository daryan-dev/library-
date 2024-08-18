<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Table</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
       <a href="addbook"> <button>add book</button></a>
        <h1>Library Books</h1>
        @if(isset($books) && count($books) > 0)
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Page Number</th>
                    <th>Genre</th>
                    <th>Publication Year</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr onclick="window.location='#';">
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
