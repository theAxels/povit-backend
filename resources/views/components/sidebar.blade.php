<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Example</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f4ebf6;
            padding: 20px;
        }
        .profile-pic {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 10px;
        }
        .profile-pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .nav-link {
            color: #000;
            margin: 10px 0;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
        }
        .nav-link i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile text-center">
            <div class="profile-pic">
                <img src="path_to_your_image.png" alt="Profile Picture">
                
            </div>
            <h5>Profile</h5>
            <div class="mb-3">
                <button class="btn btn-light btn-sm">Edit Picture</button>
            </div>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <div class="d-flex align-items-center">
                    <span class="me-2">siAlay123</span>
                    <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil"></i></button>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Profile Description</label>
                <div class="d-flex align-items-center">
                    <span class="me-2">Males online</span>
                    <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil"></i></button>
                </div>
            </div>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link" href="#"><i class="bi bi-house"></i>Home</a>
            <a class="nav-link" href="#"><i class="bi bi-chat"></i>Chat</a>
            <a class="nav-link" href="#"><i class="bi bi-star"></i>Close Friend</a>
            <a class="nav-link" href="#"><i class="bi bi-clock-history"></i>History</a>
            <a class="nav-link" href="#"><i class="bi bi-box-arrow-right"></i>Log out</a>
        </nav>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
