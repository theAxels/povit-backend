@extends('components.template')
@section('title', 'Dashboard')

@section('extra-css')
    <link rel="stylesheet" href="css/main.css">
@endsection

@section('dashboard')
    <div class="center-box" id="my camera">
        <a class="circle-btn" href="#"></a>
        <a class="" href="#">
            <span class="material-symbols-outlined image-icon">
                image
            </span>
        </a>

        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="..." class="d-block w-100" alt="kotak">
              </div>
              <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="bulet">
              </div>
              <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="segitigas">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

    </div>
    <div class="history-text">
        <a href="#">
            <p>History</p>
            <span class="material-symbols-outlined">
                keyboard_double_arrow_down
            </span>
        </a>
    </div>
@endsection

@section('extra-js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        Webcam.set({
            width: 490,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#my_camera');
    });

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            console.log(data_uri);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }
</script>
@endsection
