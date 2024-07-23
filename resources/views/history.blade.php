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
            border-radius: 15px;
            object-fit: cover;
            cursor: pointer;
        }
        .modal-dialog-centered {
            display: flex;
            align-items: center;
        }
        .modal-content {
            width: auto;
            max-width: 500px;
            margin: auto;
        }
        .modal-body {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
        }
        .modal-photo {
            width: 498px;
            height: 500px;
            object-fit: cover;
        }
        .modal-header, .modal-footer {
            border: none;
        }
        .center-box {
            width: 100%;
            max-width: 500px;
            height: 100%;
            max-height: 375px;
            /* aspect-ratio: 1; */
            border-radius: 25px;
            /* display: flex;
            justify-content: center;
            align-items: center; */
            border: #000000 solid 2px;
            position: relative;
            overflow: hidden;
            background-size: cover;
            /* margin: auto; */
            /* margin-top: 50px; */
            z-index: 10;
        }
            .caption {
                position: absolute;
                width: 40%;
                height: 8%;
                text-align: center;
                background-color: rgba(0, 0, 0, 0.3);
                color: #FFFFFF;
                border-radius: 50px;
                padding: 2px;
                font-size: 0.9rem;
                /* text-align: center; */
                /* max-width: 90%; */
                margin: 0 auto;
                bottom: 10px;
            }
    </style>
</head>
<body>
    @include('components.sidebar')

    <div class="container mt-0">
        <h1 class="mb-4">Your Photos</h1>

        <div class="row">
            @foreach($posts as $post)
                <div class="col-4 col-md-2 mb-4">
                    <div class="photo-container">
                        <img src="{{ asset('user_post/' . $post->pict) }}" alt="Photo" data-toggle="modal" data-target="#photoModal{{ $post->id }}">
                    </div>
                </div>
            @endforeach
        </div>

        @foreach($posts as $post)
            <div class="modal fade" id="photoModal{{ $post->id }}" tabindex="-1" aria-labelledby="photoModalLabel{{ $post->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="h-100 w-100 d-flex flex-column justify-content-center align-items-center">
                                <div class="d-flex flex-row justify-content-center align-items-end mb-0">
                                        @if ($post->is_closed_friend == 1)
                                            <div class="bg-success text-center p-1 rounded-circle d-flex justify-content-center align-items-center me-2" style="width: 25px; height: 25px;" title="Close Friend">
                                                <span class="material-symbols-outlined" style="font-size: 12px; color: white;">star</span>
                                            </div>
                                        @endif
                                        <h4 class="d-inline-block mb-0">{{ $post->sender->name }}</h4>
                                        <span class="d-block ms-2" style="font-size: 0.7rem">{{ $post->time }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="camera w-100 d-flex flex-column justify-content-center p-1 align-items-center">
                                    <div class="center-box d-flex flex-column align-items-center">
                                        <img src="{{ asset('user_post/' . $post->pict) }}" class="modal-photo" alt="">
                                        <div class="caption">
                                            <p class="m-0">{{ $post->caption }}</p>
                                        </div>
                                    </div>
                                    @if ($post->postTags->count() > 0)
                                        <div class="d-flex flex-row align-items-center justify-content-start w-100 mt-2 gap-1" style="max-width: 500px;">
                                            <h6 style="font-size: 0.9rem;">Tagged Friends: </h6>
                                            @foreach ($post->postTags as $tag)
                                                <div class="selected-user">{{ $tag->user->name }}</div>
                                            @endforeach
                                    @endif
                                    @if ($post->location != NULL)
                                        <div class="d-flex flex-row align-items-center justify-content-start w-100 mt-4 px-2" style="max-width: 500px;">
                                            <span class="material-symbols-outl  ined" style="font-size: 200%; margin-right: 8px;">
                                                location_on
                                            </span>
                                            <p class="mb-0" style="flex: 1; text-align: left; font-size: 0.9rem;">{{ $post->location }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
