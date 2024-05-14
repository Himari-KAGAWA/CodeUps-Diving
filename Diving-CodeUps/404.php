<?php get_header(); ?>

<main>
  <!-- breadcrumbs -->
  <?php if (function_exists('bcn_display')) : ?>
    <nav class="breadcrumb breadcrumb--404 top-breadcrumb--404" aria-label="Breadcrumb">
      <div class="breadcrumb__inner inner">
        <ol class="breadcrumb__list">
          <li class="breadcrumb__item">
            <div aria-current="location"><?php bcn_display(); ?></div>
          </li>
        </ol>
      </div>
    </nav>
  <?php endif; ?>
  <!-- /breadcrumbs -->

  <!-- page-contents -->
  <div class="not-found">
    <div class="not-found__bg"></div>
    <div class="not-found__inner inner">
      <div class="not-found__wrapper">
        <h1 class="not-found__message">404</h1>
        <p class="not-found__text">
          申し訳ありません。<br />お探しのページが見つかりません。
        </p>
        <div class="not-found__link">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="link-button link-button--404">Page TOP
            <span class="arrow-x arrow-x--400"></span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- /page-contents -->
</main>

<?php get_footer(); ?>