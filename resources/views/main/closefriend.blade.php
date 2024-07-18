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
                            <h6 id="close-friends-count">0 People</h6>
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
        $.ajax({
            url: '{{ route("closeFriends") }}',
            method: 'GET',
            success: function (data) {
                $('#close-friends-count').text(data.closeFriends.length + ' People');
                var closeFriendsList = '';
                data.closeFriends.forEach(function (friend) {
                    closeFriendsList += '<div class="row mt-4">';
                    closeFriendsList += '    <div class="col d-flex align-items-center">';
                    closeFriendsList += '        <div class="circle">';
                    closeFriendsList += '            <img src="{{ asset('user_profile/') }}/' + friend.profile_pics + '" alt="Profile Image">';
                    closeFriendsList += '        </div>';
                    closeFriendsList += '        <div class="text d-flex align-items-center mt-0" style="margin-left: 5%;">';
                    closeFriendsList += '            <h6 class="m-0">' + friend.name + '</h6>';
                    closeFriendsList += '        </div>';
                    closeFriendsList += '        <div class="ms-auto d-flex align-items-center flex-grow-1 justify-content-end">';
                    closeFriendsList += '            <div class="form-check form-check-inline ms-auto">';
                    closeFriendsList += '                <input type="radio" class="form-check-input" id="option1" checked>';
                    closeFriendsList += '                <label for="option1"></label>';
                    closeFriendsList += '            </div>';
                    closeFriendsList += '        </div>';
                    closeFriendsList += '    </div>';
                    closeFriendsList += '</div>';
                });
                $('#close-friends-list').html(closeFriendsList);

                var suggestedFriendsList = '';
                data.suggestedFriends.forEach(function (friend) {
                    suggestedFriendsList += '<div class="row mt-4">';
                    suggestedFriendsList += '    <div class="col d-flex align-items-center">';
                    suggestedFriendsList += '        <div class="circle">';
                    suggestedFriendsList += '            <img src="{{ asset('user_profile/') }}/' + friend.profile_pics + '" alt="Profile Image">';
                    suggestedFriendsList += '        </div>';
                    suggestedFriendsList += '        <div class="text d-flex align-items-center mt-0" style="margin-left: 5%;">';
                    suggestedFriendsList += '            <h6 class="m-0">' + friend.name + '</h6>';
                    suggestedFriendsList += '        </div>';
                    suggestedFriendsList += '        <div class="ms-auto d-flex align-items-center flex-grow-1 justify-content-end">';
                    suggestedFriendsList += '            <div class="form-check form-check-inline ms-auto">';
                    suggestedFriendsList += '                <input type="radio" class="form-check-input" id="option6" name="radioExam">';
                    suggestedFriendsList += '                <label for="option6"></label>';
                    suggestedFriendsList += '            </div>';
                    suggestedFriendsList += '        </div>';
                    suggestedFriendsList += '    </div>';
                    suggestedFriendsList += '</div>';
                });
                $('#suggested-friends-list').html(suggestedFriendsList);
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Get the close friends count element
        const closeFriendsCount = document.getElementById('close-friends-count');
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