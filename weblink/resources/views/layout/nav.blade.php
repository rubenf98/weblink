<style>
    .nav-bar .full-height {
        height: 100px;
        margin-bottom: 100px;
        border-bottom: .5px solid gray;
    }

    .nav-bar .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .nav-bar .position-ref {
        position: relative;
    }

    .nav-bar .top-right {
        position: absolute;
        right: 10px;
        top: 28px;
    }

    .nav-bar .top-center {
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
    }

    .nav-bar img {
        height: 90px;
    }

    .nav-bar .top-left {
        position: absolute;
        left: 10px;
        top: 28px;
    }

    .nav-bar .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 16px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }
</style>

<script>
    function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
        }
        
        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
</script>


<div class="flex-center position-ref full-height">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="/posts">Posts</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
    </div>
    @if (Route::has('login'))

    <div class="top-left links">

        <i onclick="openNav()" style="cursor:pointer" class="fas fa-bars fa-3x"></i>
    </div>
    <div class="top-center links">
        <a href="{{ url('/') }}"><img src="/logo.png" alt="" srcset=""></a>
    </div>
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}"><i class="fas fa-sign-in-alt fa-3x"></i></a>
        @else


        @if (Route::has('register'))
        <a href="{{ url('/home') }}"><i class="fas fa-user fa-3x"></i></a>
        @endif
        @endauth
    </div>
    @endif
</div>