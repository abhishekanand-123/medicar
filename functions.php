<?php
function custom_content_before_post()
{ ?>
    <form class="woocommerce-ordering" method="get">
        <select name="orderby" class="orderby form-select" aria-label="Shop order" onchange="this.form.submit()">
            <option <?php if (isset($order_by) && $orderby == 'ID' && isset($order) && $order == 'DESC') {
                        echo 'selected';
                    } ?> value="date-desc">Default sorting
            </option>

            <option <?php if (isset($order_by) && $orderby == 'ID' && isset($order) && $order == 'ASC') {
                        echo 'selected';
                    } ?> value="date-asc">Sort by popularity
            </option>

            <option <?php if (isset($order_by) && $orderby == 'title' && isset($order) && $order == 'ASC') {
                        echo 'selected';
                    } ?> value="title-asc">Sort by average rating
            </option>

            <option <?php if (isset($order_by) && $orderby == 'title' && isset($order) && $order == 'DESC') {
                        echo 'selected';
                    } ?> value="title-desc">Sort by latest
            </option>

            <option <?php if (isset($order_by) && $orderby == ['meta_value_num' => 'ASC', $order => 'ASC'] && isset($meta_key) && $meta_key == '_price') {
                        echo 'selected';
                    } ?> value="price-asc">Sort by price: low to high
            </option>

            <option <?php if (isset($order_by) && $orderby == ['meta_value_num' => 'DESC', $order => 'DESC']  && isset($meta_key) && $meta_key == '_price') {
                        echo 'selected';
                    } ?> value="price-desc">Sort by price: high to low
            </option>
        </select>
    </form><?php
        }
        add_action('before_post_content', 'custom_content_before_post');
        add_action('init', 'register_custom_menus');
        function register_custom_menus()
        {
            register_nav_menus(
                array(
                    'first_menu' => 'Footerlevel1',
                    'secondary_menu' => 'footerlevel2',
                    "third_menu" => 'Footerlevel3'
                )
            );
        }
            ?>
<?php
function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');




add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts'); // For non-logged in users

function load_more_posts()
{
    $paged = $_POST['paged'];

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 3,
        'orderby' => 'id',
        'order' => 'asc',
        'paged' => $paged,

    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<div class="load-more-target">'; // Start the container here
        echo '<div class="row">';
        while ($query->have_posts()) {
            $query->the_post();
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
                            <h4>
                                <?php // echo $product->get_stock_status(); 
                                ?>
                            </h4>
                            <?php if ($product->get_type() == 'simple') { ?>
                                <a class="btn" href="<?php echo $product->add_to_cart_url(); ?>">Add to Cart</a>
                            <?php } else { ?>
                                <a class="btn" href="<?php echo $product->get_permalink(); ?>">Select Options</a>
                            <?php } ?>
                        </div>
                    </li>
                </ul>
            </div>
<?php
        }
        echo '</div>';
        echo '</div>'; // Close the container here
        wp_reset_postdata();
    }

    die(); // Terminate the AJAX request properly
}
?>
<?php
function custom_search_form($form)
{
    $form = '<form role="search" method="get" id="searchform" action="' . home_url('/') . '" >
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search" />
    <input type="submit" id="searchsubmit" value="' . esc_attr__('Search') . '" />
    </form>';
    return $form;
}
add_filter('get_search_form', 'custom_search_form');

?>
<?php
add_action('wp_ajax_custom_ajax_paginations', 'custom_ajax_paginations');
add_action('wp_ajax_nopriv_custom_ajax_paginations', 'custom_ajax_paginations');

function custom_ajax_paginations()
{
    // Check for nonce security
    // check_ajax_referer('my_ajax_nonce', 'security');

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 1,
        'order'          => 'ASC',
        'orderby'        => 'ID',
        'paged'          => $_POST['page'],
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
?>
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
            </div>
        </div>
<?php
        wp_reset_postdata(); // Reset the post data after the loop
    }

    wp_die(); // This is required to terminate immediately and return a proper response
}
?>
<?php
add_action('wp_ajax_custom_ajax_pagination', 'custom_ajax_pagination');
add_action('wp_ajax_nopriv_custom_ajax_pagination', 'custom_ajax_pagination');

