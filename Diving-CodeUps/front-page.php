<?php get_header(); ?>

<main>
  <!-- メインビュー -->
  <div class="main-visual">
    <div class="main-visual__wrapper">
      <p class="main-visual__title">DIVING</p>
      <div class="main-visual__lead">into the ocean</div>
    </div>

    <!-- メインビューのスライダー -->
    <div class="main-visual__swiper swiper js-main-visual-swiper">
      <div class="main-visual__wrap swiper-wrapper">
        <?php
        $slideImages = SCF::get('top_images');
        foreach ($slideImages as $image) :
          // 各サブフィールドのデータを取得
          $img_url_SP = wp_get_attachment_image_src($image['mvImg_sp'], 'full');
          $img_url_PC = wp_get_attachment_image_src($image['mvImg_pc'], 'full');
          $img_alt = !empty($image['mvImg_alt']) ? esc_attr($image['mvImg_alt']) : 'メインビューの画像';
        ?>
          <div class="main-visual__slide swiper-slide">
            <div class="main-visual__img">
              <!-- SP・PCどちらの画像もある場合レスポンシブで出し分け -->
              <?php if ($img_url_SP && $img_url_PC) : ?>
                <picture>
                  <source srcset="<?php echo esc_url($img_url_PC[0]) ?>" media="(min-width: 768px)" />
                  <img src="<?php echo esc_url($img_url_SP[0]) ?>" alt="<?php echo $img_alt; ?>" width="375" height="667" />
                </picture>
                <!-- 画像がない場合はローディング画像を表示 -->
              <?php else : ?>
                <picture>
                  <source srcset="<?php echo esc_url(get_theme_file_uri() . '/images/common/pc/mv-loading_pc.png'); ?>" media="(min-width: 768px)">
                  <img src="<?php echo esc_url(get_theme_file_uri() . '/images/common/mv-loading.png'); ?>" alt="Loading image" width="375" height="667">
                </picture>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <!-- /メインビュー -->


  <!-- キャンペーン：campaign -->
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
          <div class="campaign__wrap swiper-wrapper">
            <!-- Campaign Slides -->
            <?php
            // 新着6件のカスタム投稿を取得
            $args = array(
              'post_type' => 'campaign',
              'posts_per_page' => 6,
              'orderby' => 'date',
              'order' => 'DESC',
            );
            $query = new WP_Query($args);
            ?>
            <!-- サブループとしてカスタム投稿をループ -->
            <?php if ($query->have_posts()) : ?>
              <?php while ($query->have_posts()) : $query->the_post(); ?>
                <!-- campaign card -->
                <article class="campaign__slide swiper-slide">
                  <div class="card-01">
                    <!-- 投稿のパーマリンクをリンクとして追加 -->
                    <a href="<?php the_permalink(); ?>" class="card-01__link">
                      <div class="card-01__img">
                        <!-- アイキャッチ画像の表示 -->
                        <?php if (has_post_thumbnail()) : ?>
                          <?php the_post_thumbnail(); ?>
                        <?php else : ?>
                          <!-- アイキャッチ画像がない場合のデフォルト画像 -->
                          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/noimg.jpg" alt="<?php echo esc_attr('No image'); ?>" width="280" height="188">
                        <?php endif; ?>
                      </div>
                      <div class="card-01__body">
                        <div class="card-01__header">
                          <div class="category">
                            <!-- カテゴリー名の表示 -->
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'campaign_category');
                            if ($terms && !is_wp_error($terms)) {
                              echo esc_html($terms[0]->name);
                            }
                            ?>
                          </div>
                          <!-- 投稿のタイトルを表示 -->
                          <h3 class="card-01__title"><?php the_title(); ?></h3>
                        </div>
                        <div class="card-01__content">
                          <!-- price -->
                          <?php
                          // ACFからキャンペーン価格のグループフィールドを取得
                          $campaign_price = get_field('campaign_price');

                          if ($campaign_price) {
                            // 正常価格とオファー価格をそれぞれ取得
                            $normal_price = $campaign_price['normal_price'];
                            $offer_price = $campaign_price['offer_price'];
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
                                <span class="card-01__price">¥<?php echo esc_html(number_format($normal_price)); ?></span>
                              <?php endif; ?>
                              <!-- オファー価格を表示 -->
                              ¥<?php echo esc_html(number_format($offer_price)); ?>
                            </p>
                          <?php endif; ?>
                          <!-- /price -->
                        </div>
                    </a>
                  </div>
                </article>
                <!-- /campaign card -->
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php else : ?>
              <p>キャンペーンの投稿が見つかりませんでした</p>
            <?php endif; ?>
            <!-- /Campaign Slides -->
          </div>
          <!-- /swiper-wrapper -->
        </div>
        <!-- /swiper -->
      </div>
      <div class="campaign__arrow-control u-desktop">
        <!-- ページネーション -->
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

  <!-- 私たちについて：about us -->
  <section id="about" class="about top-about">
    <div class="about__inner inner">
      <div class="about__header section-header">
        <div class="section-header__engtitle">about us</div>
        <h2 class="section-header__jatitle">私たちについて</h2>
      </div>
      <div class="about__img-wrapper">
        <div class="about__img-left">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/about-bg.jpg" alt="<?php echo esc_attr('シーサーの画像'); ?>" />
        </div>
        <div class="about__img-right">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/about-bg_2.jpg" alt="<?php echo esc_attr('熱帯魚の画像'); ?>" />
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
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/pc/coral.png" alt="<?php echo esc_attr('サンゴのアイコン'); ?>" width="194" height="181" />
    </div>
  </section>

  <!-- ダイビング情報：information -->
  <section id="information" class="information section">
    <div class="information__inner inner">
      <div class="information__header section-header">
        <div class="section-header__engtitle">information</div>
        <h2 class="section-header__jatitle">ダイビング情報</h2>
      </div>
      <div class="information__wrapper">
        <div class="information__img js-inview">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/information.jpg" alt="<?php echo esc_attr('サンゴと熱帯魚の画像'); ?>" width="345" height="227" />
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

  <!-- ブログ：blog -->
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
        // 投稿を取得するためのクエリ引数を設定
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 3 // 表示させたい投稿の数
        );
        // 新しいWP_Queryオブジェクトを作成
        $the_query = new WP_Query($args);
        ?>

        <?php if ($the_query->have_posts()) : ?>
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <!-- blog card -->
            <article class="blog-cards__item card-02">
              <!-- 投稿のパーマリンクをリンクとして追加 -->
              <a href="<?php the_permalink(); ?>" class="card-02__link">
                <div class="card-02__img">
                  <!-- アイキャッチ画像の表示 -->
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                  <?php else : ?>
                    <!-- アイキャッチ画像がない場合のデフォルト画像 -->
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/noimg.jpg" alt="No image" width="301" height="201">
                  <?php endif; ?>
                </div>
                <div class="card-02__header">
                  <!-- 投稿日時を表示 -->
                  <time class="card-02__date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('Y.m/d'); ?></time>
                  <!-- 投稿のタイトルを表示 -->
                  <h3 class="card-02__title"><?php the_title(); ?></h3>
                </div>
                <div class="card-02__content">
                  <?php echo get_the_content(); ?>
                </div>
              </a>
            </article>
            <!-- /blog card -->
          <?php endwhile; ?>
          <!-- クエリの投稿データをリセット -->
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p>まだブログ記事は投稿されてません</p>
        <?php endif; ?>
      </div>
      <div class="blog__link">
        <a href="<?php echo esc_url(home_url('/blog')); ?>" class="link-button">View more
          <span class="arrow-x"></span>
        </a>
      </div>
    </div>
    <div class="blog__img-icon u-desktop">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/pc/blog-fish-illust.png" alt="<?php echo esc_attr('魚の群れのアイコン'); ?>" width="437" height="201" />
    </div>
  </section>

  <!-- お客様の声：voice -->
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
        $query = new WP_Query($args);
        ?>

        <!-- サブループとしてカスタム投稿をループ -->
        <?php if ($query->have_posts()) : ?>
          <?php while ($query->have_posts()) : $query->the_post(); ?>
            <!-- Voice-card -->
            <div class="voice-cards__item card-03">
              <div class="card-03__header">
                <div class="card-03__left">
                  <div class="card-03__attribute">
                    <?php
                    // ACFのグループフィールドからデータを取得
                    $metadata = get_field('metadata');
                    $age = $metadata['age'];
                    $gender = $metadata['gender'];
                    ?>
                    <p><?php echo esc_html($age); ?>(<?php echo esc_html($gender); ?>)</p>
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'voice_category');
                    if ($terms && !is_wp_error($terms)) :
                      $term = $terms[0];
                    ?>
                      <span class="category"><?php echo esc_html($term->name); ?></span>
                    <?php endif; ?>
                  </div>
                  <h3 class="card-03__title"><?php the_title(); ?></h3>
                </div>
                <div class="card-03__img js-inview">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/noimg.jpg" alt="No image" width="151" height="117">
                  <?php endif; ?>
                </div>
              </div>
              <div class="card-03__content">
                <?php
                $content = get_the_content();

                // 余計なHTMLコメントを削除
                $content = preg_replace('/<!--(.*)-->/Uis', '', $content);

                if (mb_strlen($content, 'UTF-8') > 170) {
                  // 本文から改行を削除しないように変更
                  $content = mb_substr($content, 0, 170, 'UTF-8');
                  echo wp_kses_post($content) . '…'; // 改行を含むテキストをエスケープ
                } else {
                  echo wp_kses_post($content); // 改行を含むテキストをエスケープ
                }
                ?>
              </div>

            </div>
            <!-- /Voice-card -->
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p>お客様の声の投稿が見つかりませんでした</p>
        <?php endif; ?>
      </div>

      <div class="voice__link">
        <a href="<?php echo esc_url(home_url('/voice')); ?>" class="link-button">View more
          <span class="arrow-x"></span>
        </a>
      </div>
    </div>
    <div class="voice__img-icon u-desktop">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/pc/fish-illust.png" alt="<?php echo esc_attr('魚の群れのアイコン'); ?>" width="301" height="138" />
    </div>
    <div class="voice__img-icon2 u-desktop">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/pc/seahorse-illust.png" alt="<?php echo esc_attr('タツノオトシゴのアイコン'); ?>" width="71" height="162" />
    </div>
  </section>

  <!-- 料金一覧：price -->
  <section id="price" class="price section">
    <div class="price__inner inner">
      <div class="price__header section-header">
        <div class="section-header__engtitle">price</div>
        <h2 class="section-header__jatitle">料金一覧</h2>
      </div>
      <div class="price__contents">
        <div class="price__items">


          <!-- ライセンス講習 -->
          <?php
          // 固定ページIDを指定
          $page_id = 22;

          // 固定ページからSCFのデータを取得
          $courses = SCF::get('license', $page_id);

          // 取得した講習情報が空でないかを確認
          if (!empty($courses)) :
          ?>
            <div class="price__courses">
              <h3 class="price__course">ライセンス講習</h3> <!-- クラス名を元に戻す -->
              <dl class="price__course-list">
                <!-- 各講習情報をループで表示 -->
                <?php foreach ($courses as $course) :
                  // タイトルが設定されているかを確認
                  $name1 = isset($course['title_license']) ? esc_html($course['title_license']) : '';
                  // 価格を整数に変換して取得
                  $price = isset($course['price_license']) ? intval($course['price_license']) : 0;
                ?>
                  <div class="price__course-menus"> <!-- クラス名を元に戻す -->
                    <dt class="price__course-menu"> <!-- クラス名を元に戻す -->
                      <!-- タイトルとサブタイトルを表示 -->
                      <?php echo $name1; ?>
                    </dt>
                    <!-- 価格をフォーマットして表示 -->
                    <dd class="price__course-price">¥<?php echo number_format($price); ?></dd>
                  </div>
                <?php endforeach; ?>
              </dl>
            </div>
          <?php endif; ?>


          <!-- 体験ダイビング -->
          <?php
          // 固定ページIDを指定
          $page_id = 22;

          // 固定ページからSCFのデータを取得
          $courses = SCF::get('experience', $page_id);

          // 取得した講習情報が空でないかを確認
          if (!empty($courses)) :
          ?>
            <div class="price__courses">
              <h3 class="price__course">体験ダイビング</h3>
              <dl class="price__course-list">
                <!-- 各講習情報をループで表示 -->
                <?php foreach ($courses as $courseItem) :
                  // タイトルと所要時間をエスケープして取得
                  $name1 = isset($courseItem['title_experience']) ? esc_html($courseItem['title_experience']) : '';
                  $name2 = isset($courseItem['duration_experience']) ? esc_html($courseItem['duration_experience']) : '';
                  // 価格を整数に変換して取得
                  $price = isset($courseItem['price_experience']) ? intval($courseItem['price_experience']) : 0;
                ?>
                  <div class="price__course-menus">
                    <dt class="price__course-menu">
                      <!-- タイトルと所要時間を表示 -->
                      <?php echo $name1 . ' ' . $name2; ?>
                    </dt>
                    <!-- 価格をフォーマットして表示 -->
                    <dd class="price__course-price">¥<?php echo number_format($price); ?></dd>
                  </div>
                <?php endforeach; ?>
              </dl>
            </div>
          <?php endif; ?>


          <!-- ファンダイビング -->
          <?php
          // 固定ページIDを指定
          $page_id = 22;

          // 固定ページからSCFのデータを取得
          $courses = SCF::get('fun', $page_id);

          // 講習情報が空でないかチェック
          if (!empty($courses)) :
          ?>
            <div class="price__courses">
              <h3 class="price__course">ファンダイビング</h3>
              <dl class="price__course-list">
                <!-- 各講習情報をループで表示 -->
                <?php foreach ($courses as $courseItem) :
                  // タイトルと回数をエスケープして取得
                  $name1 = isset($courseItem['title_fun']) ? esc_html($courseItem['title_fun']) : '';
                  $name2 = isset($courseItem['time_fun']) ? esc_html($courseItem['time_fun']) : '';
                  // 価格を整数に変換して取得
                  $price = isset($courseItem['price_fun']) ? intval($courseItem['price_fun']) : 0;
                ?>
                  <div class="price__course-menus">
                    <dt class="price__course-menu">
                      <!-- タイトルと回数を表示 -->
                      <?php echo $name1 . ' ' . $name2; ?>
                    </dt>
                    <!-- 価格をフォーマットして表示 -->
                    <dd class="price__course-price">¥<?php echo number_format($price); ?></dd>
                  </div>
                <?php endforeach; ?>
              </dl>
            </div>
          <?php endif; ?>


          <!-- スペシャルダイビング -->
          <?php
          // 固定ページIDを指定
          $page_id = 22;

          // 固定ページからSCFのデータを取得
          $courses = SCF::get('special', $page_id);

          // 講習情報が空でないかチェック
          if (!empty($courses)) :
          ?>
            <div class="price__courses">
              <h3 class="price__course">スペシャルダイビング</h3>
              <dl class="price__course-list">
                <!-- 各講習情報をループで表示 -->
                <?php foreach ($courses as $courseItem) :
                  // タイトルとサブタイトルをエスケープして取得
                  $name1 = isset($courseItem['title_special']) ? esc_html($courseItem['title_special']) : '';
                  $name2 = isset($courseItem['time_special']) ? esc_html($courseItem['time_special']) : '';
                  // 価格を整数に変換して取得
                  $price = isset($courseItem['price_special']) ? intval($courseItem['price_special']) : 0;
                ?>
                  <div class="price__course-menus">
                    <dt class="price__course-menu">
                      <!-- タイトルとサブタイトルを表示 -->
                      <?php echo $name1 . ' ' . $name2; ?>
                    </dt>
                    <!-- 価格をフォーマットして表示 -->
                    <dd class="price__course-price">¥<?php echo number_format($price); ?></dd>
                  </div>
                <?php endforeach; ?>
              </dl>
            </div>
          <?php endif; ?>


        </div>

        <div class="price__img js-inview">
          <picture>
            <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/pc/price-pc.jpg" media="(min-width:768px)" />
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/price-sp.jpg" alt="<?php echo esc_attr('泳ぐウミガメの画像'); ?>" width="345" height="227" />
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
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/pc/fish-illust_2.png" alt="<?php echo esc_attr('魚の群れイラスト画像'); ?>" width="437" height="201" />
    </div>
  </section>

</main>

<?php get_footer(); ?>