<?php get_header(); ?>
<main>
  <section class="sub-mv sub-mv__bg sub-mv__bg--privacy">
    <div class="sub-mv_inner">
      <div class="sub-mv__header">
        <h1 class="sub-mv__title sub-mv__title--privacy">
          privacy <span class="sub-mv__title-uppercase">p</span>olicy
        </h1>
      </div>
    </div>
    <div class="sub-mv__icon"></div>
  </section>

  <!-- breadcrumbs -->
  <?php get_template_part('breadcrumb'); ?>
  <!-- /breadcrumbs -->

  <!-- page-contents -->
  <div class="page top-page--privacy">
    <section class="legal-document">
      <div class="legal-document__inner inner">
        <h2 class="legal-document__title"><?php the_title(); ?></h2>

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