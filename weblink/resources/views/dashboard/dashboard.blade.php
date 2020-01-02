@extends('layout')

@section('content')
<div class="dashboard-container">
    @include('dashboard.nav')

    @include('users.create')
    @include('users.edit')

    @include('tags.create')
    @include('tags.edit')

    <div id="dashboardContent" class="dashboardContent">
        @yield('dashboardContent')
    </div>
</div>

<script>
    var UserCreateModal = document.getElementById("user-create");
    var UserCreatebtn = document.getElementById("user-create-button");
    var UserCreateSpan = document.getElementsByClassName("close")[0];
    console.log(document.getElementsByClassName("close")[0]);

    UserCreatebtn.onclick = function() {
        UserCreateModal.style.display = "block";
    }

    UserCreateSpan.onclick = function() {
        UserCreateModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == UserCreateModal) {
            UserCreateModal.style.display = "none";
        }
    }
</script>

<script>
    var TagCreateModal = document.getElementById("tag-create");
    var TagCreatebtn = document.getElementById("tag-create-button");
    var TagCreateSpan = document.getElementsByClassName("closeTag")[0];
 
    TagCreatebtn.onclick = function() {
        TagCreateModal.style.display = "block";
    }
    
    TagCreateSpan.onclick = function() {
        TagCreateModal.style.display = "none";
    }
    
    window.onclick = function(event) {
        if (event.target == TagCreateModal) {
            TagCreateModal.style.display = "none";
        }
    }
</script>

<script>
    var TagEditModal = document.getElementById("tag-edit");
var TagEditbtn = document.getElementsByClassName("edit-tag-button");
var TagEditSpan = document.getElementsByClassName("closeTagEdit")[0];

for (let item of TagEditbtn) {
    item.onclick = function () {

        var tag_id = item.id.split(/[- ]+/).pop();

        $.ajax({
            url: "/api/tag/" + tag_id,
            context: document.body,
            success: function (data) {
                $('#tag-edit-name').val(data.data.name);
                $('#tag-edit-description').val(data.data.description);
                $('#preview-edit-image').attr("src", data.data.image);
                $('#tag-edit-form').attr('action', "/tag/" + tag_id);
            

                TagEditModal.style.display = "block";
            }
        });

        
    }
}

TagEditSpan.onclick = function () {
    TagEditModal.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == TagEditModal) {
        TagEditModal.style.display = "none";
    }
}


</script>


<script>
    var UserEditModal = document.getElementById("user-edit");
var UserEditbtn = document.getElementsByClassName("edit-user-button");
var UserEditSpan = document.getElementsByClassName("closeUserEdit")[0];

for (let item of UserEditbtn) {
    item.onclick = function () {
        var user_id = item.id.split(/[- ]+/).pop();

        $.ajax({
            url: "/api/user/" + user_id,
            context: document.body,
            success: function (data) {
                $('#user-edit-name').val(data.data.name);
                $('#user-edit-email').val(data.data.email);
                $('#user-edit-country').val(data.data.country);
                $('#user-edit-b_day').val(data.data.b_day);
                if (data.data.gender == 1) {
                    $("#user-edit-gender-male").prop("checked", true);
                } else {
                    $("#user-edit-gender-female").prop("checked", true);
                }
                if (data.data.role == "admin") {
                    $("#user-edit-role-admin").prop("checked", true);
                } else {
                    $("#user-edit-role-normal").prop("checked", true);
                }
               
                $('#user-edit-form').attr('action', "/user/" + user_id);
            

                UserEditModal.style.display = "block";  
            }
        });
        
    }
}

UserEditSpan.onclick = function () {
    UserEditModal.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == UserEditModal) {
        UserEditModal.style.display = "none";
    }
}


</script>



@endsection