<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Petals Webpage Title</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('maintain/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('maintain/css/fontawesome-all.css') }}" rel="stylesheet">
	<link href="{{ asset('maintain/css/styles.css') }}" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="{{ asset('maintain/images/favicon.png') }}">
</head>
<body>
    
    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <div class="countdown">
                            <span id="clock"></span>
                        </div> <!-- end of countdown -->

                        <h1>Project Coming Soon</h1>
                        <p class="p-large">We love to create dependable business solutions for companies of all sizes and any industry. Our goal is to improve accuracy and efficiency to reduce operational costs</p>
                        
                        <!-- Sign Up Form -->
                        <form id="signUpForm">
                            <div class="form-group">
                                <input type="email" class="form-control-input" id="semail" required>
                                <label class="label-control" for="semail">Email address</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">SIGN UP</button>
                            </div>
                        </form>
                        <!-- end of sign up form -->

                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->

        <!-- Social Links -->
        <div class="social-container">
            
            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="logo-text" href="index.html">Petals</a> -->

            <!-- Image Logo -->
            <a href="index.html"><img class="logo-image" src="{{ asset('maintain/images/logo.svg') }}" alt="alternative"></a> 
            
            <span class="fa-stack">
                <a href="#your-link">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                </a>
            </span>
            <span class="fa-stack">
                <a href="#your-link">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-twitter fa-stack-1x"></i>
                </a>
            </span>
            <span class="fa-stack">
                <a href="#your-link">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-pinterest-p fa-stack-1x"></i>
                </a>
            </span>
            <span class="fa-stack">
                <a href="#your-link">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-instagram fa-stack-1x"></i>
                </a>
            </span>
            <span class="fa-stack">
                <a href="#your-link">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-linkedin-in fa-stack-1x"></i>
                </a>
            </span>
        </div> <!-- end of social-container -->
        <!-- end of social links -->
        
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Scripts -->
    <script src="{{ asset('maintain/js/jquery.min.js"') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{ asset('maintain/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
    <script src="{{ asset('maintain/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ asset('maintain/js/jquery.countdown.min.js') }}"></script> <!-- The Final Countdown plugin for jQuery -->
    <script src="{{ asset('maintain/js/scripts.js') }}"></script> <!-- Custom scripts -->
</body>
</html>