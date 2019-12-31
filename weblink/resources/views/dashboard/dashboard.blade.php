@extends('layout')

@section('content')
<div class="dashboard-container">
    @include('dashboard.nav')
    @include('users.create')
    @include('tags.create')
    @include('tags.edit')
    <div id="dashboardContent" class="dashboardContent">
        @yield('dashboardContent')
    </div>
</div>

<script>
    var UserEditModal = document.getElementById("user-create");
    var UserEditbtn = document.getElementById("user-create-button");
    var UserEditSpan = document.getElementsByClassName("close")[0];
    console.log(document.getElementsByClassName("close")[0]);

    UserEditbtn.onclick = function() {
        UserEditModal.style.display = "block";
    }

    UserEditSpan.onclick = function() {
        UserEditModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == UserEditModal) {
            UserEditModal.style.display = "none";
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
var TagEditbtn = document.getElementsByClassName("edit-button");
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
                console.log($('#tag-edit-form'))
            

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



@endsection