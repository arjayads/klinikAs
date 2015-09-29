<!-- resources/views/layouts/home.blade.php -->

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Clinic Manager | @yield('title')</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- CSS Global Compulsory -->

    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/unify/style.css">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="/css/unify/headers/header-default.css">
    <link rel="stylesheet" href="/css/unify/footers/footer-v1.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/css/unify/animate.css">
    <link rel="stylesheet" href="/css/unify/line-icons/line-icons.css">
    <link rel="stylesheet" href="/css/unify/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/plugins/owl-carousel/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/plugins/revolution-slider/rs-plugin/css/settings.css" type="text/css" media="screen">
    <!--[if lt IE 9]><link rel="stylesheet" href="/plugins/revolution-slider/rs-plugin/css/settings-ie8.css" type="text/css" media="screen"><![endif]-->

    <!-- CSS Customization -->
    <link rel="stylesheet" href="/css/unify/custom.css">


    @yield('css')

    <script type="text/javascript" src="/js/angular/angular.min.js"></script>
</head>

<body class="boxed-layout container">
<div class="wrapper">
    <!--=== Header ===-->
    <div class="header">
        <div class="container">
            <!-- Logo -->
            <a class="logo" href="/">
                <img src="/images/logo1-default.png" alt="Logo">
            </a>
            <!-- End Logo -->
            <div class="topbar">
                <ul class="loginbar pull-right">
                    <li><a href="/auth/login">Sign-in</a></li>
                </ul>
            </div>
        </div><!--/end container-->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="no-sub-menu" href="/">Home</a>
                    </li>
                    <li>
                        <a class="no-sub-menu" href="#">Product summary</a>
                    </li>
                    <li class="">
                        <a class="no-sub-menu" href="#">Features</a>
                    </li>
                    <li class="">
                        <a class="no-sub-menu" href="#">Screen shots</a>
                    </li>
                </ul>
            </div><!--/end container-->
        </div><!--/navbar-collapse-->
    </div>
    <!--=== End Header ===-->

    <!--=== Content Part ===-->
    <div class="container content">
        @yield('content')
    </div>
    <!-- End Content Part -->

    <div class="footer-v1">
        @yield('footer')
    </div>
</div><!--/wrapper-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/js/bootstrap/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="/js/unify/back-to-top.js"></script>
<script type="text/javascript" src="/plugins/smoothScroll.js"></script>
<script type="text/javascript" src="/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!-- JS Customization -->
<script type="text/javascript" src="/js/unify/custom.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="/js/unify/app.js"></script>
<script type="text/javascript" src="/js/unify/owl-carousel.js"></script>
<script type="text/javascript" src="/js/unify/revolution-slider.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        OwlCarousel.initOwlCarousel();
        RevolutionSlider.initRSfullWidth();
    });
</script>

@yield('javascript')

<!--[if lt IE 9]>
<script src="/js/unify/respond.js"></script>
<script src="/js/unify/html5shiv.js"></script>
<script src="/js/unify/placeholder-IE-fixes.js"></script>
<![endif]-->


</body>
</html>

