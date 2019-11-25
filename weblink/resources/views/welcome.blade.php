@extends('layout')



@section('content')
<div class="welcome-container">
    <div class="header-container">
        <div class="welcomeCard">
            <h1 class="titleWC">WebLink</h1>
            <p class="textWC">Where you can Share, Learn and get feedback </p>
            <div>
                <a href="/posts"> <button type="submit" id="posts-btn" class="intro-btn"> Posts </button> </a>
                @if (Auth::user()==null)
                <a href="/login"> <button type="submit" id="start-btn" class="intro-btn">Start Now</button> </a>
                @else
                <a href="/user/{{Auth::user()->id}}"> <button type="submit" id="start-btn"
                        class="intro-btn">Profile</button> </a>
                @endif

            </div>


        </div>
        <div class="welcomeImage">
            <img class="homepage-image" src="/homepage-image.svg" alt="" srcset="">
        </div>

    </div>

    <div class="shortcutSection">
        <div id="coding_div">
            <img id="coding_img" src="/img_welcome/coding.svg" alt="">
            <p>Share and Learn knowledge</p>
        </div>
        <div id="idea_div">
            <img id="idea_img" src="/img_welcome/light.svg" alt="">
            <p>Find new ideas and inspiration</p>
        </div>
        <div id="connection_div">
            <img id="connection_img" src="/img_welcome/connection.svg" alt="">
            <p>Interact with community</p>
        </div>
    </div>

    <div class="animated-board">
        <div class="animated-text">
            <ul class="animated-list">
                <li class="list-item " id="d-1">
                    <span class="fas fa-caret-down"> Posts</span>
                    <p style="display: block">WebLink allow you to post/view projects and gather feedback from the
                        community</p>
                </li>
                <li class="list-item" id="d-2">
                    <span class="fas fa-caret-right">Profile</span>
                    <p>Once you create an account on WebLink you can post projects and interact with the community</p>
                </li>
                <li class="list-item" id="d-3">
                    <span class="fas fa-caret-right">Learn</span>
                    <p>WebLink is not a simple project show, where you can learn with the others a share experiences</p>
                </li>
                <li class="list-item" id="d-4">
                    <span class="fas fa-caret-right">What we ask?</span>
                    <p>When we use something from WebLink please reference our web page, in that away we can grow up</p>
                </li>
            </ul>
        </div>

        <div class="animated-images">
            <img class="img-class" id="img-1" src="img_welcome/animated-list-img/post.svg" alt="">
            <img class="img-class" id="img-2" src="img_welcome/animated-list-img/profile.svg" alt="">
            <img class="img-class" id="img-3" src="img_welcome/animated-list-img/learn.svg" alt="">
            <img class="img-class" id="img-4" src="img_welcome/animated-list-img/grow.svg" alt="">
        </div>
    </div>

    <script src="/js/welcome.js"></script>

</div>
@endsection

</body>

</html>