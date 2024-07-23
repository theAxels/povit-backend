<link rel="stylesheet" href="{{ asset('css/closefriend.css') }}">
<!-- Modal -->
<div class="modal fade custom-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content " style="border-radius: 30px; position: absolute; z-index:100;">
            <div class="modal-header">
                <span class="material-symbols-outlined">star</span>
                <h1 class="modal-title fs-5" id="staticBackdropLabel" style="margin-left: 10px">Close Friends</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="closeFriend" id="close-friend-section">
                    <div class="row mt-2">
                        <div class="col-6 d-flex align-items-center">
                            <h6 id="close-friends-count">Loading..</h6>
                        </div>
                        <div class="col-6 d-flex justify-content-end align-items-center">
                            <button class="clear-button" style="color: #0D99FF; background: none; border: none;">Clear All</button>
                        </div>
                    </div>

                    <div class="friendSection">
                        <div class="scroll" id="close-friends-list">
                            <!-- Profile Image Section -->
                        </div>
                    </div>
                </div>

                <div class="suggested">
                    <div class="row mt-2">
                        <h6>Suggested</h6>
                    </div>

                    <div class="friendSection">
                        <div class="scroll" id="suggested-friends-list">
                            <!-- Profile Image Section -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        var userId = '{{ Auth::user()->id }}';  // Assuming you have access to the authenticated user's ID

        $.ajaxSetup({
            headers: {
                '_token': '{{ csrf_token() }}'
            }
        });

        $.ajax({
            url: '{{ route("closeFriends") }}',
            method: 'GET',
            success: function (data) {
                // Filter out the user from the suggested friends list
                data.suggestedFriends = data.suggestedFriends.filter(friend => friend.id !== userId);

                updateCloseFriendsList(data.closeFriends);
                updateSuggestedFriendsList(data.suggestedFriends);

                // Add event listeners to the radio buttons for suggested friends
                $(document).on('click', '.suggested-friend-radio', function () {
                    var friendId = $(this).data('id');
                    var friend = data.suggestedFriends.find(f => f.id === friendId);

                    if (friend) {
                        // Remove friend from suggested friends
                        data.suggestedFriends = data.suggestedFriends.filter(f => f.id !== friendId);
                        // Add friend to close friends
                        data.closeFriends.push(friend);

                        // Update the DOM
                        updateCloseFriendsList(data.closeFriends);
                        updateSuggestedFriendsList(data.suggestedFriends);

                        // Send an AJAX request to update the backend
                        $.ajax({
                            url: '{{ route("addCloseFriend") }}',
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: friendId,
                                added: true
                            },
                            success: function (response) {
                                showToast('success', 'Friend removed from close friends successfully');
                            },
                            error: function (error) {
                                showToast('error', 'Error removing friend');
                            }
                        });
                    }
                });

                // Add event listeners to the radio buttons for close friends
                $(document).on('click', '.close-friend-radio', function () {
                    var friendId = $(this).data('id');
                    var friend = data.closeFriends.find(f => f.id === friendId);

                    if (friend) {
                        // Remove friend from close friends
                        data.closeFriends = data.closeFriends.filter(f => f.id !== friendId);
                        // Add friend to suggested friends
                        data.suggestedFriends.push(friend);

                        // Update the DOM
                        updateCloseFriendsList(data.closeFriends);
                        updateSuggestedFriendsList(data.suggestedFriends);

                        // Send an AJAX request to update the backend
                        $.ajax({
                            url: '{{ route("removeCloseFriend") }}',
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: friendId,
                                added: false
                            },
                            success: function (response) {
                                showToast('success', 'Friend removed from close friends successfully');
                            },
                            error: function (error) {
                                showToast('error', 'Error removing friend');
                            }
                        });
                    }
                });
            }
        });
    });

    function updateCloseFriendsList(closeFriends) {
        $('#close-friends-count').text(closeFriends.length + ' People');
        var closeFriendsList = '';
        closeFriends.forEach(function (friend) {
            closeFriendsList += '<div class="row mt-4">';
            closeFriendsList += '    <div class="col d-flex align-items-center">';
            closeFriendsList += '        <div class="circle">';
            if (friend.profile_pics) {
                closeFriendsList += '            <img src="{{ asset('user_profile/') }}/' + friend.profile_pics + '" alt="Profile Image">';
            } else {
                closeFriendsList += '            <img src="{{ asset('avatar.png') }}" alt="Default Profile">';
            }
            closeFriendsList += '        </div>';
            closeFriendsList += '        <div class="text d-flex align-items-center mt-0" style="margin-left: 5%;">';
            closeFriendsList += '            <h6 class="m-0">' + friend.name + '</h6>';
            closeFriendsList += '        </div>';
            closeFriendsList += '        <div class="ms-auto d-flex align-items-center flex-grow-1 justify-content-end">';
            closeFriendsList += '            <div class="form-check form-check-inline ms-auto">';
            closeFriendsList += '                <input type="radio" class="form-check-input close-friend-radio" data-id="' + friend.id + '" checked>';
            closeFriendsList += '                <label for="option1"></label>';
            closeFriendsList += '            </div>';
            closeFriendsList += '        </div>';
            closeFriendsList += '    </div>';
            closeFriendsList += '</div>';
        });
        $('#close-friends-list').html(closeFriendsList);
    }

