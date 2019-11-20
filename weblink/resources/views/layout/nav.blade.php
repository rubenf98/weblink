<style>
    .nav-bar .full-height {
        height: 60px;
        box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .16);
        background-color: rgba(19, 17, 17, 0.39);
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
        right: 2%;
    }

    .nav-bar .top-center {
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
    }

    .nav-bar img {
        height: 60px;
    }

    .nav-bar .top-left {
        position: absolute;
        left: 2%;
    }

    .nav-bar .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.9);
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        border-right: 1px solid gray;
    }

    .nav-bar .sidenav a {
        text-decoration: none;
        color: white;
        text-align: center;
        font-size: 28px;
        display: block;
        transition: 0.3s;
        padding: 20px 0px;
        font-weight: 400;

    }

    .nav-bar .sidenav .page:hover {
        font-weight: bold;
    }

    .nav-bar .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
        .nav-bar .sidenav {
            padding-top: 15px;
        }

        .nav-bar .sidenav a {
            font-size: 18px;
        }
    }

    .nav-bar ul {
        list-style-type: none;
        padding-left: 0;
    }

    .nav-bar .icon {
        height: 35px;
    }
</style>

<script>
    function openNav() {
          document.getElementById("mySidenav").style.width = "300px";

        }
        
        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";

        }
</script>


<div class="flex-center position-ref full-height">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <ul>
            <li><a class="page" href="/posts">Posts</a></li>
            <li><a class="page" href="/about">About</a></li>
            <li><a class="page" href="/contact">Contact</a></li>
        </ul>
    </div>

    @if (Route::has('login'))
    <div class="top-left links">
        <img onclick="openNav()" style="cursor:pointer" class="icon" src="/icons/bars.svg">
    </div>

    <div class="top-center links">
        <a href="{{ url('/') }}"><img src="/logo.png"></a>
    </div>

    <div class="top-right links">
        @auth
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><img class="icon" src="/icons/logout.svg"></a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        @else

        @if (Route::has('register'))
        <a href="{{ url('/login') }}"><img class="icon" src="/icons/user.svg"></a>
        @endif

        @endauth
    </div>
    @endif
</div>