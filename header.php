<!DOCTYPE html>
<html lang="en">

<head>


	<title><?php echo get_the_title(); ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/animatecss/3.5.2/animate.min.css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/css/owl.carousel.css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/css/owl.theme.default.css" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/css/style3.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/css/style2.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/css/stylec1.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/css/style.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/css/responsive.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/fonts/stylesheet.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/https://fonts.googleapis.com">
	<link rel="preconnect" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200;300;400;500;700;800&display=swap" rel="stylesheet">
	<link rel="preconnect" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/https://fonts.googleapis.com">
	<link rel="preconnect" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link rel="preconnect" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/https://fonts.googleapis.com">
	<link rel="preconnect" href="<?php echo get_stylesheet_directory_uri(); ?> /assets/https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class('header'); ?>>


	<header id="myHeader" class="header_section fixed-top">
		<div class="mid_menu_header">
			<div class="container">
				<div class="row">
					<div class="col-2 logo-div">
						<div class="header_logo">

							<a href="<?php echo esc_url(home_url('/')); ?>">
								<img src="<?php echo wp_get_attachment_url(get_theme_mod('custom_logo')); ?>" alt="Logo" /></a>
						</div>
					</div>
					<div class="col-8 text-left menus">
						<div class="header_navigation">
							<div id="mySidenavs" class="sidenavs">
								<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
								<?php wp_nav_menu(array(
									'menu' => "header",
									'menu_class'		=> "menu_navigation",
									'container'			=> false,
									'theme_location'	=> " Primary menu",
								));
								?>

							</div>
							<span class="toggle_menu" onclick="openNav()"><i class="fa fa-bars"></i></span>
						</div>
					</div>

					<!-- <div class="col-2 login-div">
						<div class="last-mains">
							<ul>
								 <li class="cntact"><a href="#"><img src="images/phone-icon.svg" alt="img" /> 832-381-8474</a></li> -->
								<!-- <li class="lst-btn"><a href="#">Log in</a></li>
							</ul>
						</div> 
					</div>-->
				<div class="col-2 login-div">
						<div class="last-mains">
							<ul>
								 <li class="cntact"><?php  get_search_form(); ?></li>
								
							</ul>
						</div> 
					</div>
					
				</div>
			</div>
		</div>
		<input type="hidden" name="admin_ajax_url" id="admin_ajax_url" value="<?php echo admin_url('admin-ajax.php');?>">
	</header>