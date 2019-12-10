var editForm = $("#edit-profile-btn");
var showData = $(".about-show");
var form = $(".about-form");
var swap = true;
editForm.click(function() {
    if (swap) {
        console.log("form");
        form.css("display", "block");
        showData.css("display", "none");
        swap = false;
    } else {
        console.log("show");
        swap = true;
    }
});
