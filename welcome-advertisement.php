<?php
if (get_theme_mod('enable_advertisement', false)) :
    $advertisement_message = get_theme_mod('advertisement_message', __('Welcome Advertisement Message', 'textdomain'));
    $advertisement_image   = get_theme_mod('advertisement_image', '');
    $advertisement_link    = get_theme_mod('advertisement_link', '');
    $advertisement_layout  = get_theme_mod('advertisement_layout', 'default');
    ?>
    <div id="welcome-advertisement" class="welcome-advertisement <?php echo esc_attr($advertisement_layout); ?>">
        <div class="advertisement-content">
            <p class="advertisement-message"><?php echo esc_html($advertisement_message); ?></p>
            <?php if ($advertisement_image) : ?>
                <a href="<?php echo esc_url($advertisement_link); ?>" target="_blank">
                    <img src="<?php echo esc_url($advertisement_image); ?>" alt="<?php esc_attr_e('Advertisement', 'textdomain'); ?>" />
                </a>
            <?php endif; ?>
            <button id="skip-ad" class="btn btn-warning">Skip This</button>
        </div>
    </div>
<?php endif; ?>

<style>
    #welcome-advertisement {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .welcome-advertisement .advertisement-content {
        text-align: center;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        max-width: 900px;
        width: 100%;
    }

    .welcome-advertisement img {
        max-width: 100%;
        border-radius: 8px;
    }

    .advertisement-message {
        font-size: 1.2rem;
        margin-bottom: 15px;
    }

    #skip-ad {
        margin-top: 10px;
        background-color: #ff6f61;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    #skip-ad:hover {
        background-color: #ff4b3a;
    }
</style>

<script>
    document.getElementById('skip-ad').addEventListener('click', function() {
        document.getElementById('welcome-advertisement').style.display = 'none';
    });

    // Auto-hide after 5 seconds
    setTimeout(function() {
        document.getElementById('welcome-advertisement').style.display = 'none';
    }, 5000);
</script>
