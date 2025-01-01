<?php
// Check if comments are open or there are comments
if (have_comments()) : ?>
    <h2 class="comments-title">
        <?php
        $comment_count = get_comments_number();
        if ($comment_count == 0) {
            echo 'यो पोष्टमा कुनै टिप्पणी छैन।'; // No comments on this post
        } elseif ($comment_count > 1) {
            echo $comment_count . ' टिप्पणिहरू छन्।'; // Multiple comments
        } else {
            echo '१ टिप्पणी छ।'; // One comment
        }
        ?>
    </h2>

    <ol class="comment-list">
        <?php
        // Display comments
        wp_list_comments(array(
            'style' => 'ol',
            'short_ping' => true,
        ));
        ?>
    </ol>

    <?php
    // Pagination for comments if necessary
    the_comments_pagination(array(
        'prev_text' => 'अघिल्लो',
        'next_text' => 'पछिल्लो',
        'screen_reader_text' => 'टिप्पणी पृष्ठ नेविगेशन',
    ));
endif;

if (comments_open()) :
    // Display the comment form
    comment_form(array(
        'title_reply' => 'यहाँ टिप्पणी गर्नुहोस्', // Comment here
        'label_submit' => 'टिप्पणी पठाउनुहोस्', // Submit comment
    ));
else :
    echo '<p>कृपया टिप्पणी गर्ने सुविधा उपलब्ध छैन।</p>'; // Comments are closed
endif;

// Social login buttons (using Nextend Social Login or similar plugin)
?>
<div class="social-login">
    <h3>तपाईं फेसबुक, गुगल र अन्य मार्फत पनि लग इन गर्न सक्नुहुन्छ।</h3>
    <?php
    if (is_user_logged_in()) {
        echo '<p>तपाईं हालमा लग इन हुनु भएको छ।</p>';
    } else {
        // Check if the Nextend Social Login plugin is activated
        if (function_exists('nextend_social_login_buttons')) {
            nextend_social_login_buttons();
        } else {
            echo '<p>सामाजिक मिडिया लग इन सेवा उपलब्ध छैन।</p>';
        }
    }
    ?>
</div>
