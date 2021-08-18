<?php get_header(); ?>

<!-- Content -->
<div class="container my-5 p-0">
    <section class="m-0 p-0">
        <h2 class="p-0 pb-1 mb-3 text-uppercase" style="border-bottom: 2px solid black;"><?php the_archive_title(); ?></h2>
        <?php if(have_posts()): ?>
        <div class="row">
            <?php 
            while(have_posts()): the_post();
                if(get_post_type() == 'car') {
                    get_template_part('template-parts/car/car-content'); 
                } else if(get_post_type() == 'book') {
                    get_template_part('template-parts/book/book-content'); 
                } else {
                    get_template_part('template-parts/blog/blog-content'); 
                }
            endwhile; 
            ?>
        </div>
        <?php 
        pagination();
        else: ?>
            <h3 style="text-align:center;"><?php esc_html_e( 'not found!!', 'belajar' ); ?></h3>
        <?php endif; ?>
    </section>
</div>

<?php get_footer(); ?>