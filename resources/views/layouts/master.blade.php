<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset ('/bootstrap/css/bootstrap.css')}}">
    <!-- Font Awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Icon -->
    <link rel="shortcut icon" href="/img/icon.ico">
    <title>@yield('title')</title>
</head>
<style>
body {
    background-color: rgb(211, 211, 211, 0.3);
}
</style>

<body>
    <div class="container-fluid">
        <!-- navbar untuk brand logo  -->
        @include('layouts.navbar')

        <!-- KONTEN -->
        <div class="row mt-3 ">
            <div class="col-3 ">
                <div class="list-group  list-group-flush position-fixed">
                    <a href="#" class="list-group-item list-group-item-action bg-transparent "
                        style="text-decoration:none;"><img
                            src="{{asset ('img/profil/' . auth()->user()->profil->foto)}}" width="30px;" alt="">
                        {{auth()->user()->name}}</a>
                    <a href="/editpost/{{auth()->user()->id}}"
                        class="list-group-item list-group-item-action bg-transparent">Postingan Saya</a>
                </div>
            </div>
            <div class="col-7">
                <!-- CARD -->
                @yield('content')
            </div>
            <div class="col-2">
                @yield('sidebar')
            </div>
        </div>
    </div>



    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    @stack('script')
</body>

</html>