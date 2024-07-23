@extends('components.template')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/history.css') }}">
@endsection

@section('dashboard')
<div class="content-container px-5 py-3">
    <h1 class="mb-4">Your Photos</h1>
    <div class="row" style="max-height: 80vh; overflow-y:auto;">
        @foreach($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="photo-container">
                    <img src="{{ asset('user_post/' . $post->pict) }}" alt="Photo" data-toggle="modal" data-target="#photoModal{{ $post->id }}">
                </div>
            </div>
        @endforeach
    </div>
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
                    <div class="w-100 d-flex flex-column justify-content-center p-1 align-items-center">
                        <div class="center-box d-flex flex-column align-items-center">
                        <img src="{{ asset('user_post/' . $post->pict) }}" class="modal-photo" alt="">
                        @if ($post->caption)
                            <div class="caption">
                                <p class="m-0">{{ $post->caption }}</p>
                            </div>
                        @endif
                        </div>
                        @if ($post->postTags->count() > 0)
                            <div class="d-flex flex-row align-items-center justify-content-start w-100 mt-2 gap-1" style="max-width: 500px;">
                                <h6 style="font-size: 0.9rem;">Tagged Friends: </h6>
                                @foreach ($post->postTags as $tag)
                                    <div class="selected-user">{{ $tag->user->name }}</div>
                                @endforeach
                            </div>
                        @endif
                        @if ($post->location != NULL)
                            <div class="d-flex flex-row align-items-center justify-content-start w-100 mt-4 px-2" style="max-width: 500px;">
                                <span class="material-symbols-outlined" style="font-size: 200%; margin-right: 8px;">
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
@endsection

@section('extra-js')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
