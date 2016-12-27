<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app.name')}} Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{URL::to('plugins/adminlte-2.3.7')}}/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{URL::to('plugins/font-awesome-4.6.3')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::to('plugins/adminlte-2.3.7')}}/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="{{URL::to('plugins/adminlte-2.3.7')}}/plugins/iCheck/square/blue.css">
    <style>
        .links > a {
            color: #636b6f;
            padding-bottom: 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="links">
        <a href="{{URL::to('')}}">{{config('app.name')}}</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Please sign in before use</p>
        <form action="{{ url('/login') }}" method="post" role="form">
            {{ csrf_field() }}
            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        <i class="fa fa-btn fa-sign-in"></i>
                        Sign In
                    </button>
                </div>
            </div>
        </form>
        <a href="{{URL::to('register')}}" class="text-center">Register a new membership</a>
    </div>
</div>
<script src="{{URL::to('plugins/adminlte-2.3.7')}}/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="{{URL::to('plugins/adminlte-2.3.7')}}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{URL::to('plugins/adminlte-2.3.7')}}/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
