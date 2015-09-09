<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/app/clinic.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="middle-box loginscreen">
    <h3 class="text-primary text-center">Awesome Clinic Manager</h3>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul style="list-style-type: none; padding-left: 5px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/auth/login">
        <fieldset>
            {!! csrf_field() !!}

            <div class="row">
                <div class="col-md-3">
                    <label for="email">Email</label>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="hoz-space"></div>
            <div class="row">
                <div class="col-md-3">
                    <label for="password">Password</label>
                </div>
                <div class="col-md-9">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>

            <div class="hoz-space"></div>
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-9">
                    <label><input type="checkbox" name="remember"> Remember Me</label>
                </div>
            </div>

            <div class="hoz-space"></div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>

<script type="text/javascript" src="/js/jquery/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap/bootstrap.min.js"></script>

</body>
</html>

