<?php
include('../config/dbConfig.php')
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="discrption" content="ROBU Achievements" />

    <!--  Title -->
    <title>ROBU | Achievements</title>

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon" />
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon" />

    <!-- custom styles (optional) -->
    <link href="assets/css/plugins.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" rel="stylesheet">
    
</head>

<body onload="loader()" class="hamburger-menu dsn-effect-scroll dsn-ajax" data-dsn-mousemove="true">
    

    <div class="preloader">
        <div class="preloader-after"></div>
        <div class="preloader-before"></div>
        <div class="preloader-block">
            <div class="title">ROBU | Achievements</div>
            <div style="color: white; opacity: 50%" class="percent">0</div>
            <div class="loading">loading...</div>
        </div>
        <div class="preloader-bar">
            <div class="preloader-progress"></div>
        </div>
    </div>

    <main class="main-root">
        <audio autoplay id="audio">
            <source src="background.mp3" type="audio/mp3" >
        </audio>
        
        <div id="dsn-scrollbar">
            <div class="dsn-slider" data-dsn-header="project">
                <div class="dsn-root-slider" id="dsn-hero-parallax-img">
                    <div class="slide-inner">
                        <div class="swiper-wrapper">
                            <div class="slide-item swiper-slide">
                                <div class="slide-content">
                                    <div class="slide-content-inner">
                                        <div class="project-metas">
                                            <div class="project-meta-box project-work cat">
                                                <span>AUV</span>
                                            </div>
                                        </div>

                                        <div class="title-text-header">
                                            <div class="title-text-header-inner">
                                                <a class="effect-ajax" data-dsn-ajax="slider">
                                                    Duburi
                                                </a>
                                            </div>
                                        </div>

                                        <p>An Autonomous Under Water Vehicle made by some of the members of the club. This AUV participated in SAUVC-2018 and currently the team is working on the version 3.0 </p>

                                        

                                    </div>
                                </div>
                                <div class="image-container">
                                    <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_01.jpg"
                                        data-overlay="0">
                                        <img src="assets/img/project/PR_01.jpg" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="slide-item swiper-slide">
                                <div class="slide-content">
                                    <div class="slide-content-inner">
                                        <div class="project-metas">
                                            <div class="project-meta-box project-work cat">
                                                <span>Multi Rotor</span>
                                            </div>
                                        </div>

                                        <div class="title-text-header">
                                            <div class="title-text-header-inner">
                                                <a  class="effect-ajax" data-dsn-ajax="slider">
                                                    Quad Copter
                                                </a>
                                            </div>
                                        </div>

                                        <p>A 4 rotor copter developed by members of the club with the ability of Flying in autonomous mode following GPS Coordinates.</p>

                                        

                                    </div>
                                </div>
                                <div class="image-container">
                                    <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_02.jpg"
                                        data-overlay="4">
                                        <img src="assets/img/project/PR_02.jpg" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="slide-item swiper-slide">
                                <div class="slide-content">
                                    <div class="slide-content-inner">
                                        <div class="project-metas">
                                            <div class="project-meta-box project-work cat">
                                                <span>Lunar Bot</span>
                                            </div>
                                        </div>

                                        <div class="title-text-header">
                                            <div class="title-text-header-inner">
                                                <a class="effect-ajax" data-dsn-ajax="slider">
                                                    Chondrobot v2
                                                </a>
                                            </div>
                                        </div>

                                        <p> One of the earliest projects done by ROBU after the inauguration of the club. This team is the pioneer for us.
                                        </p>


                                    </div>
                                </div>
                                <div class="image-container">
                                    <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_03.jpg"
                                        data-overlay="0">
                                        <img src="assets/img/project/PR_03.jpg" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="slide-item swiper-slide">
                                <div class="slide-content">
                                    <div class="slide-content-inner">
                                        <div class="project-metas">
                                            <div class="project-meta-box project-work cat">
                                                <span>Election Automation</span>
                                            </div>
                                        </div>

                                        <div class="title-text-header">
                                            <div class="title-text-header-inner">
                                                <a class="effect-ajax" data-dsn-ajax="slider">
                                                    BRAC EVM
                                                </a>
                                            </div>
                                        </div>

                                        <p>An electronic voting machine focusing on the automation of National Election of Bangladesh. .</p>

                                       

                                    </div>
                                </div>

                                <div class="image-container">
                                    <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_04.jpg"
                                        data-overlay="2">
                                        <img src="assets/img/project/PR_04.jpg" alt="">
                                    </div>

                                </div>
                            </div>

                            <div class="slide-item swiper-slide">
                                <div class="slide-content">
                                    <div class="slide-content-inner">
                                        <div class="project-metas">
                                            <div class="project-meta-box project-work cat">
                                                <span>Sci Fi Creation</span>
                                            </div>
                                        </div>

                                        <div class="title-text-header">
                                            <div class="title-text-header-inner">
                                                <a class="effect-ajax" data-dsn-ajax="slider">
                                                    Wall - E
                                                </a>
                                            </div>
                                        </div>

                                        <p>Wall-E is the lead character of the movie "Wall-E". Its always an amazing experience to build a Sci-Fi Creation from movies</p>

                                        

                                    </div>
                                </div>
                                <div class="image-container">
                                    <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_05.jpg"
                                        data-overlay="2">
                                        <img src="assets/img/project/PR_05.jpg" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="slide-item swiper-slide">
                                <div class="slide-content">
                                    <div class="slide-content-inner">
                                        <div class="project-metas">
                                            <div class="project-meta-box project-work cat">
                                                <span>Sci Fi Creation</span>
                                            </div>
                                        </div>

                                        <div class="title-text-header">
                                            <div class="title-text-header-inner">
                                                <a class="effect-ajax" data-dsn-ajax="slider">
                                                    R2D2
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <p>R2D2 is a Robotic Role from Star Wars movie series. Yes the club had the fans from Star Wars movie series too. Guess what. This R2D2 have the autonomous ability like in movies too. </p>


                                        

                                    </div>
                                </div>
                                <div class="image-container">
                                    <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_06.jpg"
                                        data-overlay="5">
                                        <img src="assets/img/project/PR_06.jpg" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="slide-item swiper-slide">
                                <div class="slide-content">
                                    <div class="slide-content-inner">
                                        <div class="project-metas">
                                            <div class="project-meta-box project-work cat">
                                                <span>Social Interaction</span>
                                            </div>
                                        </div>

                                        <div class="title-text-header">
                                            <div class="title-text-header-inner">
                                                <a class="effect-ajax" data-dsn-ajax="slider">
                                                    E-Braille
                                                </a>
                                            </div>
                                        </div>

                                        <p>A social interaction device for the blind peoples made by some of the fantastic mind of the Robotics Club. </p>

                                        

                                    </div>
                                </div>
                                <div class="image-container">
                                    <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_07.jpg"
                                        data-overlay="2">
                                        <img src="assets/img/project/PR_07.jpg" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="slide-item swiper-slide">
                                <div class="slide-content">
                                    <div class="slide-content-inner">
                                        <div class="project-metas">
                                            <div class="project-meta-box project-work cat">
                                                <span>Battlebot</span>
                                            </div>
                                        </div>

                                        <div class="title-text-header">
                                            <div class="title-text-header-inner">
                                                <a class="effect-ajax" data-dsn-ajax="slider">
                                                    LaZy ShArk
                                                </a>
                                            </div>
                                        </div>

                                        <p>Deadliest battlebot with rotating hammer that won the most recent title from RUET Robotronics - 2019.</p>


                                    </div>
                                </div>
                                <div class="image-container">
                                    <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_08.jpg"
                                        data-overlay="0">
                                        <img src="assets/img/project/PR_08.jpg" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="slide-item swiper-slide">
                                <div class="slide-content">
                                    <div class="slide-content-inner">
                                        <div class="project-metas">
                                            <div class="project-meta-box project-work cat">
                                                <span>Competition Robot</span>
                                            </div>
                                        </div>

                                        <div class="title-text-header">
                                            <div class="title-text-header-inner">
                                                <a class="effect-ajax" data-dsn-ajax="slider">
                                                    LFR
                                                </a>
                                            </div>
                                        </div>

                                        <p>One of the fastest and most stable Line Follower Robot from ROBU also won the title for DUET Techfest-2018.</p>

                                        

                                    </div>
                                </div>
                                <div class="image-container">
                                    <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_09.jpg"
                                        data-overlay="4">
                                        <img src="assets/img/project/PR_09.jpg" alt="">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="dsn-slider-content"></div>


                <div class="nav-slider">
                    <div class="swiper-wrapper" role="navigation">
                        <div class="swiper-slide">
                            <div class="image-container">
                                <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_01.jpg"
                                    data-overlay="2">
                                </div>
                            </div>
                            <div class="content">
                                <p>01</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-container">
                                <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_02.jpg"
                                    data-overlay="2">
                                </div>
                            </div>
                            <div class="content">
                                <p>02</p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="image-container">
                                <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_03.jpg"
                                    data-overlay="2">
                                </div>
                            </div>
                            <div class="content">
                                <p>03</p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="image-container">
                                <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_04.jpg"
                                    data-overlay="2">
                                </div>
                            </div>
                            <div class="content">
                                <p>04</p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="image-container">
                                <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_05.jpg"
                                    data-overlay="2">
                                </div>
                            </div>
                            <div class="content">
                                <p>05</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-container">
                                <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_06.jpg"
                                    data-overlay="2">
                                </div>
                            </div>
                            <div class="content">
                                <p>06</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-container">
                                <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_07.jpg"
                                    data-overlay="2">
                                </div>
                            </div>
                            <div class="content">
                                <p>07</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-container">
                                <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_08.jpg"
                                    data-overlay="2">
                                </div>
                            </div>
                            <div class="content">
                                <p>08</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-container">
                                <div class="image-bg cover-bg" data-image-src="assets/img/project/PR_09.jpg"
                                    data-overlay="2">
                                </div>
                            </div>
                            <div class="content">
                                <p>09</p>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="footer-slid" id="descover-holder">
                    <div class="main-social">
                        <div class="social-icon">
                            <div class="social-btn">
                                <div class="svg-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.3 23.2">
                                        <path
                                            d="M19.4 15.5c-1.2 0-2.4.6-3.1 1.7L7.8 12v-.7l8.5-5.1c.7 1 1.9 1.6 3.1 1.6 2.1 0 3.9-1.7 3.9-3.9S21.6 0 19.4 0s-3.9 1.7-3.9 3.9v.4L7 9.3c-1.3-1.7-3.7-2-5.4-.8s-2.1 3.7-.8 5.4c.7 1 1.9 1.6 3.1 1.6s2.4-.6 3.1-1.6l8.5 5v.4c0 2.1 1.7 3.9 3.9 3.9s3.9-1.7 3.9-3.9c0-2.1-1.7-3.8-3.9-3.8zm0-13.6c1.1 0 1.9.9 1.9 1.9s-.9 1.9-1.9 1.9-1.9-.7-1.9-1.8.8-2 1.9-2zM3.9 13.6c-1.1 0-1.9-.9-1.9-1.9s.9-1.9 1.9-1.9 1.9.9 1.9 1.9-.8 1.9-1.9 1.9zm15.5 7.8c-1.1 0-1.9-.9-1.9-1.9s.9-1.9 1.9-1.9 1.9.9 1.9 1.9-.8 1.8-1.9 1.9z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <ul class="social-network">
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="control-num">
                        <span class="sup active">01</span>
                    </div>
                    <div class="control-nav">
                        <div class="prev-container" data-dsn="parallax">
                            <svg viewBox="0 0 40 40">
                                <path class="path circle" d="M20,2A18,18,0,1,1,2,20,18,18,0,0,1,20,2"></path>
                                <polyline class="path" points="14.6 17.45 20 22.85 25.4 17.45"></polyline>
                            </svg>
                        </div>

                        <div class="next-container" data-dsn="parallax">
                            <svg viewBox="0 0 40 40">
                                <path class="path circle" d="M20,2A18,18,0,1,1,2,20,18,18,0,0,1,20,2"></path>
                                <polyline class="path" points="14.6 17.45 20 22.85 25.4 17.45"></polyline>
                            </svg>
                        </div>
                    </div>
                </section>

            </div>
            
            <style>
                
                .customTitle{
                    transform: translate(-450px, 0px)
                }
                
                    .customTranslate{
                        transform: translate(-800px, 0px)
                    }
                    @media only screen and (max-width: 600px) {
                        .customTranslate{
                        transform: translate(0px, 0px)
                    }
                        
                        .customTitle{
                    transform: translate(0px, 0px)
                }
                    }
                
                </style>
            
            <style>
                    .customImg{
                        height:auto;
                        width: 400px !important;
                    }
                
                </style>

            <div class="wrapper">
                
                <?php
                $sqlInner="SELECT * FROM achievement order by year DESC";
                $resultInner = mysqli_query($db, $sqlInner);
                $i=0;
                while($dataIn = mysqli_fetch_assoc($resultInner)){
                    if($i%2==0){
                ?>

                <section class="intro-about section-margin">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="intro-content-text">

                                    <h2 data-dsn-grid="move-section" data-dsn-move="-30" data-dsn-duration="100%"
                                        data-dsn-opacity="1.2" data-dsn-responsive="tablet">
                                        <?php echo $dataIn['title'] ?>
                                    </h2>

                                    <p data-dsn-animate="text"><?php echo $dataIn['details'] ?> </p>

                                    <h6 data-dsn-animate="text"><?php echo $dataIn['teamName'] ?></h6>
                                    <small data-dsn-animate="text"><?php echo $dataIn['type'] ?></small>

                                    <div class="exper">
                                        <div class="numb-ex">
                                            <span class="word" data-dsn-animate="text"><?php echo $dataIn['year'] ?></span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="background-mask">
                        <div  class="background-mask-bg"></div>
                        <div class="img-box">
                            <div style="height:450px" class="img-cent" data-dsn-grid="move-up">
                                <div  class="img-container">
                                    <img data-dsn-y="30%" src="../admin/assets/images/achievements/<?php echo $dataIn['fileSource'] ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <br>
                    <?php
                    }
                    else{
                        ?>
                
                <section class="intro-about section-margin">
                    
                    <div  class="background-mask customTranslate">
                        <div  class="background-mask-bg"></div>
                        <div class="img-box">
                            <div style="height:450px" class="img-cent" data-dsn-grid="move-up">
                                <div  class="img-container">
                                    <img data-dsn-y="30%" src="../admin/assets/images/achievements/<?php echo $dataIn['fileSource'] ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                            </div>
                            <div class="col-lg-4">
                                <div class="intro-content-text">

                                    <h2 class="customTitle" data-dsn-grid="move-section" data-dsn-move="-30" data-dsn-duration="100%"
                                        data-dsn-opacity="1.2" data-dsn-responsive="tablet">
                                        <?php echo $dataIn['title'] ?>
                                    </h2>

                                    <p data-dsn-animate="text"><?php echo $dataIn['details'] ?></p>

                                    <h6 data-dsn-animate="text"><?php echo $dataIn['teamName'] ?></h6>
                                    <small data-dsn-animate="text"><?php echo $dataIn['type'] ?></small>

                                    <div class="exper">
                                        <div class="numb-ex">
                                            <span class="word" data-dsn-animate="text"><?php echo $dataIn['year'] ?></span>
                                        </div>

                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </section>
                <br><br>
                
                <?php
                    }
                    ?>
                <div class="container">
                    <hr>
                
                </div>
                <?php
                    $i++;
                        }
                    ?>
                
                
                
                
                
                
                
                
                
