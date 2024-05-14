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
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <div class="page-2rows__main page-blogDtail">
              <time class="page-blogDtail__date" datetime="<?php the_time('c') ?>"><?php the_time('Y.m/d'); ?></time>
              <h1 class="page-blogDtail__title"><?php the_title(); ?></h1>
              <div class="page-blogDtail__img">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail(); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/common/noimg.jpg" alt="No image">
                <?php endif; ?>
              </div>
              <div class="page-blogDtail__content">

                <?php the_content(); ?>

              </div>
            <?php endwhile; ?>

            <!-- pagination -->
            <div class="pagination top-pagination pagination--detail">
              <div class="pagination__prev">
                <?php if (get_previous_post()) : ?>
                  <?php previous_post_link('%link', ''); ?>
                <?php endif; ?>
              </div>
              <div class="pagination__next">
                <?php if (get_next_post()) : ?>
                  <?php next_post_link('%link', ''); ?>
                <?php endif; ?>
              </div>
            </div>
            <!-- /pagination -->
            </div>

            <!-- sidebar -->
            <?php get_sidebar(); ?>
            <!-- /sidebar -->
          <?php endif; ?>
      </div>
      <!-- /page-main -->

    </div>
    <!-- /page-main -->
  </div>
  </div>
  <!-- /page-contents -->

</main>

<?php get_footer(); ?>