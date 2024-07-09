@extends('components.template')
@section('title', 'Dashboard')

@section('extra-css')
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/friends.css">
@endsection

@section('dashboard')
    <div class="center-box" id="my camera">
        <a class="circle-btn" href="#"></a>
        <a class="" href="#">
            <span class="material-symbols-outlined image-icon">
                image
            </span>
        </a>

        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
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
          </div>

    </div>
    <div class="history-text">
        <a href="#">
            <p>History</p>
            <span class="material-symbols-outlined">
                keyboard_double_arrow_down
            </span>
        </a>
    </div>
@endsection
@section('closeFriend')
{{-- <div class="container">
        <div class="container" style="margin-top: 5%"> --}}
            <div class="w-100 kotak" style="border: 2px solid #EFBDEE; padding: 50px; width:30%;
            border-radius: 40px;">
                <div class="row">
                    <div class="col-auto">
                        <div class="friendsList h-100">
                                <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa-solid fa-user-group me-2"></i>
                                    <h3 class="mb-0">Your Friends</h3>
                                </div>
                                <h6>{{ $friends->count() }} friends</h6>
                            </div>
                            <div class="d-flex flex-column justify-content-center" style="background-color: #EFBDEE; height: 37px;
                            width: 104%; border-radius: 40px;">
                                <div class="container" style="margin-left: 24%; margin-top: 2.5%;">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fa-solid fa-magnifying-glass me-2"></i>
                                        <h5 class="mb-0">Search Contact</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="friendSection">
                                <div class="scroll">
                                    <!-- Profile Image Section -->
                                    @if($friends->isEmpty())
                                        <p>You have no friends.</p>
                                    @else
                                        @foreach ($friends as $friend)
                                            <div class="d-flex" style="margin-top: 15px;">
                                                <div class="circle">
                                                    <img src="{{ asset($friend->profile_pics) }}" alt="Profile Image">
                                                </div>
                                                <div class="text d-flex align-items-center mt-0" style="margin-top: 13px; margin-left: 5%">
                                                    <h6 class="m-0">{{ $friend->name }}</h6>
                                                </div>
                                                <div class="ms-auto d-flex align-items-center" style="margin-right: 15%">
                                                    <i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px; margin-left: 5px;"></i>
                                                    <form method="POST" action="{{ route('unfollow', ['friendId' => $friend->id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style = "border: none; background: none; outline: none">
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

                        {{-- MULAI MASUK FRIEND REQUEST  --}}

                        @if($youMightKnow->isNotEmpty())
                            <div class="youMightKnow h-100">
                                <div class="text mt-4">
                                    <h6>You Might Know</h6>
                                </div>

                                <div class="friendSection">
                                    <div class="scroll">
                                        <!-- Profile Image Section -->
                                            @foreach ($youMightKnow as $friend)
                                                <div class="d-flex align-items-center" style="margin-top: 15px;">
                                                <div style="width: 80px; height: auto;" class="circle">
                                                    <img src="{{ asset($friend->profile_pics) }}" alt="Profile Image">
                                                </div>
                                                <div class="text d-flex align-items-center" style="margin-left: 25px;">
                                                    <h6>{{ $friend->name }}</h6>
                                                </div>
                                                <div class="ms-auto d-flex align-items-center" style="margin-right: 15%; margin-bottom:4% ">
                                                    <div class="kotak-kecil d-flex align-items-center justify-content-center">
                                                            <form method="POST" action="{{ route('follow', ['friendId' => $suggestedFriend->id]) }}">
                                                                    @csrf
                                                                    <button type="submit">
                                                                        <div class="text1 m-0">
                                                                            ADD
                                                                        </div>
                                                                    </button>
                                                            </form>
                                                        </div>
                                                    <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px; margin-left: 10px;
                                                margin-top : 5%"></i>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        {{-- </div>
    </div> --}}

@endsection

@section('extra-js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d84972a54e.js" crossorigin="anonymous"></script>
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
@endsection
