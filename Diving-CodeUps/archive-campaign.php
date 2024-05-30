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
                <!-- ホームページの/campaignページへのリンク -->
                <a href="<?php echo esc_url(home_url('/campaign')); ?>" class="category-list__item-link category category--link is-show">ALL</a>
              </li>
              <?php
              // 'campaign_category' タクソノミーから全ての用語を取得（非表示のものも含む）
              $dive_terms = get_terms('campaign_category', array('hide_empty' => false));

              // 用語が取得できているか確認し、エラーでないことを確認
              if (!empty($dive_terms) && !is_wp_error($dive_terms)) :
                // 各用語に対してループを実行
                foreach ($dive_terms as $dive_term) : ?>
                  <li class="category-list__item">
                    <!-- 各用語へのリンクを生成 -->
                    <a href="<?php echo esc_url(get_term_link($dive_term, 'campaign_category')); ?>" class="category-list__item-link category category--link"><?php echo esc_html($dive_term->name); ?></a>
                  </li>
                <?php endforeach; ?>
              <?php endif; ?>

            </ul>
          </div>
          <div class="page-campaign__card-items"> <!-- キャンペーンカードのラッパー -->

            <!-- 投稿があるかどうかをチェック -->
            <?php if (have_posts()) : ?>
              <!-- 投稿がある間、ループを開始 -->
              <?php while (have_posts()) : ?>
                <?php the_post(); ?>

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
                          $categories = get_the_terms(get_the_ID(), 'campaign_category');
                          if ($categories && !is_wp_error($categories)) {
                            foreach ($categories as $category) {
                              echo esc_html($category->name) . ' ';
                            }
                          }
                          ?>
                        </div>
                        <h3 class="card-01__title card-01__title--page">
                          <?php the_title(); ?>
                        </h3>
                      </div>
                      <div class="card-01__content card-01__content--page">
                        <p class="card-01__lead">全部コミコミ(お一人様)</p>
                        <p class="card-01__discount">
                          <span class="card-01__price card-01__price--page">¥<?php echo number_format(intval(get_field('standard'))); ?></span>
                          ¥<?php echo number_format(intval(get_field('special'))); ?>
                        </p>
                      </div>
                      <div class="card-01__lower-unit">
                        <div class="text">
                          <?php the_content(); ?>
                        </div>
                        <p class="period"><?php the_field('period'); ?></p>
                        <p class="click-here">ご予約・お問い合わせはコチラ</p>
                        <div class="card-01__lower-unit-link">
                          <a href="<?php echo esc_url(home_url('/contact')); ?>" class="link-button">Contact us
                            <span class="arrow-x"></span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
              <!--  投稿が見つからない場合の処理終了 -->
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

  </div>
  </div>
</main>

<?php get_footer(); ?>