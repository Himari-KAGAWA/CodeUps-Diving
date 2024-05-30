<?php get_header(); ?>

<main>
  <!-- 下層ページメインビュー -->
  <section class="sub-mv sub-mv__bg sub-mv__bg--voice">
    <div class="sub-mv_inner">
      <div class="sub-mv__header">
        <h1 class="sub-mv__title sub-mv__title--blog">voice</h1>
      </div>
    </div>
    <div class="sub-mv__icon"></div>
  </section>
  <!-- /下層ページメインビュー -->

  <!-- breadcrumbs -->
  <?php get_template_part('breadcrumb'); ?>
  <!-- /breadcrumbs -->

  <!-- page-contents -->
  <div class="page top-page">
    <div class="page__inner inner">
      <div class="page__content page-voice">
        <div class="page-voice__nav category-list">
          <ul class="category-list__items">

            <li class="category-list__item">
              <!-- ホームページの/voiceページへのリンク -->
              <a href="<?php echo esc_url(home_url('/voice')); ?>" class="category-list__item-link category category--link is-show">ALL</a>
            </li>
            <?php
            // 'voice_category' タクソノミーから全ての用語を取得（非表示のものも含む）
            $voice_category_terms = get_terms('voice_category', array('hide_empty' => false));

            // 用語が取得できているか確認し、エラーでないことを確認
            if (!empty($voice_category_terms) && !is_wp_error($voice_category_terms)) :
              // 各用語に対してループを実行
              foreach ($voice_category_terms as $voice_category_term) : ?>
                <li class="category-list__item">
                  <!-- 各用語へのリンクを生成 -->
                  <a href="<?php echo esc_url(get_term_link($voice_category_term, 'voice_category')); ?>" class="category-list__item-link category category--link"><?php echo esc_html($voice_category_term->name); ?></a>
                </li>
              <?php endforeach; ?>
            <?php endif; ?>

          </ul>
        </div>
        <div class="page-voice__items voice-cards"> <!-- お客様の声カードのラッパー -->

          <!-- 投稿があるかどうかをチェック -->
          <?php if (have_posts()) : ?>
            <!-- 投稿がある間、ループを開始 -->
            <?php while (have_posts()) : ?>
              <?php the_post(); ?>

              <!-- お客様の声カード -->
              <div class="voice-cards__item card-03" data-item="tab01">
                <div class="card-03__header">
                  <div class="card-03__left">
                    <div class="card-03__attribute">
                      <p><?php the_field('age'); ?>代(<?php the_field('gender'); ?>)</p> <!-- 年齢代と性別 -->
                      <span class="category">
                        <?php
                        $categories = get_the_terms(get_the_ID(), 'voice_category');
                        if ($categories && !is_wp_error($categories)) {
                          foreach ($categories as $category) {
                            echo esc_html($category->name) . ' ';
                          }
                        }
                        ?>
                      </span> <!-- カテゴリー -->
                    </div>
                    <h3 class="card-03__title">
                      <?php the_title(); ?> <!-- 投稿のタイトル -->
                    </h3>
                  </div>
                  <div class="card-03__img js-inview">
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail(); // 投稿にサムネイルがある場合は表示
                      ?>
                    <?php else : ?>
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/noimg.jpg" alt="<?php echo esc_attr('No image'); ?>"> <!-- サムネイルがない場合はデフォルト画像を表示 -->
                    <?php endif; ?>
                  </div>
                </div>
                <div class="card-03__content">
                  <p>
                    <!--  投稿のコンテンツを表示 -->
                    <?php the_content(); ?>
                  </p>
                </div>
              </div>
              <!-- /お客様の声カード -->

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <!--  投稿が見つからない場合の処理終了 -->
          <?php endif; ?>
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