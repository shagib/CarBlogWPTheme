jQuery(document).ready(function ($) {
    $('#blog-titles li').on('click', function () {
        var postID = $(this).data('id');

        // Make clicked title active
        $('#blog-titles li').removeClass('active');
        $(this).addClass('active');

        // Load post content into the #post-content div
        $.ajax({
            url: ajax_vars.ajaxurl, // Use localized ajaxurl
            type: 'POST',
            data: {
                action: 'load_post_content',
                post_id: postID
            },
            success: function (response) {
                $('#post-content').html(response);
            }
        });
    });
});
