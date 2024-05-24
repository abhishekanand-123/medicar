
   $(document).ready(function() {
   // var adminAjaxUrl = document.querySelector('meta[name="admin-ajax-url"]').getAttribute('content');

   var ajaxUrl = $('#admin_ajax_url').val();
        $('.category-checkbox').change(function() {
            var categories = [];
            $('.category-checkbox:checked').each(function() {
                categories.push($(this).val());
               // console.log(categories);
            });
            $.ajax({
               // url: adminAjaxUrl,
                 url: $('#admin_ajax_url').val(),
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

//fiter code based on  custom post