<?php get_header(); ?>

<!-- Search Section -->
<section class="search-section py-5" style="background-color: #f5f5f5;">
    <div class="container">
        <div class="row">
            <!-- Search Bar -->
            <div class="col-12 text-center mb-4">
                <h2 class="text-primary mb-3">Search Results</h2>
                <form role="search" method="get" class="search-form d-flex justify-content-center">
                    <input type="text" name="s" class="form-control w-50" value="<?php echo get_search_query(); ?>" placeholder="Search for posts..." aria-label="Search">
                    <button type="submit" class="btn btn-primary ms-3">
                        <i class="fas fa-search"></i> Search
                    </button>
                </form>
            </div>
        </div>

        <!-- Search Results -->
        <div class="row">
            <?php if ( have_posts() ) : ?>
                <div class="col-12">
                    <div class="row">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <div class="card-img-top">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php the_title(); ?></h5>
                                        <p class="card-text"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read More</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Sorry, no results found for your search.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-12 text-center">
                <?php
                the_posts_pagination([
                    'mid_size' => 2,
                    'prev_text' => '&laquo;',
                    'next_text' => '&raquo;',
                ]);
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
