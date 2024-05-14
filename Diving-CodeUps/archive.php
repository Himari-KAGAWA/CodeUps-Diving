<?php get_header(); ?>

<main>
  <!-- 下層ページメインビュー -->
  <section class="sub-mv sub-mv__bg sub-mv__bg--campaign">
    <div class="sub-mv_inner">
      <div class="sub-mv__header">
        <h1 class="sub-mv__title">campaign</h1>
      </div>
    </div>
    <div class="sub-mv__icon"></div>
  </section>
  <!-- /下層ページメインビュー -->

  <!-- breadcrumbs -->
  <?php get_template_part('breadcrumb'); ?>
  <!-- /breadcrumbs -->

  <!-- page-contents -->
  <div class="page top-page--campaign">
    <div class="page__inner inner">
      <div class="page__content page-campaign">
        <div class="page-campaign__nav category-list">
          <div class="category-list__tabs">
            <ul class="category-list__items">
              <li class="category-list__item">
                <a href="<?php echo esc_url( home_url( '/campaign' ) ); ?>" class="category-list__item-link category category--link is-show">ALL</a>
              </li>
              <?php $dive_terms = get_terms('dive_course', array('hide_empty => false')); ?>
              <?php foreach ($dive_terms as $dive_term) : ?>
                <li class="category-list__item">
                  <a href="<?php echo get_term_link($dive_term, 'dive_course'); ?>" class="category-list__item-link category category--link"><?php echo $dive_term->name; ?></a>
                <?php endforeach; ?>
                </li>
            </ul>
          </div>
          <div class="page-campaign__card-items">

            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : ?>
                <?php the_post(); ?>

                <!-- campaign-card -->
                <div class="page-campaign__card-item card-01">
                  <div class="card-01__link">
                    <div class="card-01__img">
                      <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail(); ?>
                      <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/common/noimg.jpg" alt="No image">
                      <?php endif; ?>
                    </div>
                    <div class="card-01__body card-01__body--page">
                      <div class="card-01__header card-01__header--page">
                        <div class="category">
                          <?php echo get_the_terms(get_the_ID(), 'dive_course')[0]->name; ?>
                        </div>
                        <h3 class="card-01__title card-01__title--page">
                          <?php the_title(); ?>
                        </h3>
                      </div>
                      <div class="card-01__content card-01__content--page">
                        <p class="card-01__lead">全部コミコミ(お一人様)</p>
                        <p class="card-01__discount">
                          <span class="card-01__price card-01__price--page">¥56,000</span>
                          ¥46,000
                        </p>
                      </div>
                      <div class="card-01__lower-unit">
                        <div class="text">
                          <?php the_content(); ?>
                        </div>
                        <p class="period">2023/6/1-9/30</p>
                        <p class="click-here">
                          ご予約・お問い合わせはコチラ
                        </p>
                        <div class="card-01__lower-unit-link">
                          <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="link-button">Contact us
                            <span class="arrow-x"></span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- campaign-card -->
              <?php endwhile; ?>

          </div>
        </div>
      </div>
      <!-- pagination -->
      <div class="top-pagination">
        <?php if (function_exists('wp_pagenavi')) {
                wp_pagenavi();
              } ?>
      </div>
      <!-- /pagination -->
    <?php endif; ?>
    </div>
  </div>
  <!-- /page-contents -->

</main>

<?php get_footer(); ?>