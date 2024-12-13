<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="container">
    <h1 class="text-center">Top 10 Most Famous Author</h1>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{ route('books.index') }}" class="btn btn-outline-primary" id="home-btn">Go Back To DashBoard</a>

    </div>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Author Name</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $index => $author)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{$author->name}}</td>
                <td>{{$author->voter}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>