<link rel="stylesheet" href="{{ asset('css/closefriend.css') }}">
<!-- Modal -->
<div class="modal fade custom-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 30px; position: absolute; z-index: 100;">
            <div class="modal-header">
                <span class="material-symbols-outlined">star</span>
                <h1 class="modal-title fs-5" id="staticBackdropLabel" style="margin-left: 10px">Close Friends</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 w-100 h-100 d-flex flex-column">
                <!-- Loading Container -->
                <div id="loading-container" class="d-none">
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                </div>
                <!-- Content Container -->
                <div id="content-container" class="w-100 h-100 d-none">
                    <div class="closeFriend flex-grow-1" id="close-friend-section">
                        <div class="row mt-2">
                            <div class="col-6 d-flex align-items-center">
                                <h6 id="close-friends-count">Loading..</h6>
                            </div>
                            <div class="col-6 d-flex justify-content-end align-items-center">
                                <button class="clear-button" style="color: #0D99FF; background: none; border: none;" name="clear-button">Clear All</button>
                            </div>
                        </div>
                        <div class="friendSection w-100 h-100">
                            <div id="close-friends-list" class="w-100 h-100 list">
                                <!-- Profile Image Section -->
                            </div>
                        </div>
                    </div>
                    <div class="suggested flex-grow-1">
                        <div class="row mt-2">
                            <h6>Suggested</h6>
                        </div>
                        <div class="friendSection w-100 h-100">
                            <div id="suggested-friends-list" class="w-100 h-100 list">
                                <!-- Profile Image Section -->
                            </div>
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
        function fetchFriends() {
            // Show loading indicator and hide content container
            $('#loading-container').removeClass('d-none');
            $('#content-container').addClass('d-none');

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
                    // Hide loading indicator and show content container
                    $('#loading-container').addClass('d-none');
                    $('#content-container').removeClass('d-none');

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
                                    showToast('success', 'Friend added to close friends successfully');
                                },
                                error: function (error) {
                                    showToast('error', 'Error adding friend');
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

                    // If the clear button is clicked, remove all close friends and update the suggested friends list
                    $(document).on('click', '.clear-button', function () {
                        // Move all close friends to suggested friends
                        data.suggestedFriends = data.suggestedFriends.concat(data.closeFriends);
                        data.closeFriends = [];

                        // Update the DOM
                        updateCloseFriendsList(data.closeFriends);
                        updateSuggestedFriendsList(data.suggestedFriends);

                        // Send an AJAX request to update the backend
                        $.ajax({
                            url: '{{ route("clearCloseFriends") }}',
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                showToast('success', 'Close friends list cleared successfully');
                            },
                            error: function (error) {
                                showToast('error', 'Error clearing close friends list');
                            }
                        });
                    });
                },
                error: function () {
                    $('#loading-container').addClass('d-none');
                    $('#content-container').removeClass('d-none');
                    $('#close-friends-list').html(`
                        <div class="row mt-4 w-100">
                            <div class="col d-flex align-items-center justify-content-center">
                                <p>Failed to load friends. Please <a href="#" id="retry-link">try again.</a></p>
                            </div>
                        </div>
                    `);
                    $('#suggested-friends-list').html(`
                        <div class="row mt-4 w-100">
                            <div class="col d-flex align-items-center justify-content-center">
                                <p>Failed to load friends. Please <a href="#" id="retry-link">try again.</a></p>
                            </div>
                        </div>
                    `);

                    // Add event listener to the retry link
                    $(document).on('click', '#retry-link', function (e) {
                        e.preventDefault();
                        fetchFriends(); // Retry fetching friends
                    });
                }
            });
        }

        // Call the function to fetch friends on page load or any specific event
        fetchFriends();

        function updateCloseFriendsList(closeFriends) {
            var closeFriendsList = '';
            if (closeFriends.length > 0) {
                closeFriends.forEach(function (friend) {
                    closeFriendsList += '<div class="row mt-4 w-100">';
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
            } else {
                closeFriendsList = '<div class="row mt-4 w-100">';
                closeFriendsList += '    <div class="col d-flex align-items-center justify-content-center text-center">';
                closeFriendsList += '        <p>You don\'t have any close friends yet. Start adding friends to your close friend list!</p>';
                closeFriendsList += '    </div>';
                closeFriendsList += '</div>';
            }
            $('#close-friends-list').html(closeFriendsList);
            $('#close-friends-count').text(closeFriends.length + ' People');
        }

        function updateSuggestedFriendsList(suggestedFriends) {
            var suggestedFriendsList = '';
            if (suggestedFriends.length > 0) {
                suggestedFriends.forEach(function (friend) {
                    suggestedFriendsList += '<div class="row mt-4 w-100">';
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
                suggestedFriendsList = '<div class="row mt-4 w-100">';
                suggestedFriendsList += '    <div class="col d-flex align-items-center justify-content-center text-center">';
                suggestedFriendsList += '        <p>No friends available to suggest at the moment.</p>';
                suggestedFriendsList += '    </div>';
                suggestedFriendsList += '</div>';
            }
            $('#suggested-friends-list').html(suggestedFriendsList);
        }
    });
</script>
