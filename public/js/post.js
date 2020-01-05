function upvotePost() {
    var image = document.getElementById("upvote-post");
    var url = $(location).attr('href'), divisions = url.split("/"), post_id = divisions[divisions.length - 1];

    $.ajax({
        type: 'post',
        url: '/post/like/' + post_id,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

        success: function (data) {
            if (image.getAttribute('src') == "/images/icons/heart-filled.svg") {
                image.src = "/images/icons/heart-regular.svg";
                var value = parseInt(document.getElementById("upvote").innerHTML, 10) - 1;
                document.getElementById("upvote").innerHTML = value;
            }
            else {
                image.src = "/images/icons/heart-filled.svg";
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
            if (image.getAttribute('src') == "/images/icons/circle-up.svg") {
                image.src = "/images/icons/circle-up-filled.svg";
                var value = parseInt(document.getElementById("comment-" + comment_id).innerHTML, 10) + 1;
                document.getElementById("comment-" + comment_id).innerHTML = value;
            }
            else {
                image.src = "/images/icons/circle-up.svg";
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

//-----------------------------------------------Modal for updating a post
var PostEditModal = document.getElementById("post-edit");
var PostEditbtn = document.getElementsByClassName("edit-post-button");
var PostEditSpan = document.getElementsByClassName("closePostEdit")[0];
console.log(PostEditbtn)

for (let item of PostEditbtn) {
    item.onclick = function () {
        var post_id = item.id.split(/[- ]+/).pop();
        $.ajax({
            url: "/api/post/" + post_id,
            context: document.body,
            success: function (data) {
                $('#post-edit-title').val(data.data.title);
                $('#post-edit-description').val(data.data.description);
                $('#post-edit-source').val(data.data.source);
                $('#post-edit-url').val(data.data.url);
                var elements = [];
                data.data.tags.forEach(tag => {
                    elements.push(tag.name);
                });
                $('#post-edit-tag').val(elements);
                $('#post-edit-tag').trigger("chosen:updated");
                
                $('#post-edit-form').attr('action', "/post/" + post_id);

                PostEditModal.style.display = "block";
            }
        });
    }
}
PostEditSpan.onclick = function () {
    PostEditModal.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == PostEditModal) {
        PostEditModal.style.display = "none";
    }
}
//-----------------------------------------------