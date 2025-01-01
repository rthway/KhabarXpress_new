<?php
/**
 * The template for displaying comments
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <h3 class="comments-title">
        प्रतिक्रिया
    </h3>

    <div class="comments-navigation">
        <button class="btn btn-primary active">भर्खरि</button>
        <button class="btn btn-light">पुराना</button>
        <button class="btn btn-light">लोकप्रिय</button>
    </div>

    <?php if (have_comments()) : ?>
        <ul class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ul',
                'short_ping' => true,
                'avatar_size' => 50,
            ));
            ?>
        </ul>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'textdomain'); ?></p>
    <?php endif; ?>

    <div class="comment-form-wrapper">
        <?php
        $comment_form_args = array(
            'title_reply' => '',
            'comment_field' => '<textarea id="comment" name="comment" rows="4" placeholder="Please write your comment..." class="form-control"></textarea>',
            'submit_button' => '<button class="btn btn-primary comment-submit-btn" type="submit">प्रतिक्रिया दिनुहोस्</button>',
            'class_form' => 'comment-form',
        );

        comment_form($comment_form_args);
        ?>
    </div>
</div>

<style>
    .comments-area {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-top: 20px;
    }

    .comments-title {
        font-size: 1.8rem;
        color: #1a73e8;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .comments-navigation {
        margin-bottom: 20px;
    }

    .comments-navigation .btn {
        margin-right: 5px;
        font-size: 0.9rem;
        border-radius: 5px;
    }

    .comments-navigation .btn.active {
        background-color: #1a73e8;
        color: #fff;
    }

    .comment-list {
        list-style: none;
        padding: 0;
        margin: 20px 0;
    }

    .comment-list li {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
    }

    .comment-form-wrapper {
        margin-top: 20px;
    }

    .comment-form textarea {
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        font-size: 1rem;
    }

    .comment-submit-btn {
        margin-top: 10px;
        background-color: #1a73e8;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 8px 15px;
        font-size: 1rem;
    }

    .comment-submit-btn:hover {
        background-color: #135bb4;
    }
</style>
