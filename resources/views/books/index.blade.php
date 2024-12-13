<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="container">
    <h1>List Books</h1>

    <form method="GET" action="{{ route('books.index') }}">
        <label for="limit" class="col-sm-2 col-form-label mt-2">List shown : </label>
        <select name="limit" class="col-sm-2 col-form-label">
            @for ($i = 10; $i <= 100; $i +=10)
                <option value="{{ $i }}" {{ request('limit') == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
        </select>
        <br>
        <label for="limit" class="col-sm-2 col-form-label mt-2">Search : </label>
        <input type="text" name="search" class="col-sm-2 col-form-label" value="{{ request('search') }}">
        <br>
        <button type="submit" class="btn-primary mt-2 col-md-2">Submit</button>
    </form>
    <div class="d-flex justify-content-end">

        <div class="btn-group align-item-left" role="group" aria-label="Basic example">

            <a href="{{ route('authors.index') }}" class="btn btn-outline-primary" id="author-btn">Author</a>
            <a href="{{ route('rate.create') }}" class="btn btn-outline-primary" id="rating-btn">Rating</a>
        </div>
    </div>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Book Name</th>
                <th>Category Name</th>
                <th>Author Name</th>
                <th>Average Rating</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->category->name}}</td>
                <td>{{$book->author->name}}</td>
                <td>{{$book->average_rating?number_format($book->average_rating,2):'N/A'}}</td>
                <td>{{$book->voters ?? 0}}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <div class="d-flex justify-content-end">
        <nav aria-label="Page navigation example ">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>

</body>

</html>