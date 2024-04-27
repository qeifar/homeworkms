<!doctype html>
<html lang="en">
    @include('layouts.head')
    <body class="light ">
        <div class="wrapper vh-100">
            <div class="row align-items-center h-100">
                <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="{{ route('login') }}" method="POST">
                    @csrf
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                        <svg
                            version="1.1"
                            id="logo"
                            class="navbar-brand-img brand-md"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px"
                            y="0px"
                            viewbox="0 0 120 120"
                            xml:space="preserve">
                            <g>
                                <polygon class="st0" points="78,105 15,105 24,87 87,87 	"/>
                                <polygon class="st0" points="96,69 33,69 42,51 105,51 	"/>
                                <polygon class="st0" points="78,33 15,33 24,15 87,15 	"/>
                            </g>
                        </svg>
                    </a>
                    <h1 class="h6 mb-3">Sign in</h1>
                    <div class="form-group">
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input
                            type="email"
                            id="inputEmail"
                            class="form-control form-control-lg"
                            placeholder="Email address"
                            required=""
                            autofocus=""
                            name="email">
                        @error('email')
                        <span>
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input
                            type="password"
                            id="inputPassword"
                            class="form-control form-control-lg"
                            placeholder="Password"
                            name="password"
                            required="">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Log In </button>
                    <div>
                        <p>Does not have an account? <a href="{{ route('register') }}">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/simplebar.min.js"></script>
        <script src='js/daterangepicker.js'></script>
        <script src='js/jquery.stickOnScroll.js'></script>
        <script src="js/tinycolor-min.js"></script>
        <script src="js/config.js"></script>
        <script src="js/apps.js"></script>
    </body>
</html>
</body>
</html>