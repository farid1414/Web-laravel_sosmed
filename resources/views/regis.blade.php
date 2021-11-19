<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset ('/bootstrap/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset ('/bootstrap/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset ('/bootstrap/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset ('/bootstrap/css/style.css')}}">

    <!-- Icon -->
    <link rel="shortcut icon" href="/img/icon.ico">
    <title>7 book</title>
</head>

<body>

    <nav class="navbar navbar-white bg-white">
        <a class="navbar-brand" href="#">
            <img src="/img/7.png" class="img-rounded" width="100%" height="30" alt="">
        </a>

        <form action="/postlogin" class="form-inline" method="post">
            {{csrf_field()}}
            <input class="form-control mr-sm-2" type="email" name="email" placeholder="Email">
            <input class="form-control mr-sm-2" type="password" name="password" placeholder="Password">
            <input type="submit" value="Login" class="btn btn-primary my-2 my-sm-0">
        </form>
    </nav>
    @if (session('gagal'))
    <div class="alert alert-danger" role="alert">
        {{session('gagal')}}
    </div>
    @endif
    @if (session('sukses'))
    <div class="alert alert-primary" role="alert">
        {{session('sukses')}}
    </div>
    @endif

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="/img/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Registrasi</h3>
                                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur
                                    adipisicing.</p>
                            </div>
                            <form action="/regis" method="post">
                                {{csrf_field()}}
                                <div class="form-group first">
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                        placeholder="first_name" value="{{ old ('first_name','') }}">
                                    @error('first_name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3 mb-4">
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                        placeholder="last_name" value="{{ old ('last_name','') }}">
                                    @error('last_name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3 mb-4">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="email"
                                        value="{{ old ('email','') }}">
                                    @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3 mb-4">
                                    <input type="date" class="form-control" name="tgl_lahir" id="date"
                                        placeholder="tgl_lahir" value="{{ old ('tgl_lahir','') }}">
                                    @error('date')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3 mb-4">
                                    <input type="password" class="form-control" id="password" placeholder="password"
                                        name="password">
                                    @error('password')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <input type="submit" value="Registrasi" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="{{asset ('/bootstrap/js_login/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset ('/bootstrap/js_login/popper.min.js')}}"></script>
    <script src="{{asset ('/bootstrap/js_login/bootstrap.min.js"></script>
    <script src="{{asset ('/bootstrap/js_login/main.js"></script>
</body>

</html>