function custom_ajax_pagination()
{
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 1,
        'order'          => 'ASC',
        'orderby'        => 'ID',
        'paged'          => $_POST['page'],
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
?>
            <div class="col-4">
                <h3><?php the_title(); ?></h3>
                <p><?php the_content(); ?></p>
                <img src="<?php the_post_thumbnail_url(); ?>">
            </div>
    <?php
        endwhile;
    endif;

    wp_die(); // This is required to terminate immediately and return a proper response
}
add_filter('wp_mail_from', 'custom_wp_mail_from');
add_filter('wp_mail_from_name', 'custom_wp_mail_from_name');

function custom_wp_mail_from($email)
{
    return 'your_email@example.com';
}

function custom_wp_mail_from_name($name)
{
    return 'Your Name';
}
function mailtrap($phpmailer)
{
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '6277bc6f7968ba';
    $phpmailer->Password = '12df14abaecd28';
}


// Save custom meta box data
function CreateTextfield()
{
    $screen = 'post';
    add_meta_box('my-meta-box-id', 'Text Editor', 'displayeditor', $screen, 'normal', 'high');
}
add_action('add_meta_boxes', 'CreateTextfield');

/*Display PostMeta*/
function displayeditor($post)
{
    global $wbdb;
    $metaeditor = 'metaeditor';
    $displayeditortext = get_post_meta($post->ID, $metaeditor, true);
    ?>
    <!-- <h2>Secound Editor</h2> -->
    <label for="my_meta_box_text">Text Label</label>
    <input type="text" name="my_meta_box_text" id="my_meta_box_text" value="<?php echo $displayeditortext; ?>" />
<?php
}

/*Save Post Meta*/
// function saveshorttexteditor($post)
// {
//     $editor = $_POST['my_meta_box_text'];
//     update_post_meta($post, 'metaeditor', $editor);
// }
// add_action('save_post', 'saveshorttexteditor');

// aaj ka task nichale wala code sahi hai


//aaj ka task nichale wala code sahi hai

// Function to calculate tips based on percentage
add_action('wp_ajax_form_data', 'ajax_form_data');
// For non-logged-in users, use:
add_action('wp_ajax_nopriv_form_data', 'ajax_form_data');

function ajax_form_data()
{
    //     global $woocommerce;
    //     print_r(get_class_methods($woocommerce->cart));
    parse_str($_POST['form_data'], $arr); // Use parse_str() to parse serialized form data
    //the file
    // // Convert values to integers
    foreach ($arr as &$value) {
        $woocommerce->cart->add_fee(intval($value));
        $value = intval($value); // Convert to integer
    }

    echo $value;
    // echo '<pre>';
    // print_r($arr);
    // echo '</pre>';
    die(); // Always terminate after sending the response
}




