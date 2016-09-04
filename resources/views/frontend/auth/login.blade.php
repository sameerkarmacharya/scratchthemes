@extends('frontend.layouts.app')
@section('content')
<body class="bg-blue">
    <div id="wrapper">
        <div id="login">
            <h1 class="theme-logo"><a href="index.html">Theme Bank</a></h1>
            <div class="account-wrap">
                <h3>Login</h3>
                <div class="account-form">
                    <form action="/user_login" method="post">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <input type="text" placeholder="Email" name="email" class="form-control" >
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            </div>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <input type="password" placeholder="Password" name="password" class="form-control">
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                            </div>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="login-wrap">
                            <button type="submit" class="btn btn-primary login-btn"><i class="fa fa-arrow-right"></i></button>
                        </div>
                        <div class="more-links">
                            <a href="{{ url('/password/reset') }}">Forgot Password</a> or
                            <a href="{{ url('/user_register') }}">Register</a>
                        </div>
                    </form>
                </div>
                <!-- End of account-form -->
            </div>
            <!-- End of account-wrap -->
            <div class="payment-method">
                Secure Payments by <img src="image/payment-methods.jpg" alt="Payment image">
            </div>
        </div>
        <!-- End of login -->
        <footer class="login-footer">
            <div class="container border-top-white">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <p>&copy; Copyright 2016. All right reserved.</p>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <p class="text-right">ThemeBank</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @endsection