@include('components.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .photo-placeholder {
            background-color: #e0e0e0;
            width: 100%;
            padding-bottom: 4%;
            position: relative;
        }
        .photo-placeholder::before {
            content: '';
            display: block;
            padding-top: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-0">

        <h1 class="mb-4">Your Photos</h1>

        <div class="row">

            @foreach ($posts as $post)
            <div class="col-4 col-md-2 mb-4">
                <img class="photo-placeholder" src="{{ asset('user_post/'. $post->pict) }}"></img>
            </div>
            @endforeach

            {{-- <div class="col-4 col-md-2 mb-4">
                <div class="photo-placeholder"></div>
            </div>
            <div class="col-4 col-md-2 mb-4">
                <div class="photo-placeholder"></div>
            </div>
            <div class="col-4 col-md-2 mb-4">
                <div class="photo-placeholder"></div>
            </div> --}}
        </div>
    </div>
    @include('main.closefriend')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
