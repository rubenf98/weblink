function updateClicks(tag_id, tag_name) {

    $.ajax({
        type: 'post',
        url: '/api/stats/tags/update-clicks/' + tag_id,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

        success: function (data) {
            window.location.href = '/posts?tech=' + tag_name + '&order=best';
        }
    });
};