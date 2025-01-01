<?php
/**
 * Template for Single Post
 */

get_header(); ?>

<!-- Single Post Page -->
<div class="container my-5">
    <?php
    // Increment Post View Count
    if (is_single()) {
        $postID = get_the_ID();
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        $count = ($count == '') ? 1 : (int)$count + 1;
        update_post_meta($postID, $count_key, $count);
    }
    ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <!-- Heading Section -->
    <div class="post-header mb-3 border-bottom pb-2">
        <h1 class="fw-bold text-center"><?php the_title(); ?></h1>
    </div>

    <!-- Author and Font Size Controls -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- Author Info -->
        <div class="d-flex align-items-center">
            <?php
            // Display Author Avatar
            echo get_avatar(get_the_author_meta('ID'), 50, '', 'Author Image', ['class' => 'rounded-circle me-2']);
            ?>
            <div>
                <small class="text-muted">Written By</small><br>
                <span class="fw-semibold"><?php the_author(); ?></span>
            </div>
        </div>

        <!-- Font Change Section (Right) -->
        <div class="text-size-buttons d-flex align-items-center">
            <p class="mb-0 me-2">फन्ट परिवर्तन गर्नुहोस:</p>
            <button class="btn btn-outline-primary rounded-circle me-2" 
                    style="font-size: 0.8em;" 
                    onclick="changeTextSize('small')">अ</button>
            <button class="btn btn-outline-primary rounded-circle me-2" 
                    style="font-size: 1em;" 
                    onclick="changeTextSize('medium')">अ</button>
            <button class="btn btn-outline-primary rounded-circle" 
                    style="font-size: 1.2em;" 
                    onclick="changeTextSize('large')">अ</button>
        </div>
    </div>

    <!-- View Count -->
    <div class="d-flex align-items-center mb-3">
        <i class="fa fa-eye me-2 text-secondary"></i>
        <span><?php echo get_post_meta(get_the_ID(), 'post_views_count', true); ?> Views</span>
    </div>

    <!-- Thumbnail -->
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail mb-4 text-center">
            <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded']); ?>
        </div>
    <?php endif; ?>

    <!-- Post Content -->
    <div id="post-content" class="post-content text-justify fs-5 lh-lg">
        <?php the_content(); ?>
    </div>

    <?php endwhile; endif; ?>
    
    <hr>
    <!-- Display comments section -->
    <div class="comments-section">
            <?php
            if (comments_open() || get_comments_number()) :
                comments_template();  // This will load the comments template (comments.php)
            endif;
            ?>
    </div>
    
    <!-- Related Posts Section -->
    <div class="related-posts mt-5 pt-4 border-top">
        <h3 class="fw-bold mb-4">छुटाउनुभयो कि ?</h3>
        <div class="row">
            <?php
            // Query for related posts by category
            $categories = wp_get_post_categories(get_the_ID());
            if ($categories) {
                $args = [
                    'category__in' => $categories,
                    'post__not_in' => [get_the_ID()], // Exclude current post
                    'posts_per_page' => 3, // Number of related posts
                ];
                $related_posts = new WP_Query($args);

                if ($related_posts->have_posts()) :
                    while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p class="text-muted">No related posts found.</p>
                <?php endif;
            }
            ?>
        </div>
    </div>
</div>

<!-- Font Size Change Script -->
<!-- Font Size Change Script -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        function changeTextSize(size) {
            const content = document.querySelector('.post-content');
            if (content) {
                if (size === 'small') {
                    content.style.fontSize = '1em'; // Small text size
                } else if (size === 'medium') {
                    content.style.fontSize = '1.5em'; // Medium text size
                } else if (size === 'large') {
                    content.style.fontSize = '2em'; // Large text size
                }
            } else {
                console.error("Content container not found.");
            }
        }
        window.changeTextSize = changeTextSize; // Make the function globally accessible
    });
</script>



<?php get_footer(); ?>
