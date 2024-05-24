<?php
 /*Template Name: Search_page */
get_header();
?>
<!-- <form role="search" method="get" id="searchform" action="<?php //echo home_url('/'); ?>">
    <input type="text" value="<?php //echo get_search_query(); ?>" name="s" id="s" placeholder="Search" />
    <input type="submit" id="searchsubmit" value="<?php //echo esc_attr__('Search'); ?>" />
</form> -->
<div class="content-container">
    <h1 class="page-title"><?php //_e( 'Search results for:', 'nd_dosth' ); ?></h1>
    <div class="search-query"><?php //echo get_search_query(); ?></div>    
    <div class="container">
        <div class="row">
            <div class="search-results-container col-md-8">
            <?php if ( have_posts() ): ?>
                <?php while( have_posts() ): 
                   ?>
                    <?php the_post(); ?>
                    <div class="search-result">
                        <h2><?php the_title(); ?></h2>
                        <?php the_excerpt(); ?>
                        <img src="<?php the_post_thumbnail_url(); ?>"  />

                        <a href="<?php //the_permalink(); ?>" class="read-more-link">
                            <?php //_e( 'Read More', 'nd_dosth' );  ?>
                        </a>
                    </div>
                <?php endwhile; ?>
                <?php // the_posts_pagination(); ?>
            <?php else: ?>
                <p><?php echo "Not present in this page"; ?></p>
            <?php endif; ?>
            </div>
            <div id="blog-sidebar" class="col-md-4">
                <?php //get_sidebar(); ?>             
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>






