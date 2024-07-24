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

{{-- friend list --}}

{{-- ----------------------Users/Groups lists side---------------------- --}}

        <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}" style="display:none">
            </div>
            <div class="show messenger-tab users-tab app-scroll" data-view="users" style="display:none">

                <div class="favorites-section"style="display:none">
                    <p class="messenger-title" style="display:none"><span>Favorites</span></p>
                    <div class="messenger-favorites app-scroll-hidden" style="display:none"></div>
                </div>

            </div>

        </div>

</body>
</html>