<br><br><br>
                
                

                <section class="brand-client section-margin">
                    <div class="container">
                        <div class="one-title" data-dsn-animate="up">
                            <div class="title-sub-container">
                                <p class="title-sub">Robotics Workshop</p>
                            </div>
                            <h2 class="title-main">Project Outputs <br><small>From Basic Robotics Workshop</small></h2>
                        </div>

                        <div class="container">
                            
                            <div  class="row">
                                <div class="col-12 col-sm-4">
                                    
                                 <img class="customImg" src="assets/img/project/BR_01.jpg" alt="">
<br>
                                <div class="info">
                                    <div class="content">
                                        

                                        <div class="entry">
                                            <div>
                                                <h5>Home Automation</h5>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="col-12 col-sm-4">
                                 <img class="customImg" src="assets/img/project/BR_02.png" alt="">
<br><br>
                                <div class="info">
                                    <div class="content">
                                        

                                        <div class="entry">
                                            <div>
                                                <h5>Android Controlled Car</h5>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="col-12 col-sm-4">
                                 <img class="customImg" src="assets/img/project/BR_03.png" alt="">
<br><br>
                                    
                                    
                                    

                                <div class="info">
                                    <div class="content">
                                        

                                        <div class="entry">
                                            <div>
                                                <h5>Obstacle Avoiding Car</h5>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        
                                </div>
                                
                                
                                <div class="col-12 col-sm-4">
                                 <img class="customImg" src="assets/img/project/BR_04.jpg" alt="">
