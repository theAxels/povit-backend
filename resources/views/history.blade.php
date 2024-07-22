@include('components.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .photo-container {
            position: relative;
            width: 100%;
            padding-top: 100%;
            overflow: hidden;
        }
        .photo-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: pointer;
        }
        .modal-dialog-centered {
            display: flex;
            align-items: center;
        }
        .modal-content {
            max-width: 30%;
            max-height: 30%;
            margin: auto;
        }
        .modal-body {
            padding: 0;
        }
        #modalImage {
            width: 100%;
            height: 440px;
        }
    </style>
</head>
<body>
    <div class="container mt-0">
        <h1 class="mb-4">Your Photos</h1>

        <div class="row">
            @foreach($posts as $post)
                <div class="col-4 col-md-2 mb-4">
                    <div class="photo-container">
                        <img src="{{ asset('user_post/' . $post->pict) }}" alt="Photo" data-toggle="modal" data-target="#photoModal" data-src="{{ asset('user_post/' . $post->pict) }}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Photo" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    @extends('main.closefriend')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('#photoModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var src = button.data('src');
            var modal = $(this);
            modal.find('#modalImage').attr('src', src);
        });
    </script>
</body>
</html>
