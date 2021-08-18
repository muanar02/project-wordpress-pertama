<?php get_header(); ?>

<!-- Content -->
<div class="container my-5 p-0">
    <div class="row">
        <div class="col-12 col-lg-8">
        <?php
        while (have_posts()) : the_post();
            get_template_part('template-parts/car/car-content-single');	
        endwhile;
        ?>
        </div>
        <div class="col-12 col-lg-4">
        <?php 
            get_template_part('template-parts/car/car-sidebar-single'); 
        ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>