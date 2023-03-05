<!doctype html>
<html lang="en">

<head>
    <title>Login | Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('images/logo/Favicons/favicon-60x60.png') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('loginAdmin/css/style.css') }}">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            {{-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Admin Login</h2>
				</div>
			</div> --}}
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(../images/bg-admin-login.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Admin Login</h3>
                                </div>
                            </div>
                            <form class="signin-form" method="POST" action="{{ route('admin.login.submit') }}">
                                {{ csrf_field() }}
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control @if($errors->has('email')){{'border-danger'}}@endif" id="email" name="email"
                                        value="{{ old('email') }}"  autofocus>
                                    <label class="form-control-placeholder" for="username">Username</label>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control @if($errors->has('password')){{'border-danger'}}@endif">
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" 
                                        @if($errors->has('password')){{"style=top:30%"}}@endif
                                    ></span>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                @if ($errors->has('loginfail'))
                                    <div class="text-danger text-center">{{ $errors->first('loginfail') }}</div>
                                @endif
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                        In</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('loginAdmin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('loginAdmin/js/popper.js') }}"></script>
    <script src="{{ asset('loginAdmin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('loginAdmin/js/main.js') }}"></script>

</body>

</html>
