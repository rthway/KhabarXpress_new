<?php
/**
 * Template part for displaying featured posts
 */

$post_title_font_size = get_theme_mod( 'featured_post_title_font_size', '24px' );
$post_title_color = get_theme_mod( 'featured_post_title_color', '#333333' );
$post_content_font_size = get_theme_mod( 'featured_post_content_font_size', '16px' );
$post_content_color = get_theme_mod( 'featured_post_content_color', '#666666' );


// Get the post thumbnail ID
$thumbnail_id = get_post_thumbnail_id();
$thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full');
?>

<div class="featured-post text-center"> <!-- Add text-center class for centering -->
    <h2 class="post-title" style="font-size: <?php echo esc_attr( $post_title_font_size ); ?>; color: <?php echo esc_attr( $post_title_color ); ?>;">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
    
    <div class="post-meta">
        <span class="post-author"><?php the_author(); ?></span> | 
        <span class="post-time"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' अगाडि'; ?></span> | 
        <span class="post-comments"><?php comments_number(); ?></span>
    </div>

    <?php if ($thumbnail_url): ?>
        <div class="post-thumbnail">
            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>" class="img-fluid" />
        </div>
    <?php endif; ?>

    <div class="post-content" style="font-size: <?php echo esc_attr( $post_content_font_size ); ?>; color: <?php echo esc_attr( $post_content_color ); ?>;">
        <?php 
        // Get the content and limit it to 3 lines
        $content = wp_trim_words(get_the_content(), 40, '...'); 
        echo $content; 
        ?>
    </div>

    <a href="<?php the_permalink(); ?>" class="read-more">पुरा पढ्नुहोस्</a>
</div>

<style>
    .featured-post {
        border: 1px solid #ddd;
        padding: 20px;
        margin: 20px 0;
        border-radius: 5px;
        background-color: #ffffff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center; /* Center-align all content */
    }
    .post-title a {
        text-decoration: none;
        font-weight: bold;
 
    }
    .post-meta {
        font-size: 1.5em;
        color: #666;
        margin-bottom: 10px;
    }
    .post-thumbnail img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }
    .read-more {
        display: inline-block;
        font-size: 1.5em;
        margin-top: 10px;
        font-weight: bold;
        color: #007BFF;
        text-decoration: none;
    }
    .read-more:hover {
        text-decoration: underline;
    }
    .post-content {

        line-height: 1.6; /* Improve readability with line height */
        margin-top: 15px;
    }
</style>