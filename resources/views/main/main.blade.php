@extends('components.template')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
@section('dashboard')

<div class="container">
        <div>
            @foreach ($images as $post)
                <div class="post">
                    <h2>{{ $post->caption }}</h2>
                    @if ($post->pict)
                        <img src="{{ url('user_post/' . $post->pict) }}" alt="Post Image">
                        {{$post->pict}}
                    @endif
                    <p>Location: {{ $post->location }}</p>
                    <p>Posted at: {{ $post->created_at }}</p>
                </div>
            @endforeach
            {{-- tes data udah keluar --}}
        </div>
        <h1 class="text-center">Laravel webcam capture image and save from camera - ItSolutionStuff.com</h1>

        <form method="POST" action="{{ route('post_image') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div id="my_camera"></div>
                    <br/>
                    <input type=button value="Take Snapshot" onClick="take_snapshot()">
                    <input type="hidden" name="image" class="image-tag">
                </div>
                <div class="col-md-6">
                    <div id="results">Your captured image will appear here...</div>
                </div>
                <div class="col-md-12 text-center">
                    <br/>
                    <button class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

<script>
    $(document).ready(function() {
        Webcam.set({
            width: 490,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#my_camera');
    });

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            console.log(data_uri);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }
</script>
    {{-- <h1>Friends List</h1>
    @if ($friends->isEmpty())
        <p>You have no friends.</p>
    @else
        <ul>
            @foreach ($friends as $friend)
                <li>{{ $friend->name }}</li>
            @endforeach
        </ul>
    @endif

    <h1>You Might Know</h1>
    @if ($youMightKnow->isEmpty())
        <p>No suggestions available.</p>
    @else
        <ul>
            @foreach ($youMightKnow as $suggestedFriend)
                <li>{{ $suggestedFriend->name }} ({{ $suggestedFriend->email }})</li>
            @endforeach
        </ul>
    @endif --}}
