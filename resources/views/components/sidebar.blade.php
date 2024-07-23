<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn menu-logo" type="button">
            <i class="material-symbols-outlined mr-10">
                menu
            </i>
        </button>
        <div class="sidebar-logo">
            <a href="{{ route('home') }}">POV.it</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item" title="Profile">
            <a href="#" class="sidebar-link flex-column d-flex justify-content-center" style="padding: .425rem 1.025rem;">
                <div class="d-flex flex-row align-items-center">
                    @if (auth()->user()->profile_pics != NULL)
                        <img src="{{asset('user_profile/'.auth()->user()->profile_pics)}}" class="user-img" id="image_preview">
                    @else
                        <img src="{{asset('avatar.png')}}" alt="Default Profile" class="user-img" id="image_preview">
                    @endif
                    <h5 class="ms-2">Profile</h5>
                </div>
                <div class="profileDetail w-100 mt-1e">
                    <div class="mt-1 ">
                        <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data" id="profileForm" >
                            @csrf
                            <input type="file" name="profile_pics" id="profile_pics" class="form-control d-none">
                            <button type="button" class="btn btn-light btn-sm edit-profile-pic">Edit Picture</button>
                            <button type="submit" class="d-none" id="hiddenSubmitButton"></button>
                        </form>
                    </div>
                    <span class="form-label" style="font-size: 0.7rem;">POVIT ID</span>
                    <br>
                    <div class="d-flex">
                        <b>{{ Auth::user()->link }}</b>
                        <input type="text" id="links" class="d-none" value="{{ Auth::user()->link }}" readonly>
                        <button class="copy-button" onclick="copyLinks()">
                            <span class="material-symbols-outlined">
                                content_copy
                            </span>
                        </button>
                    </div>
                    <div>
                        <span class="form-label" style="font-size: 0.7rem;">Username</span>
                        <form action="{{ route('update.username') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex">
                                <input type="text" class="form-control" id="username_input" name="username" value="{{auth()->user()->name}}" style="max-height: 2rem;" disabled>
                                <button type="button" class="btn" id="edit-username-btn">
                                    <i class="material-symbols-outlined" style="font-size: 1.2rem;">edit</i>
                                </button>
                                <button type="submit" class="btn d-none" id="submitChangeUsr">
                                    <i class="material-symbols-outlined" style="font-size: 1.2rem;">send</i>
                                </button>
                            </div>

                        </form>
                    </div>
                    <div>
                        <span class="form-label" style="font-size: 0.7rem;">Profile Description</span>
                        <form action="{{ route('update.profile.desc') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex ">
                                <textarea type="text" class="form-control" id="desc_input" name="profile_desc" style="max-height: 5rem; font-size: 0.8rem;" disabled>{{ auth()->user()->profile_desc }}</textarea>
                                <button type="button" class="btn" id="edit-desc-btn">
                                    <i class="material-symbols-outlined" style="font-size: 1.2rem;">edit</i>
                                </button>
                                <button type="submit" class="btn d-none" id="submitChangeDesc">
                                    <i class="material-symbols-outlined" style="font-size: 1.2rem;">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <li class="sidebar-item" title="Home">
            <a href="{{ route('home') }}" class="sidebar-link d-flex align-items-center">
                <i class="material-symbols-outlined">
                    home
                </i>
                <h6>Home</h6>
            </a>
        </li>
        <?php
        $user = Auth::user();
        ?>
        <li class="sidebar-item" title="Chat">
            <a href="{{ route('user', $user->id) }}" class="sidebar-link d-flex align-items-center">
                <i class="material-symbols-outlined">
                    chat
                </i>
                <h6>Chat</h6>
            </a>
        </li>

        <li class="sidebar-item" title="Close Friend">
            <a href="" class="sidebar-link d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              <i class="material-symbols-outlined">
                star
              </i>
              <h6>Close Friend</h6>
            </a>
        </li>

        <li class="sidebar-item" title="History">
            <a href="{{ route('gallery') }}" class="sidebar-link d-flex align-items-center">
                <i class="material-symbols-outlined">
                    photo_library
                </i>
                <h6>History</h6>
            </a>
        </li>
        <li class="sidebar-item"  title="Logout">
            <a href="{{ route('logout') }}" class="sidebar-link d-flex align-items-center">
                <i class="material-symbols-outlined">
                    logout
                </i>
                <h6>Logout</h6>
            </a>
        </li>
    </div>
</aside>
<!-- Overlay -->
<div id="overlay" class="overlay" style="display: none;"></div>
@include('main.closefriend')
<script>
    function copyLinks() {
        var copyText = document.getElementById("links");
        navigator.clipboard.writeText(copyText.value)
        .then(() => {
            showToast('success', 'Successfully copied your Povit ID');
        })
        .catch(err => {
            showToast('error', 'Failed to copy your Povit ID');
            console.error('Failed to copy text: ', err);
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        var editButton = document.getElementById('edit-username-btn');
        var submitButton = document.getElementById('submitChangeUsr');
        var usernameInput = document.getElementById('username_input');

        editButton.addEventListener('click', function() {
            usernameInput.disabled = false; // Enable input field for editing
            editButton.classList.add('d-none'); // Hide edit button
            submitButton.classList.remove('d-none'); // Show submit button
        });

        // Optional: Handle the submit button click
        submitButton.addEventListener('click', function() {
            // Perform the submit action here
            alert('Submit clicked!');
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var editButton = document.getElementById('edit-desc-btn');
        var submitButton = document.getElementById('submitChangeDesc');
        var usernameInput = document.getElementById('desc_input');

        editButton.addEventListener('click', function() {
            usernameInput.disabled = false; // Enable input field for editing
            editButton.classList.add('d-none'); // Hide edit button
            submitButton.classList.remove('d-none'); // Show submit button
        });

        // Optional: Handle the submit button click
        submitButton.addEventListener('click', function() {
            // Perform the submit action here
            alert('Submit clicked!');
        });
    });
</script>


<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="{{ asset('js/profileUpdate.js') }}"></script>