add_action('woocommerce_before_shop_loop_item_title', 'ts_show_sale_percentage', 25);
add_action('woocommerce_before_single_product_summary', 'ts_show_sale_percentage', 25);
function ts_show_sale_percentage()
{
    global $product;
    $max_percentage = 0; // Initialize $max_percentage here
    if (!$product->is_on_sale()) return;
    if ($product->is_type('simple')) {
        $max_percentage = (($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100;
    } elseif ($product->is_type('variable')) {
        foreach ($product->get_children() as $child_id) {
            $variation = wc_get_product($child_id);
            $price = $variation->get_regular_price();
            $sale = $variation->get_sale_price();
            $percentage = 0; // Initialize $percentage here

            if ($price != 0 && !empty($sale)) {
                $percentage = ($price - $sale) / $price * 100;
            }

            if ($percentage > $max_percentage) {
                $max_percentage = $percentage;
            }
        }
    }
    if ($product->is_type('grouped')) {
        return; // Skip grouped products
    }
    if ($max_percentage > 0) echo "<div class='sale-perc'>" . "Product total discount" . round($max_percentage) . "%</div>";
}




// function woocommerce_discount_coupon($subtotal, $compound, $cart)
// {

//     $store_credit = 0;
//     foreach ($cart->get_cart() as $cart_item_key => $cart_item) {

//         $product_id = $cart_item['product_id'];

//         $acf_field_value = get_field('discount_itam', $product_id);


//         if (!empty($acf_field_value)) {
//             $store_credit += $acf_field_value;
//         }
//     }


//     if ($store_credit > 0) {

//         $coupon_name = 'discount-button';
//         $coupon = array($coupon_name => $store_credit);


//         $cart->applied_coupons = array($coupon_name);
//         $cart->set_discount_total($store_credit);
//         $cart->set_total($cart->get_subtotal() - $store_credit);
//         $cart->coupon_discount_totals = $coupon;
//     }

//     return $subtotal;
// }

// add_filter('woocommerce_cart_subtotal', 'woocommerce_discount_coupon', 10, 3);


function woocommerce_discount_coupon($subtotal, $compound, $cart)
{
    
    $total_discount = 0;

    
    foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
        $product_id = $cart_item['product_id'];

        
        $acf_field_value = get_field('discount_itam', $product_id);

       
        if (!empty($acf_field_value)) {
            
            $quantity = $cart_item['quantity'];
            
            
            $item_discount = $acf_field_value * $quantity;
            
            
            $total_discount += $item_discount;
        }
    }

    // Apply the total discount if it's greater than 0
    if ($total_discount > 0) {
        $coupon_name = 'discount-button';
        $coupon = array($coupon_name => $total_discount);

        // Apply the coupon
        $cart->applied_coupons = array($coupon_name);
        $cart->set_discount_total($total_discount);
        $cart->set_total($cart->get_subtotal() - $total_discount);
        $cart->coupon_discount_totals = $coupon;
    }

    return $subtotal;
}

// Hook the function to the WooCommerce cart subtotal filter
add_filter('woocommerce_cart_subtotal', 'woocommerce_discount_coupon', 10, 3);


add_action( 'woocommerce_single_product_summary', 'custom_replace_add_to_cart_button', 25 );

function custom_replace_add_to_cart_button() {
    global $product;
    
    // Check if ACF plugin is active
    if( function_exists('get_field') ) {
        $amazon_url = get_field( 'shop_now', $product->get_id() ); 

        
        if( $amazon_url ) {
            
            echo '<div class="amazon-buy-button">';
          
            echo '</div>';
            
            ?>
            <script>
                jQuery(function($){
                    $('button.single_add_to_cart_button').click(function(e){
                        e.preventDefault(); // Prevent default add to cart action
                        window.location.href = '<?php echo esc_url( $amazon_url ); ?>'; // Redirect to Amazon URL
                    });
                });
            </script>
            <?php
        }
    }
}



if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Common Settings',
        'menu_title'    => 'Common',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
}




//aaj



 add_action('wp_ajax_filter_posts_by_category', 'filter_posts_by_category');
  add_action('wp_ajax_nopriv_filter_posts_by_category', 'filter_posts_by_category');

  function filter_posts_by_category() {
      $categories = $_POST['categories'];

   $args = array(
         'post_type'      => 'post',
          'orderby'        => 'ID',
         'post_status'    => 'publish',
          'order'          => 'ASC',
          'posts_per_page' => -1, // this will retrieve all the posts that are published 
          'category_name'  => implode(',', $categories), // Include this line to filter by categories
      );

      $result = new WP_Query($args);

      if ($result->have_posts()) {
         while ($result->have_posts()) {
              $result->the_post();
              ?>
           <div class="col-md-4">
                 <div class="post-item">
                     <h2><?php  the_title(); ?></h2>
                     <img src="<?php  the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>">                 </div>
               </div>
             <?php
         }
      }

      wp_reset_postdata();

      die();
  }

