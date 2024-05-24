<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<script type='text/javascript' src='https://dot.dm-io.com/vpixel.js?ver=1.1.0'></script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});
var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})
(window,document,'script','dataLayer','GTM-WTVVSKP');</script>
<!-- End Google Tag Manager -->

<script>
 (function () {
   var e,i=["https://fastbase.com/fscript.js","gYLK8oFRCj","script"],a=document,s=a.createElement(i[2]);
   s.async=!0,s.id=i[1],s.src=i[0],(e=a.getElementsByTagName(i[2])[0]).parentNode.insertBefore(s,e)
 })();
</script>

<!-- <meta name="viewport" content="width=device-width, initial-scale=1" /> -->
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>directmail.io</title>
  <!--   <link rel="shortcut icon" href="<?php //echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon" /> -->
   <!-- <link rel="icon" type="image/png" href="<?php //echo get_template_directory_uri(); ?>/images/favicon.png" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri();?>/css/style.css" rel="stylesheet">
   <link href="<?php echo get_template_directory_uri();?>/fonts/fonts.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" rel="stylesheet">
    <?php wp_head();?>
    <?php 
        $url = get_the_post_thumbnail_url();
        if ($url) { ?>
        <meta property="og:image" content="<?php echo $url ?>" />
    <?php  }
    ?>
  </head>
