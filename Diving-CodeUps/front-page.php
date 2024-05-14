<?php get_header(); ?>

<main>
  <!-- メインビュー -->
  <!-- Slider main container -->
  <div class="main-visual">
    <div class="main-visual__wrapper">
      <p class="main-visual__title">DIVING</p>
      <div class="main-visual__lead">into the ocean</div>
    </div>
    <div class="main-visual__swiper swiper js-main-visual-swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">

        <!-- Slides -->
        <?php
        // ループで画像を取得する
        for ($i = 1; $i <= 4; $i++) :
          // SP版画像の取得
          $mv_sp_group = get_field('mv_sp');
          $sp_image_url = $mv_sp_group['imgSP' . $i]['url'];
          $sp_image_alt = $mv_sp_group['imgSP' . $i]['alt'];

          // PC版画像の取得
          $mv_pc_group = get_field('mv_pc');
          $pc_image_url = $mv_pc_group['imgPC' . $i]['url'];
          $pc_image_alt = $mv_pc_group['imgPC' . $i]['alt'];

          // 画像が存在する場合のみ表示
          if ($sp_image_url && $pc_image_url) :
        ?>
            <div class="swiper-slide main-visual__slide">
              <div class="main-visual__img">
                <picture>
                  <!-- PC版画像 -->
                  <source srcset="<?php echo esc_url($pc_image_url); ?>" media="(min-width: 768px)" />
                  <!-- スマホ版画像 -->
                  <img src="<?php echo esc_url($sp_image_url); ?>" alt="<?php echo esc_attr($sp_image_alt); ?>" />
                </picture>
              </div>
            </div>
          <?php endif; ?>
        <?php endfor; ?>
        <!-- /Slides -->


      </div>
    </div>
  </div>
  <!-- /メインビュー -->

  <!-- campaign -->
  <section id="campaign" class="campaign top-campaign">
    <div class="campaign__inner inner">
      <div class="campaign__header section-header">
        <div class="section-header__engtitle">campaign</div>
        <h2 class="section-header__jatitle">キャンペーン</h2>
      </div>
      <!-- ↓にoverflow:hidden;を指定 -->
      <div class="campaign__slider">
        <!-- swiper -->
        <!-- ↓のoverflow:hidden;をvisibleに -->
        <div class="campaign__swiper swiper js-campaign-swiper">
          <!-- swiper-wrapper -->
          <div class="swiper-wrapper">

            <!-- Campaign Slides -->
            <?php
            // 新着6件のカスタム投稿を取得
            $args = array(
              'post_type' => 'campaign',
              'posts_per_page' => 6,
              'orderby' => 'date',
              'order' => 'DESC',
            );
            $query = new WP_Query($args); ?>
            <!-- サブループとしてカスタム投稿をループ -->
            <?php if ($query->have_posts()) : ?>
              <?php while ($query->have_posts()) : $query->the_post(); ?>
                <!-- campaign card -->
                <article class="campaign__slide swiper-slide">
                  <div class="card-01">
                    <div class="card-01__link">
                      <div class="card-01__img">
                        <?php if (has_post_thumbnail()) : ?>
                          <?php the_post_thumbnail(); ?>
                        <?php else : ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/common/noimg.jpg" alt="No image" width="280" height="188">
                        <?php endif; ?>
                      </div>
                      <div class="card-01__body">
                        <div class="card-01__header">
                          <div class="category"><?php echo get_the_terms(get_the_ID(), 'campaign_category')[0]->name; ?></div>
                          <h3 class="card-01__title"><?php the_title(); ?></h3>
                        </div>
                        <div class="card-01__content">
                          <p class="card-01__lead">全部コミコミ(お一人様)</p>
                          <p class="card-01__discount">
                            <span class="card-01__price">¥<?php the_field('standard') ?></span>
                            ¥<?php the_field('special') ?>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </article>
                <!-- /campaign card -->
              <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            <!-- Campaign Slides -->

          </div>
          <!-- /swiper-wrapper -->
        </div>
        <!-- /swiper -->
      </div>
      <div class="campaign__arrow-control u-desktop">
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev js-campaign-prev"></div>
        <div class="swiper-button-next js-campaign-next"></div>
      </div>
    </div>
    <div class="campaign__link">
      <a href="<?php echo esc_url(home_url('/campaign')); ?>" class="link-button">View more
        <span class="arrow-x"></span>
      </a>
    </div>
  </section>
  <!-- /campaign -->
  <!-- about-us -->
  <section id="about" class="about top-about">
    <div class="about__inner inner">
      <div class="about__header section-header">
        <div class="section-header__engtitle">about us</div>
        <h2 class="section-header__jatitle">私たちについて</h2>
      </div>
      <div class="about__img-wrapper">
        <div class="about__img-left">
          <img src="<?php echo get_template_directory_uri(); ?>/images/common/about-bg.jpg" alt="シーサーの画像" />
        </div>
        <div class="about__img-right">
          <img src="<?php echo get_template_directory_uri(); ?>/images/common/about-bg_2.jpg" alt="熱帯魚の画像" />
        </div>
      </div>
      <div class="about__contents">
        <div class="about__lead">Dive into<br />the Ocean</div>
        <div class="about__copy">
          <p class="about__text">
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
          </p>
          <div class="about__link">
            <a href="<?php echo esc_url(home_url('/about-us')); ?>" class="link-button">View more
              <span class="arrow-x"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="about__img-icon u-desktop">
      <img src="<?php echo get_template_directory_uri(); ?>/images/common/pc/coral.png" alt="サンゴのアイコン" width="194" height="181" />
    </div>
  </section>
  <!-- /about-us -->
  <!-- information -->
  <section id="information" class="information section">
    <div class="information__inner inner">
      <div class="information__header section-header">
        <div class="section-header__engtitle">information</div>
        <h2 class="section-header__jatitle">ダイビング情報</h2>
      </div>
      <div class="information__wrapper">
        <div class="information__img js-inview">
          <img src="<?php echo get_template_directory_uri(); ?>/images/common/information.jpg" alt="サンゴと熱帯魚の画像" width="345" height="227" />
        </div>
        <div class="information__content">
          <p class="information__title">ライセンス講習</p>
          <p class="information__desc">
            当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br />正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
          </p>
          <div class="information__link">
            <a href="<?php echo esc_url(home_url('/information')); ?>" class="link-button">View more
              <span class="arrow-x"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /information -->
  <!-- blog -->
  <section id="blog" class="blog">
    <div class="blog__inner inner">
      <div class="blog__header section-header">
        <div class="section-header__engtitle section-header__engtitle--white">
          Blog
        </div>
        <h2 class="section-header__jatitle section-header__jatitle--white">
          ブログ
        </h2>
      </div>
      <div class="blog__items blog-cards">

        <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 3 //表示させたい投稿の数
        );
        $the_query = new WP_Query($args);
        ?>

        <?php if ($the_query->have_posts()) : ?>
          <?php while ($the_query->have_posts()) : ?>
            <?php $the_query->the_post(); ?>
            <!-- blog card -->
            <article class="blog-cards__item card-02">
              <a href="<?php the_permalink(); ?>" class="card-02__link">
                <div class="card-02__img">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/noimg.jpg" alt="No image" width="301" height="201">
                  <?php endif; ?>
                </div>
                <div class="card-02__header">
                  <time class="card-02__date" datetime="<?php the_time('c') ?>"><?php the_time('Y.m/d'); ?></time>
                  <h3 class="card-02__title"><?php the_title(); ?></h3>
                </div>
                <div class="card-02__content">
                  <?php the_content(); ?>
                </div>
              </a>
            </article>
            <!-- /blog card -->
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

      </div>
      <div class="blog__link">
        <a href="<?php echo esc_url(home_url('/blog')); ?>" class="link-button">View more
          <span class="arrow-x"></span>
        </a>
      </div>
    </div>
    <div class="blog__img-icon u-desktop">
      <img src="<?php echo get_template_directory_uri(); ?>/images/common/pc/blog-fish-illust.png" alt="魚の群れのアイコン" width="437" height="201" />
    </div>
  </section>
  <!-- /blog -->
  <!-- voice -->
  <section id="voice" class="voice top-voice">
    <div class="voice__inner inner">
      <div class="voice__header section-header">
        <div class="section-header__engtitle">voice</div>
        <h2 class="section-header__jatitle">お客様の声</h2>
      </div>
      <div class="voice__items voice-cards">

        <?php
        // 新着2件のカスタム投稿を取得
        $args = array(
          'post_type' => 'voice',
          'posts_per_page' => 2,
          'orderby' => 'date',
          'order' => 'DESC',
        );
        $query = new WP_Query($args); ?>

        <!-- サブループとしてカスタム投稿をループ -->
        <?php if ($query->have_posts()) : ?>
          <?php while ($query->have_posts()) : $query->the_post(); ?>
            <!-- Voice-card -->
            <div class="voice-cards__item card-03">
              <div class="card-03__header">
                <div class="card-03__left">
                  <div class="card-03__attribute">
                    <p><?php the_field('age') ?>代(<?php the_field('gender') ?>)</p>
                    <span class="category"><?php echo get_the_terms(get_the_ID(), 'voice_category')[0]->name; ?></span>
                  </div>
                  <h3 class="card-03__title">
                    <?php the_title(); ?>
                  </h3>
                </div>
                <div class="card-03__img js-inview">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/noimg.jpg" alt="No image" while="151" height="117">
                  <?php endif; ?>
                </div>
              </div>
              <div class="card-03__content">
                <?php
                if (mb_strlen($post->post_content, 'UTF-8') > 170) {
                  $content = mb_substr(strip_tags($post->post_content), 0, 170, 'UTF-8');
                  echo $content . '……';
                } else {
                  echo strip_tags($post->post_content);
                }
                ?>
              </div>
            </div>
            <!-- Voice-card -->
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

      </div>
      <div class="voice__link">
        <a href="<?php echo esc_url(home_url('/voice')); ?>" class="link-button">View more
          <span class="arrow-x"></span>
        </a>
      </div>
    </div>
    <div class="voice__img-icon u-desktop">
      <img src="<?php echo get_template_directory_uri(); ?>/images/common/pc/fish-illust.png" alt="魚の群れのアイコン" width="301" height="138" />
    </div>
    <div class="voice__img-icon2 u-desktop">
      <img src="<?php echo get_template_directory_uri(); ?>/images/common/pc/seahorse-illust.png" alt="タツノオトシゴのアイコン" width="71" height="162" />
    </div>
  </section>
  <!-- /voice -->
  <!-- price -->
  <section id="price" class="price section">
    <div class="price__inner inner">
      <div class="price__header section-header">
        <div class="section-header__engtitle">price</div>
        <h2 class="section-header__jatitle">料金一覧</h2>
      </div>
      <div class="price__contents">
        <div class="price__items">

          <!-- ライセンス講習 -->
          <div class="price__courses">
            <h3 class="price__course">ライセンス講習</h3>
            <dl class="price__course-list">

              <!-- data -->
              <?php
              $courses = SCF::get_option_meta('theme-options', 'license');
              if (!empty($courses)) {
                foreach ($courses as $course => $courseItem) {
                  $fullTitle = esc_html($courseItem['title_license'] . ' ' . $courseItem['subTitle_license']);
              ?>
                  <div class="price__corse-menus">
                    <dt class="price__corse-menu">
                      <?php echo $fullTitle; ?>
                    </dt>
                    <dd class="price__corse-price">¥<?php echo esc_html($courseItem['price_license']); ?></dd>
                  </div>
              <?php
                }
              }
              ?>

            </dl>
          </div>

          <!-- 体験ダイビング -->
          <div class="price__courses">
            <h3 class="price__course">体験ダイビング</h3>
            <dl class="price__course-list">

              <!-- data -->
              <?php
              $courses = SCF::get_option_meta('theme-options', 'experience');
              if (!empty($courses)) {
                foreach ($courses as $course => $courseItem) {
                  $fullTitle = esc_html($courseItem['title_experience'] . ' ' . $courseItem['subTitle_experience']);
              ?>
                  <div class="price__corse-menus">
                    <dt class="price__corse-menu">
                      <?php echo $fullTitle; ?>
                    </dt>
                    <dd class="price__corse-price">¥<?php echo esc_html($courseItem['price_experience']); ?></dd>
                  </div>
              <?php
                }
              }
              ?>
            </dl>
          </div>

          <!-- ファンダイビング -->
          <div class="price__courses">
            <h3 class="price__course">ファンダイビング</h3>
            <dl class="price__course-list">

              <!-- data -->
              <?php
              $courses = SCF::get_option_meta('theme-options', 'fun');
              if (!empty($courses)) {
                foreach ($courses as $course => $courseItem) {
                  $fullTitle = esc_html($courseItem['title_fun'] . ' ' . $courseItem['subTitle_fun']);
              ?>
                  <div class="price__corse-menus">
                    <dt class="price__corse-menu">
                      <?php echo $fullTitle; ?>
                    </dt>
                    <dd class="price__corse-price">¥<?php echo esc_html($courseItem['price_fun']); ?></dd>
                  </div>
              <?php
                }
              }
              ?>
            </dl>
          </div>

          <!-- スペシャルダイビング -->
          <div class="price__courses">
            <h3 class="price__course">スペシャルダイビング</h3>
            <dl class="price__course-list">

              <!-- data -->
              <?php
              $courses = SCF::get_option_meta('theme-options', 'special');
              if (!empty($courses)) {
                foreach ($courses as $course => $courseItem) {
                  $fullTitle = esc_html($courseItem['title_special'] . ' ' . $courseItem['subTitle_special']);
              ?>
                  <div class="price__corse-menus">
                    <dt class="price__corse-menu">
                      <?php echo $fullTitle; ?>
                    </dt>
                    <dd class="price__corse-price">¥<?php echo esc_html($courseItem['price_special']); ?></dd>
                  </div>
              <?php
                }
              }
              ?>
            </dl>
          </div>
        </div>

        <div class="price__img js-inview">
          <picture>
            <source srcset="<?php echo get_template_directory_uri(); ?>/images/common/pc/price-pc.jpg" media="(min-width:768px)" />
            <img src="<?php echo get_template_directory_uri(); ?>/images/common/price-sp.jpg" alt="泳ぐウミガメの画像" width="345" height="227" />
          </picture>
        </div>
      </div>
      <div class="price__link">
        <a href="<?php echo esc_url(home_url('/price')); ?>" class="link-button">View more
          <span class="arrow-x"></span>
        </a>
      </div>
    </div>
    <div class="price__img-icon u-desktop">
      <img src="<?php echo get_template_directory_uri(); ?>/images/common/pc/fish-illust_2.png" alt="" width="437" height="201" />
    </div>
  </section>
  <!-- /price -->

</main>

<?php get_footer(); ?>