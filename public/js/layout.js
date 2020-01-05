$(document).ready(function () {
    setTimeout(function () { $('#alert').delay(3000).fadeOut(1000); });

    //Fetch all tags to populate the select when creating a new post
    $.ajax({
        url: "/api/tags",
        context: document.body,
        success: function (data) {
            data.data.forEach(function (arrayItem) {

                $(".chosen-select").chosen({ width: "80%", no_results_text: "Oops, nothing found!", max_selected_options: 3 });
                $('.chosen-select').append("<option value='" + arrayItem.name + "'>" + arrayItem.name + "</option>");
                $('.chosen-select').trigger("chosen:updated");

            });
        }
    });
});

//Listener to give image preview a source
document.getElementById("files").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        document.getElementById("preview-image").src = e.target.result;
    };

    reader.readAsDataURL(this.files[0]);
};

//-----------------------------------------------Modal for creating a post
var PostCreateModal = document.getElementById("myModal");
var PostCreateButton = document.getElementById("myBtn");
var PostCreateSpan = document.getElementsByClassName("close")[0];

PostCreateButton.onclick = function () {
    PostCreateModal.style.display = "block";
}
PostCreateSpan.onclick = function () {
    PostCreateModal.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == PostCreateModal) {
        PostCreateModal.style.display = "none";
    }
}
//-----------------------------------------------

//-----------------------------------------------Modal for creating a suggestion
var tagModal = document.getElementById("tag-suggestion-modal");
var tagButton = document.getElementById("btn-suggest");
var tagSpan = document.getElementsByClassName("closeSuggestion")[0];


tagButton.onclick = function () {
    tagModal.style.display = "block";
}
tagSpan.onclick = function () {
    tagModal.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == tagModal) {
        tagModal.style.display = "none";
    }
}
//-----------------------------------------------






