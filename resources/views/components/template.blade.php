<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            width: 100%
            height: 100vh;
        }
    </style>
    <link rel="stylesheet" href="css/friends.css">
    @yield('extra-css')
</head>

<body>
    @include('components.sidebar')
    <div class="row w-100" style="height: 100vh">
        <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 11;"></div>
        <div class="col-8 d-flex">
            @yield('dashboard')
        </div>
        <div class="col-4 m-0 h-100 p-4">
            <div class="w-100 h-100 kotak" style="border: 2px solid #EFBDEE; padding: 20px; border-radius: 40px;">
                <div class="d-flex flex-column w-100 h-100">
                    <div class="d-flex flex-column mb-2">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fa-solid fa-user-group me-2"></i>
                            <h5 class="mb-0">Your Friends</h5>
                        </div>
                        <h6>{{ $friends->count() }} friends</h6>
                    </div>
            
                    <div class="d-flex align-items-center mb-2 pe-2">
                        <div class="search-container me-2">
                            <input type="text" id="searchInput" class="searchInput empty" placeholder="Search Contact" onkeyup="searchFriends()" onfocus="toggleIcon()" onblur="toggleIcon()">
                            <i class="fa-solid fa-magnifying-glass fa-xs search-icon" id="searchIcon"></i>
                            <div id="searchsList" class="position-absolute" style="display: none; background: white; overflow-y: auto; z-index: 1000; top: 120%; left: 0; min-height: 300px; max-height: 60%; width: 100%; max-width: 350px; border: 1px solid #ddd; border-radius: 5px; padding: 0.5em; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);"></div>
                        </div>      
                    </div>
                    <div class="w-100 h-100 d-flex flex-column" style="overflow-y: auto;">
                        {{-- <div id="searchsList" class="pe-2 position-relative" style="display: none; background: white; overflow-y: auto; z-index: 1000; top: 0; max-height: 60%; width: 25%; max-width: 350px; border: 1px solid #ddd; border-radius: 5px; padding: 0.5em;"></div> --}}
                        <div class="friendsList h-100 pe-2">
                            @if($friends->isEmpty())
                                <div class="text-center w-100 h-100">
                                    <h5>You have no friends</h5>
                                    <p>Share your Povit ID to your friends and get contact in Povit.</p>
                                    <div class="copy-container">
                                        <input type="text" id="link" class="copy-input" value="{{ Auth::user()->link }}" style="display: none;" readonly>
                                        <b>{{ Auth::user()->link }}</b>
                                        <button class="copy-button" onclick="copyLink()">
                                            <span class="material-symbols-outlined">
                                                content_copy
                                            </span>
                                        </button>
                                    </div>
                                    <br>
                                    <div class="copy-container">
                                        <h6>or share via </h6>
                                        <button class="share-button ms-2" onclick="shareToWhatsApp()">
                                            <i class="fa-brands fa-whatsapp fa-xl" style="color: #63E6BE;"></i>
                                        </button>        
                                    </div>                      
                                </div>
                            @else
                                @foreach ($friends as $friend)
                                    <div class="d-flex flex-row justify-content-between align-items-center mt-2">
                                        <div class="kiri d-flex flex-row align-items-center gap-3">
                                            <!-- Profile Image -->
                                            <div class="circle">
                                                @if ($friend->profile_pics != NULL) 
                                                    <img src="{{ asset('user_profile/'.$friend->profile_pics) }}" alt="Profile Image">
                                                @else
                                                    <img src="{{asset('avatar.png')}}" alt="Default Profile">
                                                @endif
                                            </div>
                                            <!-- Friend Name -->
                                            <div class="text ml-20">
                                                <h6>{{ $friend->name }}</h6>
                                            </div>
                                        </div>
                                        <!-- Actions -->
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('user', $friend->id) }}"><i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px; margin-left: 5px;" title="Chat"></i></a>
                                            <form method="POST" action="{{ route('unfollow', ['friendId' => $friend->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="border: none; background: none; outline: none" title="Unfollow {{$friend->name}}">
                                                    <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px; margin-left: 5px;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            
                        </div>
                        @if($youMightKnow->isNotEmpty())
                            <div class="youMightKnow h-100 pe-2">
                                <h6 class=" mt-2">You Might Know</h6>
                                @foreach ($youMightKnow as $friend)
                                    <div class="d-flex flex-row justify-content-between align-items-center mt-2">
                                        <div class="kiri d-flex flex-row align-items-center gap-3">
                                            <!-- Profile Image -->
                                            <div class="circle">
                                                @if ($friend->profile_pics != NULL) 
                                                    <img src="{{ asset('user_profile/'.$friend->profile_pics) }}" alt="Profile Image">
                                                @else
                                                    <img src="{{asset('avatar.png')}}" alt="Default Profile">
                                                @endif
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

    <script>
        $(document).ready(function(){
            @if(session('success'))
                showToast('success', '{{ session('success') }}');
            @endif
            @if(session('error'))
                showToast('danger', '{{ session('error') }}');
            @endif
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

            $('.toast').on('swipeup', function () {
                $(this).toast('hide');
            });

            $('#searchInputsearchInput').on('keyup', function() {
                var input = $(this);
                if(input.val().length === 0) {
                    input.addClass('empty');
                } else {
                    input.removeClass('empty');
                }
            });
        });

        function toggleIcon() {
            const input = document.getElementById('searchInput');
            const icon = document.getElementById('searchIcon');
            
            if (input.value === '' && document.activeElement !== input) {
                icon.style.display = 'block';
                input.style.textAlign = 'center';
            } else {
                icon.style.display = 'none';
                input.style.textAlign = 'left';
            }
        }

        window.onload = toggleIcon;

        const searchsList = document.getElementById('searchsList');

        function searchFriends() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            toggleIcon();

            if (input.length > 2) {
                fetch(`/search-friends?query=${encodeURIComponent(input)}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if(Array.isArray(data)){
                        showFriendResult(data);
                    }else{
                        console.error('Data format invalid', 'error');
                    }
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
                } else {
                    searchsList.style.display = 'none';
                }
        }

        function showFriendResult(friends) {
            searchsList.innerHTML = '';
            if (friends.length > 0) {
                friends.forEach(friend => {
                    const friendDiv = document.createElement('div');
                    friendDiv.classList.add('d-flex', 'flex-row', 'justify-content-between', 'align-items-center', 'mt-2');
                    
                    if(friend.type == 'new'){
                        friendDiv.innerHTML = `
                    <div class="kiri d-flex flex-row align-items-center gap-3">
                        <div class="circle">
                            <img src="${friend.profile_pics ? '/user_profile/' + friend.profile_pics : '/avatar.png'}" alt="Profile Image">
                        </div>
                        <div class="text d-flex align-items-center ml-2">
                            <h6>${friend.name}</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="kotak-kecil d-flex align-items-center justify-content-center">
                            <form method="POST" action="/users/${friend.id}/follow">
                                @csrf
                                <button type="submit" style="border: none; background: none; outline: none">
                                    <div class="text1 m-0">ADD</div>
                                </button>
                            </form>
                        </div>
                    </div>
                `;
                    }else{
                        friendDiv.innerHTML = `
                        <div class="kiri d-flex flex-row align-items-center gap-3">
                                <!-- Profile Image -->
                                <div class="circle">
                                    <img src="${friend.profile_pics ? '/user_profile/' + friend.profile_pics : '/avatar.png'}" alt="Profile Image">
                                </div>
                                <!-- Friend Name -->
                                <div class="text m-0">
                                    <h6>${friend.name}</h6>
                                </div>
                            </div>
                            <!-- Actions -->
                            <div class="d-flex align-items-center">
                                <a href="/chatify/${friend.id}"><i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px; margin-left: 5px;" title="Chat"></i></a>
                                <form method="POST" action="/users/${friend.id}/unfollow">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border: none; background: none; outline: none" title="Unfollow ${friend.name}">
                                        <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px; margin-left: 5px;"></i>
                                    </button>
                                </form>
                            </div>
                        `
                    }
                    searchsList.appendChild(friendDiv);
                });
                searchsList.style.display = 'block';
            } else {
                searchsList.style.display = 'none';
            }
        }

        function copyLink() {
            var copyText = document.getElementById("link");
            navigator.clipboard.writeText(copyText.value)
            .then(() => {
                showToast('success', 'Successfully copied your Povit ID');
            })
            .catch(err => {
                showToast('error', 'Failed to copy your Povit ID');
                console.error('Failed to copy text: ', err);
            });
        }

        function shareToWhatsApp() {
            const userLink = document.getElementById('link').value;
            const message = `
                Hey there!

                Want to connect on Povit? Add me using my ID: ${userLink}.

                Looking forward to it!
            `;
            const encodedMessage = encodeURIComponent(message);
            const whatsappUrl = `https://wa.me/?text=${encodedMessage}`;
            window.open(whatsappUrl, '_blank');
        }
    </script>
    @yield('extra-js')
</body>

</html>
