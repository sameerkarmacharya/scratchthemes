@extends('frontend.layouts.app')
@section('content')
<body class="bg-blue">
  <div id="wrapper">
    <div id="login">
      <h1 class="theme-logo"><a href="index.html">Theme Bank</a></h1>
      <div class="account-wrap">
        <h3>Create Account</h3>
        <div class="account-form">
          <form action="{{ url('/user_register') }}" method="post">
             {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <div class="input-group">
                <input type="text" placeholder="Name" name="name" class="form-control" value="{{ old('name') }}">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
              </div>
               @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
               @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <div class="input-group">
                <input type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}">
                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
              </div>
                  @if ($errors->has('email'))
                     <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                     </span>
                   @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="input-group">
                <input type="password" placeholder="Password" class="form-control" name="password">
                <div class="input-group-addon"><i class="fa fa-key"></i></div>
              </div>
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <div class="input-group">
                <input type="password" placeholder="Confirm password" name="password_confirmation" class="form-control">
                <div class="input-group-addon"><i class="fa fa-key"></i></div>
              </div>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
            <div class="login-wrap">
              <button type="submit" class="btn btn-primary login-btn"><i class="fa fa-arrow-right"></i></button>
            </div>
            <div class="more-links">
              Already have an account? <a href="/login">Login</a>
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

