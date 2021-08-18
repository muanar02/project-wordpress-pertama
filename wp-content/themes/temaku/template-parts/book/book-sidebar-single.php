<div class="card mb-4 card-category">
    <div class="card-header text-uppercase">
        <?php esc_html_e( 'Genre', 'belajar' ); ?>
    </div>
    <div class="card-body pb-0">
    <?php
        $genres =  get_terms('genre');
        echo '<ul>';
        foreach  ($genres as $genre) {
            echo '<li><a href="'.get_term_link($genre->term_id, 'genre').'"><i class="fa fa-arrow-right text-info mr-1" aria-hidden="true"></i> '. $genre->name .'</a></li>';
        }
        echo '</ul>';
    ?>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header text-uppercase">
        <?php esc_html_e( 'Writer', 'belajar' ); ?>
    </div>
    <div class="card-body pb-2">
    <?php
        $writers =  get_terms('writer');
        foreach  ($writers as $writer) {
            echo '<a class="btn btn-info mr-1 mb-3" href="'.get_term_link($writer->term_id, 'writer').'">'. $writer->name .'</a>';
        }
    ?>
    </div>
</div>