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
          // 固定ページIDを指定
          $page_id = 22;

          // 固定ページからSCFのデータを取得
          $courses = SCF::get('license', $page_id);

          // 講習情報が空でないかチェック
          if (!empty($courses)) :
            // 表示すべきデータがあるかチェック
            $has_valid_course = false;
            foreach ($courses as $course) {
              $name1 = isset($course['title_license']) ? esc_html($course['title_license']) : '';
              $price = isset($course['price_license']) ? intval($course['price_license']) : 0;

              if (!empty($name1) && $price > 0) {
                $has_valid_course = true;
                break;
              }
            }

            if ($has_valid_course) :
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
                    <?php foreach ($courses as $course) :
                      $name1 = isset($course['title_license']) ? esc_html($course['title_license']) : '';
                      $price = isset($course['price_license']) ? intval($course['price_license']) : 0;

                      // タイトルと価格が有効な場合のみ表示
                      if (!empty($name1) && $price > 0) :
                    ?>
                        <div class="price-list__course-menus">
                          <dt class="price-list__course-menu">
                            <?php echo $name1; ?>
                          </dt>
                          <dd class="price-list__course-price">¥<?php echo number_format($price); ?></dd>
                        </div>
                    <?php
                      endif; // タイトルと価格が有効な場合のチェック終了
                    endforeach; ?>
                  </dl>
                </div>
              </div>
          <?php
            endif; // 表示すべきデータがあるかのチェック終了
          endif; // 講習情報が空でないかチェック終了
          ?>


          <!-- 体験ダイビング -->
          <?php
          // 固定ページIDを指定
          $page_id = 22;

          // 固定ページからSCFのデータを取得
          $courses = SCF::get('experience', $page_id);

          // 講習情報が空でないかチェック
          if (!empty($courses)) :
            // 表示すべきデータがあるかチェック
            $has_valid_course = false;
            foreach ($courses as $course) {
              $name1 = isset($course['title_experience']) ? esc_html($course['title_experience']) : '';
              $price = isset($course['price_experience']) ? intval($course['price_experience']) : 0;

              if (!empty($name1) && $price > 0) {
                $has_valid_course = true;
                break;
              }
            }

            if ($has_valid_course) :
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
                    <?php foreach ($courses as $courseItem) :
                      $name1 = isset($courseItem['title_experience']) ? esc_html($courseItem['title_experience']) : '';
                      $price = isset($courseItem['price_experience']) ? intval($courseItem['price_experience']) : 0;

                      // タイトルと価格が有効な場合のみ表示
                      if (!empty($name1) && $price > 0) :
                    ?>
                        <div class="price-list__course-menus">
                          <dt class="price-list__course-menu">
                            <?php echo $name1; ?>
                          </dt>
                          <!-- 価格をフォーマットして表示 -->
                          <dd class="price-list__course-price">¥<?php echo number_format($price); ?></dd>
                        </div>
                    <?php
                      endif; // タイトルと価格が有効な場合のチェック終了
                    endforeach; ?>
                  </dl>
                </div>
              </div>
          <?php
            endif; // 表示すべきデータがあるかのチェック終了
          endif; // 講習情報が空でないかチェック終了
          ?>


          <!-- ファンダイビング -->
          <?php
          // 固定ページIDを指定
          $page_id = 22;

          // 固定ページからSCFのデータを取得
          $courses = SCF::get('fun', $page_id);

          // 講習情報が空でないかチェック
          if (!empty($courses)) :
            // 表示すべきデータがあるかチェック
            $has_valid_course = false;
            foreach ($courses as $course) {
              $name1 = isset($course['title_fun']) ? esc_html($course['title_fun']) : '';
              $price = isset($course['price_fun']) ? intval($course['price_fun']) : 0;

              if (!empty($name1) && $price > 0) {
                $has_valid_course = true;
                break;
              }
            }

            if ($has_valid_course) :
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
                    <?php foreach ($courses as $courseItem) :
                      $name1 = isset($courseItem['title_fun']) ? esc_html($courseItem['title_fun']) : '';
                      $price = isset($courseItem['price_fun']) ? intval($courseItem['price_fun']) : 0;

                      // タイトルと価格が有効な場合のみ表示
                      if (!empty($name1) && $price > 0) :
                    ?>
                        <div class="price-list__course-menus">
                          <dt class="price-list__course-menu">
                            <?php echo $name1; ?>
                          </dt>
                          <!-- 価格をフォーマットして表示 -->
                          <dd class="price-list__course-price">¥<?php echo number_format($price); ?></dd>
                        </div>
                    <?php
                      endif; // タイトルと価格が有効な場合のチェック終了
                    endforeach; ?>
                  </dl>
                </div>
              </div>
          <?php
            endif; // 表示すべきデータがあるかのチェック終了
          endif; // 講習情報が空でないかチェック終了
          ?>


          <!-- スペシャルダイビング -->
          <?php
          // 固定ページIDを指定
          $page_id = 22;

          // 固定ページからSCFのデータを取得
          $courses = SCF::get('special', $page_id);

          // 講習情報が空でないかチェック
          if (!empty($courses)) :
            // 表示すべきデータがあるかチェック
            $has_valid_course = false;
            foreach ($courses as $course) {
              $name1 = isset($course['title_special']) ? esc_html($course['title_special']) : '';
              $price = isset($course['price_special']) ? intval($course['price_special']) : 0;

              if (!empty($name1) && $price > 0) {
                $has_valid_course = true;
                break;
              }
            }

            if ($has_valid_course) :
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
                    <?php foreach ($courses as $courseItem) :
                      $name1 = isset($courseItem['title_special']) ? esc_html($courseItem['title_special']) : '';
                      $price = isset($courseItem['price_special']) ? intval($courseItem['price_special']) : 0;

                      // タイトルと価格が有効な場合のみ表示
                      if (!empty($name1) && $price > 0) :
                    ?>
                        <div class="price-list__course-menus">
                          <dt class="price-list__course-menu">
                            <?php echo $name1; ?>
                          </dt>
                          <!-- 価格をフォーマットして表示 -->
                          <dd class="price-list__course-price">¥<?php echo number_format($price); ?></dd>
                        </div>
                    <?php
                      endif; // タイトルと価格が有効な場合のチェック終了
                    endforeach; ?>
                  </dl>
                </div>
              </div>
          <?php
            endif; // 表示すべきデータがあるかのチェック終了
          endif; // 講習情報が空でないかチェック終了
          ?>


        </div>
      </div>
    </div>
  </div>
  <!-- /page-contents -->

</main>

<?php get_footer(); ?>