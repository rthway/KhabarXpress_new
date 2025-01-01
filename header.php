<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">



    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="<?php bloginfo('name'); ?>">

    <!-- SEO Metadata -->
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo esc_url(get_permalink()); ?>">
    
    <!-- Open Graph Metadata for Social Sharing -->
    <meta property="og:locale" content="<?php echo get_locale(); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php wp_title(''); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <?php if (has_post_thumbnail()) : ?>
        <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(null, 'large'); ?>">
    <?php endif; ?>

    <!-- Twitter Card Metadata -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php wp_title(''); ?>">
    <meta name="twitter:description" content="<?php bloginfo('description'); ?>">
    <?php if (has_post_thumbnail()) : ?>
        <meta name="twitter:image" content="<?php echo get_the_post_thumbnail_url(null, 'large'); ?>">
    <?php endif; ?>

    <!-- Favicon -->
    <?php if (function_exists('has_site_icon') && has_site_icon()) : ?>
        <?php wp_site_icon(); ?>
    <?php else : ?>
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
    <?php endif; ?>

    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header bg-light py-3 border-bottom">
    <div class="container-fluid">
        <div class="row justify-content-between align-items-center bg-primary py-2">
        <!-- Current Date and Time on Left -->
            <div class="col-auto">
                <span class="date-time" style="color:#ffffff; )">
                <?php 
                echo date('F j, Y h:i A'); 
                ?>
                <?php 
                // echo get_nepali_today_date(); 
                ?></span>
            </div>
            <!-- Social Menu (Dynamic) on Right -->
            <div class="col-auto">
                <div class="social-menu">
                    <a href="<?php echo get_theme_mod('facebook_link', '#'); ?>" class="text-white me-2">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="<?php echo get_theme_mod('twitter_link', '#'); ?>" class="text-white me-2">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="<?php echo get_theme_mod('instagram_link', '#'); ?>" class="text-white me-2">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="<?php echo get_theme_mod('linkedin_link', '#'); ?>" class="text-white">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-between align-items-center">
            <!-- Logo (Dynamic) on Left -->
            <div class="col-auto ms-5">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                }
                ?>
            </div>
            <!-- Header Advertisement (Dynamic) on Right -->
            <div class="col-auto me-5">
                <?php if (is_active_sidebar('header-ads')) {
                    dynamic_sidebar('header-ads');
                } ?>
            </div>
        </div>
    </div>
</header>


<!-- Navbar Section -->
<nav class="navbar navbar-expand-lg sticky-top " style="background-color: #1c8b98;">
    <div class="container-fluid">
        
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->
            <i class="fa fa-bars" aria-hidden="true"></i>

        </button>

        <!-- Navbar Links Section -->
        <div class="collapse navbar-collapse ms-5" id="navbarNav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary-menu', // The location in the WordPress dashboard menu
                'container' => false, // No container
                'menu_class' => 'navbar-nav mr-auto', // The classes to be added to the menu
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 2, // Allow for submenus
                'walker'          => new WP_Bootstrap_Navwalker(),
            ));
            ?>
        </div>

        <!-- Search Icon Section (Right side) -->
        <div class="d-flex align-items-center me-5">
            <button class="btn " data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Search Modal (Creative Design) -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg rounded">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="searchModalLabel"><i class="fas fa-search"></i> Search</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="search-form-container">
                    <form role="search" method="get" class="search-form">
                        <div class="input-group">
                            <input type="text" name="s" class="form-control py-3" value="<?php echo get_search_query(); ?>" placeholder="Search for posts, pages, or products..." aria-label="Search">
                            <button type="submit" class="btn btn-primary py-3">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>


<?php
// Include SEO metadata
if (is_singular()) {
    echo '<meta name="keywords" content="' . get_the_title() . '">';
}
?>

<?php wp_footer(); ?>
</body>
</html>
