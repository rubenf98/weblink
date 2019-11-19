var imageCoding = $('#coding_div');

imageCoding.mouseenter(
    function(){
        $('#coding_img').attr('src','img_welcome/coding-hover.svg');
    })

imageCoding.mouseleave(
    function(){
        $('#coding_img').attr('src','img_welcome/coding.svg');
    })

var imageIdea = $('#idea_div');

imageIdea.mouseenter(
    function(){
        $('#idea_img').attr('src','img_welcome/light-hover.svg');
    })

imageIdea.mouseleave(
    function(){
        $('#idea_img').attr('src','img_welcome/light.svg');
    })

var imageConnection = $('#connection_div');

imageConnection.mouseenter(
    function(){
        $('#connection_img').attr('src','img_welcome/connection-hover.svg');
    })

    imageConnection.mouseleave(
    function(){
        $('#connection_img').attr('src','img_welcome/connection.svg');
    })

$('#startButton').click(function(){
    alert('clicou');
})
