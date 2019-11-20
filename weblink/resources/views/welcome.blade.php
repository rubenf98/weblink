@extends('layout')



@section('content')
<div class="welcome-container">
    <div class="welcomeCard">
        <h1 class="titleWC">WebLink</h1>
        <p class="textWC">Lorem ipsum dolor sit amet consectetur adipisicing elit. o nam placeat rem.</p>
    </div>

    <div class="shortcutSection">
        <div id="coding_div">
            <img id="coding_img" src="/img_welcome/coding.svg" alt="">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius accusantium maxime distinctio nisi
                recusandae corporis similique fuga quisquam magnam aut quae natus quo, facilis sit nemo rerum ad cumque
                dolorem.</p>
        </div>
        <div id="idea_div">
            <img id="idea_img" src="/img_welcome/light.svg" alt="">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius accusantium maxime distinctio nisi
                recusandae corporis similique fuga quisquam magnam aut quae natus quo, facilis sit nemo rerum ad cumque
                dolorem.</p>
        </div>
        <div id="connection_div">
            <img id="connection_img" src="/img_welcome/connection.svg" alt="">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius accusantium maxime distinctio nisi
                recusandae corporis similique fuga quisquam magnam aut quae natus quo, facilis sit nemo rerum ad cumque
                dolorem.</p>
        </div>


    </div>
    <button id="startButton"> START NOW</button>
    <script src="/js/welcome.js"></script>

</div>
@endsection

</body>

</html>