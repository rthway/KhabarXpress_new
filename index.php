<?php
/**
 * The Main Index Template
 */
$post_per_page = get_theme_mod( 'featured_number_of_posts', 6 ); // Set the default value for posts per page

get_header(); ?>

<!-- Main Blog Section -->
<div class="container my-5">


<div class="row">
        <div class="col-12">
            <!-- <h2 class="mb-4 text-center">Featured Post</h2> -->
            <?php
            $featured_category = get_theme_mod('featured_category', '');
            // $number_of_posts = get_theme_mod('number_of_posts', 5);
            $args = array('cat' => $featured_category, 'posts_per_page' => $post_per_page); // Apply $post_per_page here
            $featured_posts = new WP_Query($args);

            if ($featured_posts->have_posts()) :
                while ($featured_posts->have_posts()) : $featured_posts->the_post();
                    get_template_part('template-parts/featured-post', 'featured-post');
                endwhile;
            else :
                echo '<p>No posts found.</p>';
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>

    <hr>

    <div class="row my-4">
        <div class="col-lg-8"><?php get_template_part('template-parts/block-01'); ?></div>
        <div class="col-lg-4">
        </div>
    </div>

    


</div>

<?php get_footer(); ?>
