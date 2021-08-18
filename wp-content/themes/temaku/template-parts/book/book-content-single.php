
<div>
    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium-thumb'); ?>" class="rounded " alt="" width="100%" height="400">
</div>
<div class="post-info mt-2 mb-3 d-flex justify-content-start">
    <p class="m-0 mr-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php esc_html_e( 'Posted By', 'belajar' ); ?> <?php the_author(); ?> - <?php the_time('F j, Y') ?></p>
    <p class="m-0"><i class="fa fa-tags" aria-hidden="true"></i> <a href=""><?= get_the_term_list(get_the_ID(), 'genre', '', ', ', ''); ?></a></p>
</div>
<h4 class="mt-2 text-uppercase"><?php the_title(); ?></h4>
<div id="content">
    <?php the_content(); ?>
</div>