@extends('components.template')
@section('title', 'Dashboard')

@section('extra-css')
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/friends.css">
@endsection

@section('dashboard')
<div class="content-container">
    <div class="content">
        <div class="camera w-100 d-flex flex-column justify-content-center p-1 align-items-center" style="height: 100vh;">
            <div class="center-box" id="kamera">
                <div id="my_camera"></div>
                <div class="control-bar p-3">
                    <span class="material-symbols-outlined image-icon" style="font-size: 3rem;">
                        image
                        <input type="file" id="fileInput" accept="image/*">
                    </span>
                    <input type="button" class="circle-btn" onClick="take_snapshot()"></input>
                </div>
            </div>
            <div class="history-text" id="historyArrow">
                <button onclick="scrollDown()" style="border: none; background: none; outline: none;">
                    <p class="mb-0">History</p>
                    <span class="material-symbols-outlined">
                        keyboard_double_arrow_down
                    </span>
                </button>
            </div>
            <form id="hasil" class="h-100 w-100 flex-column justify-content-center align-items-center" style="display: none;" method="POST" action="{{ route('post_image') }}" enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-row align-items-center justify-content-between py-1 position-relative w-100 mb-4">
                    <div style="flex: 1; text-align: center;">
                        <h5>Sent to...</h5>
                    </div>
                    <button type="button" title="Save Images" style="border: none; background: none; outline: none; position: absolute; right: 18%;" id="downloadCaptured">
                    </button>
                </div>
                <div class="center-box d-flex flex-column align-items-center" id="results" style="border: 2px solid #000000;">
                    <button type="button" style="border: none; background: none; outline: none; position: absolute; left: 10px; top: 10px;" onclick="showCamera()">
                        <i class="fa-solid fa-circle-xmark" style="color: #000000; font-size: 20px;"></i>
                    </button>
                    <div id="carouselExample" class="carousel slide position-absolute w-70" style="bottom: 20px;">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="form-group">
                                    <input type="text" name="caption" class="form-control caption-input" placeholder="Add a message ...">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="form-group d-flex flex-row justify-content-center">
                                    <input type="text" name="location" class="form-control  location-input" id="locationInput" placeholder="Add a location ...">
                                    <button type="button" class="location-button" onclick="getCurrentLocation()" style="border: none; outline: none;">
                                        <span class="material-symbols-outlined">my_location</span>
                                    </button>
                                </div>
                                <div class="d-block w-100">
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
                <input type="file" class="d-none" name="pict" id="pictInput" accept="image/*">
                <div class="d-flex flex-row justify-content-between align-items-center mt-4 w-100" style="max-width: 500px;">
                    <div id="all" class="d-flex flex-column justify-content-center align-items-center w-100">
                        <input type="radio" id="group-radio" name="is_closed_friend" class="radio-btn" value="false" checked>
                        <label for="group-radio" class="circleButton d-flex justify-content-center align-items-center">
                            <span class="material-symbols-outlined">group</span>
                        </label>
                        <h6 class="mt-1">All</h6>
                    </div>
                    <div class="d-flex justify-content-center align-items-center w-100">
                        <button type="submit" title="Create Post" class="send-btn d-flex justify-content-center align-items-center">
                            <span class="material-symbols-outlined" style="font-size: 280%">send</span>
                        </button>
                    </div>
                    <div id="cf" class="d-flex flex-column justify-content-center align-items-center w-100">
                        <input type="radio" id="star-radio" name="is_closed_friend" class="radio-btn" value="true">
                        <label for="star-radio" class="circleButton d-flex justify-content-center align-items-center">
                            <span class="material-symbols-outlined">star</span>
                        </label>
                        <h6 class="mt-1">Close Friends</h6>
                    </div>
                </div>
            </form>
        </div>
        @foreach ($posts as $post)
            <div class="camera w-100 d-flex flex-column justify-content-center p-1 align-items-center" style="height: 100vh;">
                <div class="h-100 w-100 d-flex flex-column justify-content-center align-items-center">
                    {{-- <div class="d-flex flex-row align-items-center justify-content-between py-1 position-relative w-100 mb-4">
                        <div style="flex: 1; text-align: center;">
                            <h5>Sent to...</h5>
                        </div>
                    </div>             --}}
                    <div class="text-center">
                        <h2>{{ $post->sender->name }}</h2>
                    </div>
                    <div class="center-box d-flex flex-column align-items-center"style="border: 2px solid #000000;">
                        <img src="{{ asset('user_post/' . $post->pict) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <p>{{ $post->caption }}</p>
                    <p>Location: {{ $post->location }}</p>
                    <p>Posted at: {{ $post->created_at }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="page-control">
        <button class="scroll-button scroll-up" data-label="Previous Post" onclick="scrollUp()">
            <span class="material-symbols-outlined">
                arrow_upward
            </span>
        </button>
        <button class="scroll-button scroll-down" data-label="Next Post" onclick="scrollDown()">
            <span class="material-symbols-outlined">
                arrow_downward
            </span>
        </button>
    </div>
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
                                        <a href="{{route('user', $friend->id)}}"><i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px; margin-left: 5px;"></i></a>
                                        <form method="POST" action="{{ route('unfollow', ['friendId' => $friend->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border: none; background: none; outline: none; margin-left: 15px;">
                                                <i class="fa-regular fa-trash-can" style="color: #EC354B; font-size: 25px;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
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
            width: 500,
            height: 375,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera', function(err) {
            if (err) {
                showToast('danger', err);
            }
        });
    });

    function hideCamera() {
        Webcam.reset();
        document.getElementById('kamera').style.display = 'none';
        document.getElementById('historyArrow').style.display = 'none';
    }

    function showCamera() {
        document.getElementById('kamera').style.display = 'block';
        document.getElementById('historyArrow').style.display = 'block';
        Webcam.attach('#my_camera');
        document.getElementById('hasil').style.display = 'none';
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
            var imageBlob = dataURItoBlob(data_uri);
            var file = new File([imageBlob], 'webcam.jpg', { type: 'image/jpeg' });
            var fileInput = document.getElementById('pictInput');
            var dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            fileInput.files = dataTransfer.files;
            var now = new Date();
            var timestamp = `${now.getFullYear()}${(now.getMonth() + 1).toString().padStart(2, '0')}${now.getDate().toString().padStart(2, '0')}_${now.getHours().toString().padStart(2, '0')}${now.getMinutes().toString().padStart(2, '0')}${now.getSeconds().toString().padStart(2, '0')}`;
            var downloadLink = `<a href="${data_uri}" download="povit_${timestamp}.jpg" style="color: black;">
                    <span class="material-symbols-outlined" style="font-size: 250%">download</span>
                </a>`;
            document.getElementById('downloadCaptured').innerHTML = downloadLink;
            hideCamera();
            document.getElementById('results').style.backgroundImage = `url(${data_uri})`;
            document.getElementById('hasil').style.display = 'flex';
        });
    }

    document.getElementById('fileInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                hideCamera();
                document.getElementById('downloadCaptured').innerHTML = '';
                document.getElementById('results').style.backgroundImage = `url(${e.target.result})`;
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
            // console.log("Geolocation is not supported by this browser.");
            showToast('danger', "Geolocation is not supported by this browser.");
        }
    }

    function successCallback(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        // console.log("Latitude: " + latitude + ", Longitude: " + longitude);

        var geocodingUrl = `https://geocode.maps.co/reverse?lat=${latitude}&lon=${longitude}&api_key=668e49fc91936080425126fsz367958`;

        fetch(geocodingUrl)
            .then(response => response.json())
            .then(data => {
                if (data.display_name) {
                    var placeName = data.display_name;
                    document.getElementById('locationInput').value = placeName;
                } else {
                    showToast('danger', "No display name found in the results.");
                }
            })
            .catch(error => {
                showToast('danger', "Error fetching geocoding data:");
            });
    }

    function errorCallback(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                showToast('danger', "User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                showToast('danger', "Location information is unavailable.");
                break;
            case error.TIMEOUT:
                showToast('danger', "The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                showToast('danger', "An unknown error occurred.");
                break;
        }
    }

    function showToast(type, message) {
        var toast = $('<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" data-autohide="true"></div>');
        toast.addClass('text-bg-' + type);
        toast.append('<div class="toast-body">' + message + '</div>');
        $('.toast-container').append(toast);
        toast.toast('show');
    }

    $('.toast').on('hidden.bs.toast', function () {
        $(this).remove();
    });
</script>
@endsection