<br><br>
                                    
                                    
                                    

                                <div class="info">
                                    <div class="content">
                                        

                                        <div class="entry">
                                            <div>
                                                <h5>Line Follower Robot</h5>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        
                                </div>
                            
                                
                                <div class="col-12 col-sm-4">
                                 <img class="customImg" src="assets/img/project/BR_05.jpg" alt="">
<br><br>
                                    
                                    
                                    

                                <div class="info">
                                    <div class="content">
                                        

                                        <div class="entry">
                                            <div>
                                                <h5>Weather Station</h5>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                        
                                </div>
                            
                            </div>
                            
                            
                        </div>
                    </div>
                </section>

                <section class="contact-up section-margin section-padding">
                    <div class="container">
                        <div class="c-wapp">
                            <a class="effect-ajax">
                                <span style="font-size: 40px" class="hiring">
                                    Interested About Us ?
                                </span>
                                <span class="career">
                                    Click to find the current working panel !
                                </span>
                            </a>
                        </div>
                    </div>
                </section>

            </div>

            <footer>
                <div class="info">
                    <div class="contact-footer">
                        <a href="tel:010" class="phone image-zoom" data-dsn="parallax">+880 01967921324</a>
                        <a href="#" class="email image-zoom" data-dsn="parallax">info@robulab.org</a>
                    </div>
                    <div class="copyright-social">
                        <script type="text/javascript">
                          document.write(new Date().getFullYear());
                        </script> | Made with ❤ for ROBU by <a href="https://www.facebook.com/tuhin.mridha.5" class="font-weight-bold ml-1" target="_blank"><span style="font-weight: bold; font-size: 17px; color:navajowhite; opacity: 65%"> Tuhin Mridha </span></a>
                        <ul>
