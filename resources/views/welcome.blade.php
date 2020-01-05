@extends('layout')

@section('content')
<div class="welcome-container">
    <div class="header-container">
        <div class="welcomeCard">
            <h1 class="titleWC">WebLink</h1>
            <p class="textWC">Where you can Share, Learn and get feedback </p>
            <div>
                <a href="/posts" id="posts-btn" class="intro-btn"> Posts</a>
                @if (Auth::user()==null)
                <a href="/login" id="start-btn" class="intro-btn"> Start Now </a>
                @else
                <a href="/user/{{Auth::user()->id}}" id="start-btn" class="intro-btn"> Profile</a>
                @endif

            </div>


        </div>
        <div class="welcomeImage">
            <img class="homepage-image" src="/homepage-image.svg" alt="" srcset="">
        </div>

    </div>

    <div class="shortcutSection">
        <div id="coding_div">
            <img id="coding_img" src="images/img_welcome/coding.svg" alt="">
            <p>Share and Learn knowledge</p>
        </div>
        <div id="idea_div">
            <img id="idea_img" src="images//img_welcome/light.svg" alt="">
            <p>Find new ideas and inspiration</p>
        </div>
        <div id="connection_div">
            <img id="connection_img" src="images//img_welcome/connection.svg" alt="">
            <p>Interact with community</p>
        </div>
    </div>

    <div class="animated-board">
        <div class="animated-text">
            <ul class="animated-list">
                <li class="list-item " id="d-1">
                    <span class="fas fa-caret-down"> Post your projects</span>
                    <p style="display: block">A simple, great experience with various features.</p>
                </li>
                <li class="list-item" id="d-2">
                    <span class="fas fa-caret-right"> Envolve with the community</span>
                    <p>Comment, like, follow and save your favorite projects.</p>
                </li>
                <li class="list-item" id="d-3">
                    <span class="fas fa-caret-right"> Knowledge Base</span>
                    <p>Turn your tribal knowledge into easy-to-find answers.</p>
                </li>
                <li class="list-item" id="d-4">
                    <span class="fas fa-caret-right"> Boost personal productivity</span>
                    <p>Write better. Think more clearly. Stay organized.
                    </p>
                </li>
            </ul>
        </div>

        <div class="animated-images">
            <img class="img-class" id="img-1" src="images/img_welcome/animated-list-img/post.svg" alt="">
            <img class="img-class" id="img-2" src="images/img_welcome/animated-list-img/profile.svg" alt="">
            <img class="img-class" id="img-3" src="images/img_welcome/animated-list-img/learn.svg" alt="">
            <img class="img-class" id="img-4" src="images/img_welcome/animated-list-img/grow.svg" alt="">
        </div>
    </div>

    <script src="/js/welcome.js"></script>

</div>
@endsection