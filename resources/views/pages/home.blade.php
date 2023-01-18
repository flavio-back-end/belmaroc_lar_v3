

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <title> {{$data->site_name}} </title>
    <meta name="description" content="We Offer Import & Export assistance foreign businesses in transporting and selling their products in China, India and USA. We connect domestic companies to the international shipping services most suited for their business.">
    <!-- Stylesheets -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Responsive File -->
    <link href="assets/css/responsive.css" rel="stylesheet">
    <!-- Color File -->
    <link href="assets/css/color.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&amp;family=Yantramanav:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
{{-- logo title --}}
    <link rel="shortcut icon" href="{{'img/sett/'.$data->logo}} " type="image/x-icon">
    <link rel="icon" href="{{'img/sett/'.$data->logo}} " type="image/x-icon">
    {{-- logo title --}}

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=601e75803d01430011c105c8&product=image-share-buttons' async='async'></script>

</head>

<body>

    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">Preloader Close</div>
            </div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>
            <div class="layer layer-three"><span class="overlay"></span></div>
        </div>

       @include('header')

        <!-- Hidden Sidebar -->
         <section class="hidden-sidebar close-sidebar">
            <div class="wrapper-box">
                <div class="content-wrapper">
                    <div class="hidden-sidebar-close"><span class="flaticon-remove"></span></div>
                    <div class="text-widget sidebar-widget">
                        <div class="logo"><a href="home.php"><img src="" alt=""></a></div>

                    </div>
                    <!-- PDF Widget -->

                    <!-- star the sidebare -->
                    <!-- Contact Widget -->
                    <div class="contact-widget">

                        <div class="icon-box">
                            <div class="icon"><span class="flaticon-calling"></span></div>
                            <div class="text"><strong>Name</strong>   <a href=""></a></div>
                        </div>
                        <div class="icon-box">
                            <div class="icon"><span class="flaticon-mail"></span></div>
                            <div class="text"><strong>Email</strong> <a href=""></a></div>
                        </div>
                    </div>
                    <!-- Link Btn -->
                    <div class="link-btn"><a href="logout.php" class="theme-btn btn-style-one style-two"><span><i class="flaticon-up-arrow"></i>ogin </span></a></div>
                </div>
            </div> 
        </section> 

        <!--Search Popup-->
        <div id="search-popup" class="search-popup">
            <div class="close-search theme-btn"><span class="flaticon-remove"></span></div>
            <div class="popup-inner">
                <div class="overlay-layer"></div>
                <div class="search-form">
                    <form method="post" action="">
                        <div class="form-group">
                            <fieldset>
                                <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required>
                                <input type="submit" value="Search Now!" class="theme-btn">
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- /Bnner Section -->
        <section class="banner-section">
            <div class="left-panel">
                {{-- <div class="side-menu-nav sidemenu-nav-toggler"><span class="fas fa-user"></span>My Acount</div> --}}
                <div class="option-box">
                    <div class="icon"><span class="fas fa-user"></span></div>
                    <h4>Track <br> Shipment</h4>
                    <div class="order-form-area">
                        <div class="wrapper-box">
                            @guest
                                
                          
                            @if (Route::has('loginuser'))
                                
                            
                            <h4>Login</h4>
                            <form  action=" {{route('loginuser_inc')}} " class="order-form"  method="post"  >
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" placeholder="Enter Shipment Number *">
                                </div>
                              @error('email')
                              <H4 style="color: red"> {{$message}} </H4>
                                  
                              @enderror
                                <div class="form-group">
                                    <input type="password"  name='password' placeholder="Enter Shipment Number *">
                                </div>
                                @error('password')
                                <H4 style="color: red"> {{$message}} </H4>
                                    
                                @enderror
                                {{-- <div class="form-group">
                                    <select class="selectpicker" name="make">
                                        <option value="*">Type of Reference *</option>
                                        <option value=".category-1">Package</option>
                                        <option value=".category-3">Freight</option>
                                        <option value=".category-4">Mail of Innovations</option>
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <button type="submit" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i>Login</span></button>
                                </div>
                                <a href="{{route('loginuser')}} ">Create an account?</a>
                                <h3 ></h3>
                            </form>
                            @endif
                            @else
                            <div class="contact-widget">

                                <div class="icon-box">
                                    <div class="icon"><span class="flaticon-calling"></span></div>
                                    <div class="text"><strong>Name</strong> {{Auth::user()->name}}  <a href=""></a></div>
                                </div>
                                <div class="icon-box">
                                    <div class="icon"><span class="flaticon-mail"></span></div>
                                    <div class="text"><strong>Email</strong>  {{Auth::user()->email}}<a href=""></a></div>
                                </div>
                                <div class="link-btn"><a href="{{route('logout_user')}} " class="theme-btn btn-style-one style-two"><span><i class="flaticon-up-arrow"></i>Logout </span></a></div>
                            </div>
                           
                          
                            @endguest
                        </div>
                    </div>
                </div>
                <!-- end -->
                <div class="option-box">
                    <a href="pricing-plan.php">
                        <div class="icon"><span class="flaticon-logistics"></span></div>
                        <h4>Pricing <br> Plan</h4>
                    </a>
                </div>
                <div class="option-box">
                    <a href="grequest-quote.php">
                        <div class="icon"><span class="flaticon-test"></span></div>
                        <h4>Get A <br>Quote</h4>
                    </a>
                </div>
            </div>
            <!-- end the sidebar -->
            <div class="background-text">
                <div data-parallax='{"x": 100}'>
                    <div class="text-1">Belmaroc</div>
                    <div class="text-2">Belmaroc</div>
                </div>
            </div>
            <div class="swiper-container banner-slider">
                <div class="swiper-wrapper">
                    <!-- Slide Item -->
                    <div class="swiper-slide" style="background-image: url(img/cover1.png);">
                        <div class="content-outer">
                            <div class="content-box">
                                <div class="inner text-center">
                                    <h4>Competitve rates </h4>
                                    <h1>safety & reliable </h1>
                                    <div class="text">We denounce with righteous indignation & dislike beguiled</div>
                                    <div class="link-box">
                                        <a href="#" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i>More Details </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide Item -->
                    <div class="swiper-slide" style="background-image: url(img/cover3.jpg);">
                        <div class="content-outer">
                            <div class="content-box">
                                <div class="inner text-center">
                                    <h4>Your partner </h4>
                                    <h1>make easy distribution</h1>
                                    <div class="text">To take a trivial example which of us ever undertakes laborious.</div>
                                    <div class="link-box">
                                        <a href="#" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i>More Details </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide Item -->
                    <div class="swiper-slide" style="background-image: url(img/cover2.jpg);">
                        <div class="content-outer">
                            <div class="content-box">
                                <div class="inner text-center">
                                    <h4>It’s possible here</h4>
                                    <h1>smile in the morning to enjoy a pleasure.</h1>
                                    <div class="text">take agood breakfast</div>
                                    <div class="link-box">
                                        <a href="#" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i>More Details </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-slider-nav style-two">
                <div class="banner-slider-control banner-slider-button-prev"><span><i class="far fa-angle-left"></i>Prev</span></div>
                <div class="banner-slider-control banner-slider-button-next"><span>Next<i class="far fa-angle-right"></i></span> </div>
            </div>
        </section>
        <!-- End Bnner Section -->

        <!-- Services Section -->
        <!-- serivice from here -->
        <section class="services-section style-two ">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <div class="sub-title">Main Services</div>
                    <h2>Moving Your Products Across <br> All Borders</h2>
                </div>

            </div>
        </section>



        <!-- boostrap -->
        <!-- <style>
            .zoom {}

            .zoom:hover {
                transform: scale(1.02);
                /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
            } -->
        </style>

        <div class="container pb-5">
            <div class="row ">
                @foreach ($data2 as $blog)
                {{-- loop --}}
                <div class="col-md-4 zoom">

    

                    <div class="card-deck">
                     
                        <div class="card">
                            <img class="image" style="height:270px;" src=" {{'img/blog/'.$blog->image}} " alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><b><a href="{{url('show_blog/'.$blog->id)}}">{{$blog->title}} </a></b></h5>

                                <p class="card-text">
                                   {{ Str::substr($blog->descrip , 0, 199) }}

                                </p>
                            </div>
                            <div class="card-footer">

                                <div class="link"><a style="color: #0f0909;" href=" {{url('show_blog/'.$blog->id)}} " class="readmore-link"><i class="flaticon-up-arrow"></i>More Details</a></div>
                            </div>
                        </div> 
            
                    </div>
                   
              
                </div>
                <!-- 4 -->
                 {{-- loop --}}
                @endforeach

            </div>
        </div>





        <!-- About Section -->
        <section class="about-section" style="background-image: url(img/bg-10.jpg);">
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sec-title">
                            <div class="sub-title">Company</div>
                            <h2 style="color:#fff;">Providing<br> Reliable Services <br> Since 1998</h2>
                            <div class="text" style="color:#fff;">We Offer Import & Export assistance foreign businesses in transporting and selling their products in China, India and USA. We connect domestic companies to the international shipping services most suited for their business. </div>
                            <a href="about.php" class="readmore-link"><i class="flaticon-up-arrow"></i>More Details</a>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon-box wow fadeInUp" data-wow-duration="1500ms">
                                    <div class="icon"><span class="flaticon-package"></span></div>
                                    <div class="content">
                                        <span>
                                            <h4>Import & Export</h4>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="icon-box wow fadeInUp" data-wow-duration="1500ms">
                                    <div class="icon"><span class="flaticon-goal"></span></div>
                                    <div class="content">
                                        <span>
                                            <h4>Expand Business</h4>
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="icon-box wow fadeInUp" data-wow-duration="1700ms">
                                    <div class="icon"><span class="flaticon-binoculars"></span></div>
                                    <div class="content">
                                        <span>
                                            <h4>Experts Assitance</h4>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="icon-box wow fadeInUp" data-wow-duration="1900ms">
                                    <div class="icon"><span class="flaticon-gold"></span></div>
                                    <div class="content">
                                        <span>
                                            <h4>Home Delivery</h4>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="image wow fadeInRight" data-wow-duration="1500ms"><img src="" alt=""></div>
                    </div>
                </div>
            </div>
        </section>


        <section class="work-process-section">
            <div class="bg" style="background-image: url(img/cover4.png);"></div>
            <div class="auto-container">
                <div class="sec-title text-center light">
                    <div class="sub-title text-center">brand</div>
                    <h2> <br> </h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 work-process-block">
                        <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                            <div class="count">01</div>
                            <div class="icon"><span class="flaticon-shipping"></span></div>
                            <h4>Replenishment <br> & Picking</h4>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 work-process-block">
                        <div class="inner-box wow fadeInDwon" data-wow-duration="1500ms">
                            <div class="count">02</div>
                            <div class="icon"><span class="flaticon-warehouse"></span></div>
                            <h4>Warehousing <br> Operation</h4>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 work-process-block">
                        <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                            <div class="count">03</div>
                            <div class="icon"><span class="flaticon-packing-list"></span></div>
                            <h4>Packaging <br> & Distribution</h4>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 work-process-block">
                        <div class="inner-box wow fadeInDown" data-wow-duration="1500ms">
                            <div class="count">04</div>
                            <div class="icon"><span class="flaticon-delivery-1"></span></div>
                            <h4>Transportation <br> Process</h4>

                        </div>
                    </div>
                </div>
                <div class="bottom-text">Simplifying Your Freight & Logistics Needs With a Personal Approach. <a href="contact.php"> Get In Touch</a></div>
            </div>
        </section>


        <!-- Facts Section -->
        <section class="facts-section">
            <div class="auto-container">
                <div class="wrapper-box" style="background-image: url(img/cover7.png);">
                    <div class="shape">
                        <div class="shape-one"><img src="assets/images/resource/image-4.png" alt=""></div>
                        <div class="shape-two"><img src="assets/images/resource/image-5.png" alt=""></div>
                        <div class="shape-three"><img src="assets/images/resource/image-6.png" alt=""></div>
                        <div class="shape-four"><img src="assets/images/resource/image-7.png" alt=""></div>
                        <div class="shape-five"><img src="assets/images/resource/image-8.png" alt=""></div>
                    </div>
                    <div class="sec-title text-center light">
                        <div class="sub-title text-center">Interesting Facts</div>
                        <h2>The Numbers Speak for <br> themselves</h2>
                    </div>
                    <div class="outer-box">
                        <div class="row">
                            <!--Column-->
                            <div class="column counter-column col-md-6">
                                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon"><img src="assets/images/icons/icon-16.png" alt=""></div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="3000" data-stop="100">0</span>
                                        </div>
                                        <div class="text">Sucessfully Products</div>
                                    </div>
                                </div>
                            </div>
                            <!--Column-->
                            <div class="column counter-column col-md-6">
                                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon"><img src="assets/images/icons/icon-4.png" alt=""></div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="1000" data-stop="1200">0</span>
                                        </div>
                                        <div class="text">Expert Employee</div>
                                    </div>
                                </div>
                            </div>
                            <!--Column-->
                            <div class="column counter-column col-md-6">
                                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon"><img src="assets/images/icons/icon-14.png" alt=""></div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="3000" data-stop="98">0</span>
                                        </div>
                                        <div class="text">Satisfied Clients</div>
                                    </div>
                                </div>
                            </div>
                            <!--Column-->
                            <div class="column counter-column col-md-6">
                                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon"><img src="assets/images/icons/icon-3.png" alt=""></div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="3000" data-stop="5">0</span>
                                        </div>
                                        <div class="text">Branches Across</div>
                                    </div>
                                </div>
                            </div>
                            <!--Column-->
                            <div class="column counter-column col-md-6">
                                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon"><img src="assets/images/icons/icon-3.png" alt=""></div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="3000" data-stop="3879">0</span>
                                        </div>
                                        <div class="text">Tons of Goods</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials-section">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <div class="sub-title text-center">Testimonials</div>
                    <h2>1000+ Happy Customers Said</h2>
                </div>
                <div class="theme_carousel owl-theme owl-carousel">

                    <div class="testimonial-block">
                        <div class="inner-box">


                            <div class="author-thumb">
                                <img src="img/logo bel.png" class="image" alt="">
                                <div class="quote"><span class="flaticon-right-quote"></span>
                                </div>
                            </div>
                            <h4>barrda ali</h4>
                            <div class="designation"></div>
                            <div class="rating">
                                <div class="text">
                                    example
                                </div>
                                <span class="flaticon-star-1"></span>
                                <span class="flaticon-star-1"></span>
                                <span class="flaticon-star-1"></span>
                                <span class="flaticon-star-1"></span>
                                <span class="flaticon-star-1"></span>
                            </div>
                        </div>
                    </div>

                    <!-- 2 -->
                    <div class="testimonial-block">
                        <div class="inner-box">


                            <div class="author-thumb">
                                <img src="img/logo bel.png" class="image" alt="">
                                <div class="quote"><span class="flaticon-right-quote"></span>
                                </div>
                            </div>
                            <h4>banani smirasas</h4>
                            <div class="designation"></div>
                            <div class="rating">
                                <div class="text">
                                    ceo belmaroc
                                </div>
                                <span class="flaticon-star-1"></span>
                                <span class="flaticon-star-1"></span>
                                <span class="flaticon-star-1"></span>
                                <span class="flaticon-star-1"></span>
                                <span class="flaticon-star-1"></span>
                            </div>
                        </div>
                    </div>
                    <!-- 3 -->
                    <div class="testimonial-block">
                        <div class="inner-box">


                            <div class="author-thumb">
                                <img src="img/logo bel.png" class="image" alt="">
                                <div class="quote"><span class="flaticon-right-quote"></span>
                                </div>
                            </div>
                            <h4>exe</h4>
                            <div class="designation"></div>
                            <div class="rating">
                                <div class="text">
                                    exe
                                </div>
                                <span class="flaticon-star-1"></span>
                                <span class="flaticon-star-1"></span>
                                <span class="flaticon-star-1"></span>
                                <span class="flaticon-star-1"></span>
                                <span class="flaticon-star-1"></span>
                            </div>
                        </div>
                    </div>


                    <!-- End -->
                </div>
            </div>

        </section>
        <section class="branches-section">
            <div class="auto-container">
                <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "2" }, "1200":{ "items" : "4" }}}'>
                    <div class="single-info">
                        <h4><span class="flaticon-cursor"></span>Hoxton - HO</h4>
                        <div class="text"> Boat House, 152/21 City Road,
                            Hoxton, N1 6NG, UK.</div>
                        <div class="link">
                            <a href="#" class="readmore-link"><i class="flaticon-up-arrow"></i>View On Map</a>
                        </div>
                    </div>
                    <div class="single-info">
                        <h4><span class="flaticon-cursor"></span>Melbourne</h4>
                        <div class="text"> 46 Yarra Boulevard, 2nd Cross,
                            Victoria 3010, AUS.</div>
                        <div class="link">
                            <a href="#" class="readmore-link"><i class="flaticon-up-arrow"></i>View On Map</a>
                        </div>
                    </div>
                    <div class="single-info">
                        <h4><span class="flaticon-cursor"></span>Houston</h4>
                        <div class="text"> 3333 Raleigh Street, Houston,
                            TX 77021, USA.</div>
                        <div class="link">
                            <a href="#" class="readmore-link"><i class="flaticon-up-arrow"></i>View On Map</a>
                        </div>
                    </div>
                    <div class="single-info">
                        <h4><span class="flaticon-cursor"></span>New Delhi</h4>
                        <div class="text">11/8, Shantipath, Chanakyapuri,
                            New Delhi 110049, IND.</div>
                        <div class="link">
                            <a href="#" class="readmore-link"><i class="flaticon-up-arrow"></i>View On Map</a>
                        </div>
                    </div>
                    <div class="single-info">
                        <h4><span class="flaticon-cursor"></span>Hoxton - HO</h4>
                        <div class="text"> Boat House, 152/21 City Road,
                            Hoxton, N1 6NG, UK.</div>
                        <div class="link">
                            <a href="#" class="readmore-link"><i class="flaticon-up-arrow"></i>View On Map</a>
                        </div>
                    </div>
                    <div class="single-info">
                        <h4><span class="flaticon-cursor"></span>Melbourne</h4>
                        <div class="text"> 46 Yarra Boulevard, 2nd Cross,
                            Victoria 3010, AUS.</div>
                        <div class="link">
                            <a href="#" class="readmore-link"><i class="flaticon-up-arrow"></i>View On Map</a>
                        </div>
                    </div>
                    <div class="single-info">
                        <h4><span class="flaticon-cursor"></span>Houston</h4>
                        <div class="text"> 3333 Raleigh Street, Houston,
                            TX 77021, USA.</div>
                        <div class="link">
                            <a href="#" class="readmore-link"><i class="flaticon-up-arrow"></i>View On Map</a>
                        </div>
                    </div>
                    <div class="single-info">
                        <h4><span class="flaticon-cursor"></span>New Delhi</h4>
                        <div class="text">11/8, Shantipath, Chanakyapuri,
                            New Delhi 110049, IND.</div>
                        <div class="link">
                            <a href="#" class="readmore-link"><i class="flaticon-up-arrow"></i>View On Map</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- News Section -->






   @include('footer');

        <!--Scroll to top-->
        <div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-right-arrow-6"></span></div>

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-select.min.js"></script>
        <script src="assets/js/jquery.fancybox.js"></script>
        <script src="assets/js/isotope.js"></script>
        <script src="assets/js/owl.js"></script>
        <script src="assets/js/appear.js"></script>
        <script src="assets/js/wow.js"></script>
        <script src="assets/js/lazyload.js"></script>
        <script src="assets/js/scrollbar.js"></script>
        <script src="assets/js/TweenMax.min.js"></script>
        <script src="assets/js/swiper.min.js"></script>
        <script src="assets/js/jquery.polyglot.language.switcher.js"></script>
        <script src="assets/js/jquery.ajaxchimp.min.js"></script>
        <script src="assets/js/parallax-scroll.js"></script>

        <script src="assets/js/script.js"></script>


</body>

</html>