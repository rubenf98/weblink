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
            <img src="/icons/{{Session::get('status.class')}}.svg">
            <h1>{{ Session::get('status.title') }}</h1>
            <span> {{ Session::get('status.message') }}</span>
        </div>
    </div>

    @endif

    <div class="content">@yield('content')

    </div>

    @include('posts.create')
    @include('tagsSuggestions.create')



    <div class="footer">
        @include('layout.footer')
    </div>
</body>

</html>

<script>
    setTimeout(function(){ $('#alert').delay(3000).fadeOut(1000); });   
</script>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";
        }
    }
</script>

<script>
    document.getElementById("files").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("preview-image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
    };
</script>

<script>
    $(document).ready(function(){
        $.ajax({ url: "/api/tags",
            context: document.body,
            success: function(data){
                data.data.forEach(function (arrayItem) {
                    $(document).ready(function () {
                        $(".chosen-select").chosen({width: "80%", no_results_text: "Oops, nothing found!", max_selected_options: 3});
                        $('.chosen-select').append("<option value='"+arrayItem.name+"'>"+arrayItem.name+"</option>");
                        $('.chosen-select').trigger("chosen:updated");
                    });
                });
            }
        });
    });
</script>

<script>
    // Get the modal
var tagModal = document.getElementById("tag-suggestion-modal");

// Get the button that opens the modal
var tagButton = document.getElementById("btn-suggest");

// Get the <span> element that closes the modal
var tagSpan = document.getElementsByClassName("closeSuggestion")[0];

// When the user clicks the button, open the modal 
tagButton.onclick = function () {
    tagModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
tagSpan.onclick = function () {
    tagModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == tagModal) {
        tagModal.style.display = "none";
    }
}
</script>