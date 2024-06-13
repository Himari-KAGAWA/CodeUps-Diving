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
              <?php while (have_posts()) : the_post(); ?> <!-- whileループ内でthe_post()を直接使用 -->

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
                        <!-- price -->
                        <?php
                        // ACFからキャンペーン価格のグループフィールドを取得
                        $campaign_price = get_field('campaign_price');

                        // 初期化
                        $normal_price = '';
                        $offer_price = '';

                        if ($campaign_price) {
                          // 正常価格とオファー価格をそれぞれ取得
                          $normal_price = isset($campaign_price['normal_price']) ? $campaign_price['normal_price'] : '';
                          $offer_price = isset($campaign_price['offer_price']) ? $campaign_price['offer_price'] : '';
                        }
                        ?>
                        <?php if (!empty($offer_price)) : ?>
                          <!-- パッケージタイトル -->
                          <?php
                          // ACFからパッケージタイトルを取得
                          $package_title = get_field('package_title');

                          // デフォルトタイトルを設定
                          $default_title = "全部コミコミ(お一人様)";

                          // パッケージタイトルが空の場合はデフォルトタイトルを使用
                          if (!$package_title) {
                            $package_title = $default_title;
                          }

                          // パッケージタイトルをHTMLエスケープし、改行を<br>タグに変換して表示
                          echo '<p class="card-01__lead">' . nl2br(esc_html($package_title)) . '</p>';
                          ?>
                          <p class="card-01__discount">
                            <?php if (!empty($normal_price)) : ?>
                              <!-- 正常価格を表示 -->
                              <span class="card-01__price card-01__price--page">¥<?php echo esc_html(number_format($normal_price)); ?></span>
                            <?php endif; ?>
                            <!-- オファー価格を表示 -->
                            ¥<?php echo esc_html(number_format($offer_price)); ?>
                          </p>
                        <?php endif; ?>
                        <!-- /price -->

                      </div>
                      <div class="card-01__lower-unit">
                        <!-- desc -->
                        <?php the_content(); ?>

                        <!-- date -->
                        <?php
                        // ACFからキャンペーン期間のグループフィールドを取得
                        $campaign_period = get_field('campaign_period');

                        // 初期化
                        $start_date = '';
                        $end_date = '';

                        if ($campaign_period) {
                          $start_date = isset($campaign_period['start_date']) ? $campaign_period['start_date'] : '';
                          $end_date = isset($campaign_period['end_date']) ? $campaign_period['end_date'] : '';
                        }
                        ?>
                        <p class="period">
                          <?php if (!empty($start_date) && !empty($end_date)) : ?>
                            <?php
                            $start = new DateTime($start_date);
                            $end = new DateTime($end_date);
                            if ($start->format('Y') === $end->format('Y')) {
                              // 同じ年の場合、開始日はそのまま、終了日は月日だけ表示
                              echo esc_html($start->format('Y/n/j')) . ' - ' . esc_html($end->format('n/j'));
                            } else {
                              // 異なる年の場合、開始日と終了日をそのまま表示
                              echo esc_html($start_date) . ' - ' . esc_html($end_date);
                            }
                            ?>
                          <?php elseif (!empty($start_date)) : ?>
                            <?php echo esc_html($start_date); ?>
                          <?php endif; ?>
                        </p>
                        <!-- /date -->
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
            <?php else : ?>
              <!-- 投稿が見つからない場合のメッセージ -->
              <p>キャンペーンの投稿が見つかりませんでした</p>
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