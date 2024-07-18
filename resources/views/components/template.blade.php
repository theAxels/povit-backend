<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
        }
    </style>
    @yield('extra-css')
</head>

<body>
    @include('components.sidebar')
    <div class="row w-100" style="height: 100vh">
        <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 11;"></div>
        <div class="col-8 d-flex">
            @yield('dashboard')
        </div>
        <div class="col-4 m-0 h-100 p-4">
            @yield('closeFriend')
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

    <script>
        $(document).ready(function(){
            @if(session('success'))
                showToast('success', '{{ session('success') }}');
            @endif
            @if(session('error'))
                showToast('danger', '{{ session('error') }}');
            @endif

            function showToast(type, message) {
                var toast = $('<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" data-autohide="true"></div>');
                toast.addClass('text-bg-' + type);
                toast.append('<div class="toast-body">' + message + '</div>');
                $('.toast-container').append(toast);
                toast.toast('show');
            }

            $('.toast').on('hidden.bs.toast', function () {
                $(this).remove();
            });

            $('.toast').on('swipeup', function () {
                $(this).toast('hide');
            });
        });

        
    </script>
    @yield('extra-js')


</body>

</html>
