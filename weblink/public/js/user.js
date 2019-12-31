var editForm = $(".change-view-update");
var showData = $(".show-data");
var form = $(".update-form-data");

//JS Change between update and show data
editForm.click(function() {
    form.css("display", "block");
    showData.css("display", "none");
});

// JS update the height description
$("#update-description-input").on("keyup", function() {
    $(this).css("height", "auto");
    $(this).height(this.scrollHeight);
});

// JS Upload image change dinamic
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $("#prof-img-update-form").css(
                "background-image",
                "url(" + e.target.result + ")"
            );
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// Follow functions

function follow(id) {
    var div = $(".follow-div");
    $.ajax({
        type: "post",
        url: "/user/follow/" + id,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function(data) {
            $(".follow").css("display", "none");
            $(".unfollow").css("display", "block");
            var followers = $("#numberFollowers").text();
            followers = parseInt(followers);
            followers++;
            $("#numberFollowers").text(followers);
        },
        error: function(data) {
            if (data.status == 401) {
                alert("You need to login to be able to upvote");
                if (true) {
                    alert("teste");
                }
            }
        }
    });
}

function unfollow(id) {
    $.ajax({
        type: "post",
        url: "/user/unfollow/" + id,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function(data) {
            $(".follow").css("display", "block");
            $(".unfollow").css("display", "none");
            var followers = $("#numberFollowers").text();
            followers = parseInt(followers);
            followers--;
            $("#numberFollowers").text(followers);
        },
        error: function(data) {
            if (data.status == 401) {
                alert("You need to login to be able to upvote");
                if (true) {
                    alert("teste");
                }
            }
        }
    });
}
