<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>E-florist Ordering System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <script>
            // Open the Modal
            function openModal() {
            document.getElementById("myModal").style.display = "block";
            }

            // Close the Modal
            function closeModal() {
            document.getElementById("myModal").style.display = "none";
            }

            var slideIndex = 1;
            showSlides(slideIndex);

            // Next/previous controls
            function plusSlides(n) {
            showSlides(slideIndex += n);
            }

            // Thumbnail image controls
            function currentSlide(n) {
            showSlides(slideIndex = n);
            }

            function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            captionText.innerHTML = dots[slideIndex-1].alt;
            }
        </script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                width:100%;
                overflow-x:hidden;
                overflow-y:hidden;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            /*start 3 gambar */
            /* Three image containers (use 25% for four, and 50% for two, etc) */
            .column {
            float: left;
            width: 24.00%;
            padding: 5px;
            }

            /* Clear floats after image containers */
            .row::after {
            content: "";
            clear: both;
            display: table;
            }
        /*habis 3 gambar */

        .row1 > .column1 {
        padding: 0 8px;
        }

        .row1:after {
        content: "";
        display: table;
        clear: both;
        }

        /* Create four equal columns that floats next to eachother */
        .column1 {
        float: left;
        width: 25%;
        }

        /* The Modal (background) */
        .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: black;
        }

        /* Modal Content */
        .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 90%;
        max-width: 1200px;
        }

        /* The Close Button */
        .close {
        color: white;
        position: absolute;
        top: 10px;
        right: 25px;
        font-size: 35px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: #999;
        text-decoration: none;
        cursor: pointer;
        }

        /* Hide the slides by default */
        .mySlides {
        display: none;
        }

        /* Next & previous buttons */
        .prev,
        .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
        right: 0;
        border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
        }

        /* Caption text */
        .caption-container {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: white;
        }

        img.demo {
        opacity: 0.6;
        }

        .active,
        .demo:hover {
        opacity: 1;
        }

        img.hover-shadow {
        transition: 0.3s;
        }

        .hover-shadow:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    E-florist
                </div>

                <!-- <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->
                
                <div class="row">
                    <div class="column">
                        <img src="img/babybreath.jpg" alt="Baby Breath" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow">
                        Baby Breath 
                    </div>
                    <div class="column">
                        <img src="img/rose.jpg" alt="Rose" style="width:100%" onclick="openModal();currentSlide(2)" class="hover-shadow">
                        Rose
                    </div>
                    <div class="column">
                        <img src="img/tulips.jpg" alt="Tulips" style="width:100%" onclick="openModal();currentSlide(3)" class="hover-shadow">
                        Tulips
                    </div>
                    <div class="column">
                        <img src="img/sunflower.jpg" alt="Sunflower" style="width:100%" onclick="openModal();currentSlide(4)" class="hover-shadow">
                        Sunflower
                    </div>
                </div>

                <div>
                <a class="btn btn-success" href="{{ url('/product') }}" role="button">Start shopping</a>
                </div>
                
                <!-- The Modal/Lightbox -->
                <div id="myModal" class="modal">
                <span class="close cursor" onclick="closeModal()">&times;</span>
                <div class="modal-content">

                    <div class="mySlides">
                    <div class="numbertext">1 / 4</div>
                    <img src="img/babybreath.jpg" style="width:30%">
                    </div>

                    <div class="mySlides">
                    <div class="numbertext">2 / 4</div>
                    <img src="img/rose.jpg" style="width:30%">
                    </div>

                    <div class="mySlides">
                    <div class="numbertext">3 / 4</div>
                    <img src="img/tulips.jpg" style="width:30%">
                    </div>

                    <div class="mySlides">
                    <div class="numbertext">4 / 4</div>
                    <img src="img/sunflower.jpg" style="width:30%">
                    </div>

                    <!-- Next/previous controls -->
                    <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a> -->

                    <!-- Caption text -->
                    <!-- <div class="caption-container">
                    <p id="caption"></p>
                    </div> -->

                    <!-- Thumbnail image controls -->
                    <!-- <div class="column1">
                    <img class="demo" src="img/babybreath.jpg" onclick="currentSlide(1)" alt="Baby Breath">
                    </div>

                    <div class="column1">
                    <img class="demo" src="img/rose.jpg" onclick="currentSlide(2)" alt="Rose">
                    </div>

                    <div class="column1">
                    <img class="demo" src="img/tulips.jpg" onclick="currentSlide(3)" alt="Tulips">
                    </div>

                    <div class="column1">
                    <img class="demo" src="img/sunflower.jpg" onclick="currentSlide(4)" alt="Sunflower">
                    </div> -->
                </div>
                </div>
            </div>
        </div>

        <div id="app">
        <div class="container">
         <users> </users>
        </div>
        </div>
        
    </body>
</html>
