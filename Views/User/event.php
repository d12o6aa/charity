<?php

require_once '../../Controllers/NewsControllers.php';
require_once '../../Models/news.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}


$NewsControllers = new NewsControllers;

$news = $NewsControllers->getNews();


?>



<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Kind Heart Charity - News Listing</title>

        <!-- CSS FILES -->        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/templatemo-kind-heart-charity.css" rel="stylesheet">

        <!-- Bootstrap -->
        <!-- <link href="meetup/css/bootstrap.min.css" rel="stylesheet"> -->
        <link href="meetup/css/style.css" rel="stylesheet">
        <link href="meetup/css/themify-icons.css" rel="stylesheet">
        <!-- <link href='meetup/css/dosis-font.css' rel='stylesheet' type='text/css'> -->
<!--

TemplateMo 581 Kind Heart Charity

https://templatemo.com/tm-581-kind-heart-charity

-->
    </head>
    
    <body>

        <header class="site-header">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-8 col-12 d-flex flex-wrap">
                        <p class="d-flex me-4 mb-0">
                            <i class="bi-geo-alt me-2"></i>
                            Akershusstranda 20, 0150 Oslo, Norway
                        </p>

                        <p class="d-flex mb-0">
                            <i class="bi-envelope me-2"></i>

                            <a href="mailto:info@company.com">
                                info@company.com
                            </a>
                        </p>
                    </div>

                    <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
                        <ul class="social-icon">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-twitter"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-facebook"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-instagram"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-youtube"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-whatsapp"></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </header>

        <nav class="navbar navbar-expand-lg bg-light shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo.png" class="logo img-fluid" alt="">
                    <span>
                        Kind Heart Charity
                        <small>Non-profit Organization</small>
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link smoothscroll" href="index.php#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link smoothscroll" href="index.php#section_2">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link smoothscroll" href="index.php#section_3">Causes</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link smoothscroll" href="index.php#section_4">Volunteer</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link click-scroll dropdown-toggle" href="index.php#section_5" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">News</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item active" href="news.php">News Listing</a></li>

                                <li><a class="dropdown-item" href="news-detail.php">News Detail</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link smoothscroll" href="contact.php">Contact</a>
                        </li>

                        <li class="nav-item ms-3">
                            <a class="nav-link custom-btn custom-border-btn btn" href="donate.php">Donate</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>

            <section class="news-detail-header-section text-center">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">

                            <!-- <div class="row hero-header" id="home">
                                <div class="col-md-7">
                                    <img src="" class="logo">
                                    <h1>Attend the most awaited Conference of 2015</h1>
                                    <h3>to start you up with your business!</h3>
                                    <h4>20<sup>th</sup> to 22<sup>nd</sup>  October, 2015</h4>
                                    <a href="#" class="btn btn-lg btn-red">Buy Tickets Now <span class="ti-arrow-right"></span></a>

                                </div>
                                <div class="col-md-5 hidden-xs">
                                    <img src="img/rocket.png" class="rocket animated bounce">
                                </div>

                            </div> -->

                            
                    </div>
                </div>
            </section>
           
            <!-- php code -->
        <!-- <div class="center-content">
            <section class="news-section section-padding">
                <div class="container ">
                    <div class="row ">
                        <?php 
                            if (count($news) == 0)
                            {
                                echo "no available news";
                            }
                            else
                            {
                                foreach($news as $new)
                                { ?>
                                
                                    <div class="col-md-6 col-12 py-3">
                                        <div class="news-block">
                                            <div class="news-block-top">
                                                <a href="news-detail.php">
                                                    <img src="<?php echo $new["img"]?>" class="news-image img-fluid" alt="">
                                                </a>
                                                <div class="news-category-block">
                                                    <a href="#" class="category-block-link">
                                                        <?php echo $new["categories"] ?>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="news-block-info">
                                                <div class="d-flex mt-2">
                                                    <div class="news-block-date">
                                                        <p>
                                                            <i class="bi-calendar4 custom-icon me-1"></i>
                                                            <?php echo $new["date"] ?>
                                                        </p>
                                                    </div>

                                                    <div class="news-block-author mx-5">
                                                        <p>
                                                            <i class="bi-person custom-icon me-1"></i>
                                                            By Admin
                                                        </p>
                                                    </div>

                                                </div>

                                                <div class="news-block-title mb-2">
                                                    <h4><a href="news-detail.php" class="news-block-title-link"><?php echo $new["title"] ?></a></h4>
                                                </div>

                                                <div class="news-block-body">
                                                    <p><?php echo $new["newsDesc"] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>         
                            <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </section>
        </div> -->


    <div class="container">
        <!-- Start: Desc -->
        <div class="row me-row content-ct">
          <h2 class="row-title">Why This Event Is Super Cool?</h2>
          <div class="col-md-4 feature">
            <span class="ti-ticket"></span>
            <h3>Buy Early Bird Tickets</h3>
            <p>Super cool discounts if you purchase early bird tickets now. Limited tickets available with some awesome perks and goodies!</p>
          </div>
          <div class="col-md-4 feature">
            <span class="ti-microphone"></span>
            <h3>Expert Speakers</h3>
            <p>Best in class expert speakers who have extensive knowledge of the topic. All speakers are curated by the panel of experts.</p>
          </div>
          <div class="col-md-4 feature">
            <span class="ti-world"></span>
            <h3>People around the globe!</h3>
            <p>Meet the people attending this event around the globe. This will be the best opportunity to meet and greet people from your industry.</p>
          </div>
        </div>
        <!-- End: Desc -->

        <!-- Start: Speakers -->
        <div class="row me-row content-ct speaker" id="speakers">
          <h2 class="row-title">Meet the Speakers</h2>
          <div class="col-md-4 col-sm-6 feature">
            <img src="img/speaker-1.png" class="speaker-img">
            <h3>Simon Collins</h3>
            <p>Simon is designer and partner at Fictivekin and has worked in a variety of situations for bands, record labels, governments, polar explorers, and most other things...</p>
            <ul class="speaker-social">
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-6 feature">
            <img src="img/speaker-2.png" class="speaker-img">
            <h3>Stephanie Troeth</h3>
            <p>Stephie is a user experience researcher and designer. In over 15 years of working on the web, she has worn many hats, including a product lead for a tech startup in publishing...</p>
            <ul class="speaker-social">
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-6 feature">
            <img src="img/speaker-3.png" class="speaker-img">
            <h3>Harry Roberts</h3>
            <p>Harry is a freelance designer, developer, writer, speaker and front-end architect from the UK, previously working as Senior UI Developer for Sky. He Tweets at...</p>
            <ul class="speaker-social">
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-6 feature">
            <img src="img/speaker-4.png" class="speaker-img">
            <h3>Geri Coady</h3>
            <p>Harry is a freelance designer, developer, writer, speaker and front-end architect from the UK, previously working as Senior UI Developer for Sky. He Tweets at...</p>
            <ul class="speaker-social">
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-6 feature">
            <img src="img/speaker-5.png" class="speaker-img">
            <h3>Andy Budd</h3>
            <p>Harry is a freelance designer, developer, writer, speaker and front-end architect from the UK, previously working as Senior UI Developer for Sky. He Tweets at...</p>
            <ul class="speaker-social">
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-6 feature">
            <img src="img/speaker-6.png" class="speaker-img">
            <h3>Christian Lauke</h3>
            <p>Harry is a freelance designer, developer, writer, speaker and front-end architect from the UK, previously working as Senior UI Developer for Sky. He Tweets at...</p>
            <ul class="speaker-social">
              <li><a href="#"><span class="ti-facebook"></span></a></li>
              <li><a href="#"><span class="ti-twitter-alt"></span></a></li>
              <li><a href="#"><span class="ti-linkedin"></span></a></li>
            </ul>
          </div>
        </div>
        <!-- End: Speakers -->
    </div>
         
                   
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-12 mb-4">
                        <img src="images/logo.png" class="logo img-fluid" alt="">
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <h5 class="site-footer-title mb-3">Quick Links</h5>

                        <ul class="footer-menu">
                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Our Story</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Newsroom</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Causes</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Become a volunteer</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Partner with us</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mx-auto">
                        <h5 class="site-footer-title mb-3">Contact Infomation</h5>

                        <p class="text-white d-flex mb-2">
                            <i class="bi-telephone me-2"></i>

                            <a href="tel: 120-240-9600" class="site-footer-link">
                                120-240-9600
                            </a>
                        </p>

                        <p class="text-white d-flex">
                            <i class="bi-envelope me-2"></i>

                            <a href="mailto:info@yourgmail.com" class="site-footer-link">
                                donate@charity.org
                            </a>
                        </p>

                        <p class="text-white d-flex mt-3">
                            <i class="bi-geo-alt me-2"></i>
                            Akershusstranda 20, 0150 Oslo, Norway
                        </p>

                        <a href="#" class="custom-btn btn mt-3">Get Direction</a>
                    </div>
                </div>
            </div>

            <div class="site-footer-bottom">
                <div class="container">
                    <div class="row">

                        <!-- <div class="col-lg-6 col-md-7 col-12">
                            <p class="copyright-text mb-0">Copyright © 2036 <a href="#">Kind Heart</a> Charity Org.
                        	Design: <a href="https://templatemo.com" target="_blank">TemplateMo</a></p>
                        </div> -->
                        
                        <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-center align-items-center mx-auto">
                            <ul class="social-icon">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-facebook"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-instagram"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-linkedin"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="https://youtube.com/templatemo" class="social-icon-link bi-youtube"></a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>


        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="meetup/js/bootstrap.min.js"></script>
        <script src="meetup/js/jquery.easing.min.js"></script>
        <script src="meetup/js/scrolling-nav.js"></script>
        <script src="meetup/js/validator.js"></script>

    </body>
</html>