// echo get_template_directory() . '/js/medicare_custom.js';
// wp_die();

function enqueue_filter_posts_script() {
  
    wp_enqueue_script('jquery_cdn', get_stylesheet_directory_uri() . '/js/jquery_cdn.js', array(), '3.5.1', true);
    wp_enqueue_script('medicare_custom', get_stylesheet_directory_uri() . '/js/medicare_custom.js', array(), '', true);


    

   
}
add_action('wp_enqueue_scripts', 'enqueue_filter_posts_script');


add_action( 'wp_head', 'add_admin_ajax_meta_tag' );
function add_admin_ajax_meta_tag() {
    ?>
    <meta name="admin-ajax-url" content="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
    <?php
}




function cust_post_taxonomy()
{
    register_post_type('movies', [
        'labels' => [
            'name' => 'Movies',
            'menu_name' => 'Movies',
            'singular_name' => 'Movie',
            'all_items' => 'All Movies',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Movie',
            'edit_item' => 'Edit Movie',
            'new_item' => 'New Movie',
            'view_item' => 'View Movie',
            'parent_item_colon' => '',
            //parent movie
            'search_items' => 'Search Movie',
            'not_found' => 'Not found',
            'not_found_in_trash' => 'Not found in Trash',
            'archives' => 'Archives',
            'attributes' => 'Attributes',
            'insert_into_item' => 'Insert into Movie',
        ],
        'supports' => [
            'title',
            // post title
            'editor',
            // post content
            'author',
            // post author
            'thumbnail',
            // featured images
            'excerpt',
            // post excerpt
            'custom-fields',
            // custom fields
            'comments',
            // post comments
            'revisions',
            // post revisions
            'post-formats',
            // post formats
        ],
        'public' => true,
        'menu_position' => 4,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'movies'],
        'taxonomies' => ['movies_categories', 'pos_tag'],

    ]);

    //Custom taxonomy 1(category)
    register_taxonomy('movies_categories', ['movies'], [
        'hierarchical' => true,
        'rewrite' => ['slug' => 'movies_categories'],
        'show_admin_column' => true,
        'show_in_rest' => true,
        'labels' => [
            'name' => __('Movies_categories', 'txtdomain'),
            'singular_name' => __('Movie_category', 'txtdomain'),
            'all_items' => __('All Movie_categories', 'txtdomain'),
            'edit_item' => __('Edit Movie_categories', 'txtdomain'),
            'view_item' => __('View Movie_category', 'txtdomain'),
            'update_item' => __('Update Movie_category', 'txtdomain'),
            'add_new_item' => __('Add Movie_category', 'txtdomain'),
            'new_item_name' => __('New Movie_category', 'txtdomain'),
            'search_items' => __('Search Movie_categories', 'txtdomain'),
            'parent_item' => __('Parent Movie_category', 'txtdomain'),
            'parent_item_colon' => __('Parent Movie_categories:', 'txtdomain'),
            'not_found' => __('No Movie_categories found', 'txtdomain'),
        ]
    ]);
    register_taxonomy_for_object_type('movies_categories', 'movies');

    //Custom taxonomy 1(Post tags)
    register_taxonomy('pos_tag', ['movies'], [

        'hierarchical' => false,
        'rewrite' => ['slug' => 'pos_tag'],
        'show_admin_column' => true,
        'labels' => [
            'name' => __('Movie_tags', 'txtdomain'),
            'singular_name' => __('Movie_tag', 'txtdomain'),
            'all_items' => __('All Movie_tags', 'txtdomain'),
            'edit_item' => __('Edit Movie_tags', 'txtdomain'),
            'view_item' => __('View Movie_tags', 'txtdomain'),
            'update_item' => __('Update Movie_tags', 'txtdomain'),
            'add_new_item' => __('Add New Movie_tag', 'txtdomain'),
            'new_item_name' => __('New Movie_tag Name', 'txtdomain'),
            'search_items' => __('Search Movie_tags', 'txtdomain'),
            'popular_items' => __('Popular Movie_tags', 'txtdomain'),
            'separate_items_with_commas' => __('Separate Movie_tags with comma', 'txtdomain'),
            'choose_from_most_used' => __('Choose from most used Movie_tags', 'txtdomain'),
            'not_found' => __('No Movie_tags found', 'txtdomain'),
        ]
    ]);
    register_taxonomy_for_object_type('pos_tag', 'movies');
}
;

