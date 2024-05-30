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
        <div class="page-2rows__main page-blog">
          <div class="page-blog__items blog-cards blog-cards--2col"> <!-- ブログカードのラッパー -->

            <!-- 投稿があるかどうかをチェック -->
            <?php if (have_posts()) : ?>
              <!-- 投稿がある間、ループを開始 -->
              <?php while (have_posts()) : the_post(); ?>
                <!-- ブログカード -->
                <article class="blog-cards__item card-02">
                  <!-- 投稿の個別ページへのリンク -->
                  <a href="<?php the_permalink(); ?>" class="card-02__link">
                    <div class="card-02__img">
                      <!-- 投稿にアイキャッチ画像がある場合、それを表示 -->
                      <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail(); ?>
                      <?php else : ?>
                        <!-- アイキャッチ画像がない場合、デフォルト画像を表示 -->
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/noimg.jpg" alt="<?php echo esc_attr('No image'); ?>">
                      <?php endif; ?>
                    </div>
                    <div class="card-02__header">
                      <!-- 投稿日時を表示、HTML5のtime要素を使用 -->
                      <time class="card-02__date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('Y.m/d'); ?></time>
                      <!-- 投稿のタイトルを表示 -->
                      <h2 class="card-02__title"><?php the_title(); ?></h2>
                    </div>

                    <div class="card-02__content">
                      <!-- 投稿の内容を表示。30語にトリムして表示 -->
                      <p><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
                    </div>
                  </a>
                </article>
                <!-- /ブログカード -->
              <?php endwhile; ?>
            <?php else : ?>
              <!-- 投稿がない場合のメッセージ -->
              <p>まだ投稿はありません。</p>
            <?php endif; ?>
          </div>
          <!-- /ブログカードのラッパー -->

          <!-- ページネーション -->
          <div class="top-pagination">
            <?php if (function_exists('wp_pagenavi')) {
              wp_pagenavi();
            } ?>
          </div>
          <!-- /ページネーション -->

        </div>

        <!-- sidebar -->
        <?php get_sidebar(); ?>
        <!-- /sidebar -->

      </div>
    </div>
  </div>
  <!-- /page-contents -->

</main>

<?php get_footer(); ?>