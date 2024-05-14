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

        <!-- ライセンス講習 -->
        <div class="page-price__items price-lists">
          <div class="price-list">
            <div data-id="license" id="license" class="price-list__courses">
              <div class="price-list__header">
                <div class="price-list__header-content">
                  <h3 class="price-list__course">ライセンス講習</h3>
                  <div class="price-list__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/pc/whale-icon-w.svg" alt="クジラのアイコン" width="24" height="24" />
                  </div>
                </div>
              </div>
              <dl class="price-list__course-list">

                <!-- data -->
                <?php
                $courses = SCF::get_option_meta('theme-options', 'license');
                ?>
                <?php if (!empty($courses)) : ?>
                  <?php
                  foreach ($courses as $course => $courseItem) :
                    $name1 = esc_html($courseItem['title_license']);
                    $name2 = esc_html($courseItem['subTitle_license']);
                    $price = esc_html($courseItem['price_license']);
                  ?>

                    <div class="price-list__corse-menus">
                      <dt class="price-list__corse-menu">
                        <?php echo $name1; ?>
                        <br class="u-mobile" />
                        <?php echo $name2; ?>
                      </dt>
                      <dd class="price-list__corse-price">¥<?php echo $price; ?></dd>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>


              </dl>
            </div>
          </div>

          <!-- 体験ダイビング -->
          <div class="price-list">
            <div data-id="#experience" id="experience" class="price-list__courses">
              <div class="price-list__header">
                <div class="price-list__header-content">
                  <h3 class="price-list__course">体験ダイビング</h3>
                  <div class="price-list__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/pc/whale-icon-w.svg" alt="クジラのアイコン" width="24" height="24" />
                  </div>
                </div>
              </div>
              <dl class="price-list__course-list">

                <!-- data -->
                <?php
                $courses = SCF::get_option_meta('theme-options', 'experience');
                ?>
                <?php if (!empty($courses)) : ?>
                  <?php
                  foreach ($courses as $course => $courseItem) :
                    $name1 = esc_html($courseItem['title_experience']);
                    $name2 = esc_html($courseItem['subTitle_experience']);
                    $price = esc_html($courseItem['price_experience']);
                  ?>

                    <div class="price-list__corse-menus">
                      <dt class="price-list__corse-menu">
                        <?php echo $name1; ?>
                        <br class="u-mobile" />
                        <?php echo $name2; ?>
                      </dt>
                      <dd class="price-list__corse-price">¥<?php echo $price; ?></dd>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>

              </dl>
            </div>
          </div>

          <!-- ファンダイビング -->
          <div class="price-list">
            <div data-id="#fun" id="fun" class="price-list__courses">
              <div class="price-list__header">
                <div class="price-list__header-content">
                  <h3 class="price-list__course">ファンダイビング</h3>
                  <div class="price-list__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/pc/whale-icon-w.svg" alt="クジラのアイコン" width="24" height="24" />
                  </div>
                </div>
              </div>
              <dl class="price-list__course-list">

                <!-- data -->
                <?php
                $courses = SCF::get_option_meta('theme-options', 'fun');
                ?>
                <?php if (!empty($courses)) : ?>
                  <?php
                  foreach ($courses as $course => $courseItem) :
                    $name1 = esc_html($courseItem['title_fun']);
                    $name2 = esc_html($courseItem['subTitle_fun']);
                    $price = esc_html($courseItem['price_fun']);
                  ?>

                    <div class="price-list__corse-menus">
                      <dt class="price-list__corse-menu">
                        <?php echo $name1; ?>
                        <br class="u-mobile" />
                        <?php echo $name2; ?>
                      </dt>
                      <dd class="price-list__corse-price">¥<?php echo $price; ?></dd>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>

              </dl>
            </div>
          </div>

          <!-- スペシャルダイビング -->
          <div class="price-list">
            <div data-id="special" id="special" class="price-list__courses">
              <div class="price-list__header">
                <div class="price-list__header-content">
                  <h3 class="price-list__course">スペシャルダイビング</h3>
                  <div class="price-list__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/pc/whale-icon-w.svg" alt="クジラのアイコン" width="24" height="24" />
                  </div>
                </div>
              </div>
              <dl class="price-list__course-list">

                <!-- data -->
                <?php
                $courses = SCF::get_option_meta('theme-options', 'special');
                ?>
                <?php if (!empty($courses)) : ?>
                  <?php
                  foreach ($courses as $course => $courseItem) :
                    $name1 = esc_html($courseItem['title_special']);
                    $name2 = esc_html($courseItem['subTitle_special']);
                    $price = esc_html($courseItem['price_special']);
                  ?>

                    <div class="price-list__corse-menus">
                      <dt class="price-list__corse-menu">
                        <?php echo $name1; ?>
                        <br class="u-mobile" />
                        <?php echo $name2; ?>
                      </dt>
                      <dd class="price-list__corse-price">¥<?php echo $price; ?></dd>
                    </div>

                  <?php endforeach; ?>
                <?php endif; ?>

              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page-contents -->

</main>

<?php get_footer(); ?>