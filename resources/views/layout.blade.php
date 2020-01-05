<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="shortcut icon" href="{{{ asset('logo.png') }}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/2197e15cfe.js" crossorigin="anonymous"></script>
    <title>Web Link</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />

    <script data-ad-client="ca-pub-4573581097782687" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

</head>

<body>
    <div class="nav-bar">
        @include('layout.nav')
    </div>

    @if(Session::has('status'))
    <div id="alert" class="alert-container">

        <div class="alert alert-{{Session::get('status.class')}}">
            <img src="/images/icons/{{Session::get('status.class')}}.svg">
            <h1>{{ Session::get('status.title') }}</h1>
            <span> {{ Session::get('status.message') }}</span>
        </div>
    </div>

    @endif

    <div class="content">@yield('content')</div>

    @include('posts.create')
    

    @include('tagsSuggestions.create')

    <div class="footer">
        @include('layout.footer')
    </div>
</body>

</html>

<script src="/js/layout.js"></script>