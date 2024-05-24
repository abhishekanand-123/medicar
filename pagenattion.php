<?php
/* Template Name: Pagenation */
 get_header(); ?>

<div class="container-fluid" style="display:flex; margin-top:40px;">

    <?php
    $args1 = array(
        'orderby' => 'id',
        'order' => 'ASC',
        'post_type' => 'product',
        'posts_per_page' => 3,
        'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
    );

    $query = new WP_Query($args1);
    ?>
    <?php if ($query->have_posts()) { ?>
        <div id="load-more-target">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="shop_title1"><?php echo get_the_title(); ?></h1>
                    <div class="shop_sort">
                        <p class="past_count">Showing all <?php echo $query->post_count; ?> of <?php echo $query->found_posts; ?> results</p>

                        <?php do_action('before_post_content'); ?>
                    </div>
                </div>
                <?php while ($query->have_posts()) : $query->the_post();
                    global $product; // Define the global product variable inside the loop
                ?>

                    <div class="col-md-4">
                        <ul class="card" style="border:2px solid gray;">
                            <li class="card-item">
                                <div class="product" style="text-align:center;">
                                    <div class="pr_img">
                                        <?php echo $product->get_image(); ?>
                                    </div><br>
                                    <h2>
                                        <a href="<?php echo $product->get_permalink(); ?>"><?php echo $product->get_title(); ?></a>
                                    </h2>
                                    <h3 class="product_price" style="color: #e84629 !important;">
                                        <?php echo $product->get_price_html(); ?>
                                    </h3>
                                    <!-- <h4>
                                        <?php //echo $product->get_stock_status(); 
                                        ?>
                                    </h4> -->
                                    <?php if ($product->get_type() == 'simple') { ?>
                                        <a class="btn" href="<?php echo $product->add_to_cart_url(); ?>">Add to Cart</a>
                                    <?php } else { ?>
                                        <a class="btn" href="<?php echo $product->get_permalink(); ?>">Select Options</a>
                                    <?php } ?>
                                </div>
                            </li>
                        </ul>

                    </div>
                <?php endwhile; ?>

            <?php } ?>
            </div>
        </div>
        <?php wp_reset_postdata(); // Reset the post data after the loop 
        ?>
</div>

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
            'prev_text'        => $prev_arrow,
            'next_text'        => $next_arrow,
            'type'             => 'plain',
            'before_page_number' => '<span class="page-number">',
            'after_page_number'  => '</span>',
            'show_all'         => false,
            'mid_size'         => 0,
            'end_size'         => 2,
            'prev_next'        => true,
        ));
        ?>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        var paged = 2;

        function load_posts() {
            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    action: 'custom_ajax_paginations',
                    paged: paged,
                },
                success: function (response) {
                    $('#load-more-target').append(response);
                    paged++; 
                }
            });
        }

        // Initial load
      

        // Load more button click event
        $('#pagination_ajax .pagination_withoutLoading a').on('click', function (e) {
            e.preventDefault();
            load_posts();
        });
    });
</script>