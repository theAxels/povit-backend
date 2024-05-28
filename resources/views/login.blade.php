<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">

    <script src="https://kit.fontawesome.com/f273824998.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5" style="max-height: 100%;">
        <div class="row">
            <div class="col-md-6 mt-4">
                <h1 style="font-weight: bold; font-size: 40px;">Welcome Back</h1>

                <form>
                    <div data-mdb-input-init class="form-outline mb-4 mt-5 mx-4">
                        <label class="form-label" for="form1Example1" style="font-size: 20px; margin-left: 2%;">Email Address</label>
                        <input type="email" id="form1Example1" class="form-control" placeholder="Enter your email address" style="background-color: #EDEDED; border-color: #EDEDED; border-radius: 30px; width: 96%; padding: 10px; margin-left: 2%;"/>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4 mx-4">   
                        <label class="form-label" for="form1Example2" style="font-size: 20px; margin-left: 2%;">Password</label>
                        <input type="password" id="form1Example2" class="form-control" placeholder="Enter a strong password" style="background-color: #EDEDED; border-color: #EDEDED; border-radius: 30px; width: 96%; padding: 10px; margin-left: 2%;"/>
                    </div>

                   
                    <div class="row mb-4">
                        
                            <div class="form-check mx-5">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                                <label class="form-check-label" for="form1Example3" style="font-size: 18px;"> Remember me </label>
                            </div>
                      

                        <div class="col d-flex">
                            <a href="#!" style="font-size: 18px;" >Forgot password?</a>
                        </div>
                    </div>

                    <div class="text-center mt-4" style="color: #99999B;">
                        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-floating btn-sm mt-3 text-dark" style="background-color: #EFBDEE; border-color: #EDEDED; width: 88%; font-size: 20px; ">LOG IN</button>
                    </div>

                    <div class="text-center mt-4" style="color: #99999B;">
                         <p style="font-size: 16px; color: black;">or log in with</p>
                    </div>
                     <button class="signupGoogle">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
                            <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                            <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                            <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                            <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                            <path fill="none" d="M0 0h48v48H0z"></path>
                        </svg>
                        <span>Sign Up WIth Google</span>
                    </button>
                </form>
            </div>

            <div class="right col-md-6 text-center", style="background-color: #F3E8F3; border-radius: 20px;">
                <h1 style="font-weight: bold; margin-top: 33%; font-size: 40px;">Don't Have an Account Yet?</h1>
                <span style="display: flex; margin-top: 5%; font-size: 28px;">Let’s get you all set up so you can start creating your selfie experience</span>

                <div class="sign-up d-flex justify-content-center">
                    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-floating mx-1 mt-3 text-dark" style="background-color: #EFBDEE; border-color: #EDEDED; font-size: 20px;">SIGN UP</button>
                </div>  
            </div>

        </div>
    </div>


</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container kontainer">
        <div class="formarea">
            <div class="col leftpanel" style="border-radius: 20px;">
                <div class="container formnya p-5">
                   <h1 style="font-weight: bold; font-size: 30px; margin-bottom: 8%;">Welcome Back</h1>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Your Email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter Your Password">
                        </div>
                    
                        <div class="row mb-4">
                            <div class="col-6 d-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="tnc">
                                    <label class="form-check-label" for="tnc">Remember me</label>
                                </div>
                            </div>
                            <div class="col-6 d-flex text-right">
                                <a href="#!" style="font-size: 18px; margin-left: 23%;">Forgot password?</a>
                            </div>
                        </div>

                        <button type="submit" class="signupButton">LOG IN</button>
                    </form>
                    <div class="line-divider">
                        <div class="text">Or Log In With</div>
                    </div>
                    <button class="signupGoogle">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
                            <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                            <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                            <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                            <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                            <path fill="none" d="M0 0h48v48H0z"></path>
                        </svg>
                        <span>Or log in With Google</span>
                    </button>
                </div>
            </div>

            <div class="col rightpanel text-center">
                <h1 style="font-weight: bold; justify-content: center; font-size: 30px;">Don't Have an Account Yet?</h1>
                <span style="display: flex; margin-top: 5%; font-size: 22px; margin-right: 2%;">Let’s get you all set up so you can start creating your selfie experience</span>

                <!-- <div class="sign-up d-flex justify-content-center">
                    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-floating mx-1 mt-3 text-dark" style="background-color: #EFBDEE; border-color: #EDEDED; width: 100%; font-size: 16px; border-radius: 50px;">SIGN UP</button>
                </div>  -->

                <button type="submit" class="loginButton mt-3">SIGN UP</button>
            </div>
        </div>
    </div>
</body>
</html>