<body <?php body_class(); ?>>
<script>vpixel.piximage('6504');</script>   
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src='https://www.googletagmanager.com/ns.html?id=GTM-WTVVSKP' height='0' width='0' 
  style='display:none;visibility:hidden'></iframe></noscript>
  <!-- End Google Tag Manager (noscript) --> 
  
    <header >
      <section class="container-fluid header_alt_container">
        <span class="logo">
        <a href="<?php echo get_site_url();?>"><svg class="logo" x="0px" y="0px" viewBox="0 0 225 41" style="enable-background:new 0 0 225 41;" xml:space="preserve">
            <g class="logo__sign">
                <path d="M38.3,28.6L38,28.4l0.1-0.3c0.8-3.8,0.5-6.7,0.5-6.7v0C38,15.3,35.2,7.6,25.1,5.8l-0.2,0l-0.1-0.2
                    c-1.5-2.7-3.2-4.2-4.5-4.2c-1.9,0-3.6,2.6-4.5,4.2l-0.1,0.2l-0.2,0C5.1,7.6,2.4,15.3,1.8,21.3v0c0,0.1-0.3,3,0.5,6.7l0.1,0.3
                    l-0.3,0.2c-0.9,0.6-1.4,1.5-1.4,2.8c0,4.5,3.2,5.3,6.6,6.1c1,0.2,2.2,0.5,3.4,0.9c0.8,0.2,1.7,0.6,2.6,1c2.1,0.9,4.4,1.9,6.9,1.9
                    c2.5,0,4.8-1,6.9-1.9l0,0c0.9-0.4,1.8-0.8,2.6-1c1.2-0.4,2.4-0.7,3.4-0.9c3.4-0.8,6.6-1.6,6.6-6.1C39.7,30.1,39.2,29.2,38.3,28.6z
                     M11.4,25.9c-3.5,0-6.4-2.8-6.4-6.3c0-3.5,2.9-6.4,6.4-6.4c3.5,0,6.4,2.8,6.4,6.4C17.8,23.1,15,25.9,11.4,25.9z M10,27.3
                    c-0.1,0-0.2,0.1-0.3,0.1c-1.4,0.2-2.6,0.3-3.7,0.4l-0.7,0l-0.4,0l-0.1-0.4c-0.3-1.4-0.5-2.9-0.5-4.3C5.4,25.3,7.5,26.9,10,27.3z
                     M17.1,14c2-1.1,4.3-1.1,6.3,0c-1.5,1.5-2.3,3.5-2.3,5.5c0,1.7,0.5,3.2,1.4,4.5c-0.8-0.2-1.6-0.3-2.4-0.3c-0.7,0-1.5,0.1-2.2,0.3
                    c0.9-1.3,1.4-2.8,1.4-4.4C19.4,17.4,18.5,15.5,17.1,14z M29.1,13.2c3.5,0,6.4,2.8,6.4,6.4c0,3.5-2.9,6.4-6.4,6.3
                    c-3.5,0-6.4-2.8-6.4-6.3C22.7,16,25.6,13.2,29.1,13.2z M36,23.4c0,1-0.1,2.4-0.5,4l-0.1,0.4l-0.4,0l-0.7,0c-1.2,0-2.5-0.2-3.7-0.4
                    c-0.1,0-0.2-0.1-0.3-0.1C32.8,27,34.9,25.5,36,23.4z M8.9,11.3c2.6-2.3,6.4-3.4,11.3-3.4c4.9,0,8.6,1.1,11.3,3.4
                    c0.4,0.4,0.8,0.8,1.2,1.2c-1.1-0.6-2.4-0.9-3.7-0.8c-1.5,0-3,0.5-4.3,1.3c-1.3-0.9-2.8-1.3-4.4-1.3c-1.6,0-3.1,0.5-4.4,1.3
                    c-2.6-1.7-5.7-1.7-8.3-0.3C8,12.2,8.4,11.7,8.9,11.3z M25.7,37.3c-1.9,0.8-3.7,1.5-5.5,1.5s-3.6-0.7-5.5-1.5l-2.6-1.1l2.8,0.2
                    c3.5,0.2,7,0.2,10.5,0l2.8-0.2L25.7,37.3z M37.1,32.3l0,0.2l-0.2,0.1c-1.1,0.7-3.1,1.4-5.8,1.9c-3,0.5-6.8,0.8-10.9,0.8
                    c-6.2,0-11.5-0.7-14.8-1.8l0,0l-2-1l0-0.2c-0.1-0.5-0.1-0.9,0-1.4l0-0.2l0.2-0.1c0.4-0.2,1.3-0.3,2.6-0.3h0c1.1-0.1,2.5-0.1,4-0.4
                    c1.4-0.3,3-1,4.4-1.8l0.1,0l0.6-0.3l0.9-0.5l-0.3,1.5c-0.1,0.2,0,0.4,0.1,0.6c0.1,0.1,0.1,0.1,0.2,0.2l0.1,0c0.2,0,0.5-0.2,0.6-0.6
                    l0.3-1.5c0-0.1,0-0.1,0-0.2l0-0.3l0.3-0.1c1-0.4,1.9-0.6,2.7-0.6c0.8,0,1.7,0.2,2.7,0.6l0.3,0.1l0,0.4l0,0.2l0.3,1.5
                    c0.1,0.4,0.4,0.6,0.6,0.6c0,0,0,0,0.1,0c0.1,0,0.2-0.1,0.2-0.2c0.1-0.2,0.1-0.4,0.1-0.6l-0.3-1.5l0.9,0.5l0.6,0.3l0.1,0.1
                    c1.4,0.8,2.9,1.4,4.4,1.8c1.5,0.3,2.9,0.4,4,0.4h0c1.2,0.1,2.2,0.1,2.6,0.3l0.2,0.1l0.1,0.2C37.1,31.4,37.1,31.9,37.1,32.3z"></path>
                <path d="M26.9,22.5c0.5,0,1-0.6,1-1.3v-2.3c0-0.7-0.5-1.3-1-1.3v0c-0.6,0-1,0.6-1,1.3v2.3C25.9,21.9,26.4,22.5,26.9,22.5z"></path>
                <path d="M13.3,17.6L13.3,17.6c-0.6,0-1,0.6-1,1.3v2.3c0,0.7,0.5,1.3,1,1.3c0.5,0,1-0.6,1-1.3v-2.3C14.3,18.2,13.8,17.6,13.3,17.6z"></path>
            </g>
            <g class="logo__text">
                <path id="_x31_dp8a" d="M197,30.8c-0.6,0-1.1,0.2-1.5,0.6c-0.4,0.4-0.6,0.9-0.6,1.5c0,0.6,0.2,1.1,0.6,1.5c0.4,0.4,0.9,0.6,1.5,0.6
                c0.6,0,1.1-0.2,1.5-0.6c0.4-0.4,0.6-0.9,0.6-1.5s-0.2-1.1-0.6-1.5C198.1,31,197.6,30.8,197,30.8"></path>
                <g>
                    <path id="_x31_dp8b" d="M201.9,35h3.4V15.2h-3.4V35z"></path>
                    <path id="_x31_dp8c" d="M203.6,6.4c-0.6,0-1.1,0.2-1.5,0.6c-0.4,0.4-0.6,0.9-0.6,1.5c0,0.6,0.2,1.1,0.6,1.5
                        c0.4,0.4,0.9,0.6,1.5,0.6c0.6,0,1.1-0.2,1.5-0.6c0.4-0.4,0.6-0.9,0.6-1.5s-0.2-1.1-0.6-1.5C204.7,6.6,204.2,6.4,203.6,6.4"></path>
                </g>
                <path id="_x31_dp8d" d="M215.8,14.9c-5.6,0-8.5,3.5-8.5,10.2c0,6.7,2.9,10.1,8.5,10.1c5.6,0,8.5-3.4,8.5-10.2
                    C224.2,18.4,221.4,14.9,215.8,14.9z M220.9,25.2c0,2.2-0.3,3.8-0.9,4.9c-0.8,1.4-2.2,2-4.2,2c-2,0-3.4-0.6-4.2-2
                    c-0.6-1-0.9-2.7-0.9-4.9c0-2.2,0.3-3.9,0.9-5c0.8-1.3,2.2-2,4.2-2c2.1,0,3.4,0.7,4.2,2C220.6,21.3,220.9,23,220.9,25.2z"></path>
                <path id="_x31_dp8e" d="M59.5,6.8h-8.7V35h8.7c5.1,0,8.5-1.2,10.1-3.5c1.3-1.8,1.9-5.3,1.9-10.6c0-5.1-0.7-8.6-2-10.5
                    C67.8,8,64.4,6.8,59.5,6.8z M54.2,10.2h5.2c3.8,0,6.3,0.9,7.4,2.6c0.7,1.2,1.1,3.9,1.1,8.1c0,2.9-0.1,5-0.3,6
                    c-0.3,1.6-1,2.8-2.1,3.5c-1.2,0.8-3.3,1.2-6,1.2h-5.3V10.2z"></path>
                <g>
                    <path id="_x31_dp8f" d="M75.5,6.4c-0.6,0-1.1,0.2-1.5,0.6c-0.4,0.4-0.6,0.9-0.6,1.5c0,0.6,0.2,1.1,0.6,1.5c0.4,0.4,1,0.6,1.5,0.6
                        c0.6,0,1.1-0.2,1.5-0.6c0.4-0.4,0.6-0.9,0.6-1.5S77.4,7.5,77,7C76.6,6.6,76.1,6.4,75.5,6.4"></path>
                    <path id="_x31_dp8g" d="M73.8,35h3.4V15.2h-3.4L73.8,35z"></path>
                </g>
                <path id="_x31_dp8h" d="M90.9,16c-0.9-0.8-2.2-1.2-3.9-1.2c-1.6-0.1-3.2,0.4-4.4,1.3v-1h-3.3V35h3.3V21.9c0-1.2,0.4-2.1,1.3-2.7
                    c0.8-0.7,1.9-1,3.1-1c0.9,0,1.7,0.2,2.5,0.7l0.3,0.2l1.3-2.8L90.9,16"></path>
                <path id="_x31_dp8i" d="M98.6,14.9c-2.9,0-5.1,1.1-6.7,3.1c-1.3,1.8-1.9,4.2-1.9,7.2c0,6.7,3,10.1,8.9,10.1c3.1,0,5.4-1,7.1-3.1
                    l0.2-0.2l-2.3-2.2l-0.2,0.3c-1.1,1.4-2.7,2.1-4.7,2.1c-3.6,0-5.4-1.9-5.6-5.8h13l0.1-2c0-2.7-0.6-4.9-1.8-6.5
                    C103.2,15.9,101.2,14.9,98.6,14.9z M93.4,23.1c0.4-3.3,2.1-5,5.1-5c2.8,0,4.2,1.6,4.5,5L93.4,23.1z"></path>
                <path id="_x31_dp8j" d="M120.5,29.8c-0.6,0.7-1.3,1.3-2,1.8c-0.8,0.4-1.6,0.6-2.5,0.6c-3.7,0-5.5-2.3-5.5-7s1.8-7,5.5-7
                    c1,0,1.8,0.2,2.5,0.6c0.8,0.5,1.5,1.1,2,1.8l0.2,0.2l2.4-2.2l-0.2-0.2c-0.9-1-1.9-1.9-3-2.5c-1.2-0.6-2.5-0.9-3.9-0.8
                    c-2.9,0-5.2,1-6.8,3c-1.4,1.8-2.2,4.2-2.2,7.2c0,2.9,0.8,5.3,2.2,7.1c1.6,2,3.9,3,6.8,3c1.5,0,2.8-0.3,3.9-0.8
                    c0.9-0.5,1.9-1.3,3.1-2.5l0.2-0.2l-2.4-2.2L120.5,29.8"></path>
                <path id="_x31_dp8k" d="M133.4,18.5v-3.3h-3V9.6h-3.3v5.6h-2.6v3.3h2.6V30c0,4.1,2.4,5,4.4,5h1.4v-3.3h-0.3c-1.3,0-1.7-0.1-1.8-0.2
                    c-0.1-0.1-0.4-0.4-0.4-1.5V18.5H133.4"></path>
                <path id="_x31_dp8l" d="M149.4,30.3l-8.5-23.5h-3.4V35h3.5V16.2l6.9,18.8h3.1l6.9-18.8V35h3.4V6.8h-3.4L149.4,30.3"></path>
                <path id="_x31_dp8m" d="M178.9,20.9c0-1.7-0.8-3.4-2.2-4.4c-1.4-1-3.1-1.5-4.8-1.5c-3.9,0-6.5,1.7-7.5,4.9l-0.1,0.3l3.1,1.1
                    l0.1-0.3c0.6-1.8,2-2.7,4.3-2.7c1,0,1.9,0.2,2.5,0.6c0.8,0.5,1.2,1.1,1.2,2v1.9c-0.4,0.3-1,0.5-1.7,0.5h-3.4
                    c-1.7-0.1-3.4,0.5-4.7,1.6c-1.4,1.1-2.1,2.8-2.1,4.5c0,1.8,0.7,3.2,2.1,4.4c1.3,1.1,3,1.7,4.7,1.7c2,0,3.8-0.5,5.4-1.4l0.4,1.5
                    l3.2-1l-0.7-2.1L178.9,20.9L178.9,20.9z M168.1,27.2c0.7-0.6,1.5-0.8,2.4-0.8h3.6c0.5,0,1-0.1,1.5-0.2v4.4
                    c-1.4,1.2-3.2,1.8-5.1,1.7c-0.9,0-1.7-0.3-2.4-0.8c-0.7-0.5-1-1.2-1-2.1C167.1,28.4,167.4,27.7,168.1,27.2z"></path>
                <g>
                    <path id="_x31_dp8n" d="M183.2,6.4c-0.6,0-1.1,0.2-1.5,0.6C181.3,7.4,181,8,181,8.6c0,0.6,0.2,1.1,0.6,1.5
                        c0.4,0.4,0.9,0.6,1.5,0.6c0.6,0,1.1-0.2,1.5-0.6c0.4-0.4,0.6-0.9,0.6-1.5c0-0.6-0.2-1.1-0.6-1.5C184.3,6.6,183.8,6.4,183.2,6.4"></path>
                    <path id="_x31_dp8o" d="M181.5,35h3.4V15.2h-3.4V35z"></path>
                </g>
                <path id="_x31_dp8p" d="M192.8,31.8c-0.6,0-1-0.1-1.1-0.3c-0.1-0.2-0.3-0.6-0.3-1.4V6.8H188v23.4c0,3.2,1.7,4.8,4.8,4.8h0.3v-3.3
                    H192.8"></path>
            </g>
        </svg></a></span>



        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
              </button>
              
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <span class="mobile-logo"><img src="<?php echo get_template_directory_uri();?>/images/duck-logo.png" style="width: 40px;"></span>
                <!--<ul class="nav header_pad navbar-nav">
                    <li class="active"><a id="tel-nav" href="tel:8772552937" class="menu__item">(877) 255-2937</a></li>
                </ul>-->
             <!--  <ul class="nav navbar-nav">
                <li class="active"><a id="tel-nav" href="tel:8772552937" class="menu__item">(877) 255-2937</a></li>
                <li><a href="#">How it Works</a></li> 
                <li><a href="#">Feature</a></li> 
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#" class="login">Login</a></li>
              </ul> -->

               <?php

            $defaults = array(
              'theme_location'  => 'Primary',
              'menu'            => 'Main Menu',
              'container'       => 'ul',
              'container_class' => '',
              'container_id'    => '',
              'menu_class'      => '', 
              'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => '',
              'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav">%3$s</ul>',
              'depth'           => 0,
              'walker'          => ''
            );

            wp_nav_menu( $defaults );

          ?>
              
            </div>
          </div>
        </nav>
      </section>
    </header>
	<?php wp_head(); ?>
</head>

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '649780505906159');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=649780505906159&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<!--LinkedIn Retargeting Script-->
<script type="text/javascript">
    _linkedin_partner_id = "542914";
    window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
    window._linkedin_data_partner_ids.push(_linkedin_partner_id);
    </script><script type="text/javascript">
    (function(){var s = document.getElementsByTagName("script")[0];
    var b = document.createElement("script");
    b.type = "text/javascript";b.async = true;
    b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
    s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
    <img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=542914&fmt=gif
    https://dc.ads.linkedin.com/collect/?pid=542914&fmt=gif
    " />
</noscript>