<?php get_header(); ?>
<main>
  <section class="sub-mv sub-mv__bg sub-mv__bg--price">
    <div class="sub-mv_inner">
      <div class="sub-mv__header">
        <h1 class="sub-mv__title sub-mv__title--price">price</h1>
      </div>
    </div>
    <div class="sub-mv__icon"></div>
  </section>

  <!-- breadcrumbs -->
  <?php get_template_part('breadcrumb'); ?>
  <!-- /breadcrumbs -->

  <!-- page-contents -->
  <div class="page top-page">
    <div class="page__content page-price">
      <div class="page-price__inner inner">
        <div class="page-price__items price-lists">

          <!-- ライセンス講習 -->
          <?php
          $courses = SCF::get_option_meta('theme-options', 'license'); // オプションページからライセンス講習の情報を取得
          if (!empty($courses)) : // 講習情報が空でないかチェック
          ?>
            <div class="price-list">
              <div data-id="license" id="license" class="price-list__courses">
                <div class="price-list__header">
                  <div class="price-list__header-content">
                    <h3 class="price-list__course">ライセンス講習</h3>
                    <div class="price-list__icon">
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/pc/whale-icon-w.svg" alt="<?php echo esc_attr('クジラのアイコン'); ?>" width="24" height="24" />
                    </div>
                  </div>
                </div>
                <dl class="price-list__course-list">
                  <!-- データ -->
                  <?php foreach ($courses as $course => $courseItem) : // 各講習情報をループで表示 
                  ?>
                    <?php
                    $name1 = esc_html($courseItem['title_license']); // タイトルをエスケープして取得
                    $name2 = esc_html($courseItem['subTitle_license']); // サブタイトルをエスケープして取得
                    $price = intval($courseItem['price_license']); // 価格を整数に変換して取得
                    ?>
                    <div class="price-list__course-menus">
                      <dt class="price-list__course-menu">
                        <?php echo $name1; ?>
                        <br class="u-mobile" />
                        <?php echo $name2; ?>
                      </dt>
                      <!-- 価格をフォーマットして表示 -->
                      <dd class="price-list__course-price">¥<?php echo number_format($price); ?></dd>
                    </div>
                  <?php endforeach; ?>
                </dl>
              </div>
            </div>
            <!--  講習情報がない場合の処理終了 -->
          <?php endif; ?>

          <!-- 体験ダイビング -->
          <?php
          $courses = SCF::get_option_meta('theme-options', 'experience'); // オプションページから体験ダイビングの情報を取得
          if (!empty($courses)) : // 講習情報が空でないかチェック
          ?>
            <div class="price-list">
              <div data-id="experience" id="experience" class="price-list__courses">
                <div class="price-list__header">
                  <div class="price-list__header-content">
                    <h3 class="price-list__course">体験ダイビング</h3>
                    <div class="price-list__icon">
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/pc/whale-icon-w.svg" alt="<?php echo esc_attr('クジラのアイコン'); ?>" width="24" height="24" />
                    </div>
                  </div>
                </div>
                <dl class="price-list__course-list">
                  <!-- データ -->
                  <!-- 各講習情報をループで表示 -->
                  <?php foreach ($courses as $courseItem) : ?>
                    <?php
                    $name1 = esc_html($courseItem['title_experience']); // タイトルをエスケープして取得
                    $name2 = esc_html($courseItem['subTitle_experience']); // サブタイトルをエスケープして取得
                    $price = intval($courseItem['price_experience']); // 価格を整数に変換して取得
                    ?>
                    <div class="price-list__course-menus">
                      <dt class="price-list__course-menu">
                        <?php echo $name1; ?>
                        <br class="u-mobile" />
                        <?php echo $name2; ?>
                      </dt>
                      <!-- 価格をフォーマットして表示 -->
                      <dd class="price-list__course-price">¥<?php echo number_format($price); ?></dd>
                    </div>
                  <?php endforeach; ?>
                </dl>
              </div>
            </div>
            <!-- 講習情報がない場合の処理終了 -->
          <?php endif; ?>


          <!-- ファンダイビング -->
          <?php
          $courses = SCF::get_option_meta('theme-options', 'fun'); // オプションページからファンダイビングの情報を取得
          if (!empty($courses)) : // 講習情報が空でないかチェック
          ?>
            <div class="price-list">
              <div data-id="fun" id="fun" class="price-list__courses">
                <div class="price-list__header">
                  <div class="price-list__header-content">
                    <h3 class="price-list__course">ファンダイビング</h3>
                    <div class="price-list__icon">
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/pc/whale-icon-w.svg" alt="<?php echo esc_attr('クジラのアイコン'); ?>" width="24" height="24" />
                    </div>
                  </div>
                </div>
                <dl class="price-list__course-list">
                  <!-- データ -->
                  <!-- 各講習情報をループで表示 -->
                  <?php foreach ($courses as $courseItem) : ?>
                    <?php
                    $name1 = esc_html($courseItem['title_fun']); // タイトルをエスケープして取得
                    $name2 = esc_html($courseItem['subTitle_fun']); // サブタイトルをエスケープして取得
                    $price = intval($courseItem['price_fun']); // 価格を整数に変換して取得
                    ?>
                    <div class="price-list__course-menus">
                      <dt class="price-list__course-menu">
                        <?php echo $name1; ?>
                        <br class="u-mobile" />
                        <?php echo $name2; ?>
                      </dt>
                      <!-- 価格をフォーマットして表示 -->
                      <dd class="price-list__course-price">¥<?php echo number_format($price); ?></dd>
                    </div>
                  <?php endforeach; ?>
                </dl>
              </div>
            </div>
            <!-- 講習情報がない場合の処理終了 -->
          <?php endif; ?>


          <!-- スペシャルダイビング -->
          <?php
          $courses = SCF::get_option_meta('theme-options', 'special'); // オプションページからスペシャルダイビングの情報を取得
          if (!empty($courses)) : // 講習情報が空でないかチェック
          ?>
            <div class="price-list">
              <div data-id="special" id="special" class="price-list__courses">
                <div class="price-list__header">
                  <div class="price-list__header-content">
                    <h3 class="price-list__course">スペシャルダイビング</h3>
                    <div class="price-list__icon">
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/pc/whale-icon-w.svg" alt="<?php echo esc_attr('クジラのアイコン'); ?>" width="24" height="24" />
                    </div>
                  </div>
                </div>
                <dl class="price-list__course-list">
                  <!-- データ -->
                  <!-- 各講習情報をループで表示 -->
                  <?php foreach ($courses as $courseItem) : ?>
                    <?php
                    $name1 = esc_html($courseItem['title_special']); // タイトルをエスケープして取得
                    $name2 = esc_html($courseItem['subTitle_special']); // サブタイトルをエスケープして取得
                    $price = intval($courseItem['price_special']); // 価格を整数に変換して取得
                    ?>
                    <div class="price-list__course-menus">
                      <dt class="price-list__course-menu">
                        <?php echo $name1; ?>
                        <br class="u-mobile" />
                        <?php echo $name2; ?>
                      </dt>
                      <!-- 価格をフォーマットして表示 -->
                      <dd class="price-list__course-price">¥<?php echo number_format($price); ?></dd>
                    </div>
                  <?php endforeach; ?>
                </dl>
              </div>
            </div>
            <!-- 講習情報がない場合の処理終了 -->
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
  <!-- /page-contents -->

</main>

<?php get_footer(); ?>