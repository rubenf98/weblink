<script>
    function openNav() {
          document.getElementById("mySidenav").style.width = "300px";

        }
        
        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";

        }
</script>


<div class="full-height">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <ul>
            @auth
            @if (Auth::user()->role == 'admin')
            <li><a class="page" href="/dashboard/users">Dashboard</a></li>
            @endif
            @endauth
            @auth
            <li><a class="page" href="{{ url('/user/' . Auth::id()) }}">Profile</a></li>
            @endauth
            <li><a class="page" href="/posts">Posts</a></li>
            <li><a class="page" href="/tags">Topics</a></li>
            <li><a class="page" href="/about">About</a></li>
            <li><a class="page" href="/documentation">Documentation</a></li>
        </ul>
    </div>

    <div class="navbar-order">
        @if (Route::has('login'))
        <div>
            <img onclick="openNav()" style="cursor:pointer" class="icon" src={{asset("/icons/bars.svg")}}>
        </div>

        <div>
            <a href="{{ url('/') }}"><img class="logo" src="/logo.png"></a>
        </div>

        <div>
            @auth

            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><img class="icon" src="../icons/logout.svg"></a>



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


</div>