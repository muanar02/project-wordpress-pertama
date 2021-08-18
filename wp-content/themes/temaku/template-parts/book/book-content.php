<div class="col-12 col-lg-4 col-md-6">
    <div class="card mb-3 shadow-sm">
        <img class="card-img-top" src="<?= get_the_post_thumbnail_url(get_the_ID(), 'small-thumb'); ?>" alt="image-book" height="260">
        <div class="card-body">
            <h5 class="card-title text-uppercase"><?php the_title(); ?></h5>
            <p class="card-text mb-1"><?= wp_trim_words(get_the_excerpt(), 12); ?></p>
            <p class="card-text mb-1">
            <?php esc_html_e( 'Number of Pages', 'belajar' ); ?> : <?= (get_post_meta(get_the_ID(), 'jumlah_halaman', true)) ? get_post_meta(get_the_ID(), 'jumlah_halaman', true) : '-'; ?></br>
            <?php esc_html_e( 'ISBN Code', 'belajar' ); ?> : <?= (get_post_meta(get_the_ID(), 'kode_isbn', true)) ? get_post_meta(get_the_ID(), 'kode_isbn', true) : '-'; ?>
            </p>
            <p class="card-text">
                <small class="text-muted"><?php esc_html_e( 'Posted By', 'belajar' ); ?> <?php the_author(); ?> - <?php the_time('F j, Y') ?></small>
            </p>
            <a href="<?php the_permalink() ?>" class="btn btn-primary"><?php esc_html_e( 'Readmore', 'belajar' ); ?></a>
        </div>
    </div>
</div>