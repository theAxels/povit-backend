<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .line {
            border-bottom: 2px solid #D9D9D9;
            padding-top: 5px;
            width: 100%;
        }

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

        .text {
            font-weight: bold;
            color: black;
            margin-left: 15px;
        }

        .friendSection {
            width: 100%;
        }

        .scroll {
            width: 100%;
            height: 35%;
            overflow: hidden;
            overflow-y: auto;
        }

        .scroll::-webkit-scrollbar {
            display: none;
        }

        .friend-row {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .friend-row .actions {
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        h6 {
            font-size: 14px;
            margin: 0;
        }

        .text p {
            font-size: 12px;
            margin: 0;
            font-weight: 500;
        }
    </style>
</head>
<body>

{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex"></div>
<p class="info-name">{{ config('chatify.name') }}</p>
<div class="line"></div>

{{-- user description --}}
<div class="about-me" style="position: relative; left: 4%; top: 0; text-align: left;">
    <p style="font-size: 15px; margin-bottom: 2%; width: 100%; font-weight: 700;">About Me</p>
    <p style="font-size: 14px; margin: 0; width: 90%; font-weight: 500;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, obcaecati at eos fugit qui incidunt deserunt eius laborum quas quibusdam veritatis!</p>
</div>

{{-- friend list --}}
<div class="about-me" style="position: relative; left: 4%; top: -1%; text-align: left;">
    <p style="font-size: 15px; margin-bottom: 2%; width: 100%; font-weight: 700;">Friends</p>
    <div class="friendSection">
        <div class="scroll">
            <!-- Profile Image Section -->
            <div class="friend-row">
                <div class="circle">
                    <img src="https://via.placeholder.com/50" alt="Profile Image">
                </div>
                <div class="text">
                    <h6 class="m-0">kamukepo_</h6>
                    <p style="margin-top: 1%">Halo aku andrea jelek dan sarah cantik</p>
                </div>
                <div class="actions" style="margin-right: 10%">
                    <i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px; margin-left: 5px;"></i>
                </div>
            </div>

            <div class="friend-row">
                <div class="circle">
                    <img src="https://via.placeholder.com/50" alt="Profile Image">
                </div>
                <div class="text">
                    <h6 class="m-0">kamukepo_</h6>
                    <p style="margin-top: 1%">Halo aku andrea jelek dan sarah cantik</p>
                </div>
                <div class="actions" style="margin-right: 10%">
                    <i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px; margin-left: 5px;"></i>
                </div>
            </div>

            <div class="friend-row">
                <div class="circle">
                    <img src="https://via.placeholder.com/50" alt="Profile Image">
                </div>
                <div class="text">
                    <h6 class="m-0">kamukepo_</h6>
                    <p style="margin-top: 1%">Halo aku andrea jelek dan sarah cantik</p>
                </div>
                <div class="actions" style="margin-right: 10%">
                    <i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px; margin-left: 5px;"></i>
                </div>
            </div>

            <div class="friend-row">
                <div class="circle">
                    <img src="https://via.placeholder.com/50" alt="Profile Image">
                </div>
                <div class="text">
                    <h6 class="m-0">kamukepo_</h6>
                    <p style="margin-top: 1%">Halo aku andrea jelek dan sarah cantik</p>
                </div>
                <div class="actions" style="margin-right: 10%">
                    <i class="fa-regular fa-comment-dots" style="color: #4ECB71; font-size: 25px; margin-left: 5px;"></i>
                </div>
            </div>


        </div>
    </div>
</div>

</body>
</html>
