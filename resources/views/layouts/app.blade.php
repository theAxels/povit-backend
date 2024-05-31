<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

        <title>
            @yield('title')
        </title>

    </head>
    <body>
        <div class="container-fluid mb-5" style="margin:0; padding:0;"></div>
        {{-- @include('components.navbar') --}}
        <div class="container my-3">

            @include('components.alert')

               @yield('content')

        </div>
    </body>
</html>
