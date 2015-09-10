<!-- resources/views/layouts/master.blade.php -->

<!DOCTYPE html>
<html lang="en">>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clinic Manager - @yield('title')</title>
    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/toastr/toastr.min.css" rel="stylesheet" type="text/css">
    <link href="/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css">
    <link href="/css/app/clinic.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="/js/angular/angular.min.js"></script>
</head>
<body>
<div class="container">
    <div class="nav">
        <ul style="list-style-type: none; padding-left: 0;">
            <li style="display: inline"><a href="/">Home</a></li>
            <li style="display: inline"><a href="/patient">Patients</a></li>
        </ul>
    </div>
    @yield('content')
</div>

<script type="text/javascript" src="/js/jquery/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap/bootstrap.min.js"></script>

<script type="text/javascript" src="/js/angular/ui-bootstrap-0.11.0.min.js"></script>

<script type="text/javascript" src="/js/datepicker/datepicker.js"></script>
<script type="text/javascript" src="/js/toastr/toastr.min.js"></script>
<script type="text/javascript" src="/js/app/app.js"></script>

@yield('javascript')

</body>
</html>

