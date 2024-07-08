@extends('components.template')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
@section('dashboard')

<div class="container">
    {{-- @extends('components.friendslayout') --}}
    @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

    <h1>Friends List</h1>

    @if ($friends->isEmpty())
        <p>You have no friends.</p>
    @else
        <ul>
            @foreach ($friends as $friend)
                <li>{{ $friend->name }}</li>
                <form method="POST" action="{{ route('unfollow', ['friendId' => $friend->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Unfollow</button>
                </form>
            @endforeach
        </ul>
    @endif
    <h1>You Might Know</h1>
    @if ($youMightKnow->isEmpty())
        <p>No suggestions available.</p>
    @else
        <ul>
            @foreach ($youMightKnow as $suggestedFriend)
                <li>{{ $suggestedFriend->name }} ({{ $suggestedFriend->email }})
                    <form method="POST" action="{{ route('follow', ['friendId' => $suggestedFriend->id]) }}">
                        @csrf
                        <button type="submit">Follow</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
        <div>
            {{-- @foreach ($images as $post)
                <div class="post">
                    <h2>{{ $post->caption }}</h2>
                    @if ($post->pict)
                        <img src="{{ url('user_post/' . $post->pict) }}" alt="Post Image">
                        {{$post->pict}}
                    @endif
                    <p>Location: {{ $post->location }}</p>
                    <p>Posted at: {{ $post->created_at }}</p>
                </div>
            @endforeach --}}
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
                <div class="col-md-6" id="buttonSave">

                </div>
                <div class="col-md-12 text-center">
                    <br/>
                    <button class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
    {{-- @extends('components.friendslayout'); --}}
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
            var timestamp = new Date().toISOString().replace(/[-T:\.Z]/g, "");
            var downloadLink = `<a href="${data_uri}" download="captured_image_${timestamp}.jpg">Save to Gallery</a>`;
            var button = document.createElement('button');
            button.innerHTML = downloadLink;
            document.getElementById("buttonSave").appendChild(button);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }

    // function save_to_gallery() {
    //     var data_uri = $(".image-tag").val();
    //     if (data_uri) {
    //         var timestamp = new Date().toISOString().replace(/[-T:\.Z]/g, "");
    //         var link = document.createElement('a');
    //         link.href = data_uri;
    //         link.download = 'captured_image_' + timestamp + '.jpg';
    //         document.body.appendChild(link);
    //         link.click();
    //         document.body.removeChild(link);
    //     } else {
    //         alert("Please capture an image first.");
    //     }
    // }
</script>