function updateSuggestedFriendsList(suggestedFriends) {
    var suggestedFriendsList = '';
        if (suggestedFriends.length > 0) {
        suggestedFriends.forEach(function (friend) {
            suggestedFriendsList += '<div class="row mt-4">';
            suggestedFriendsList += '    <div class="col d-flex align-items-center">';
            suggestedFriendsList += '        <div class="circle">';
            if (friend.profile_pics) {
            suggestedFriendsList += '            <img src="{{ asset('user_profile/') }}/' + friend.profile_pics + '" alt="Profile Image">';
            } else {
            suggestedFriendsList += '            <img src="{{ asset('avatar.png') }}" alt="Default Profile">';
        }
        suggestedFriendsList += '        </div>';
            suggestedFriendsList += '        <div class="text d-flex align-items-center mt-0" style="margin-left: 5%;">';
            suggestedFriendsList += '            <h6 class="m-0">' + friend.name + '</h6>';
            suggestedFriendsList += '        </div>';
            suggestedFriendsList += '        <div class="ms-auto d-flex align-items-center flex-grow-1 justify-content-end">';
            suggestedFriendsList += '            <div class="form-check form-check-inline ms-auto">';
            suggestedFriendsList += '                <input type="radio" class="form-check-input suggested-friend-radio" data-id="' + friend.id + '">';
            suggestedFriendsList += '                <label for="option6"></label>';
            suggestedFriendsList += '            </div>';
            suggestedFriendsList += '        </div>';
            suggestedFriendsList += '    </div>';
            suggestedFriendsList += '</div>';
        });
        } else {
            suggestedFriendsList = '<div class="row mt-4">';
            suggestedFriendsList += '    <div class="col d-flex align-items-center">';
            suggestedFriendsList += '        <p>No friends available</p>';
            suggestedFriendsList += '    </div>';
            suggestedFriendsList += '</div>';
        }
    $('#suggested-friends-list').html(suggestedFriendsList);
}

    document.addEventListener('DOMContentLoaded', function() {
        // Get the close friends count element
        const closeFriendsCount = document.getElementById('close-friends-count');
        console.log(closeFriendsCount);
        // Get the close friend section container
        const closeFriendSection = document.getElementById('close-friend-section');

        // Check if close friends count is "0 People"
        if (closeFriendsCount.textContent.trim() === '0 People') {
            closeFriendSection.style.display = 'none'; // Hide the close friend section
        } else {
            closeFriendSection.style.display = 'block'; // Show the close friend section
        }

    });
</script>

