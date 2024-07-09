@extends('components.template')
@section('title', 'Dashboard')

@section('extra-css')
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/friends.css">
@endsection

@section('dashboard')
    <div class="camera w-100 d-flex flex-column justify-content-center p-3 align-items-center" style="margin-left: 70px;">
        <div class="center-box">
            <div id="my_camera" class="my_camera"></div>
            <input type="button" class="circle-btn" onClick="take_snapshot()""></input>
            <input type="hidden" name="image" class="image-tag">
            <a class="" href="#">
                <span class="material-symbols-outlined image-icon" style="color: #FFFFFF; font-size: 4rem;">
                    image
                </span>
            </a>
            {{-- <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="..." class="d-block w-100" alt="kotak">
                  </div>
                  <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="bulet">
                  </div>
                  <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="segitigas">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div> --}}
        </div>
        <div class="history-text">
            <a href="#">
                <p class="mb-0">History</p>
                <span class="material-symbols-outlined">
                    keyboard_double_arrow_down
                </span>
            </a>
        </div>
        {{-- <div id="results">Your captured image will appear here...</div> --}}
    </div>
@endsection
@section('closeFriend')
<div class="w-100 h-100 kotak" style="border: 2px solid #EFBDEE; padding: 30px; border-radius: 40px;">
    <div class="row">
        <div class="col-auto d-flex flex-column w-100 h-100">
            <div class="friendsList h-50">
                <!-- Your Friends Section -->
                <div class="d-flex flex-column mb-3">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fa-solid fa-user-group me-2"></i>
                        <h5 class="mb-0">Your Friends</h5>
                    </div>
                    <h6>{{ $friends->count() }} friends</h6>
                </div>

                <!-- Search Contact Section -->
                <div class="d-flex justify-content-center align-items-center mb-3 w-100 p-2" style="background-color: #EFBDEE; height: 37px; width: 100%; border-radius: 40px;">
                    <i class="fa-solid fa-magnifying-glass me-2"></i>
                    <h6 class="m-0">Search Contact</h6>
                </div>                

                <!-- Friends List Section -->
                <div class="friendSection mt-3 w-100">
                    <div class="scroll w-100">
                        @if($friends->isEmpty())
                            <p>You have no friends.</p>
                        @else
                            @foreach ($friends as $friend)
                                <div class="d-flex flex-row justify-content-between align-items-center mt-2">
                                    <div class="kiri d-flex flex-row align-items-center gap-3">
                                        <!-- Profile Image -->
                                        <div class="circle">
                                            <img src="{{ asset('user_profile/'.$friend->profile_pics) }}" alt="Profile Image">
                                        </div>
                                        <!-- Friend Name -->
                                        <div class="text ml-20">
                                            <h6>{{ $friend->name }}</h6>
                                        </div>
                                    </div>
                                    <!-- Actions -->
                                    <div class="d-flex align-items-center">
                                        <i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px; margin-left: 5px;"></i>
                                        <form method="POST" action="{{ route('unfollow', ['friendId' => $friend->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border: none; background: none; outline: none">
                                                <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px; margin-left: 5px;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @if($youMightKnow->isNotEmpty())
                <div class="youMightKnow mt-2 h-50">
                    <h6>You Might Know</h6>
                    <div class="friendSection w-100">
                        <div class="scroll w-100">
                            @foreach ($youMightKnow as $friend)
                                <div class="d-flex flex-row justify-content-between align-items-center mt-2">
                                    <div class="kiri d-flex flex-row align-items-center gap-3">
                                        <!-- Profile Image -->
                                        <div class="circle">
                                            <img src="{{ asset('user_profile/'.$friend->profile_pics) }}" alt="Profile Image">
                                        </div>
                                        <!-- Friend Name -->
                                        <div class="text d-flex align-items-center ml-2">
                                            <h6>{{ $friend->name }}</h6>
                                        </div>
                                    </div>
                                    <!-- Actions -->
                                    <div class="d-flex align-items-center">
                                        <div class="kotak-kecil d-flex align-items-center justify-content-center">
                                            <form method="POST" action="{{ route('follow', ['friendId' => $friend->id]) }}">
                                                @csrf
                                                <button type="submit" style="border: none; background: none; outline: none">
                                                    <div class="text1 m-0">ADD</div>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('extra-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script src="https://kit.fontawesome.com/d84972a54e.js" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        Webcam.set({
            width: $('.my_camera').width(),
            height: $('.my_camera').height(),
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
@endsection
