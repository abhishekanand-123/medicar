<?php /* Template Name: Test_field */ ?>
<?php get_header() ?>

<style>
    .faq-section {
        background: #fdfdfd;
        min-height: 100vh;
        padding: 10vh 0 0;
    }

    .faq-title h2 {
        position: relative;
        margin-bottom: 45px;
        display: inline-block;
        font-weight: 600;
        line-height: 1;
    }

    .faq-title h2::before {
        content: "";
        position: absolute;
        left: 50%;
        width: 60px;
        height: 2px;
        background: #E91E63;
        bottom: -25px;
        margin-left: -30px;
    }

    .faq-title p {
        padding: 0 190px;
        margin-bottom: 10px;
    }

    .faq {
        background: #FFFFFF;
        box-shadow: 0 2px 48px 0 rgba(0, 0, 0, 0.06);
        border-radius: 4px;
    }

    .faq .card {
        border: none;
        background: none;
        border-bottom: 1px dashed #CEE1F8;
    }

    .faq .card .card-header {
        padding: 0px;
        border: none;
        background: none;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
    }

    .faq .card .card-header:hover {
        background: rgba(233, 30, 99, 0.1);
        padding-left: 10px;
    }

    .faq .card .card-header .faq-title {
        width: 100%;
        text-align: left;
        padding: 0px;
        padding-left: 30px;
        padding-right: 30px;
        font-weight: 400;
        font-size: 15px;
        letter-spacing: 1px;
        color: #3B566E;
        text-decoration: none !important;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        cursor: pointer;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .faq .card .card-header .faq-title .badge {
        display: inline-block;
        width: 20px;
        height: 20px;
        line-height: 14px;
        float: left;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
        text-align: center;
        background: #E91E63;
        color: #fff;
        font-size: 12px;
        margin-right: 20px;
    }

    .faq .card .card-body {
        padding: 30px;
        padding-left: 35px;
        padding-bottom: 16px;
        font-weight: 400;
        font-size: 16px;
        color: #6F8BA4;
        line-height: 28px;
        letter-spacing: 1px;
        border-top: 1px solid #F3F8FF;
    }

    .faq .card .card-body p {
        margin-bottom: 14px;
    }

    @media (max-width: 991px) {
        .faq {
            margin-bottom: 30px;
        }

        .faq .card .card-header .faq-title {
            line-height: 26px;
            margin-top: 10px;
        }
    }
</style>
<section class="exciting top-one">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6 p-0">
                <div class="exciting_left">
                    <?php
                    //image get through array
                    // $image = get_field('test_image');
                    // if (!empty($image)) : 
                    ?>
                    <img src="<?php // echo esc_url($image['url']); 
                                ?>" alt="<?php // echo esc_attr($image['alt']); 
                                            ?>" />
                    <? //php endif; 
                    ?>
                    <!-- //image get through url
                    <?php /* if(get_field('test_image')):
                         ?>
                         <img src="<?php   the_field('test_image')?>">
                         <?php endif; */ ?> -->
                    <!-- image id se -->
                    <?php
                    $image = get_field('test_image');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    if ($image) {
                        echo wp_get_attachment_image($image, $size);
                    } ?>
                    <!-- file through array -->
                    <?php /* $file = get_field('test_file');
                    if ($file) :  ?>

                        <a href="<?php echo $file['url']; ?>"><?php echo $file['filename']; ?></a>


                    <?php endif;  */ ?>

                </div>
            </div>
            <div class="col-12 col-lg-6 col-md-6 p-0">
                <div class="exciting_right">


                    <p>Total number is :<?php echo esc_html(get_field('test_number')); ?></p>
                    <p> Range of this number is:<?php echo esc_html(get_field('test_range')) ?></p>
                    <!-- <p><?php // the_field("test_email"); 
                            ?></p> -->
                    <p> email us at <a href="<?php echo esc_url('mailto:' . antispambot(get_field('test_email'))); ?>"><?php echo esc_html(antispambot(get_field('test_email'))); ?></a> </p>
                    <p> url of the flipkart is:<a href="<?php echo esc_html(get_field('test_url')); ?>"><?php echo esc_html(get_field('test_url')); ?></a> </p>
                    <form>
                        <input type="password" value="<?php echo get_field("test_password"); ?>" name="pass">
                        <?php echo get_field("test_password"); ?>
                    </form>
                    <?php if (get_field('test_file')) : ?>
                        <a href="<?php the_field('test_file'); ?>">Download File</a>
                    <?php endif; ?>
                    <?php
                    if (get_field('test_oembed')) :
                    // the_field('test_oembed');
                    endif; ?>
                    <!-- <div class="col-md-6" style="display:flex ;"> -->
                    <?php
                    $images = get_field('test_gallery');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    if ($images) : ?>
                        <ul>
                            <?php foreach ($images as $image_id) : ?>
                                <li>
                                    <?php //echo wp_get_attachment_image($image_id, $size); 
                                    ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php

                    $link = get_field('test_link');
                    if ($link) :
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                    ?>
                        <a class="btn" href="<?php echo esc_url($link_url); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>

                    <!-- </div> -->
                    <?php $post_object = get_field('test_post_object');

                    if ($post_object) :

                        // override $post
                        $post = $post_object;
                        setup_postdata($post);

                    ?>
                        <div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                        </div>
                        <?php wp_reset_postdata();
                        ?>
                    <?php endif; ?>


                    <?php
                    $featured_posts = get_field('test_relationship');
                    if ($featured_posts) : ?>
                        <ul>
                            <?php foreach ($featured_posts as $post) : setup_postdata($post); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php
                        // Reset the global post object so that the rest of the page works correctly.
                        wp_reset_postdata(); ?>
                    <?php endif; ?>
                    <?php
                    $terms = get_field('test_taxonomy');
                    if ($terms) : ?>
                        <ul>
                            <?php foreach ($terms as $term) : ?>
                                <li>

                                    <a href="<?php echo esc_url(get_term_link($term)); ?>">View all '<?php echo esc_html($term->name); ?>' posts</a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <p><?php the_field('test_user'); ?></p>
                    <?php endif; ?>
                    <p>User can add their friends and family members</p>
                    <p>The user who will sign up on the platform by entering the required details will be the parent (main) user of the platform. these users can add their family members and friends to take platform benefits.these additional users can access the platform as per the chosen plans by the parent users.</p>
                </div>
            </div>
        </div>
    </div>

</section>




<section class="exciting top-two">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6 p-0">
                <div class="exciting_left">
                    <?php if (get_field('test_img')) : ?>
                        <img src="<?php the_field('test_img'); ?>" class="img-fluid" alt="manage">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-md-6 p-0">
                <div class="exciting_right">
                    <h3><?php the_field('test_text') ?></h3>
                    <p><?php the_field('test_content') ?> </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="faq-section">
    <div class="container">
        <div class="row">
            <!-- ***** FAQ Start ***** -->
            <div class="col-md-6 offset-md-3">

                <div class="faq-title text-center pb-3">
                    <h2><?php the_field('faq_header') ?></h2>
                </div>
            </div>
            <div class="col-md-6 offset-md-3">
                <div class="faq" id="accordion">


                    <?php $i = 0; ?>
                    <?php if (have_rows('faq_repeater')) :


                        // loop through the rows of data for the tab header
                        while (have_rows('faq_repeater')) : the_row();

                            $header = get_sub_field('faq_header');
                            $content = get_sub_field('faq_content');

                    ?>
                            <div class="card">
                                <div class="card-header" id="faqHeading-<?php echo $i; ?>">
                                    <div class="mb-0">
                                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-<?php echo $i; ?>" data-aria-expanded="true" data-aria-controls="faqCollapse-<?php echo $i; ?>">
                                            <!-- <span class="badge">1</span>What is Lorem Ipsum? -->
                                            <?php echo $header; ?>
                                        </h5>
                                    </div>
                                </div>
                                <div id="faqCollapse-<?php echo $i; ?>" class="collapse" aria-labelledby="faqHeading-<?php echo $i; ?>" data-parent="#accordion">
                                    <div class="card-body">
                                        <p><?php echo $content  ?> </p>
                                    </div>
                                </div>
                            </div>
                    <?php $i++;
                        endwhile;
                    endif; ?>
                </div>
            </div>

            <?php if (have_rows('test_group')) : ?>
                <?php while (have_rows('test_group')) : the_row();

                    // Get sub field values.
                    $image = get_sub_field('test_flexible_image');
                    $link = get_sub_field('group_link');
                    $content = get_sub_field('test_group_conent');

                ?>
                    <div id="hero">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <div class="content">
                            <?php echo $content; ?>
                            <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_attr($link['title']); ?></a>
                        </div>
                    </div>
                    <style type="text/css">
                        #hero {
                            background-color: <?php the_sub_field('group_color'); ?>;
                        }
                    </style>
                <?php endwhile; ?>
            <?php endif; ?>


            <?php

            // Check value exists.
           /* if (have_rows('test_flexible_content')) :

                // Loop through rows.
                while (have_rows('test_flexible_content')) : the_row();

                    // Case: Paragraph layout.
                    if (get_row_layout() == 'content') :
                        $text = get_sub_field('test_flexible_content_contens'); ?>

                        <p><?php echo $text; ?> </p>
                        <img src="<?php the_sub_field('test_flexible_content_image'); ?>">

            <?php endif;

                // End loop.
                endwhile;


            endif;*/ ?>
        </div>

        <?php

       /* if (have_rows('test_clone')) {

            while (have_rows('test_clone')) {

                // increment row
                the_row();


                // vars
                $button = get_sub_field('test_flexible_content_contens'); ?>



                
<p><?php //echo $button; ?></p>
<img src="<?php // the_sub_field('test_flexible_content_image');?> ">
<?php
            }
        }

       */ ?>




       <?php the_field('test_content'); ?>
       
    </div>
</section>
<?php ?>

<?php get_footer(); ?>