add_action('init', 'cust_post_taxonomy', 0);





// This PHP section should be within your theme's functions.php or in a plugin file

// // Enqueue scripts
// function enqueue_custom_scripts() {
//     wp_enqueue_script('jquery');
//     // Enqueue your custom script for handling AJAX requests
//     wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom-script.js', array('jquery'), '1.0', true);
// }
// add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// // AJAX handler for filtering posts
add_action('wp_ajax_custom_filter_movies', 'custom_filter_movies');
add_action('wp_ajax_nopriv_custom_filter_movies', 'custom_filter_movies');

function custom_filter_movies() {
    // Verify nonce if you're using it for security
    // check_ajax_referer('your_nonce_name', 'security');

    // Get category slugs from the AJAX request
    $category_slugs = isset($_POST['category']) ? $_POST['category'] : array();

    // Query posts based on the category slugs
    $args = array(
        'post_type'      => 'movies',
        'posts_per_page' => -1,
        'tax_query'      => array(
            array(
                'taxonomy' => 'movies_categories',
                'field'    => 'slug',
                'terms'    => $category_slugs,
            ),
        ),
    );

    $result = new WP_Query($args);

    // Prepare response
    $response = array();

    if ($result->have_posts()) {
        ob_start();
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
        $response['html'] = ob_get_clean();
    } else {
        $response['html'] = '<p>No posts found</p>';
    }

    // Send JSON response
    wp_send_json($response);
    // Don't forget to terminate the script execution
    wp_die();
}


//api intregation
add_action('rest_api_init', 'custom_woocommerce_api_init');

function custom_woocommerce_api_init() {
    register_rest_route('custom/v1', '/products/', array(
        'methods' => 'GET',
        'callback' => 'custom_get_all_products',
        'permission_callback' => '__return_true',
    ));
}


function custom_get_all_products($data) {

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
    );

    $products = get_posts($args);

    if (empty($products)) {
        return new WP_Error('no_products', 'No products found', array('status' => 404));
    }

    $formatted_products = array();

    foreach ($products as $product) {
        $formatted_products[] = array(
            'id' => $product->ID,
            'title' => get_the_title($product->ID),
            'price' => get_post_meta($product->ID, '_price', true),
            'description' => get_the_excerpt($product->ID),
            // Add more fields as needed
        );
    }

    return rest_ensure_response($formatted_products);
}

function custom_login_logo() {
    echo '<style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('.get_stylesheet_directory_uri().'/assets/images/favicon.png);

            
            width:240px;
            
            padding-bottom: 0px;
        }
    </style>';
}

add_action('login_enqueue_scripts', 'custom_login_logo');




add_action('wp_ajax_create_post', 'create_post_callback');
add_action('wp_ajax_nopriv_create_post', 'create_post_callback');

function create_post_callback() {
    $title = sanitize_text_field($_POST['post-title']);
    $description = sanitize_text_field($_POST['post-description']);

    $new_post = array(
        'post_title'    => $title,
        'post_content'  => $description,
        'post_status'   => 'publish',
        'post_author'   => 1 // Change to desired author ID or keep as 1 for admin
    );

    $post_id = wp_insert_post($new_post);

    if ($post_id) {
        echo 'Post created successfully!';
    } else {
        echo 'Error creating post.';
    }

    wp_die();
}

