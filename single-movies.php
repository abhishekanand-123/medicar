<?php
get_header();
?>
<div class="container">
    <div id="custom_post">
        <?php
        // Retrieve the list of categories
        $categories = get_categories(array('taxonomy' => 'movies_categories'));

        // Check if categories exist
        if ($categories) {
            echo '<div class="category-filter">';
            foreach ($categories as $category) {
                echo '<input type="checkbox" class="category-checkbox" name="category[]" value="' . $category->slug . '"> ' . $category->name . '<br>';
            }
            echo '</div>';
        }
        ?>

        <div class="row" id="custom_filtered-posts">
            <?php
            $args = array(
                'post_type'      => 'movies',
                'posts_per_page' => -1, 
            );
            $result = new WP_Query($args);
            if ($result->have_posts()) :
                while ($result->have_posts()) : $result->the_post();
                    $categories = get_the_terms(get_the_ID(), 'movies_categories');
                    $category_slugs = array();
                    if ($categories) {
                        foreach ($categories as $category) {
                            $category_slugs[] = $category->slug;
                            
                        }
                    }
                    echo '<div class="col-md-4 post-item" data-categories="' . implode(",", $category_slugs) . '">';
                    echo '<h2>' . get_the_title() . '</h2>';
                    echo '<img src="' . get_the_post_thumbnail_url() . '" alt="' . get_the_title() . '">';
                    echo '</div>';
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</div>
<!-- <input type="hidden" name="admin_ajax_url" id="admin_ajax_url" value="<?php //echo admin_url('admin-ajax.php');?>"> -->
<?php
get_footer();
?>

