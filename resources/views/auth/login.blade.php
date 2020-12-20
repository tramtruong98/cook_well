<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Icons font CSS-->
    <link href="{{ asset('front/form/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('front/form/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
        media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

   <!-- Vendor CSS-->
   <link href="{{ asset('front/form/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
   <link href="{{ asset('front/form/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

   <!-- Main CSS-->
   <link href="{{ asset('front/form/css/main.css') }}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Login</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group">
                            <input class="input--style-2 @error('email') is-invalid @enderror" type="text" placeholder="E-Mail Address" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="input-group">
                            <input class="input--style-2 @error('password') is-invalid @enderror" type="password" placeholder="Password" id="password" type="password"  name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                                <div class="float-left">
                                    <input class="form-check-input" style="width: 5%" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                      
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">{{ __('Submit') }}</button>
                        </div>
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                        @endif
                            <a class="btn btn-link" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <!-- Vendor JS-->
    
    <script src="{{ asset('front/form/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('front/form/vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('front/form/vendor/datepicker/daterangepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('front/form/js/global.js') }}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->