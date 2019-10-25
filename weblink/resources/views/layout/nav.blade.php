<style>
    .nav-bar .full-height {
        height: 80px;
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
        top: 18px;
    }

    .nav-bar .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
</style>


<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
        <a href="{{ url('/posts') }}">Posts</a>
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>


        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
    </div>
    @endif
</div>