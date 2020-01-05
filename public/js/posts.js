$(document).ready(function () {

    //Function to get search and order attribute from URL and fill the search and order input
    var url = new URL(document.location);

    var search = url.searchParams.get("search");
    var order = url.searchParams.get("order");
    var tech = url.searchParams.get("tech");

    search && $("#search").val(search); //Set search input
    order ? $("#sort").val(order) : $("#sort").val('hot'); //Set order input with value or default
    tech && $("#tech").val(tech); //Set tech input




    $("#sort").change(function () {
        var url = new URL(document.location);
        var order = url.searchParams.get("order");

        if (url.href.includes('?')) {
            if (order) {
                //Already have an order, so we need to replace it
                url.searchParams.set("order", $("#sort option:selected").val());
                location.reload();
            }
            else {
                //We have URL attributes so we need to preserve them and add an order
                var url = document.location.href + "&order=" + $("#sort option:selected").val();
            }
        }
        else {
            //There are no URL attributes, so we just add an order
            var url = document.location.href + "?order=" + $("#sort option:selected").val();
        }


        window.location = url;

    });
});