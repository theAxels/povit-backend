<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d84972a54e.js" crossorigin="anonymous"></script>

    <title>@yield('title','friends')</title>
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
        margin-top : 10px;
        margin-left: 100px;
        }

        .text {
        font-weight: bold;
        color: black;
        margin-left : 7px;
        margin-bottom : 10px;
        }

        .text1 {
        font-weight: bold;
        color: white;
        margin-left : 7px;
        margin-bottom : 10px;
        }

        .friendSection {
            max-height: 200px; /* Tentukan tinggi maksimum */
            overflow-y: auto; /* Buat area scrollable jika konten lebih dari tinggi maksimum */
        }


    </style>
</head>
<body>
    <div class="container">
        <div class="w-100 d-flex justify-content-end" style="margin-top: 2cm;">
            <div class="kotak" style="border: 2px solid #EFBDEE; padding: 17px; width:30%;
            border-radius: 40px;">
                <div class="row">
                    <div class="col-auto">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa-solid fa-user-group me-2"></i>
                                <h3 class="mb-0">Your Friends</h3>
                            </div>
                            <h6>20 Friends</h6>
                        </div>
                        <div class="d-flex flex-column justify-content-center" style="background-color: #EFBDEE; height: 37px;
                        width: 104%; border-radius: 40px;">
                            <div class="container" style="margin-left: 24%; margin-top: 2.5%;">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa-solid fa-magnifying-glass me-2"></i>
                                    <h5 class="mb-0">Search Contact</h5>
                                </div>
                            </div>
                        </div>
                        <div class="friendSection">
                            <!-- Profile Image Section -->
                            <div class="d-flex" style="margin-top: 15px;">
                                <div class="circle">
                                    <img src="https://via.placeholder.com/50" alt="Profile Image">
                                </div>
                                <div class="text" style="margin-top: 13px; margin-left: 25px">
                                    <h6>andreaaa aa</h6>
                                </div>
                                <div class="comment">
                                    <i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px;
                                    margin-top : 10px; margin-left: 120px"></i>
                                    {{-- <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px;"></i> --}}
                                </div>
                                <div class="silang" style="margin-top: 11px; margin-left: 10px">
                                    <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px;"></i>
                                </div>
                            </div>

                            <!-- Profile Image Section -->
                            <div class="d-flex" style="margin-top: 15px;">
                                <div class="circle">
                                    <img src="https://via.placeholder.com/50" alt="Profile Image">
                                </div>
                                <div class="text" style="margin-top: 13px; margin-left: 25px">
                                    <h6>andreaaa aa</h6>
                                </div>
                                <div class="comment">
                                    <i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px;
                                    margin-top : 10px; margin-left: 120px"></i>
                                    {{-- <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px;"></i> --}}
                                </div>
                                <div class="silang" style="margin-top: 11px; margin-left: 10px">
                                    <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px;"></i>
                                </div>
                            </div>
                            <!-- Profile Image Section -->
                            <div class="d-flex" style="margin-top: 15px;">
                                <div class="circle">
                                    <img src="https://via.placeholder.com/50" alt="Profile Image">
                                </div>
                                <div class="text" style="margin-top: 13px; margin-left: 25px">
                                    <h6>andreaaa aa</h6>
                                </div>
                                <div class="comment">
                                    <i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px;
                                    margin-top : 10px; margin-left: 120px"></i>
                                    {{-- <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px;"></i> --}}
                                </div>
                                <div class="silang" style="margin-top: 11px; margin-left: 10px">
                                    <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="text mt-4">
                            <h6>Friend Requests</h6>
                        </div>
                        <!-- Profile Image Section -->
                        <div class="d-flex" style="margin-top: 15px;">
                            <div class="circle">
                                <img src="https://via.placeholder.com/50" alt="Profile Image">
                            </div>
                            <div class="text" style="margin-top: 13px; margin-left: 25px">
                                <h6>andreaaa aa</h6>
                            </div>
                            <div class="kotak-kecil">
                                <div class="text1 mb-5">
                                    ACC
                                </div>
                            </div>
                            <div class="silang" style="margin-top: 11px; margin-left: 10px">
                                <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px;"></i>
                            </div>
                        </div>
                        <!-- Profile Image Section -->
                        <div class="d-flex" style="margin-top: 15px;">
                            <div class="circle">
                                <img src="https://via.placeholder.com/50" alt="Profile Image">
                            </div>
                            <div class="text" style="margin-top: 13px; margin-left: 25px">
                                <h6>andreaaa aa</h6>
                            </div>
                            <div class="kotak-kecil">
                                <div class="text1 mb-5">
                                    ACC
                                </div>
                            </div>
                            <div class="silang" style="margin-top: 11px; margin-left: 10px">
                                <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px;"></i>
                            </div>
                        </div>
                        <!-- Profile Image Section -->
                        <div class="d-flex" style="margin-top: 15px;">
                            <div class="circle">
                                <img src="https://via.placeholder.com/50" alt="Profile Image">
                            </div>
                            <div class="text" style="margin-top: 13px; margin-left: 25px">
                                <h6>andreaaa aa</h6>
                            </div>
                            <div class="kotak-kecil">
                                <div class="text1 mb-5">
                                    ACC
                                </div>
                            </div>
                            <div class="silang" style="margin-top: 11px; margin-left: 10px">
                                <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
