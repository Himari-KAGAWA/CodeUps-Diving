<?php get_header(); ?>

<main>
  <section class="sub-mv sub-mv__bg sub-mv__bg--blog">
    <div class="sub-mv_inner">
      <div class="sub-mv__header">
        <h1 class="sub-mv__title sub-mv__title--blog">blog</h1>
      </div>
    </div>
    <div class="sub-mv__icon"></div>
  </section>

  <!-- breadcrumbs -->
  <?php get_template_part('breadcrumb'); ?>
  <!-- /breadcrumbs -->

  <!-- page-contents -->
  <div class="page-2rows top-page-2rows">
    <div class="page-2rows__inner inner">
      <div class="page-2rows__wrapper">
        <!-- page-main -->
        <div class="page-2rows__main page-blog">
          <div class="page-blog__items blog-cards blog-cards--2col">

            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                <!-- Blog card -->
                <article class="blog-cards__item card-02">
                  <a href="<?php the_permalink(); ?>" class="card-02__link">
                    <div class="card-02__img">
                      <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail(); ?>
                      <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/common/noimg.jpg" alt="No image">
                      <?php endif; ?>
                    </div>
                    <div class="card-02__header">
                      <time class="card-02__date" datetime="<?php the_time('c') ?>"><?php the_time('Y.m/d'); ?></time>
                      <h2 class="card-02__title"><?php the_title(); ?></h2>
                    </div>
                    <div class="card-02__content">
                      <p><?php the_content(); ?></p>
                    </div>
                  </a>
                </article>
                <!-- /Blog card -->
              <?php endwhile; ?>

          </div>
          <!-- /page-main -->

          <!-- pagination -->
          <div class="top-pagination">
            <?php if (function_exists('wp_pagenavi')) {
                wp_pagenavi();
              } ?>
          </div>
          <!-- /pagination -->
        <?php endif; ?>

        </div>

        <!-- sidebar -->
        <?php get_sidebar(); ?>
        <!-- /sidebar -->

      </div>
    </div>
  </div>
  <!-- /page-contents -->

</main>

<?php get_footer(); ?>