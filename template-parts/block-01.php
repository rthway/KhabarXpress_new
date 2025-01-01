<?php
// Fetch posts from the specified category
$args = array(
    'posts_per_page' => 5, // 1 main + 6 additional
    'category_name'  => 'आर्थिक', // Replace with the desired category slug
);
$query = new WP_Query($args);

if ($query->have_posts()) :
?>
    <div class="custom-block">
        <!-- Block Title -->
        <div class="block-header">
            <h2 class="block-title">आर्थिक</h2>
            <a href="<?php echo get_category_link(get_category_by_slug('आर्थिक')->term_id); ?>" class="view-all">सबै हेर्नुहोस्</a>
        </div>
        <hr>

        <!-- Main Post -->
        <?php $query->the_post(); ?>
        <div class="main-post">
            <div class="main-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/No_Image_Available.jpg"/>
                    <?php endif; ?>
                </a>
            </div>
            <div class="main-content">
                <h3 class="main-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p class="main-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
            </div>
        </div>

        <!-- Additional Posts -->
        <div class="additional-posts">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="row">
                    <div class="additional-post">
                        <div class="additional-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/inc/No_Image_Available.jpg" alt="No image available" />
                                <?php endif; ?>
                            </a>
                        </div>
                        <h4 class="additional-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                    </div>
                    <?php if ($query->have_posts()) : $query->the_post(); ?>
                        <div class="additional-post">
                            <div class="additional-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium'); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/inc/No_Image_Available.jpg" alt="No image available" />
                                    <?php endif; ?>
                                </a>
                            </div>
                            <h4 class="additional-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php
endif;
wp_reset_postdata();
?>

<!-- Styles for the Block -->
<style>
/* Block Container */
.custom-block {
    margin: 40px 0;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Block Header */
.block-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.block-title {
    font-size: 1.8rem;
    font-weight: bold;
    color: #007bff;
}

.view-all {
    font-size: 1rem;
    text-decoration: none;
    color: #007bff;
    border: 1px solid #007bff;
    padding: 5px 10px;
    border-radius: 5px;
    transition: all 0.3s;
}

.view-all:hover {
    background-color: #007bff;
    color: #fff;
}

/* Main Post */
.main-post {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
}

.main-thumbnail img {
    width: 400px;
    height: auto;
    border-radius: 8px;
}

.main-content {
    flex: 1;
}

.main-title {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #333;
    text-decoration: none;
}

.main-title a {
    color: #333;
    text-decoration: none;
}

.main-title a:hover {
    color: #007bff;
}

.main-excerpt {
    font-size: 1rem;
    color: #555;
}

/* Additional Posts */
.additional-posts .row {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 20px;
}

.additional-post {
    flex: 1;
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
}

.additional-post:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.additional-thumbnail img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 10px;
}

.additional-title {
    font-size: 1.5rem;
    color: #333;
    text-decoration: none;
    line-height: 1.2;
}

.additional-title a {
    color: #333;
    text-decoration: none;
}

.additional-title a:hover {
    color: #007bff;
}
</style>
