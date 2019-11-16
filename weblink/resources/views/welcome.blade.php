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
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    

    <div class="nav-bar">
        @include('layout.nav')
    </div>
    
    <<!Isto não fica aqui, tens que criar uma route que retorna uma view que esteja este hmtl->
    <<!Criar view chamada homepage.blade.php->
    <<!Criar route para / que retorna essa view->
    <<!Mudar este código para essa route, como por exemplo em posts.index.blade.php->

    <div class="welcomeCard">
        <h1 class="titleWC">WebLink</h1>
        <p class="textWC">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero suscipit et ipsam eos doloribus sunt quia in voluptates deserunt velit omnis eius porro fuga, iusto nam placeat rem. Possimus, aliquam?</p>
    </div>
    <div class="content">@yield('content')
        
        <a href="#head"><img src="/icons/plus.svg" class="fixedbutton"></a>
    </div>
    <div class="footer">
        @include('layout.footer')
    </div>


</body>

</html>