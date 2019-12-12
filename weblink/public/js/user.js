/*
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
*/

$("#textarea").on("keyup", function() {
    $(this).css("height", "auto");
    $(this).height(this.scrollHeight);
});

var imgAdd = $("#img-form");
// editar foto live!
function change(input) {
    var image = document.getElementById("prof-img");
    image.src = URL.createObjectURL(input.target.files[0]);
    imgAdd.append(`<img src="/icons/check.svg" />`);
}
