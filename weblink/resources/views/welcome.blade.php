<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="shortcut icon" href="{{{ asset('logo.png') }}}">
    <script src="https://kit.fontawesome.com/2197e15cfe.js" crossorigin="anonymous"></script>
    <title>Web Link</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            transition: background-color .5s;
        }

        .fixedbutton {
            position: fixed;
            bottom: 3%;
            right: 3%;
            width: 50px;
            border-radius: 50%;
            background-image: linear-gradient(to bottom right, rgb(162, 23, 255), rgb(39, 77, 247));
            padding: 10px;
            z-index:1;
        }
    </style>
</head>

<body>
    <a href="#head"><img src="/icons/plus.svg" class="fixedbutton"></a>

    <div class="nav-bar">
        @include('layout.nav')
    </div>

    <div class="content">@yield('content')</div>

    <div class="footer">
        @include('layout.footer')
    </div>


</body>

</html>