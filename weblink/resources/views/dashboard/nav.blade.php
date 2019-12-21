<div class="dashboard-nav-container">
    <ul class="header-list">
        <li class="header-item" id="h-1">
            <span href="/dashboard/analytics" class="header-title"> Analytics</span>
        </li>
        <li class="header-item" id="h-2">
            <span href="/dashboard/users" class="header-title"> Users</span>
        </li>
        <li class="header-item" id="h-3">
            <span href="/dashboard/tags" class="header-title"> Tags</span>
        </li>
        <li class="header-item" id="h-4">
            <span href="/dashboard/suggestions" class="header-title"> Suggestions</span>
        </li>
    </ul>
</div>

<script>
    $(".header-item").click(function () {

    $(this).css("background-color", "rgb(141, 8, 230)");
    $(this).css("color", "rgb(255, 255, 255)");
    $(this).css("border-top-left-radius", "16px");
    $(this).css("border-top-right-radius", "16px");

    if ($(this)[0].id == "h-1") {
        document.location.href = "/dashboard";
    }
    if ($(this)[0].id == "h-2") {
        document.location.href = "/dashboard/users";
    }
    if ($(this)[0].id == "h-3") {
        document.location.href = "/dashboard/tags";
    }
    if ($(this)[0].id == "h-4") {
        document.location.href = "/dashboard/suggestions";
    }
});
</script>