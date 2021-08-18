<?php get_header(); ?>

<!-- Content -->
<div class="container my-5 p-0">
    <section class="m-0 p-0">
    <h2 class="p-0 pb-1 mb-3 text-uppercase" style="border-bottom: 2px solid black;"><?php esc_html_e( 'All Blogs', 'belajar' ); ?></h2>
    <?php if(have_posts()): ?>
      <div class="row">
        <?php 
        while(have_posts()): the_post();
          get_template_part('template-parts/blog/blog-content'); 
        endwhile; 
        ?>
      </div>
    <?php 
    pagination();
    else:
      ?>
      <h3 style="text-align:center;"><?php esc_html_e( 'Blog not found!!', 'belajar' ); ?></h3>
      <?php
    endif;
    ?>
    </section>
</div>

<?php get_footer(); ?>