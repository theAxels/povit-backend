@extends('components.template')
@section('title', 'Dashboard')

@section('extra-css')
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/friends.css">
@endsection

@section('dashboard')
    <div class="camera w-100 d-flex flex-column justify-content-center p-3 align-items-center" style="margin-left: 70px;">
        <div class="center-box" id="kamera">
            <div id="my_camera" class="my_camera"></div>
            <input type="button" class="circle-btn" onClick="take_snapshot()""></input>
            <span class="material-symbols-outlined image-icon" style="color: #FFFFFF; font-size: 4rem;">
                image
                <input type="file" id="fileInput" accept="image/*">
            </span>
        </div>
        <div class="history-text" id="historyArrow">
            <a href="#">
                <p class="mb-0">History</p>
                <span class="material-symbols-outlined">
                    keyboard_double_arrow_down
                </span>
            </a>
        </div>
        <form id="hasil" class="h-100 w-100 flex-column justify-content-center align-items-center" style="display: none;" method="POST" action="{{ route('post_image') }}" enctype="multipart/form-data">
            @csrf
            <div class="text-center py-1">
                <h6>Sent to</h6>
            </div>
            <div class="center-box d-flex flex-column justify-content-center align-items-center" id="results" style="border: 2px solid #000000;">
                <img class="my_camera" id="previewGambar">              
            </div>
            <input type="file" class="d-none" name="pict" id="pictInput" accept="image/*">
            <div class="d-flex flex-row justify-content-center align-items-center w-100 mt-2">
                <div id="carouselExampleControlsNoTouching" class="carousel slide justify-content-center" data-bs-touch="false" style="bottom: 24%; z-index: 11; padding: 0; margin: 0;">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <input type="text" name="caption" class="form-control" placeholder="Add a message ...">
                        </div>
                        <div class="carousel-item">
                            <div class="input-group">
                                <input type="text" name="location" class="form-control" id="locationInput" placeholder="Add a location ...">
                                <button type="button" class="btn btn-primary" onclick="getCurrentLocation()">Get Current Location</button>
                            </div>
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
            <div class="d-flex flex-row justify-content-between align-items-center mt-2 w-100 p-4">
                <input type="radio" id="group-radio" name="is_closed_friend" class="radio-btn" value="false" checked>
                <label for="group-radio" class="circleButton d-flex justify-content-center align-items-center">
                    <span class="material-symbols-outlined">group</span>
                </label>
                <div class="d-flex flex-column align-items-center">
                    <button type="submit" class="send-btn d-flex justify-content-center align-items-center">
                        <span class="material-symbols-outlined" style="font-size: 280%">send</span>
                    </button>
                </div>
                <input type="radio" id="star-radio" name="is_closed_friend" class="radio-btn" value="true">
                <label for="star-radio" class="circleButton d-flex justify-content-center align-items-center">
                    <span class="material-symbols-outlined">star</span>
                </label>
            </div>
        </form>
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

    function hideCamera() {
        Webcam.reset();
        document.getElementById('kamera').style.display = 'none';
        document.getElementById('historyArrow').style.display = 'none';
    }

    function dataURItoBlob(dataURI) {
        var byteString = atob(dataURI.split(',')[1]);
        var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]
        var ab = new ArrayBuffer(byteString.length);
        var ia = new Uint8Array(ab);
        for (var i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }
        return new Blob([ab], {type: mimeString});
    }

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            var imageBlob = dataURItoBlob(data_uri);
            var file = new File([imageBlob], 'webcam.jpg', { type: 'image/jpeg' });
            var fileInput = document.getElementById('pictInput');
            var dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            fileInput.files = dataTransfer.files;
            hideCamera();
            document.getElementById('previewGambar').src = data_uri;
            document.getElementById('hasil').style.display = 'flex';
        });
    }

    document.getElementById('fileInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                hideCamera();
                document.getElementById('previewGambar').src = e.target.result;
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                const fileInput = document.getElementById('pictInput');
                fileInput.files = dataTransfer.files;
                document.getElementById('hasil').style.display = 'flex';
            }
            reader.readAsDataURL(file);
        }
    });

    function getCurrentLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        } else {
            console.log("Geolocation is not supported by this browser.");
        }
    }

    function successCallback(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        console.log("Latitude: " + latitude + ", Longitude: " + longitude);
        
        var geocodingUrl = `https://geocode.maps.co/reverse?lat=${latitude}&lon=${longitude}&api_key=668e49fc91936080425126fsz367958`;

        fetch(geocodingUrl)
            .then(response => response.json())
            .then(data => {
                if (data.display_name) {
                    var placeName = data.display_name;
                    console.log("Place Name: " + placeName);
                    
                    document.getElementById('locationInput').value = placeName;
                } else {
                    console.log("No display name found in the results.");
                }
            })
            .catch(error => {
                console.error("Error fetching geocoding data:", error);
            });
    }

    function errorCallback(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                console.log("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                console.log("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                console.log("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                console.log("An unknown error occurred.");
                break;
        }
    }
</script>
@endsection
