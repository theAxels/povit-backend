<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container kontainer">
        <div class="formarea">
            <div class="col leftpanel text-center">
                <h1 style="font-weight: bold; justify-content: center; font-size: 30px;">Welcome Back</h1>
                <span style="display: flex; margin-top: 5%; font-size: 22px; margin-right: 2%;">To keep connected with us<br>please login with your personal info</span>
                {{-- <p>To keep connected with us please login with your personal info</p> --}}
                <a href="{{ route('login_page') }}" class="loginButton mt-3" style="justify-content: center; align-content: center">Login</a>
            </div>
            <div class="col rightpanel">
                <div class="container formnya p-5">
                    <h1 style="font-weight: bold; font-size: 30px; margin-bottom: 8%;">Create Account</h1>
                    @if (session('success'))
                        <div class="toast-container">
                            <div class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" data-autohide="true">
                                <div class="toast-body">
                                    {{ session('success') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="toast-container">
                            <div class="toast text-bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" data-autohide="true">
                                <div class="toast-body">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    <form action="{{route('register_store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="firstname" placeholder="Your First Name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="lastname" placeholder="Your Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="d-flex align-items-center position-relative">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
                                <i class="fa-solid fa-eye position-absolute" id="show-password"></i>
                            </div>
                            <div class="error"></div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tnc" name="check box">
                                <label class="form-check-label" for="tnc">I agree to all <a class="tnc" href="">terms & conditions</a></label>
                            </div>
                        </div>
                        <button type="submit" class="signupButton" style="height: 5vh;">SIGN UP</button>
                    </form>
                    <div class="line-divider">
                        <div class="text">Or Sign Up With</div>
                    </div>
                    <button class="signupGoogle">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
                            <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                            <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                            <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                            <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                            <path fill="none" d="M0 0h48v48H0z"></path>
                        </svg>
                        <span>Continue With Google</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/f273824998.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="..." crossorigin="anonymous"></script>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl)
        });

        toastList.forEach(function (toast) {
            toast.show();
        });

        const showPassword = document.getElementById("show-password");
        const passwordField = document.getElementById("password");

        showPassword.addEventListener("click", function() {
            const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);

            if (type === "password") {
                this.classList.remove("fa-eye-slash");
                this.classList.add("fa-eye");
            } else {
                this.classList.remove("fa-eye");
                this.classList.add("fa-eye-slash");
            }
        });
    });
</script>

</html>
