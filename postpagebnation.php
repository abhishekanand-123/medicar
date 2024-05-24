<?php 
/* Template Name: postpagination */
?>
<?php get_header(); ?>
 
<div class="container" style="display:flex; margin-top: 40px;">
    <div class="row">
        <div class="pagination-ajax" id="load-more-target">
            <?php 
                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 1,
                    'order'          => 'ASC',
                    'orderby'        => 'ID',
                    'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
                );

                $query = new WP_Query($args);

                if ($query->have_posts()):
                    while ($query->have_posts()): $query->the_post();
                        ?>
                        <div class="col-6" style="display:inline-table;">
    

                            <h3><?php the_title(); ?></h3>
                            <p><?php the_content(); ?></p>
                            <img src="<?php the_post_thumbnail_url(); ?>" >
                        </div>
                        <?php
                    endwhile;
                endif; 
            ?>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<div id="pagination_ajax">
    <div class="pagination_withoutLoading">
        <?php
        $total_pages = $query->max_num_pages;
        $current_page = max(1, get_query_var('paged'));
        $prev_arrow = '<img src="http://localhost/medicar/wp-content/uploads/2023/12/left-arrow.png" alt="Previous" width="20" height="20">';
        $next_arrow = '<img src="http://localhost/medicar/wp-content/uploads/2023/12/play-black-triangle-interface-symbol-for-multimedia.png" alt="Next" width="20" height="20">';

        echo paginate_links(array(
            'total'            => $total_pages,
            'current'          => $current_page,
            'prev_text'        => $prev_arrow ,
            'next_text'        => $next_arrow,
            'type'             => 'plain',
            'before_page_number' => '<span class="page-number">',
            'after_page_number'  => '</span>',
            'show_all'         => true,
            'mid_size'         => 0,
            'end_size'         => 2,
            'prev_next'        => true,
        ));
        ?>
    </div>
</div>




<script>
    jQuery(document).ready(function ($) {
        var page = 1;

        function load_posts() {
            $.ajax({
                type: 'POST',
                url: '<?php echo admin_url( 'admin-ajax.php' ) ?>',
                data: {
                    action: 'custom_ajax_pagination',
                    page: page,
                },
                success: function(response) {
                    $('#load-more-target').html(response);
                }
            });
        }

        $('#pagination_ajax').on('click','.pagination_withoutLoading a',function(e){
            e.preventDefault();

            if ($(this).hasClass('prev')) {
                page--;
            } else if ($(this).hasClass('next')) {
                page++;
            } else {
                page = parseInt($(this).text());
            }

             load_posts();
            $("html, body").animate({ scrollTop: 0 }, "slow");
        });

        postType = $('#search-form-type').val();
        load_posts();
    });
</script>



<?php get_footer(); ?>