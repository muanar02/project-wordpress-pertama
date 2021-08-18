<div>
    <img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'medium-thumb'); ?>" class="rounded " alt="" width="100%" height="400">
</div>
<div class="post-info mt-2 mb-3 d-flex justify-content-start">
    <p class="m-0 mr-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php esc_html_e( 'Posted By', 'belajar' ); ?> <?php the_author(); ?> - <?php the_time('F j, Y') ?></p>
    <p class="m-0"><i class="fa fa-tags" aria-hidden="true"></i> <a href=""><?= get_the_category_list(', '); ?></a></p>
</div>
<h4 class="mt-2 text-uppercase"><?php the_title(); ?></h4>
<div id="content">
    <?php the_content(); ?>
</div>

<?php
$comment_number = get_comments_number();

if($comment_number != 0):
?>
<div class="comment card mt-4">
    <div class="card-header text-uppercase"><?php esc_html_e( 'Comment List', 'belajar' ); ?></div>
    <div class="comment-list mt-3">
        <ol>
        <?php
        $comments = get_comments(array(
            'post_id' => $post->ID,
            'status' => 'approve'
        ));
        wp_list_comments(array(
            'per_page' => 15,

        ), $comments);
        ?>
        </ol>
    </div>
</div>
<?php
endif;
?>



<div class="comment-form py-2 px-3 my-4 card">
<?php

$fields = array(
    'author' => '<div class="d-flex justify-content-between mt-3"><input type="text" class="form-control" id="author" name="author" value="'.esc_attr($commenter['comment_author']).'" '.$aria_req.' placeholder="Name" style="width:45%" />',
    'email' => '<input type="text" class="form-control" id="email" name="email" value="'.esc_attr($commenter['comment_author_email']).'" '.$aria_req.' placeholder="Email" style="width:45%" /></div>',
    'cookies' => ''
);

$args = array( 
    'title_reply' => '',
    'title_reply_to' => 'Reply',
    'cancel_reply_link' => 'Cancel Reply',
    'fields' => $fields,
    'comment_field' => '<textarea class="form-control" id="comment" name="comment" aria-required="true" placeholder="Your Message" ></textarea>',
    'label_submit' => 'Submit Comment',
    'id_submit' => 'comment-submit',
    'class_submit' => 'btn btn-primary mt-3',
    'comment_notes_before' => ''

);
comment_form($args);
?>
</div>