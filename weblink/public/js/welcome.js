var imageCoding = $("#coding_div");

imageCoding.mouseenter(function () {
    $("#coding_img").attr("src", "images/img_welcome/coding-hover.svg");
});

imageCoding.mouseleave(function () {
    $("#coding_img").attr("src", "images/img_welcome/coding.svg");
});

var imageIdea = $("#idea_div");

imageIdea.mouseenter(function () {
    $("#idea_img").attr("src", "images/img_welcome/light-hover.svg");
});

imageIdea.mouseleave(function () {
    $("#idea_img").attr("src", "images/img_welcome/light.svg");
});

var imageConnection = $("#connection_div");

imageConnection.mouseenter(function () {
    $("#connection_img").attr("src", "images/img_welcome/connection-hover.svg");
});

imageConnection.mouseleave(function () {
    $("#connection_img").attr("src", "images/img_welcome/connection.svg");
});

$(".list-item").click(function () {
    var item = $(".list-item");
    item.css("background-color", "rgb(63,62,84)");
    $(this).css("background-color", "rgb(141, 8, 230)");
    //Colocar todos com a seta para a direita e remover o que tem seta para baixo
    $(this)
        .find("span")
        .removeClass("fas fa-caret-down");
    item.find("span").addClass("fas fa-caret-right");
    //remover a seta para a direita no elemento que foi clicado
    $(this)
        .find("span")
        .removeClass("fas fa-caret-right");
    //adicionar a seta para baixo no elemento clicado
    $(this)
        .find("span")
        .addClass("fas fa-caret-down");
    //slide a todos up
    item.not(this)
        .find("p")
        .slideUp(100);
    var text = $(this).find("p");
    text.slideDown(100);

    img = $("#img-layer");

    if ($(this)[0].id == "d-1") {
        $(".img-class").hide();
        $("#img-1").show();
    }
    if ($(this)[0].id == "d-2") {
        $(".img-class").hide();
        $("#img-2").show();
    }
    if ($(this)[0].id == "d-3") {
        $(".img-class").hide();
        $("#img-3").show();
    }
    if ($(this)[0].id == "d-4") {
        $(".img-class").hide();
        $("#img-4").show();
    }
});

$(".tab-item").click(function () {
    var item = $(".tab-item");
    item.css("background-color", "transparent");
    item.css("color", "rgb(141, 8, 230)");

    $(this).css("background-color", "rgb(141, 8, 230)");
    $(this).css("color", "rgb(255, 255, 255)");
    $(this).css("border-top-left-radius", "16px");
    $(this).css("border-top-right-radius", "16px");

    if ($(this)[0].id == "t-1") {
        $(".doc-content").hide();
        $("#doc-content-1").show();
    }
    if ($(this)[0].id == "t-2") {
        $(".doc-content").hide();
        $("#doc-content-2").show();
    }
    if ($(this)[0].id == "t-3") {
        $(".doc-content").hide();
        $("#doc-content-3").show();
    }
    if ($(this)[0].id == "t-4") {
        $(".doc-content").hide();
        $("#doc-content-4").show();
    }
});

$(".header-item").click(function () {
    var header = $(".header-item");
    header.css("background-color", "transparent");
    header.css("color", "rgb(141, 8, 230)");

    $(this).css("background-color", "rgb(141, 8, 230)");
    $(this).css("color", "rgb(255, 255, 255)");
    $(this).css("border-top-left-radius", "16px");
    $(this).css("border-top-right-radius", "16px");

    if ($(this)[0].id == "h-1") {
        $(".header-content").hide();
        $("#header-content-1").show();
    }
    if ($(this)[0].id == "h-2") {
        $(".header-content").hide();
        $("#header-content-2").show();
    }
    if ($(this)[0].id == "h-3") {
        $(".header-content").hide();
        $("#header-content-3").show();
    }
});

function deleteRecord(record_id, type) {
    var answer = confirm("Do you really want to delete this " + type + "?");

    if (answer == true) {
        $.ajax({
            type: 'delete',
            url: '/' + type + '/' + record_id,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

            success: function (data) {
                $('#row-' + type + '-' + record_id).hide();
            },
            error: function (data) {
                if (data.status == 401) {
                    alert("You need to login to be able to upvote")
                }

            }
        });
    }
};