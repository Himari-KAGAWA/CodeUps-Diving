<?php get_header(); ?>

<main>
  <section class="sub-mv sub-mv__bg sub-mv__bg--faq">
    <div class="sub-mv_inner">
      <div class="sub-mv__header">
        <h1 class="sub-mv__title sub-mv__title--upper">faq</h1>
      </div>
    </div>
    <div class="sub-mv__icon"></div>
  </section>

  <!-- breadcrumbs -->
  <?php get_template_part('breadcrumb'); ?>
  <!-- /breadcrumbs -->

  <!-- page-contents -->
  <div class="page top-page">
    <div class="page__content page-faq">
      <div class="page-faq__inner inner">
        <dl class="page-faq__lists faq-items">

          <!-- Q&A呼出し -->
          <!-- 繰り返しフィールドの値を取得する -->
          <?php $faqGroup = SCF::get('faq'); ?>
          <!-- 繰り返しフィールドに値がある場合に処理を行う -->
          <?php if (!empty($faqGroup)) : ?>
            <!-- 繰り返し構文で各値を順次取り出す -->
            <?php foreach ($faqGroup as $faqItem) : ?>
              <?php
              $faq_question = esc_html($faqItem['question']); // questionをエスケープ処理して変数に代入する
              $faq_asked = esc_html($faqItem['asked']); // askedをエスケープ処理して変数に代入する
              ?>
              <div class="faq-item js-faq">
                <dt class="faq-item__question">
                  <p class="faq-item__question-text"><?php echo nl2br($faq_question); ?></p>
                </dt>
                <dd class="faq-item__answer js-faq-open">
                  <p class="faq-item__answer-text"><?php echo nl2br($faq_asked); ?></p>
                </dd>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>

        </dl>
      </div>
    </div>
  </div>
  <!-- /page-contents -->

</main>

<?php get_footer(); ?>