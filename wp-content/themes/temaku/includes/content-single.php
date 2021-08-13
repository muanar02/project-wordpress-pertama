<div>
    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="rounded " alt="" width="100%" height="400">
</div>
<div class="post-info mt-2">
    <ul>
        <li><i class="fa fa-pencil-square-o" aria-hidden="true"></i><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></li>
        <li><i class="fa fa-tags" aria-hidden="true"></i><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_category(', '); ?></a></li>
    </ul>
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
    <div class="card-header text-uppercase">Coment List</div>
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