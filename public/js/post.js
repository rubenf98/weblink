function upvotePost() {
    var image = document.getElementById("upvote-post");
    var url = $(location).attr('href'), divisions = url.split("/"), post_id = divisions[divisions.length - 1];

    $.ajax({
        type: 'post',
        url: '/post/like/' + post_id,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

        success: function (data) {
            if (image.getAttribute('src') == "/icons/heart-filled.svg") {
                image.src = "/icons/heart-regular.svg";
                var value = parseInt(document.getElementById("upvote").innerHTML, 10) - 1;
                document.getElementById("upvote").innerHTML = value;
            }
            else {
                image.src = "/icons/heart-filled.svg";
                var value = parseInt(document.getElementById("upvote").innerHTML, 10) + 1;
                document.getElementById("upvote").innerHTML = value;
            }
        },
        error: function (data) {
            if (data.status == 401) {
                alert("You need to login to be able to upvote")
            }

        }
    });
}

function upvoteComment(comment_id) {
    var image = document.getElementById("upvote-arrow-" + comment_id);

    console.log(comment_id)

    $.ajax({
        type: 'post',
        url: '/comment/like/' + comment_id,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

        success: function (data) {
            if (image.getAttribute('src') == "/icons/circle-up.svg") {
                image.src = "/icons/circle-up-filled.svg";
                var value = parseInt(document.getElementById("comment-" + comment_id).innerHTML, 10) + 1;
                document.getElementById("comment-" + comment_id).innerHTML = value;
            }
            else {
                image.src = "/icons/circle-up.svg";
                var value = parseInt(document.getElementById("comment-" + comment_id).innerHTML, 10) - 1;
                document.getElementById("comment-" + comment_id).innerHTML = value;
            }
        },
        error: function (data) {
            if (data.status == 401) {
                alert("You need to login to be able to upvote")
            }

        }
    });
};