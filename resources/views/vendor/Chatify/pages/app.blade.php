@include('components.sidebar')
<div style="margin-left: 80px;">
    @include('Chatify::layouts.headLinks')
    <div class="messenger">
        {{-- ----------------------Messaging side---------------------- --}}
        <div class="messenger-messagingView">
            {{-- header title [conversation name] amd buttons --}}
            <div class="m-header m-header-messaging" style="background-color: #d9d9d9;">
                <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    {{-- header back button, avatar and user name --}}
                    <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center" >
                        <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                        <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                        </div>
                        <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                    </div>
                </nav>
                {{-- Internet connection --}}
                <div class="internet-connection">
                    <span class="ic-connected">Connected</span>
                    <span class="ic-connecting">Connecting...</span>
                    <span class="ic-noInternet">No internet access</span>
                </div>
            </div>

            {{-- Messaging area --}}
            <div class="m-body messages-container app-scroll" >
                <div class="messages">
                    <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
                </div>
                {{-- Typing indicator --}}
                <div class="typing-indicator">
                    <div class="message-card typing">
                        <div class="message">
                            <span class="typing-dots">
                                <span class="dot dot-1"></span>
                                <span class="dot dot-2"></span>
                                <span class="dot dot-3"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Send Message Form --}}
            @include('Chatify::layouts.sendForm')
        </div>

        {{-- ---------------------- Info side ---------------------- --}}
        <div class="messenger-infoView " style="background-color: #F3E8F3;">
            {{-- nav actions --}}

            @php
                $currentUrl = request()->url();
                $parsedUrl = parse_url($currentUrl, PHP_URL_PATH);
                $segments = explode('/', $parsedUrl);
                $hashedId = end($segments);
            @endphp
            <?php
            use App\Models\User;
            $friend = User::where('id', $hashedId)->first();
            ?>
            {{-- user description --}}
            <div class="profile" style="margin-top: 15%;" >
                <div class="container">
                    <div class="circle_img">
                        @if ($friend)
                            @if ($friend->profile_pics != NULL)
                                <img src="{{ asset('user_profile/'.$friend->profile_pics) }}" alt="Profile Image">
                            @else
                                <img src="{{asset('avatar.png')}}" alt="Default Profile">
                            @endif
                        @else
                            <img src="{{asset('avatar.png')}}" alt="Default Profile">
                        @endif
                    </div>
                </div>
                @if ($friend)
                    <div class="d-flex user-name mt-3 text-center justify-content-center" style="font-size: 25px; color: #4f4b4b;">{{ $friend->name }}</div>
                @else
                    {{ config('chatify.name') }}
                @endif
            </div>
            <div class="line" style="stroke: #D9D9D9; height: 15px; stroke-width: 3; margin-top: 2%;"></div>
            <div class="about-me" style="position: relative; left: 4%; top: 0; text-align: justify;">
                <p style="font-size: 15px; margin-bottom: 2%; width: 100%; font-weight: 700;">About Me</p>
                <div id="aboutMeContent" class="about-me-content">
                    <p style="font-size: 14px; margin: 0; width: 90%; font-weight: 500; margin-bottom: 12%;" id="aboutMeText">
                        @if ($friend)
                            {{ $friend->profile_desc}}
                        @else
                            Hi there! I'm on POV.it, ready to share my stories with you!  Join me on a journey of discovery
                            as I explore everything from everyday adventures to unexpected thrills.  My stories are relatable, inspiring, and full of laughter.
                        @endif
                    </p>
                </div>
                <a href="javascript:void(0);" onclick="toggleReadMore()" id="readMoreLink">Read More</a>
            </div>

            <div class="friends-chat" style="position: relative; left: 4%; top: 0; text-align: left;">
                <p style="font-size: 15px; width: 100%; font-weight: 700; margin-bottom: -2%">Friends</p>

                @foreach (Auth::user()->friends as $friend)
                    <div class="row mt-4">
                        <div class="col d-flex align-items-center">
                            <div class="circle">
                                {{-- Friend Image Profile --}}
                                @if ($friend->profile_pics != NULL)
                                    <img src="{{ asset('user_profile/'.$friend->profile_pics) }}" alt="Profile Image">
                                @else
                                    <img src="{{asset('avatar.png')}}" alt="Default Profile">
                                @endif
                            </div>
                            <div class="text d-flex align-items-center mt-0" style="margin-left: 5%;">
                                {{-- Friend Name --}}
                                <h6 class="m-0">{{ $friend->name }}</h6>
                            </div>
                            <div class="ms-auto d-flex align-items-center flex-grow-1 justify-content-end" style="margin-right: 8%">
                                {{-- Friend Button Chat --}}
                                <a href="{{ route('user', $friend->id) }}"><i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px; margin-left: 5px;" title="Chat"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            {!! view('Chatify::layouts.info')->with('id', $id)->render() !!}

        </div>
    </div>
</div>


<script>
    function toggleReadMore() {
        var aboutMeContent = document.getElementById('aboutMeContent');
        var readMoreLink = document.getElementById('readMoreLink');

        if (aboutMeContent.classList.contains('expanded')) {
            aboutMeContent.classList.remove('expanded');
            readMoreLink.textContent = 'Read More';
        } else {
            aboutMeContent.classList.add('expanded');
            readMoreLink.textContent = 'Read Less';
        }
    }
</script>

@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
