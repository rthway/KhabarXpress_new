<?php
/**
 * Template part for displaying Block 01 layout with "आर्थिक" category posts
 */

?>

<div class="block01">
    <div class="featured-post row">
        <?php
        // Query for the featured post in the "आर्थिक" category
        $featured_query = new WP_Query(array(
            'posts_per_page' => 1,
            'category_name' => 'आर्थिक', // Filter by "आर्थिक" category
            'meta_key' => 'is_featured', // Optional: if you have a custom field for featured posts
            'meta_value' => '1',
        ));

        if ($featured_query->have_posts()) :
            while ($featured_query->have_posts()) : $featured_query->the_post();
                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                ?>
                <div class="col-md-6">
                    <h3 class="category-title"><?php echo get_the_category_list(', '); ?></h3>
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p class="post-date"><?php echo get_the_date(); ?></p>
                    <div class="post-content">
                        <?php echo wp_trim_words(get_the_content(), 40, '...'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php if ($thumbnail_url): ?>
                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>" class="img-fluid" />
                    <?php endif; ?>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>

    <div class="row secondary-posts">
        <?php
        // Query for the secondary posts in the "आर्थिक" category
        $secondary_query = new WP_Query(array(
            'posts_per_page' => 3,
            'category_name' => 'आर्थिक', // Filter by "आर्थिक" category
            'offset' => 1, // Skip the featured post
        ));

        if ($secondary_query->have_posts()) :
            while ($secondary_query->have_posts()) : $secondary_query->the_post();
                ?>
                <div class="col-md-4">
                    <h4 class="category-title"><?php echo get_the_category_list(', '); ?></h4>
                    <h3 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div class="post-content">
                        <?php echo wp_trim_words(get_the_content(), 25, '...'); ?>
                    </div>
                    <p class="post-date"><?php echo get_the_date(); ?></p>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</div>

<style>
.block01 {
    margin: 20px 0;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
.featured-post {
    margin-bottom: 30px;
}
.featured-post h2 {
    font-size: 1.8rem;
    font-weight: bold;
    color: #222;
    margin-bottom: 15px;
}
.featured-post .post-content {
    font-size: 1rem;
    color: #555;
    line-height: 1.6;
}
.secondary-posts .col-md-4 {
    margin-bottom: 20px;
}
.secondary-posts h3 {
    font-size: 1.4rem;
    color: #333;
    font-weight: bold;
    margin-bottom: 10px;
}
.secondary-posts .post-content {
    font-size: 0.95rem;
    color: #666;
    line-height: 1.5;
}
.category-title {
    font-size: 0.9rem;
    font-weight: bold;
    color: #f97300;
    margin-bottom: 5px;
    text-transform: uppercase;
}
.post-date {
    font-size: 0.85rem;
    color: #999;
    margin-top: 10px;
}
</style>
