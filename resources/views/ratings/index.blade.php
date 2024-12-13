<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Insert Rating</title>
</head>

<body class="container">

    <!-- <form method="POST" action="{{ route('rate.store') }}" class="position-relative mt-5">
        <h1>Insert Rating</h1>
        @csrf
        <label class="col-sm-2 col-form-label mt-5">Book Author:</label>
        <select id="author" class="dropdown col-sm-2" name="author_id">
            <option value="">Select an author</option>
            @foreach($authors as $author)
            <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>

        <br>

        <label class="col-sm-2 col-form-label">Book Title:</label>
        <select id="book" class="dropdown col-sm-2" name="book_id">
            <option value="">Select a book</option>
        </select>
        <br>

        <label class="col-sm-2 col-form-label">Rating:</label>
        <select name="rating" class="col-sm-2">
            @for ($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
                @endfor
        </select>
        <br>

        <button type="submit" class="btn-primary mt-2 col-md-2">Submit</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#author').on('change', function() {
                var authorID = $(this).val();

                if (authorID) {
                    $.ajax({
                        url: '/getBooks/' + authorID,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#book').empty();
                            $('#book').append('<option value="">Select a book</option>');
                            $.each(data, function(key, value) {
                                $('#book').append('<option value="' + value.id + '">' + value.title + '</option>');
                            });
                        }
                    });
                } else {
                    $('#book').empty();
                    $('#book').append('<option value="">Select a book</option>');
                }
            });
        });
    </script> -->
    <form method="POST" action="{{ route('rate.store') }}" class="mt-5">
        <h1 class="text-center">Insert Rating</h1>
        <div class="d-flex justify-content-end">
            <a href="{{ route('books.index') }}" class="btn btn-outline-primary  float-end" id="home-btn">Go Back To DashBoard</a>
        </div>
        @csrf
        <div class="mb-3">

            <label for="author" class="form-label">Book Author:</label>

            <select id="author" class="form-select" name="author_id">
                <option value="">Select an author</option>
                @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="book" class="form-label">Book Title:</label>
            <select id="book" class="form-select" name="books_id">
                <option value="">Select a book</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating:</label>
            <select id="rating" class="form-select" name="rating">
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#author').on('change', function() {
                var authorID = $(this).val();
                console.log('Author selected:', authorID);

                if (authorID) {
                    $.ajax({
                        url: '/getBooks/' + authorID,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log('Data received:', data);
                            $('#book').empty().append('<option value="">Select a book</option>');
                            $.each(data, function(index, book) {
                                $('#book').append('<option value="' + book.id + '">' + book.title + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error); // Debug error jika ada
                        }
                    });
                } else {
                    $('#book').empty().append('<option value="">Select a book</option>');
                }
            });
        });
    </script>

</body>

</html>