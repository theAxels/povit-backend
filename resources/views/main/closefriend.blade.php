
    <style>
        .circle {
            width: 50px;
            height: 50px;
            border: 4px solid #EFBDEE;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .kotak-kecil {
            width: 45px;
            height: 20px;
            background-color: #0D99FF;
            border-radius: 30px;
            margin-top: 10px;
            margin-left: 100px;
        }

        .text {
            font-weight: bold;
            color: black;
            width: 40%;
        }

        .text1 {
            font-weight: bold;
            font-size: 12px;
            color: white;
            margin-left: 7px;
            margin-bottom: 10px;
        }

        .friendSection {
            width: auto;
            margin-top: 10px;
        }

        .scroll {
            width: auto;
            height: 200px;
            overflow: hidden;
            overflow-y: auto;
        }

        .scroll::-webkit-scrollbar {
            display: none;
        }

        .h6 {
            font-weight: bold;
        }

        input[type="radio"]:checked {
            background-color: #EFBDEE;
            border-color: #b9b6b6
        }

        .modal-content{
            position: fixed;
            z-index: 100;
        }

    </style>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content " style="border-radius: 30px; position: absolute; z-index:100;">
                <div class="modal-header">
                    <img src="{{ asset('logo-cf.png') }}" alt="" style="width: 30px; height: 30px;">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel" style="margin-left: 10px">Close Friends</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mt-4">
                        <div class="col-6 d-flex align-items-center">
                            <h6>{{ $closeFriends->count() }} People</h6>
                        </div>
                        <div class="col-6 d-flex justify-content-end align-items-center">
                            <button class="clear-button" style="color: #0D99FF; background: none; border: none;">Clear All</button>
                        </div>
                    </div>

                    <div class="friendSection">
                        <div class="scroll">
                            <!-- Profile Image Section -->
                            @foreach ($closeFriends as $friend)
                                <div class="row mt-4">
                                    <div class="col d-flex align-items-center">
                                        <div class="circle">
                                            <img src="{{ asset('user_profile/'. $friend->profile_pics) }}" alt="Profile Image">
                                        </div>
                                        <div class="text d-flex align-items-center mt-0" style="margin-left: 5%;">
                                            <h6 class="m-0">{{ $friend->name }}</h6>
                                        </div>
                                        <div class="ms-auto d-flex align-items-center flex-grow-1 justify-content-end">
                                            <div class="form-check form-check-inline ms-auto">
                                                <input type="radio" class="form-check-input" id="option1" checked>
                                                <label for="option1"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="text mt-4">
                        <h6>Suggested</h6>
                    </div>

                    <div class="friendSection">
                        <div class="scroll">
                            <!-- Profile Image Section -->

                            @foreach ($suggestedFriends as $friend )
                                <div class="row mt-4">
                                    <div class="col d-flex align-items-center">
                                        <div class="circle">
                                            <img src="{{ asset('user_profile/'. $friend->profile_pics) }}" alt="Profile Image">
                                        </div>
                                        <div class="text d-flex align-items-center mt-0" style="margin-left: 5%;">
                                            <h6 class="m-0">{{ $friend->name }}</h6>
                                        </div>
                                        <div class="ms-auto d-flex align-items-center flex-grow-1 justify-content-end">
                                            <div class="form-check form-check-inline ms-auto">
                                                <input type="radio" class="form-check-input" id="option6" name="radioExam">
                                                <label for="option6"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

