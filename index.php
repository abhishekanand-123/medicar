<?php
/* Template Name: Pagenation */
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php

            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => 2,
                'orderby'        => 'ID',
                'order'          => 'asc',
                'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
            );
            $products_query = new WP_Query($args);
            ?>
            <h1 class="shop_title1"><?php echo get_the_title(); ?></h1>
            <div class="shop_sort">
                <p class="past_count">Showing all <?php echo $products_query->post_count; ?> of <?php echo $products_query->found_posts; ?> results</p>

                <?php do_action('before_post_content'); ?>
            </div>
        </div>
        <div class="load_more" id="content_post">
            <?php
            while ($products_query->have_posts()) : $products_query->the_post();
                global $product;
            ?>
                <div class="col-3">
                    <div><?php echo $product->get_image(); ?></div>
                    <a href="<?php echo get_permalink(); ?>">
                        <h3 class="shop_title"><?php echo get_the_title(); ?></h3>
                    </a>
                    <h4 class="shop_price"><?php echo $product->get_price_html(); ?></h4>
                    <h6>This is a <?php echo $product->get_type(); ?> product</h6>
                    <div class="shop_cart">
                        <?php
                        if ($product->product_type == 'simple') {
                            echo '<a href="' . esc_url($product->add_to_cart_url()) . '">Add to cart</a>';
                        } else {
                            echo '<a href="' . get_permalink() . '">Select options</a>';
                        }
                        ?>
                    </div>
                </div>

            <?php endwhile;

            wp_reset_postdata(); ?>

        </div>
        <div class="col-12">
            <div id="pagination-container">
                <a href="#" id="load-more">Load more</a>
            </div>
        </div>
    </div>
</div>
<!-- <div id="pagination_ajax">
    <div class="pagination_withoutLoading">
        <?php
        $total_pages = $products_query->max_num_pages;
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
</div> -->
</div>

<script>
    jQuery(document).ready(function($) {
        const paginationContainer = $('#pagination-container');

        paginationContainer.on('click', '.pagination a', function(event) {

            event.preventDefault();

            const paged = $(this).attr('href');

            loadProducts(paged);

        });

        function loadProducts(paged) {
            $.ajax({
                type: 'GET',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    action: 'load_products',
                    paged: paged,
                },
                success: function(data) {
                    $('.load-more-target').html(data);
                }
            });
        }
    });
</script>


<?php get_footer(); ?>



<script>
    jQuery(document).ready(function ($) {
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        var page = 2;

        function load_posts() {
            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    action: 'custom_ajax_pagination',
                    page: page,
                },
                success: function (response) {
                    $('#load-more-target').append(response);
                    page++;
                }
            });
        }

        // Initial load
        load_posts();

        // Load more button click event
        $('#pagination_ajax .pagination_withoutLoading a').on('click', function (e) {
            e.preventDefault();
            load_posts();
        });
    });
</script>



//pagenation
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
                    action: 'custom_ajax_pagination',
                    paged: paged,
                },
                success: function (response) {
                    $('#load-more-target').append(response);
                    paged++; // Increment the page for the next request
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


<?php get_footer(); ?>
//home page
<section class="banner-sc">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="banner-heading">
					<h1><?php the_field('banner-heading'); ?></h1>
					<div class="banner-btn">
						<?php
						$link = get_field('banner-btn');
						if ($link) :
							$link_url = $link['url'];
							$link_title = $link['title'];
						?>
							<a class="btn" href="<?php echo esc_url($link_url); ?>"><?php echo esc_html($link_title); ?></a>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="cards-main">
	<div class="container-fluid">
		<div class="row ">
			<?php
			$i = 0;
			if (have_rows('inner-card_reapeter')) :
				while (have_rows('inner-card_reapeter')) : the_row();
			?>
					<div class="col-lg-3 col-md-6 col-p">
						<div class="inner-card-main  <?php if ($i % 2 == 0) {
															echo 'blue-box';
														} else {
															echo '';
														} ?> ">
							<h3><?php the_sub_field('inner_card_text'); ?></h3>
							<p><?php the_sub_field('inner_card_contents'); ?></p>
						</div>
					</div>

			<?php $i++;
				endwhile;
			endif;
			?>
		</div>
	</div>
