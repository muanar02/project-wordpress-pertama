
<div>
    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="rounded " alt="" width="100%" height="400">
</div>
<div class="post-info mt-2">
    <ul>
        <?php 
        $genres = get_the_terms(get_the_ID(), 'genre');
        if(! empty($genres) && !is_wp_error($genres)):
        ?>
        <li>
            <i class="fa fa-tags" aria-hidden="true"></i>
            <?php foreach  ($genres as $genre): ?>
                <a href="<?= get_term_link($genre->term_id, 'genre'); ?>"><?= $genre->name; ?> </a>
            <?php endforeach; ?>
        </li>
        <?php endif; ?>

        <?php 
        $writers = get_the_terms(get_the_ID(), 'writer');
        if(! empty($writers) && !is_wp_error($writers)):
        ?>
        <li>
            <i class="fa fa-pencil" aria-hidden="true"></i>
            <?php foreach  ($writers as $writer): ?>
                <a href="<?= get_term_link($writer->term_id, 'writer'); ?>"><?= $writer->name; ?> </a>
            <?php endforeach; ?>
        </li>
        <?php endif; ?>
    </ul>
</div>
<h4 class="mt-2 text-uppercase"><?php the_title(); ?></h4>
<div id="content">
    <?php the_content(); ?>
</div>