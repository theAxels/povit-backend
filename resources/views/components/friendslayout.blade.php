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
        /* margin-left : 7px;
        margin-bottom : 10px; */
        /* max-width: 50%; */
        width:40%;

        }

        .text1 {
        font-weight: bold;
        font-size: 12px;
        color: white;
        margin-left : 7px;
        margin-bottom : 10px;
        /* overflow: hidden; */
        }

        .friendSection{
            width: 350px;
            margin-top: 10px;
            /* display: none; */
            /* overflow: hidden; */
            /* background-color: #EFBDEE; */
        }

        .scroll{
            width: 400px;
            height: 200px;
            overflow: hidden;
            overflow-y: auto;
        }
        .scroll::-webkit-scrollbar{
            display: none;
        }


    </style>
</head>
<body>
    <div class="container">
        <div class="w-100 d-flex justify-content-end" style="margin-top: 5%">
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
                            <div class="scroll">

                                <!-- Profile Image Section -->
                                <div class="d-flex" style="margin-top: 15px;">
                                    <div class="circle">
                                        <img src="https://via.placeholder.com/50" alt="Profile Image">
                                    </div>
                                    <div class="text d-flex align-items-center mt-0" style="margin-top: 13px; margin-left: 5%">
                                        <h6 class="m-0">andreaaaaaaaaaeaaa_</h6>
                                    </div>
                                    <div class="ms-auto d-flex align-items-center" style="margin-right: 15%">
                                        <i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px; margin-left: 5px;"></i>
                                        <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px; margin-left: 5px;"></i>
                                    </div>
                                </div>
                                <!-- Profile Image Section -->
                                <div class="d-flex" style="margin-top: 15px;">
                                    <div class="circle">
                                        <img src="https://via.placeholder.com/50" alt="Profile Image">
                                    </div>
                                    <div class="text d-flex align-items-center mt-0" style="margin-top: 13px; margin-left: 5%">
                                        <h6 class="m-0">p0etry_</h6>
                                    </div>
                                    <div class="ms-auto d-flex align-items-center" style="margin-right: 15%">
                                        <i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px; margin-left: 5px;"></i>
                                        <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px; margin-left: 5px;"></i>
                                    </div>
                                </div>
                                <!-- Profile Image Section -->
                                <div class="d-flex" style="margin-top: 15px;">
                                    <div class="circle">
                                        <img src="https://via.placeholder.com/50" alt="Profile Image">
                                    </div>
                                    <div class="text d-flex align-items-center mt-0" style="margin-top: 13px; margin-left: 5%">
                                        <h6 class="m-0">ricathuang12</h6>
                                    </div>
                                    <div class="ms-auto d-flex align-items-center" style="margin-right: 15%">
                                        <i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px; margin-left: 5px;"></i>
                                        <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px; margin-left: 5px;"></i>
                                    </div>
                                </div>
                                <!-- Profile Image Section -->
                                <div class="d-flex" style="margin-top: 15px;">
                                    <div class="circle">
                                        <img src="https://via.placeholder.com/50" alt="Profile Image">
                                    </div>
                                    <div class="text d-flex align-items-center" style="margin-top: 13px; margin-left: 5%">
                                        <h6>gidneon</h6>
                                    </div>
                                    <div class="ms-auto d-flex align-items-center" style="margin-right: 15%">
                                        <i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px; margin-left: 5px;"></i>
                                        <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px; margin-left: 5px;"></i>
                                    </div>
                                </div>
                                <!-- Profile Image Section -->
                                <div class="d-flex" style="margin-top: 15px;">
                                    <div class="circle">
                                        <img src="https://via.placeholder.com/50" alt="Profile Image">
                                    </div>
                                    <div class="text d-flex align-items-center" style="margin-top: 13px; margin-left: 5%">
                                        <h6>angkiantok</h6>
                                    </div>
                                    <div class="ms-auto d-flex align-items-center" style="margin-right: 15%">
                                        <i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px; margin-left: 5px;"></i>
                                        <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px; margin-left: 5px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- MULAI MASUK FRIEND REQUEST  --}}

                        <div class="text mt-4">
                            <h6>Friend Request's</h6>
                        </div>

                        <div class="friendSection">
                            <div class="scroll">
                                <!-- Profile Image Section -->
                                <div class="d-flex align-items-center" style="margin-top: 15px;">
                                    <div style="width: 80px; height: auto;" class="circle">
                                        <img src="https://via.placeholder.com/50" alt="Profile Image">
                                    </div>
                                    <div class="text d-flex align-items-center" style="margin-left: 25px;">
                                        <h6>andreaaa</h6>
                                    </div>
                                    <div class="ms-auto d-flex align-items-center" style="margin-right: 15%; margin-bottom:4% ">
                                        <div class="kotak-kecil d-flex align-items-center justify-content-center">
                                            <div class="text1 m-0">
                                                ACC
                                            </div>
                                        </div>
                                        <i class="fa-solid fa-circle-xmark" style="color: #EFBDEE; font-size: 20px; margin-left: 10px;
                                        margin-top : 5%"></i>
                                    </div>
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
