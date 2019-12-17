var editForm = $(".change-view-update");
var showData = $(".show-data");
var form = $(".update-form-data");
var swap = true;

//JS Change between update and show data
editForm.click(function() {
    if (swap) {
        form.css("display", "block");
        showData.css("display", "none");
        swap = false;
        addLiveViewImg();
    } else {
        swap = true;
        form.css("display", "none");
        showData.css("display", "block");
    }
});

// JS update the height description
$("#textarea").on("keyup", function() {
    $(this).css("height", "auto");
    $(this).height(this.scrollHeight);
});

// JS Upload image change dinamic
function addLiveViewImg() {
    document.getElementById("files").onchange = function() {
        var reader = new FileReader();

        reader.onload = function(e) {
            // get loaded data and render thumbnail.

            document.getElementById("prof-img-update-form").src =
                e.target.result;
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };
}
