<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Login | Clinic Manager</title>

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

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/css/unify/animate.css">
    <link rel="stylesheet" href="/css/unify/line-icons/line-icons.css">
    <link rel="stylesheet" href="/css/unify/font-awesome/css/font-awesome.min.css">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="/css/unify/page_log_reg_v2.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="/css/unify/custom.css">
</head>

<!--=== Content Part ===-->
<div class="container">
    <!--Reg Block-->
    <div class="reg-block">
        <div class="reg-block-header">
            <h2>Sign In</h2>
            <p>Don't Have Account? Click <a class="color-green" href="#">Sign Up</a> to registration.</p>
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger fade in">
                <ul style="list-style-type: none; padding-left: 5px;">
                    @foreach ($errors->all() as $error)
                        <li class="color-dark-red">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/auth/login">
            {!! csrf_field() !!}

            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input placeholder="Email" class="form-control" type="email" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input placeholder="Password"  type="password" class="form-control" id="password" name="password">
            </div>
            <hr>

            <div class="checkbox">
                <label>
                    <label><input type="checkbox" name="remember"> Remember Me</label>
                </label>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <button type="submit" class="btn-u btn-block">Log In</button>
                </div>
            </div>
        </form>
    </div>
    <!--End Reg Block-->
</div><!--/container-->
<!--=== End Content Part ===-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/js/bootstrap/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="/js/unify/back-to-top.js"></script>
<script type="text/javascript" src="/js/unify/backstretch/jquery.backstretch.min.js"></script>
<!-- JS Customization -->
<script type="text/javascript" src="/js/unify/custom.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="/js/unify/app.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
    });
</script>

<script type="text/javascript">
    $.backstretch([
        "/images/bg/19.jpg",
        "/images/bg/18.jpg",
    ], {
        fade: 1000,
        duration: 7000
    });
</script>
<!--[if lt IE 9]>
<script src="/js/unify/respond.js"></script>
<script src="/js/unify/html5shiv.js"></script>
<script src="/js/unify/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>
</html>

