$(document).ready(function($) {
    $('.category-checkbox').change(function() {
        var categories = [];
        $('.category-checkbox:checked').each(function() {
            categories.push($(this).val());
            console.log(categories);
        });
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'custom_filter_movies',
                category: categories
            },
            success: function(response) {
                $('#custom_filtered-posts').html(response.html);
            }
        });
    });
});

