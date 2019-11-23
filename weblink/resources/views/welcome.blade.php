@extends('layout')



@section('content')
<div class="welcome-container">
    <div class="welcomeCard">
        <h1 class="titleWC">WebLink</h1>
        <p class="textWC">Where you can Share, Learn and get feedback </p>
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
    <button id="startButton"> START NOW</button>
    <script src="/js/welcome.js"></script>

</div>
@endsection

</body>

</html>