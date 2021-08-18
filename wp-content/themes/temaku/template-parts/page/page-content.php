
<div class="mb-3">
    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium-thumb'); ?>" class="rounded " alt="" width="100%" height="400">
</div>
<h4 class="mt-2 text-uppercase"><?php the_title(); ?></h4>
<div id="content">
    <?php the_content(); ?>
</div>