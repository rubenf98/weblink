$(".header-item").click(function () {

    $(this).css("background-color", "rgb(141, 8, 230)");
    $(this).css("color", "rgb(255, 255, 255)");
    $(this).css("border-top-left-radius", "16px");
    $(this).css("border-top-right-radius", "16px");

    if ($(this)[0].id == "h-2") {
        document.location.href = "/dashboard/users";
    }
    if ($(this)[0].id == "h-3") {
        document.location.href = "/dashboard/tags";
    }
    if ($(this)[0].id == "h-4") {
        document.location.href = "/dashboard/suggestions";
    }
});

//-----------------------------------------------Modal for creating a user
var UserCreateModal = document.getElementById("user-create");
var UserCreatebtn = document.getElementById("user-create-button");
var UserCreateSpan = document.getElementsByClassName("close")[0];

UserCreatebtn.onclick = function () {
    UserCreateModal.style.display = "block";
}
UserCreateSpan.onclick = function () {
    UserCreateModal.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == UserCreateModal) {
        UserCreateModal.style.display = "none";
    }
}
//-----------------------------------------------

//-----------------------------------------------Modal for creating a tag
var TagCreateModal = document.getElementById("tag-create");
var TagCreatebtn = document.getElementById("tag-create-button");
var TagCreateSpan = document.getElementsByClassName("closeTag")[0];

TagCreatebtn.onclick = function () {
    TagCreateModal.style.display = "block";
}
TagCreateSpan.onclick = function () {
    TagCreateModal.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == TagCreateModal) {
        TagCreateModal.style.display = "none";
    }
}
//-----------------------------------------------


//-----------------------------------------------Modal for updating a tag
var TagEditModal = document.getElementById("tag-edit");
var TagEditbtn = document.getElementsByClassName("edit-tag-button");
var TagEditSpan = document.getElementsByClassName("closeTagEdit")[0];

//If you click any of the edit buttons, the same form is always opened but populated differently
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
//-----------------------------------------------

//-----------------------------------------------Modal for updating a user
var UserEditModal = document.getElementById("user-edit");
var UserEditbtn = document.getElementsByClassName("edit-user-button");
var UserEditSpan = document.getElementsByClassName("closeUserEdit")[0];

//If you click any of the edit buttons, the same form is always opened but populated differently
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
                $('#user-edit-form').attr('action', "/user/" + user_id);

                if (data.data.gender == 1) $("#user-edit-gender-male").prop("checked", true);
                else $("#user-edit-gender-female").prop("checked", true);

                if (data.data.role == "admin") $("#user-edit-role-admin").prop("checked", true);
                else $("#user-edit-role-normal").prop("checked", true);

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
//-----------------------------------------------