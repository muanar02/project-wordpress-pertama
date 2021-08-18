<?php get_header(); ?>

<!-- Content -->
<div class="container my-5 p-0">
  <section class="m-0 p-0 mb-4">
    <h2 class="p-0 pb-1 mb-3 text-uppercase" style="border-bottom: 2px solid black;"><?php esc_html_e( 'Blog', 'belajar' ); ?></h2>
    <div class="row">
      <?php 
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 2,
        );
        $blog = new WP_Query($args);
        while($blog->have_posts()): $blog->the_post();
          get_template_part('template-parts/blog/blog-content'); 
        endwhile; 
        wp_reset_query();
        ?>
    </div>
    <div class="d-flex justify-content-center">
      <a href="<?= esc_url(site_url('/blog')); ?>" class="btn btn-primary text-uppercase" style="width:250px;padding:10px;">
        <?php esc_html_e( 'All Blogs', 'belajar' ); ?>
      </a>
    </div>
  </section>
  
  <section class="m-0 p-0 mb-4">
    <h2 class="p-0 pb-1 mb-3 text-uppercase" style="border-bottom: 2px solid black;"><?php esc_html_e( 'Book', 'belajar' ); ?></h2>
    <div class="row">
      <?php 
        $args = array(
            'post_type' => 'book',
            'posts_per_page' => 3,
        );
        $book = new WP_Query($args);
        while($book->have_posts()): $book->the_post();
          get_template_part('template-parts/book/book-content'); 
        endwhile; 
        wp_reset_query();
        ?>
    </div>
    <div class="d-flex justify-content-center">
      <a href="<?= esc_url(site_url('/book')); ?>" class="btn btn-primary text-uppercase" style="width:250px;padding:10px;">
        <?php esc_html_e( 'All Books', 'belajar' ); ?>
      </a>
    </div>
  </section>

  <section class="m-0 p-0 mb-4">
    <h2 class="p-0 pb-1 mb-3 text-uppercase" style="border-bottom: 2px solid black;"><?php esc_html_e( 'Car', 'belajar' ); ?></h2>
    <div class="row">
      <?php 
        $args = array(
            'post_type' => 'car',
            'posts_per_page' => 3,
        );
        $car = new WP_Query($args);
        while($car->have_posts()): $car->the_post();
          get_template_part('template-parts/car/car-content'); 
        endwhile; 
        wp_reset_query();
        ?>
    </div>
    <div class="d-flex justify-content-center">
      <a href="<?= esc_url(site_url('/car')); ?>" class="btn btn-primary text-uppercase" style="width:250px;padding:10px;">
        <?php esc_html_e( 'All Cars', 'belajar' ); ?>
      </a>
    </div>
  </section>
</div>

<?php get_footer(); ?>