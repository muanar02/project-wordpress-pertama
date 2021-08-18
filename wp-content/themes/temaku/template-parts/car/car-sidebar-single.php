<div class="card mb-4 card-category">
    <div class="card-header text-uppercase">
        <?php esc_html_e( 'Brand', 'belajar' ); ?>
    </div>
    <div class="card-body pb-0">
    <?php
        $brands =  get_terms('brand');
        echo '<ul>';
        foreach  ($brands as $brand) {
            echo '<li><a href="'.get_term_link($brand->term_id, 'brand').'"><i class="fa fa-arrow-right text-info mr-1" aria-hidden="true"></i> '. $brand->name .'</a></li>';
        }
        echo '</ul>';
    ?>
    </div>
</div>