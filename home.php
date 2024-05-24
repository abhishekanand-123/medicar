<?php /*Template Name: Home2 */ ?>
<?php get_header(); ?>

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

<section class="individual-custm">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="custom-img">
					<?php if (get_field('custom-img')) : ?>
						<img src="<?php the_field('custom-img'); ?>" alt="img">
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="custom-content">
					<div class="medi-head">
						<div class="medi-user">
							<h4><?php the_field('medicar-user-head'); ?></h4>
							<?php if (get_field('medicar-user-image')) : ?>
								<img src="<?php the_field('medicar-user-image'); ?>" alt="img">
							<?php endif; ?>
						</div>
						<h2><?php the_field('individual -customer-header'); ?></h2>
						<div class="yellow-line">
							<?php if (get_field('individual-customer-image')) : ?>
								<img src="<?php the_field('individual-customer-image'); ?>" alt="img">
							<?php endif; ?>
						</div>
					</div>

					<?php the_field('vehical-service-head'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="custom-shape">
		<?php if (get_field('custom-shape')) : ?>
			<img src="<?php the_field('custom-shape'); ?>" alt="img">
		<?php endif; ?>
	</div>
</section>

<section class="individual-custm bussinuss-custom">
	<div class="container">
		<div class="row">

			<div class="col-md-6">
				<div class="custom-content">
					<div class="medi-head">
						<div class="medi-user">
							<h4><?php the_field('bussinuss-custom-header'); ?></h4>
							<?php if (get_field('bussinuss-custom-image')) : ?>
								<img src="<?php the_field('bussinuss-custom-image'); ?>" alt="img">
							<?php endif; ?>
						</div>
						<h2><?php the_field('medi-user-header'); ?></h2>
						<div class="yellow-line">
							<?php if (get_field('medi-user-image')) : ?>
								<img src="<?php the_field('medi-user-image'); ?>" alt="img">
							<?php endif; ?>
						</div>
					</div>

					<?php the_field('medi-user-content'); ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="custom-img">
					<?php if (get_field('custom-img-two')) : ?>
						<img src="<?php the_field('custom-img-two'); ?>" alt="img">
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php if (get_field('custom-shape-image')) : ?>
		<div class="custom-shape">
			<img src="<?php the_field('custom-shape-image'); ?>" alt="img">
		</div>
	<?php endif; ?>
</section>

<section class="services">
	<div class="container">
		<div class="medi-head">
			<div class="medi-user">
				<h4><?php the_field('services-header'); ?></h4>
				<?php if (get_field('car-lyer-image')) : ?>
					<img src="<?php the_field('car-lyer-image') ?>" alt="img">
				<?php endif; ?>
			</div>
			<h2><?php the_field('our-service-heder'); ?></h2>
			<div class="yellow-line">
				<?php if (get_field('yellow-dash-image')) : ?>
					<img src="<?php the_field('yellow-dash-image') ?>" alt="img">
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="srvcs-text">
					<?php
					if (have_rows('srv-main-reapeter')) :
						while (have_rows('srv-main-reapeter')) : the_row();
					?>
							<div class="srv-main">
								<div class="srv-icon">
									<img src="<?php the_sub_field('svn-icon-img'); ?>" alt="img">
								</div>
								<div class="srv-cont">
									<h4><?php the_sub_field('srv-icon-heder'); ?></h4>
									<p><?php the_sub_field('srv-icon-content'); ?></p>
								</div>
							</div>

					<?php endwhile;
					endif; ?>
				</div>
			</div>



			<div class="col-md-4">
				<div class="cntr-img">
					<?php if (get_field('cntr-img')) : ?>
						<img src="<?php the_field('cntr-img') ?>" alt="img">
					<?php endif ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="srvcs-text">
					<?php
					if (have_rows('service-provider-repater')) :
						while (have_rows('service-provider-repater')) : the_row();
					?>
							<div class="srv-main">
								<div class="srv-icon"><img src="<?php the_sub_field('service-provider_imge'); ?>" alt="img"></div>
								<div class="srv-cont">
									<h4><?php the_sub_field('service-provider_header'); ?></h4>
									<p><?php the_sub_field('service-provider_content'); ?></p>
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
					<?php if (get_field('custom-img-three')) : ?>
						<img src="<?php the_field('custom-img-three'); ?>" alt="img">
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="custom-content">
					<div class="medi-head">
						<div class="medi-user">
							<h4><?php the_field('medi_user_head'); ?></h4>
							<?php if (get_field('car-layer-imge')) : ?>
								<img src="<?php the_field('car-layer-imge'); ?>" alt="img">
							<?php endif; ?>
						</div>
						<h2><?php the_field('Service-provideded_header'); ?></h2>
						<div class="yellow-line">
							<?php if (get_field('yellow-line_image')) : ?>
								<img src="<?php the_field('yellow-line_image'); ?>" alt="img">
							<?php endif; ?>
						</div>
					</div>

					<?php the_field('provider_content'); ?>
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
						<img src="<?php the_field('mobile-m'); ?>" alt="img">
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="manage-cont">
					<h2><?php the_field('manage-cont-header'); ?></h2>
					<p><?php the_field('manage-cont_content'); ?></p>
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
		'exclude' => array(213, 215, 228, 231, 233, 246, 248, 251, 253)

	);
	$result = wc_get_products($args); ?>
	<div class="container">
		<div class="row">
			<?php foreach ($result as $product) {
				// if($product->get_id()<=100)
				// {
			?>
				<div class="col-lg-3 col-md-6">


					<div class="price-card">
						<div class="price-card-img">
							<div><?php echo $product->get_image(); ?></div>
						</div>
						<div class="card-body">
							<p><?php echo $product->get_name(); ?></p>
							<h3>$ <?php echo $product->get_price(); ?>/m </h3>
							<div class="book-btn">
								<a href="<?php echo get_permalink($product->get_id()); ?>" class="btn">Book Now</a>
								<!-- <a href="#" class="btn">Book Now</a> -->
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php //} 
			?>

		</div>
	</div>
</section>


<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="left-cont-ftr">
					<h3><?php the_field('feature-customer-header'); ?></h3>
				</div>
			</div>
			<div class="col-md-8">
				<div class="features-main">
					<div class="feature-left">
						<?php if (have_rows('feature-inn-reapeter')) :
							while (have_rows('feature-inn-reapeter')) : the_row(); ?>
								<div class="feature-inn">
									<h4><?php the_sub_field('feature-inn-header'); ?></h4>
									<p><?php the_sub_field('feature-inn-content'); ?></p>
								</div>
						<?php endwhile;
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
						if (have_rows('feature-reapter')) :
							while (have_rows('feature-reapter')) : the_row();
						?>
								<div class="feature-inn">
									<h4><?php the_sub_field('feature-right-header') ?></h4>
									<p><?php the_sub_field('feature-right-content') ?></p>
								</div>

						<?php endwhile;
						endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="left-cont-ftr">
					<h3>Feature for Service providers</h3>
				</div>
			</div>
			<div class="col-md-8">
				<div class="features-main">
					<div class="feature-left">
						<?php
						if (have_rows('feature-in-repeater')) :
							while (have_rows('feature-in-repeater')) : the_row();
						?>
								<div class="feature-inn">
									<h4><?php the_sub_field('feature-in-head'); ?></h4>
									<p><?php the_sub_field('feature-in-content'); ?></p>
								</div>
						<?php endwhile;
						endif; ?>

					</div>
					<div class="feature-right">
						<?php
						if (have_rows('feature-right-second-repeater')) :
							while (have_rows('feature-right-second-repeater')) : the_row();
						?>
								<div class="feature-inn">
									<h4><?php the_sub_field('feature-right-second-header'); ?></h4>
									<p><?php the_sub_field('feature-right-second-content'); ?></p>
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
						if (have_rows('feedbyclient-repeater')) :
							while (have_rows('feedbyclient-repeater')) : the_row();
						?>
								<div class="item">
									<div class="testmain">
										<div class="feedbyclient">

											<div class="client-img">
												<?php if (get_sub_field('contact-client-img')) : ?>
													<div>
														<img src="<?php the_sub_field('contact-client-img'); ?>" />
													</div>
												<?php endif; ?>
											</div>
											<div class="feed-back-by">
												<h5><?php the_sub_field('contact-client-header'); ?></h5>
												<p><small><?php the_sub_field('contact-client-content'); ?></small></p>
											</div>
											<p class="testomial-cont">
												<?php the_sub_field('testomial-cont-content'); ?>
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
						<p><?php the_field('talk-content'); ?></p>
					</div>
					<div class="form-main">
						<?php the_field("contact_form"); ?>
					</div>
				</div>
			</div>
		</div>
</section>

<?php
       $args = array(
       'type'                     => 'Posts',
       'orderby'                  => 'name',
       'order'                    => 'ASC'
	   );
       $categories = get_categories($args);
	   $categories = get_categories(array('exclude' => get_cat_ID('uncategorized')));
       echo '<ul>';

       foreach ($categories as $category) {
        
		 $image=get_field ('image',$category);
		 $text=get_field( 'travel_description' ,$category  );
		
		 ?>
		 <img src="<?php echo $image;?>">
		 <p><?php echo $text;?></p>


          <li><a href="<?php echo $url;?>"><?php echo $category->name; ?></a></li>
         <?php
       }
       echo '</ul>';
   ?>
   <?php 
   /*
$args = array(
    'posts_per_page' => -1, // Get all posts
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
);

$posts = get_posts($args);

foreach ($posts as $post) {
    setup_postdata($post);
    $post_id = $post->ID;
    // Get the meta value
    $metaeditor = get_post_meta($post_id, 'metaeditor', true);
    // Output the title
    echo '<p>' . $metaeditor . '</p>';
    // Output the meta value
}
wp_reset_postdata();
// echo do_shortcode('[wpforms id="609"]');
*/
?>







<?php get_footer(); ?>