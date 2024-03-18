<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Digitf</title>


    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css_fe/bootstrap.css') }}" />
    {{-- fontawesome icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css_fe/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('assets/css_fe/responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ asset('assets/images_fe/logo.png') }}" alt="" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  ">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ui.product') }}">Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Category </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sub Category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact us</a>
                            </li>
                        </ul>
                        <div class="user_option">
                            <a href="">
                                <img src="{{ asset('assets/images_fe/user.png') }}" alt="">
                                <span>
                                    Login
                                </span>
                            </a>
                            <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                            </form>
                        </div>
                    </div>
                    <div>
                        <div class="custom_menu-btn ">
                            <button>
                                <span class=" s-1">

                                </span>
                                <span class="s-2">

                                </span>
                                <span class="s-3">

                                </span>
                            </button>
                        </div>
                    </div>

                </nav>
            </div>
        </header>
        <!-- end header section -->

        <!-- slider section -->
       
    </div>

    {{-- </div> --}}

    <!-- end slider section -->





    @yield('content')


    <!-- info section -->

    {{-- <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_logo">
        <h2>
          Digitf
        </h2>
      </div>
      <div class="row">

        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              About Shop
            </h5>
            <div>
              <div class="img-box">
                <img src="images_fe/location-white.png" width="18px" alt="">
              </div>
              <p>
                Address
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images_fe/telephone-white.png" width="12px" alt="">
              </div>
              <p>
                +01 1234567890
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images_fe/envelope-white.png" width="18px" alt="">
              </div>
              <p>
                demo@gmail.com
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Informations
            </h5>
            <p>
              ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            </p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="info_insta">
            <h5>
              Instagram
            </h5>
            <div class="insta_container">
              <div>
                <a href="">
                  <div class="insta-box b-1">
                    <img src="images_fe/i-1.jpg" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-2">
                    <img src="images_fe/i-2.jpg" alt="">
                  </div>
                </a>
              </div>

              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="images_fe/i-3.jpg" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="images_fe/i-4.jpg" alt="">
                  </div>
                </a>
              </div>
              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="images_fe/i-5.jpg" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="images_fe/i-6.jpg" alt="">
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <img src="images_fe/fb.png" alt="">
              </a>
              <a href="">
                <img src="images_fe/twitter.png" alt="">
              </a>
              <a href="">
                <img src="images_fe/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="images_fe/youtube.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

    <!-- end info_section -->


    <!-- about section -->

    <section class="about_section layout_padding">

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                About Us
                            </h2>

                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua. Ut enim ad minim veniam
                        </p>
                        <a href="">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="{{ asset('assets/images_fe/about-img.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->
    <!-- footer section -->
    {{-- <section class="container-fluid footer_section ">
    <div class="container">
      <p>
        &copy; 2019 All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </section> --}}
    <!-- end  footer section -->


    <script type="text/javascript" src="{{ asset('assets/js_fe/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js_fe/bootstrap.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
    </script>
    <script type="text/javascript">
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: [],
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                420: {
                    items: 2
                },
                1000: {
                    items: 5
                }
            }

        });
    </script>
    <script>
        var nav = $("#navbarSupportedContent");
        var btn = $(".custom_menu-btn");
        btn.click
        btn.click(function(e) {

            e.preventDefault();
            nav.toggleClass("lg_nav-toggle");
            document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style")
        });
    </script>
    <script>
        $('.carousel').on('slid.bs.carousel', function() {
            $(".indicator-2 li").removeClass("active");
            indicators = $(".carousel-indicators li.active").data("slide-to");
            a = $(".indicator-2").find("[data-slide-to='" + indicators + "']").addClass("active");
            console.log(indicators);

        })
    </script>
    <script>
        // Select all slides
        const slides = document.querySelectorAll(".custom-slide");

        // Total number of slides
        const totalSlides = slides.length;

        // Current slide counter
        let curSlide = 0;

        // Function to show next slide
        function showNextSlide() {
            // Hide current slide
            slides[curSlide].style.display = "none";

            // Move to the next slide
            curSlide = (curSlide + 1) % totalSlides;

            // Show next slide
            slides[curSlide].style.display = "block";
        }

        // Set interval for autoplay
        let interval = setInterval(showNextSlide, 3000); // Change 3000 to adjust autoplay speed

        // Stop autoplay when mouse is over the slider
        const slider = document.querySelector('.custom-slider');
        slider.addEventListener('mouseenter', () => {
            clearInterval(interval);
        });

        // Resume autoplay when mouse leaves the slider
        slider.addEventListener('mouseleave', () => {
            clearInterval(interval); // Clear interval to ensure no overlap
            interval = setInterval(showNextSlide, 3000); // Change 3000 to adjust autoplay speed
        });

        // Select prev slide button
        const prevSlide = document.querySelector(".custom-btn-prev");

        // Add event listener and navigation functionality for previous slide
        prevSlide.addEventListener("click", function() {
            // Hide current slide
            slides[curSlide].style.display = "none";

            // Move to the previous slide
            curSlide = (curSlide - 1 + totalSlides) % totalSlides;

            // Show previous slide
            slides[curSlide].style.display = "block";
        });

        // Select next slide button
        const nextSlide = document.querySelector(".custom-  btn-next");

        // Add event listener and navigation functionality for next slide
        nextSlide.addEventListener("click", function() {
            // Hide current slide
            slides[curSlide].style.display = "none";

            // Move to the next slide
            curSlide = (curSlide + 1) % totalSlides;

            // Show next slide
            slides[curSlide].style.display = "block";
        });
    </script>
    @yield('scripts')

    @include('sweetalert::alert')

</body>

</html>
