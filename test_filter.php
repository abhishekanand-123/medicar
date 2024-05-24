<?php /*Template Name: post_filter */ ?>
<?php get_header(); ?>

<div class="container">

    <div id="posts">
        <?php
        // Retrieve the list of categories
        $categories = get_categories();

        // Check if categories exist
        if ($categories) {
            echo '<div class="category-filter">';
            foreach ($categories as $category) {
                echo '<input type="checkbox" class="category-checkbox" name="category[]" value="' . $category->slug . '"> ' . $category->name . '<br>';
            }
            echo '</div>';
        }

        // Define the default category or the first category as active
        $default_category = isset($categories[0]) ? $categories[0]->slug : '';

        $args = array(
            'post_type'      => 'post',
            'orderby'        => 'ID',
            'post_status'    => 'publish',
            'order'          => 'ASC',
            'posts_per_page' => -1, // this will retrieve all the posts that are published 
            'category_name'  => $default_category, // Include this line to filter by default category
        );

        $result = new WP_Query($args);

        if ($result->have_posts()) : ?>

            <div class="row" id="filtered-posts">
                <?php while ($result->have_posts()) : $result->the_post(); ?>
                    <div class="col-md-4">
                        <div class="post-item">
                            <h2><?php the_title(); ?></h2>
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>">
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

        <?php endif;
        wp_reset_postdata(); ?>
    </div>
</div>

<?php get_footer(); ?>