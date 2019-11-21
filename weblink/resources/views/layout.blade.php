<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="shortcut icon" href="{{{ asset('logo.png') }}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2197e15cfe.js" crossorigin="anonymous"></script>
    <title>Web Link</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="nav-bar">
        @include('layout.nav')
    </div>

    <div class="content">@yield('content')
        <div id="myBtn"><img src="/icons/plus.svg" class="fixedbutton"></div>


        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">

                <span class="close">&times;</span>
                <h1>Create your post</h1>
                <form action="/post" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input required class="form-input" type="text" name="title" placeholder="Name of your project">
                    <textarea required class="form-input" name="description"
                        placeholder="Small description of you project"></textarea>
                    <div class="form-double-input">
                        <div class="form-double-item">
                            <label for="url">
                                <p>Reference to project page</p>
                            </label>
                            <input class="form-input" type="text" name="url" placeholder="https://www.weblink.com">
                        </div>

                        <div class="form-double-item">
                            <label for="source">
                                <p>Reference to source code</p>
                            </label>
                            <input class="form-input" type="text" name="source" id=""
                                placeholder="https://bitbucket.org/kwajd/weblink">
                        </div>


                    </div>

                    <div class="center">
                        <label for="files" class="custom-file-input">
                            <i class="fa fa-cloud-upload"></i> Upload Image
                        </label>
                        <input class="file-input" id="files" type="file" name="image" />
                    </div>

                    <img id="preview-image" class="preview-image" />

                    <input class="submit-button" type="submit" value="post">
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        @include('layout.footer')
    </div>
</body>

</html>

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