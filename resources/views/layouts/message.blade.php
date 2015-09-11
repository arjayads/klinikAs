<!-- resources/views/layouts/message.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clinic Manager - @yield('title')</title>
    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/toastr/toastr.min.css" rel="stylesheet" type="text/css">
    <link href="/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/app/clinic.css" rel="stylesheet" type="text/css">

    @yield('css')
</head>
<body>
<div class="container">
    @include('layouts.nav')
    @yield('content')
</div>

@yield('javascript')

</body>
</html>