<!--                            <li class="image-zoom" data-dsn="parallax"><a href="https://www.instagram.com/mx_tuhin/" target="_blank">Instagram</a></li>-->
                            <li class="image-zoom" data-dsn="parallax"><a href="https://www.facebook.com/tuhin.mridha.5" target="_blank">Facebook</a></li>
                            <li class="image-zoom" data-dsn="parallax"><a href="https://www.linkedin.com/in/tuhin-m-66b015b8" target="_blank">Linkedin</a></li>
                            <li class="image-zoom" data-dsn="parallax"><a href="flickr.com/photos/mxtuhin" target="_blank">Flickr</a></li>
                            
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <!-- Wait Loader -->
    <div class="wait-loader">
        <div class="loader-inner">
            <div class="loader-circle">
                <div class="loader-layer"></div>
            </div>
        </div>
    </div>
    <!-- // Wait Loader -->


    <!-- cursor -->
    <div class="cursor">

        <div class="cursor-helper cursor-view">
            <span>VIEW</span>
        </div>

        <div class="cursor-helper cursor-close">
            <span>Close</span>
        </div>

        <div class="cursor-helper cursor-link"></div>
    </div>
    <!-- End cursor -->

    <!-- Optional JavaScript -->
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/dsn-grid.js"></script>
    <script src="assets/js/custom.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" rel="stylesheet">
    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.7/dist/sweetalert2.all.min.js"></script>
    <script>
        function loader(){
            Swal.fire({
              title: 'Play Background Audio?',
              text: "Click the Okay button to play audio!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Play!'
            }).then((result) => {
              if (result.value) {
                var audio = new Audio('background.mp3');
                audio.volume = 0.2;
                audio.play();
              }
            })
        }
    </script>
</body>

</html>