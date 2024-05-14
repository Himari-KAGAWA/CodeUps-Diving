<?php get_header(); ?>

<main>
  <section class="sub-mv sub-mv__bg sub-mv__bg--contact">
    <div class="sub-mv_inner">
      <div class="sub-mv__header">
        <h1 class="sub-mv__title sub-mv__title--price">contact</h1>
      </div>
    </div>
    <div class="sub-mv__icon"></div>
  </section>

  <!-- breadcrumbs -->
  <?php get_template_part('breadcrumb'); ?>
  <!-- /breadcrumbs -->

  <!-- page-contents -->
  <div class="page top-page">
    <div class="page__content page-contact">
      <div class="page-contact__inner">
        <div class="page-contact__form-wrapper">

          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : ?>
              <?php the_post(); ?>
              <?php the_content(); ?>
            <?php endwhile; ?>
          <?php endif; ?>

          <div class="page-contact__Indication">
            This site is protected by reCAPTCHA and the Google
            <a href="https://policies.google.com/privacy">Privacy Policy</a> and
            <a href="https://policies.google.com/terms">Terms of Service</a> apply.
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page-contents -->
</main>

<?php get_footer(); ?>