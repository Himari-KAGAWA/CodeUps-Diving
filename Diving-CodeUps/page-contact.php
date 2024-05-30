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
        <div class="page-contact__form-wrapper"> <!-- 問い合わせフォームのラッパー -->

          <!-- 投稿があるかどうかをチェック -->
          <?php if (have_posts()) : ?>
            <!-- 投稿がある間、ループを開始 -->
            <?php while (have_posts()) : ?>
              <?php the_post(); // 現在の投稿データを設定
              ?>
              <div class="page-contact__content"> <!-- コンテンツ部分をラップ -->
                <?php the_content(); // 投稿のコンテンツを表示
                ?>
              </div>
            <?php endwhile; // ループの終了
            ?>
          <?php endif; // 投稿がない場合、何も表示しない
          ?>

          <div class="page-contact__Indication"> <!-- reCAPTCHAの通知部分 -->
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