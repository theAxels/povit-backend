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
                <button onclick="scrollDown(this)" style="border: none; background: none; outline: none;">
                    <p class="mb-0">History</p>
                    <span class="material-symbols-outlined">
                        keyboard_double_arrow_down
                    </span>
                </button>
            </div>
            <form id="hasil" class="h-100 w-100 flex-column justify-content-center align-items-center" style="display: none;" method="POST" action="{{ route('post_image') }}" enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-row align-items-center justify-content-between py-1 position-relative w-100 mb-2" style="max-width: 500px;">
                    <div class="d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <button type="button" class="btn btn-transparent border-0" id="tagFriendsButton" title="Tag Friends">
                            <span class="material-symbols-outlined" style="font-size: 200%;">person_pin</span>
                        </button>
                    </div>
                    <div style="flex: 1; text-align: center; margin-left: 1em;">
                        <h5>Sent to...</h5>
                    </div>
                    <div class="d-flex align-items-center" style="width: 50px; height: 50px;">
                        <button type="button" title="Save Images" style="border: none; background: none; outline: none; position: absolute; right: 0;" id="downloadCaptured"></button>
                    </div>
                </div>
                <div class="center-box d-flex flex-column align-items-center" id="results" style="border: 2px solid #000000;">
                    <button type="button" style="border: none; background: none; outline: none; position: absolute; left: 10px; top: 10px;" onclick="showCamera()">
                        <i class="fa-solid fa-circle-xmark" style="color: #000000; font-size: 20px;"></i>
                    </button>
                    <div class="w-70 form-group position-absolute mb-2" id="searchContainer" style="display: none; top: 10px;">
                        <div class="input-group">
                            <input type="search" id="friendSearch" class="form-control" placeholder="Search to tag"  aria-label="Search">
                        </div>
                        <div id="searchResults" class="dropdown-search-results" style="display: none;"></div>
                    </div>
                    <div id="carouselExample" class="carousel slide position-absolute w-70" style="bottom: 20px;">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="form-group">
                                    <input type="text" name="caption" id="caption" class="form-control caption-input" placeholder="Add a message ...">
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="form-group d-flex flex-row justify-content-center">
                                    <input type="text" name="location" class="form-control  location-input" id="locationInput" placeholder="Add a location ...">
                                    <button type="button" class="location-button" onclick="getCurrentLocation()" style="border: none; outline: none;">
                                        <span class="material-symbols-outlined">my_location</span>
                                    </button>
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
                <div id="selectedFriends" class="align-items-center flex-wrap mt-3 justify-content-start gap-1" style="display: none; max-width: 500px;">
                    <h6>Tagged friends : </h6>
                </div>
                <div class="d-flex flex-row justify-content-between align-items-center mt-4 w-100" style="max-width: 500px;">
                    <div id="all" class="d-flex flex-column justify-content-center align-items-center w-100">
                        <input type="radio" id="group-radio" name="is_closed_friend" class="radio-btn" value="0" checked>
                        <label for="group-radio" class="circleButton d-flex justify-content-center align-items-center">
                            <span class="material-symbols-outlined">group</span>
                        </label>
                        <h6 class="mt-1">All</h6>
                    </div>
                    <div class="d-flex justify-content-center align-items-center w-100">
                        <button type="button" title="Create Post" id="submitButton" class="send-btn d-flex justify-content-center align-items-center">
                            <span class="material-symbols-outlined" style="font-size: 280%">send</span>
                        </button>
                    </div>
                    <div id="cf" class="d-flex flex-column justify-content-center align-items-center w-100">
                        <input type="radio" id="star-radio" name="is_closed_friend" class="radio-btn" value="1">
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
                    <div class="d-flex flex-row justify-content-center align-items-end mb-4">
                        @if ($post->is_closed_friend == 1)
                            <div class="bg-success text-center p-1 rounded-circle d-flex justify-content-center align-items-center me-2" style="width: 25px; height: 25px;" title="Close Friend">
                                <span class="material-symbols-outlined" style="font-size: 12px; color: white;">star</span>
                            </div>                        
                        @endif
                        <h4 class="d-inline-block mb-0">{{ $post->sender->name }}</h4>
                        <span class="d-block ms-2" style="font-size: 0.7rem">{{ $post->time }}</span>
                    </div>                           
                    <div class="center-box d-flex flex-column align-items-center"style="border: 2px solid #000000;">
                        <img src="{{ asset('user_post/' . $post->pict) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                        <div class="caption position-absolute d-flex justify-content-center align-items-center">
                            <p class="m-0">{{ $post->caption }}</p>
                        </div>   
                    </div>
                    @if ($post->postTags->count() > 0)
                        <div class="d-flex flex-row align-items-center justify-content-start w-100 mt-2 gap-1" style="max-width: 500px;">
                            <h6 style="font-size: 0.9rem;">Tagged Friends : </h6>
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
                    <div class="d-flex flex-row justify-content-center align-items-center mt-2 w-100" style="max-width: 500px;">
                        <button type="button" class="circle-btn-small" onClick="scrollToCamera()"></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="page-control">
        <button class="scroll-button scroll-up" data-label="Previous Post" onclick="scrollUp(this)">
            <span class="material-symbols-outlined">
                arrow_upward
            </span>
        </button>
        <button class="scroll-button scroll-down" data-label="Next Post" onclick="scrollDown(this)">
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

        $('#clearSearchInput').click(function() {
            $('#friendSearch').val('');
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

    const content = document.querySelector('.content');
    const pageControllerPanel = document.querySelector('.page-control');
    const scrollUpButton = document.querySelector('.scroll-up');
    const scrollDownButton = document.querySelector('.scroll-down');

    content.addEventListener('scroll', function() {
        if (content.scrollTop > 0) {
            pageControllerPanel.style.display = 'flex';
            hideCamera();
        } else {
            pageControllerPanel.style.display = 'none';
            showCamera();
        }

        if(content.scrollTop + content.clientHeight >= content.scrollHeight){
            scrollDownButton.style.display = 'none';
        }else{
            scrollDownButton.style.display = 'block';
        }
    });

    function scrollToCamera() {
        content.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }


    function scrollUp(button) {
        disableButton(button);
        content.scrollBy({
            top: -window.innerHeight,
            behavior: 'smooth'
        });
        setTimeout(() => enableButton(button), 1000);
    }

    function scrollDown(button) {
        disableButton(button);
        content.scrollBy({
            top: window.innerHeight,
            behavior: 'smooth'
        });
        setTimeout(() => enableButton(button), 1000);
    }

    function disableButton(button) {
        button.disabled = true;
    }

    function enableButton(button) {
        button.disabled = false;
    }

    document.addEventListener('DOMContentLoaded', function () {
        const submitButton = document.getElementById('submitButton');
        const form = document.getElementById('hasil');

        submitButton.addEventListener('click', function() {
            form.querySelectorAll('input[name="tags[]"]').forEach(input => input.remove());

            selectedFriendsList.forEach(friendId => {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'tags[]';
                hiddenInput.value = friendId;
                form.appendChild(hiddenInput);
            });

            form.submit();
        });
        var captionInput = document.getElementById('caption');
        var maxLength = 23;

        captionInput.addEventListener('input', function (event) {
            if (captionInput.value.length >= maxLength) {
                captionInput.value = captionInput.value.slice(0, maxLength);
                event.preventDefault();
            }
        });

        captionInput.addEventListener('keypress', function (event) {
            if (captionInput.value.length >= maxLength) {
                event.preventDefault();
            }
        });

        const friendSearch = document.getElementById('friendSearch');
        const searchResults = document.getElementById('searchResults');
        const selectedFriends = document.getElementById('selectedFriends');
        const tagFriendsButton = document.getElementById('tagFriendsButton');

        tagFriendsButton.addEventListener('click', function() {
            searchContainer.style.display = searchContainer.style.display === 'none' ? 'block' : 'none';
        });

        let selectedFriendsList = [];

        friendSearch.addEventListener('input', function() {
            const query = friendSearch.value;
            if (query.length > 2) {
                fetch(`/search-users?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        if (Array.isArray(data)) {
                            showSearchResults(data);
                        } else {
                            console.error('Unexpected data format:', data);
                        }
                    })
                    .catch(error => console.error('Error fetching friends:', error));
            } else {
                searchResults.style.display = 'none';
            }
        });

        function showSearchResults(friends) {
            searchResults.innerHTML = '';
            if (friends.length > 0) {
                friends.forEach(friend => {
                    const friendElement = document.createElement('div');
                    friendElement.textContent = friend.name;
                    friendElement.dataset.id = friend.id;
                    friendElement.addEventListener('click', function() {
                        addSelectedFriend(friend.id, friend.name);
                        searchResults.style.display = 'none';
                    });
                    searchResults.appendChild(friendElement);
                });
                searchResults.style.display = 'block';
            } else {
                searchResults.style.display = 'none';
            }
        }

        function addSelectedFriend(friendId, friendName) {
            if (!selectedFriendsList.includes(friendId)) {
                selectedFriendsList.push(friendId);

                const friendElement = document.createElement('div');
                friendElement.classList.add('selected-user');
                friendElement.textContent = friendName;
                friendElement.dataset.id = friendId;

                const removeButton = document.createElement('span');
                removeButton.classList.add('remove-user');
                removeButton.innerHTML = '&times;';
                removeButton.addEventListener('click', function() {
                    removeSelectedFriend(friendId);
                });

                friendElement.appendChild(removeButton);
                selectedFriends.appendChild(friendElement);

                if (selectedFriendsList.length === 1) {
                    document.getElementById('selectedFriends').style.display = 'flex';
                }
            }
        }

        function removeSelectedFriend(friendId) {
            selectedFriendsList = selectedFriendsList.filter(id => id !== friendId);
            const friendElement = selectedFriends.querySelector(`[data-id='${friendId}']`);
            if (friendElement) {
                selectedFriends.removeChild(friendElement);

                if (selectedFriendsList.length === 0) {
                    document.getElementById('selectedFriends').style.display = 'none';
                }
            }
        }
    });

</script>
@endsection
