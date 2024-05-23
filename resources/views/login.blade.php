<!DOCTYPE html>
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
                        <!-- <div class="col"> -->
                            <div class="form-check mx-5">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                                <label class="form-check-label" for="form1Example3" style="font-size: 18px;"> Remember me </label>
                            </div>
                        <!-- </div> -->

                        <div class="col d-flex">
                            <a href="#!" style="font-size: 18px;" >Forgot password?</a>
                        </div>
                    </div>

                    <div class="text-center mt-4" style="color: #99999B;">
                        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-floating btn-sm mt-3 text-dark" style="background-color: #EFBDEE; border-color: #EDEDED; width: 88%; font-size: 20px; ">LOG IN</button>
                    </div>

                    <div class="text-center mt-4" style="color: #99999B;">
                         <p style="font-size: 16px; color: black;">or log in with</p>
                         <button data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1 mt-2" style="background-color: #EDEDED; border-color: #EDEDED; color: black; font-size: 16px; width: 88%; border-color: black;"><i class="fab fa-google"></i>
                        continue with a Google</button>
                    </div>
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
</html>
