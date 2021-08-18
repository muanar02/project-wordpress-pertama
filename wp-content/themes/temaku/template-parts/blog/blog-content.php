<div class="col-12 col-lg-6">
    <div class="card mb-3 shadow-sm card-post">
        <div class="row no-gutters">
            <div class="col-md-5">
                <img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'small-thumb'); ?>" alt="image-post">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h5 class="card-title text-uppercase"><?php the_title(); ?></h5>
                    <p class="card-text mb-1">
                        <?= wp_trim_words(get_the_excerpt(), 12); ?>
                    </p>
                    <p class="card-text">
                        <small class="text-muted"><?php esc_html_e( 'Posted By', 'belajar' ); ?>Posted By <?php the_author(); ?> - <?php the_time('F j, Y') ?></small>
                    </p>
                    <a href="<?php the_permalink() ?>" class="btn btn-primary"><?php esc_html_e( 'Readmore', 'belajar' ); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>