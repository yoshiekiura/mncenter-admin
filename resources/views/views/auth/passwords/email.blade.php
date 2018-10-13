<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>{{ Config::get('SITE_TITLE') }}</title>

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.css" />

    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/assets/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="/assets/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="/assets/vendor/modernizr/modernizr.js"></script>
    <script src="/assets/vendor/jquery/jquery.js"></script>
    <script src="/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>

</head>
<body style="background: cadetblue">
<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">
        <a href="/" class="logo pull-left">
            <img src="/assets/images/logo.png" height="54" alt="IMPREVO Admin" />
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Reset Password</h2>
            </div>
            <div class="panel-body">
                <div class="alert alert-info">
                    <p class="m-none text-weight-semibold h6">Enter your e-mail below and we will send you reset instructions!</p>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ url('/password/email') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group mb-none {{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <input type="email" placeholder="E-mail" class="form-control input-lg" name="email" value="{{ old('email') }}"/>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <span class="input-group-btn">
                              <button class="btn btn-primary btn-lg" type="submit">Reset!</button>
                          </span>
                        </div>
                    </div>

                    <p class="text-center mt-lg">Remembered? <a href="{{ Config::get('RELATIVE_URL') }}/signin">Sign In!</a></p>
                </form>
            </div>
        </div>

        <p class="text-center mt-md mb-md">Copyright &copy; 2016 <a href="http://imprevo.net">Imprevo.net</a> All rights reserved.</p>
    </div>
</section>
<!-- end: page -->

<!-- Vendor -->
<script src="/assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="/assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>
<script src="/assets/vendor/jquery-validation/jquery.validate.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="/assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="/assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="/assets/javascripts/theme.init.js"></script>
</body>
</html>