<?php get_header(); ?>

<div class="container mt-5">

    <?php if (have_posts()) : ?>
        <div class="row g-4">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="card h-100 shadow border-0">
                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="overflow-hidden">
                                    <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title text-primary"><?php the_title(); ?></h5>
                                <p class="card-text">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        echo wp_trim_words(get_the_excerpt(), 20, '...');
                                    } else {
                                        echo wp_trim_words(get_the_excerpt(), 50, '...');
                                    }
                                    ?>
                                </p>
                            </div>
                        </a>
                        <div class="card-footer bg-light border-top-0 d-flex justify-content-between align-items-center">
                            <small class="text-muted"> <?php echo get_the_date(); ?></small>
                            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="pagination justify-content-center mt-4">
            <?php
            the_posts_pagination(array(
                'prev_text' => __('&laquo; Previous', 'bihani'),
                'next_text' => __('Next &raquo;', 'bihani'),
                'mid_size' => 2,
                'screen_reader_text' => __(' ', 'bihani'),
                'class' => 'pagination justify-content-center'
            ));
            ?>
        </div>

    <?php else : ?>
        <div class="alert alert-warning text-center">
            <?php esc_html_e('No posts found in this category.', 'bihani'); ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>

<style>
.card {
    transition: transform 0.3s, box-shadow 0.3s;
    border-radius: 10px;
    overflow: hidden;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.card-title {
    font-weight: bold;
    font-size: 1.4rem;
    color: #007bff;
}

.card-text {
    color: #6c757d;
    font-size: 0.95rem;
}

.card-footer {
    font-size: 0.85rem;
}

.pagination {
    font-family: Arial, sans-serif;
    font-size: 1rem;
}

.pagination li {
    margin: 0 5px;
}

.pagination li a {
    color: #007bff;
    text-decoration: none;
    padding: 5px 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: all 0.2s;
}

.pagination li a:hover {
    background-color: #007bff;
    color: #fff;
}

.pagination .current {
    font-weight: bold;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    padding: 5px 10px;
}
</style>

<script>
    // Function to convert English numbers to Nepali numbers
    function toNepaliNumber(num) {
        const nepaliNumbers = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
        return String(num).replace(/\d/g, (digit) => nepaliNumbers[digit]);
    }

    // Convert pagination numbers to Nepali
    document.querySelectorAll('.pagination a').forEach(link => {
        const text = link.innerHTML;
        link.innerHTML = toNepaliNumber(text);
    });

    // Convert current page number
    document.querySelectorAll('.pagination .current').forEach(current => {
        const text = current.innerHTML;
        current.innerHTML = toNepaliNumber(text);
    });
</script>
