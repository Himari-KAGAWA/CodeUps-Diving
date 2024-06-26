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
                <a href="<?php echo esc_url(home_url('/campaign')); ?>" class="category-list__item-link category category--link">ALL</a>
              </li>

              <?php
              // カテゴリーを取得
              $dive_terms = get_terms('campaign_category', array('hide_empty' => false));

              // カテゴリーをループしてリストアイテムとして表示
              foreach ($dive_terms as $dive_term) :
              ?>
                <li class="category-list__item">
                  <a href="<?php echo esc_url(get_term_link($dive_term, 'campaign_category')); ?>" class="category-list__item-link category category--link <?php if (is_tax('campaign_category') && $dive_term->slug == get_queried_object()->slug) echo 'is-show'; ?>">
                    <?php echo esc_html($dive_term->name); ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div class="page-campaign__card-items">

            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
                <!-- campaign-card -->
                <div class="page-campaign__card-item card-01">
                  <div class="card-01__link">
                    <div class="card-01__img card-01__img--cam">
                      <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail(); ?>
                      <?php else : ?>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/noimg.jpg" alt="<?php echo esc_attr('No image'); ?>">
                      <?php endif; ?>
                    </div>
                    <div class="card-01__body card-01__body--page">
                      <div class="card-01__header card-01__header--page">
                        <div class="category">
                          <?php
                          $terms = get_the_terms(get_the_ID(), 'campaign_category');
                          if ($terms && !is_wp_error($terms)) {
                            echo esc_html($terms[0]->name);
                          }
                          ?>
                        </div>
                        <h3 class="card-01__title card-01__title--page">
                          <?php echo esc_html(get_the_title()); ?>
                        </h3>
                      </div>
                      <div class="card-01__content card-01__content--page">
                        <p class="card-01__lead">全部コミコミ(お一人様)</p>
                        <p class="card-01__discount">
                          <span class="card-01__price card-01__price--page">¥<?php echo esc_html(get_field('standard')); ?></span>
                          ¥<?php echo esc_html(get_field('special')); ?>
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
                          <a href="<?php echo esc_url(home_url('/contact')); ?>" class="link-button">Contact us
                            <span class="arrow-x"></span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /campaign-card -->
              <?php endwhile; ?>
            <?php else : ?>
              <p>現在、キャンペーンはありません。</p>
              <?php endif; ?>
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

    </div>
  </div>
  <!-- /page-contents -->

</main>

<?php get_footer(); ?>