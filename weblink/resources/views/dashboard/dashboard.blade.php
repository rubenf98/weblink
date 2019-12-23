@extends('layout')

@section('content')
<div class="dashboard-container">
    @include('dashboard.nav')
    @include('users.create')
    <div id="dashboardContent" class="dashboardContent">
        @yield('dashboardContent')
    </div>
</div>

<script>
    // Get the modal
    var UserEditModal = document.getElementById("user-create");
    
    // Get the button that opens the modal
    var UserEditbtn = document.getElementById("user-create-button");
    
    // Get the <span> element that closes the modal
    var UserEditSpan = document.getElementsByClassName("close")[0];
    console.log(document.getElementsByClassName("close")[0]);
    // When the user clicks the button, open the modal 
    UserEditbtn.onclick = function() {
        UserEditModal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    UserEditSpan.onclick = function() {
        UserEditModal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == UserEditModal) {
            UserEditModal.style.display = "none";
        }
    }
</script>

@endsection