</section>

<!-- // start -->

<?php
if (have_rows('custom_product_reapeter')) {
	while (have_rows('custom_product_reapeter')) {
		the_row();
?>
		<section class="individual-custm">

			<div class="container">
				<div class="row">

					<div class="col-md-6">
						<div class="custom-img">
							<?php /*if (get_field('custom-img')) : ?>
						<img src="<?php the_field('custom-img'); ?>" />
					<?php endif; */ ?>

							<?php if (get_sub_field('custom_image')) : ?>

								<img src="<?php the_sub_field('custom_image'); ?>" />
							<?php endif; ?>

						</div>
					</div>
					<div class="col-md-6">
						<div class="custom-content">
							<div class="medi-head">
								<div class="medi-user">
									<!-- <h4><?php //the_field('medi-head'); 
												?></h4> -->
									<h4><?php the_sub_field('custom_head'); ?></h4>
									<?php /*if (get_field('medi-user')) : ?>
								<img src="<?php the_field('medi-user'); ?>" />
							<?php endif; */ ?>
									<?php if (get_sub_field('custom_image_car')) : ?>
										<img src="<?php the_sub_field('custom_image_car'); ?>" />
									<?php endif; ?>
								</div>
								<!-- <h2><?php //the_field('Individual Customers'); 
											?></h2> -->
								<h2><?php the_sub_field('individual__customers_head'); ?></h2>
								<div class="yellow-line">
									<?php /*if (get_field('yellow-line')) : ?>
								<img src="<?php the_field('yellow-line'); ?>" />
							<?php endif; */ ?>
									<?php if (get_sub_field('yellow-line-image')) : ?>
										<img src="<?php the_sub_field('yellow-line-image'); ?>" />
									<?php endif; ?>
								</div>
							</div>
							<?php the_sub_field('mediuser_content_count'); ?>

							<?php //the_field('mediuser_content'); 
							?>
						</div>
					</div>
				</div>
			</div>

			<div class="custom-shape">
				<?php /*if (get_field('custom-shape')) : ?>
			<img src="<?php the_field('custom-shape'); ?>" />
		<?php endif;  */ ?>
				<?php if (get_sub_field('custom-shape_image')) : ?>
					<img src="<?php the_sub_field('custom-shape_image'); ?>" />
				<?php endif; ?>
			</div>
		</section>
	<?php

	}
}
if (have_rows('custom_product_reapeter')) {
	while (have_rows('custom_product_reapeter')) {
		the_row();
	?>
		<section class="individual-custm bussinuss-custom">
		<div class="section">
			<div class="container">
			
				<div class="row">

					<div class="col-md-6">
						<div class="custom-content">
							<div class="medi-head">
								<div class="medi-user">
									<h4><?php the_sub_field('custom_head'); ?></h4>
									<?php if (get_sub_field('custom_image_car')) : ?>
										<img src="<?php the_sub_field('custom_image_car'); ?>" />
									<?php endif; ?>
								</div>
								<h2><?php the_sub_field('individual__customers_head'); ?></h2>
								<div class="yellow-line">
									<?php if (get_sub_field('yellow-line-image')) : ?>
										<img src="<?php the_sub_field('yellow-line-image'); ?>" />
									<?php endif; ?>
								</div>
							</div>
							<?php the_sub_field('mediuser_content_count'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="custom-img">
							<<?php if (get_sub_field('custom_image')) : ?> <img src="<?php the_sub_field('custom_image'); ?>" />
						<?php endif; ?>
						</div>
					</div>
				</div>
							
			</div>
			<div class="custom-shape">
				<?php if (get_sub_field('custom-shape_image')) : ?>
					<img src="<?php the_sub_field('custom-shape_image'); ?>" />
				<?php endif; ?>
			</div>
			</div>
		</section>
<?php
	}
}
?>

<!-- end -->
<section class="services">
	<div class="container">
		<div class="medi-head">
			<div class="medi-user">
				<h4><?php the_field('medi-heads'); ?></h4>
				<?php if (get_field('medi-users')) : ?>
					<img src="<?php the_field('medi-users'); ?>" />
				<?php endif; ?>
			</div>
			<h2><?php the_field('Our Services'); ?></h2>
			<div class="yellow-line">
				<?php if (get_field('yellow-lines')) : ?>
					<img src="<?php the_field('yellow-lines'); ?>" />
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="srvcs-text">
					<?php
					if (have_rows('srv-main')) :
						while (have_rows('srv-main')) : the_row();
					?>
							<div class="srv-main">
								<div class="srv-icon"><img src="<?php the_sub_field('srv-icon'); ?>" alt="img"></div>
								<div class="srv-cont">
									<h4><?php the_sub_field('srv-cont'); ?></h4>
									<p><?php the_sub_field('srv-conts'); ?></p>
								</div>
							</div>

					<?php endwhile;
					endif; ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="cntr-img">
					<?php if (get_field('cntr-img')) : ?>
						<img src="<?php the_field('cntr-img'); ?>" />
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="srvcs-text">
					<?php
					if (have_rows('srv-reapeter')) :
						while (have_rows('srv-reapeter')) : the_row();
					?>
							<div class="srv-main">
								<div class="srv-icon"><img src="<?php the_sub_field('srv-icons'); ?>" alt="img"></div>
								<div class="srv-cont">
									<h4><?php the_sub_field('srv-text-reapeters'); ?></h4>
									<p><?php the_sub_field('svn_contents'); ?></p>
								</div>
							</div>
					<?php endwhile;
					endif; ?>
				</div>
			</div>
		</div>
	</div> 
</section> 
<section class="individual-custm service-provider">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="custom-img">
					<?php if (get_field('image_car')) : ?>
						<img src="<?php the_field('image_car'); ?>" />
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="custom-content">
					<div class="medi-head">
						<div class="medi-user">
							<h4><?php the_field('medicar_head'); ?></h4>
							<?php if (get_field('medicar_image')) : ?>
								<img src="<?php the_field('medicar_image'); ?>" />
							<?php endif; ?>
						</div>
						<h2><?php the_field('provider-head'); ?></h2>
						<div class="yellow-line">
							<?php if (get_field('provider_image')) : ?>
								<img src="<?php the_field('provider_image'); ?>" />
							<?php endif; ?>
						</div>
					</div>
					<?php the_field('provider_contents'); ?>

				</div>
			</div>
		</div>
	</div>
</section>

<section class="management">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="mobile-m">
					<?php if (get_field('mobile-m')) : ?>
						<img src="<?php the_field('mobile-m'); ?>" />
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="manage-cont">
					<h2><?php the_field('manage-cont-text') ?></h2>
					<p><?php the_field('manage-cont-contents') ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="price-cards">
	<?php

	$args = array(
		'post_type'      => 'product',
		'posts_per_page' => -1,
		'orderby'    => 'ID',
        'post_status' => 'publish',
         'order'    => 'asc',
		//  'exclude'=>array(213,215,228,231,233,246,248,251)

	);
	$result = wc_get_products($args); ?>
	<div class="container">
		<div class="row">
			<?php foreach ($result as $product) {
			if($product->get_id()>=213 and $product->get_id()<=253)
			{

			}
			else
			{

				
			?>
				<div class="col-lg-3 col-md-6">


					<div class="price-card">
						<div class="price-card-img">
							<div><?php echo $product->get_image(); ?></div>
						</div>
						<div class="card-body">
							<p><?php echo $product->get_name(); ?></p>
							<h3> $<?php echo $product->get_price();?>/m </h3>
							<div class="book-btn">
							<a href="<?php echo get_permalink($product->get_id()); ?>" class="btn">Book Now</a>
								<!-- <a href="#" class="btn">Book Now</a> -->
							</div>
						</div>
					</div>
				</div>
			<?php } } ?>

		</div>
	</div>

</section>
<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="left-cont-ftr">
					<h3><?php the_field('left-cont-ftr') ?></h3>
				</div>
			</div>
			<div class="col-md-8">
				<div class="features-main">
					<div class="feature-left">
						<?php
						if (have_rows('feature-left')) {
						}
						?>

						<?php
						if (have_rows('feature-left')) :
							while (have_rows('feature-left')) : the_row();
						?>
								<div class="feature-inn">
									<h4><?php the_sub_field('feature-left-text') ?></h4>
									<p><?php the_sub_field('feature-left-contents') ?></p>
								</div>

						<?php
							endwhile;
						endif; ?>


						<!--div class="feature-inn">
							<h4>Create profiles for service centers</h4>
							<p>combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem</p>
						</div>
						<div class="feature-inn">
							<h4>Add custom & default services</h4>
							<p>combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem</p>
						</div-->
					</div>
					<div class="feature-right">
						<?php
						if (have_rows('feature-right')) :
							while (have_rows('feature-right')) : the_row();
						?>
								<div class="feature-inn">
									<h4><?php the_sub_field('feature-inn-right') ?></h4>
									<p><?php the_sub_field('feature-inn-right-contents') ?></p>
								</div>

						<?php endwhile;
						endif; ?>

						<!--div class="feature-inn">
							<h4>Add multiple service centers</h4>
							<p>combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem</p>
						</div>
						<div class="feature-inn">
							<h4>Request for vehicle information</h4>
							<p>combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem</p>
						</div-->
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="left-cont-ftr">
					<h3><?php echo get_field('left-cont-ftr-head') ?></h3>
				</div>
			</div>
			<div class="col-md-8">
				<div class="features-main">
					<div class="feature-left">
						<?php
						if (have_rows('features-main-reapeter')) :
							while (have_rows('features-main-reapeter')) : the_row();
						?>
								<div class="feature-inn">
									<h4><?php the_sub_field('features-main-head'); ?></h4>
									<p><?php the_sub_field('features-main-contents'); ?></p>
								</div>
						<?php endwhile;
						endif; ?>
					</div>
					<div class="feature-right">
						<?php
						if (have_rows('feature-right-reapeters')) :
							while (have_rows('feature-right-reapeters')) : the_row();
						?>
								<div class="feature-inn">
									<h4><?php the_sub_field('feature-right-head'); ?></h4>
									<p><?php the_sub_field('feature-right-contents'); ?></p>
								</div>
						<?php endwhile;
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="contact-sec">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="slider-left">
					<div class="owl-carousel testimonials">
						<?php
						if (have_rows('testmain-reapeter')) :
							while (have_rows('testmain-reapeter')) : the_row();
						?>
								<div class="item">
									<div class="testmain">
										<div class="feedbyclient">

											<div class="client-img">
												<?php if (get_sub_field('client-img-field')) : ?>
													<div>
														<img src="<?php the_sub_field('client-img-field'); ?>" />
													</div>
												<?php endif; ?>
											</div>
											<div class="feed-back-by">
												<h5><?php the_sub_field('client-text'); ?></h5>
												<p><small><?php the_sub_field('client-contents'); ?></small></p>
											</div>
											<p class="testomial-cont">
												<?php the_sub_field('testomial-content'); ?>
												<?php if (get_sub_field('testomial-cont-image')) : ?>
													<img src="<?php the_sub_field('testomial-cont-image'); ?>" />
												<?php endif; ?>

											</p>
										</div>
									</div>
								</div>

						<?php endwhile;
						endif;
						?>

					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="lets-talks">
					<div class="talk-head">
						<h2><?php the_field('talk-head'); ?></h2>
						<p><?php the_field('talk-content'); ?>

					</div>
					<div class="form-main">
						<?php the_field('contact_form'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>