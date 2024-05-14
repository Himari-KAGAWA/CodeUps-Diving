<?php get_header(); ?>
<main>
  <section class="sub-mv sub-mv__bg sub-mv__bg--terms">
    <div class="sub-mv_inner">
      <div class="sub-mv__header">
        <h1 class="sub-mv__title sub-mv__title--terms">
          terms of <span class="sub-mv__title-uppercase">s</span>ervice
        </h1>
      </div>
    </div>
    <div class="sub-mv__icon"></div>
  </section>

  <!-- breadcrumbs -->
  <?php get_template_part('breadcrumb'); ?>
  <!-- /breadcrumbs -->

  <!-- page-contents -->
  <div class="page top-page--terms">
    <section class="term-of-use">
      <div class="term-of-use__inner inner">
        <h2 class="term-of-use__title"><?php the_title(); ?></h2>

        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </section>
    <!-- /page-contents -->
  </div>

</main>

<?php get_footer(); ?>