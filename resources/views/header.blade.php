
<header class="main-header header-style-one">

    <!-- Header Top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="inner-container">
                <div class="left-column">
                    <ul class="social-icon">
                        <li><a target="blank" href=" <!--{{$data->facebook}}  -->"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a target="blank" href=" {{$data->twitter}} "><i class="fab fa-twitter"></i></a></li>
                        <li><a target="blank" href="{{$data->instagram}}"><i class="fab fa-instagram"></i></a></li>
                        <li><a target="blank" href="{{$data->youtube}}"><i class="fab fa-youtube"></i></a></li>
                    </ul>

                </div>
                <div class="right-column">
                    <div class="location">
                        <span class="flaticon-cursor"></span>
                        <form action="#" class="location-switcher">
                            <select class="selectpicker">

                                <option value="4">Morocco</option>

                            </select>
                        </form>
                    </div>
                    <div class="phone-number"><i class="flaticon-calling"></i><a href="tel:">{{$data->phone}} </a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Upper -->
    <div class="header-upper">
        <div class="auto-container">
            <div class="inner-container">
                <!--Logo-->
                <div class="logo-box">
                    <div class="logo"><a href="home.php"><img src=" {{'img/sett/'.$data->logo}} " alt=""></a></div>
                </div>
                <div class="right-column">
                    <!--Nav Box-->
                    <div class="nav-outer">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><img src="assets/images/icons/icon-bar-2.png" alt=""></div>

                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation">
                                    <li class="dropdown"><a href=" {{route('home')}} ">Home</a></li>

                                    <li class="dropdown"><a href="{{route('calander')}}"><?php sleep(1); ?>Calendare</a>

                                    <li class="dropdown"><a href="{{route('about_page')}}">About Us</a></li>
                                    <li class="dropdown"><a href="contact">Contact Us</a></li>





                                    </li>


                                    </li>

                                    <div class="language">

                                        <form action="#" class="language-switcher">

                                        </form>
                                    </div>
                                </ul>
                            </div>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->

    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container">
                    <!--Logo-->
                    <div class="logo-box">
                        <div class="logo"><a href="home.html"><img src="img/logo bel.png" alt=""></a></div>
                    </div>
                    <div class="right-column">
                        <!--Nav Box-->
                        <div class="nav-outer">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><img src="assets/images/icons/icon-bar-2.png" alt=""></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                            </nav>
                        </div>
                        <div class="navbar-right-info">
                            <div class="sign-in"><a href="#"><i class="flaticon-delivery-man-1"></i>Call:+212633043400 </a></div>
                            <div class="language">
                                <!--<span class="icon"><img src="assets/images/resource/flags/de.png" alt=""></span> -->
                                <form action="#" class="language-switcher">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Sticky Menu -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-remove"></span></div>

        <nav class="menu-box">
            <div class="nav-logo"><a href="index.html"><img src="img/logo bel.png" alt="" title=""></a></div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <!--Social Links-->
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                </ul>
            </div>
        </nav>
    </div><!-- End Mobile Menu -->

    <div class="nav-overlay">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div>
</header>