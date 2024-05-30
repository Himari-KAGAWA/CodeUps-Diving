<!-- page-sidebar -->
<aside class="page-sidebar top-sidebar">
  <div class="page-sidebar__contents">
    <div class="page-sidebar__popular-articles">
      <div class="page-sidebar__title sidebar-header">
        <h2 class="sidebar-header__title">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/whale-icon-b.svg" alt="<?php echo esc_attr('クジラのアイコン'); ?>" />
          <span>人気記事</span>
        </h2>
      </div>
      <ul class="page-sidebar__articles">

        <?php
        // 人気記事の引数を設定
        $args = array(
          'post_type' => 'post',
          'range' => 'month',
          'limit' => 3,
          'post-excerpt' => array(
            'active' => true
          ),
          'stats_tag' => array(
            'date' => array(
              'active' => true
            ),
          ),
        );

        // 人気記事クエリの作成
        $popular_posts = new \WordPressPopularPosts\Query($args);
        ?>

        <?php if ($popular_posts) : ?>
          <?php foreach ($popular_posts->get_posts() as $popular_post) : ?>
            <!-- 人気記事カード -->
            <li class="page-sidebar__article card-02">
              <a href="<?php echo esc_url(get_permalink($popular_post->id)); ?>" class="card-02__link">
                <div class="card-02__img">
                  <?php if (has_post_thumbnail($popular_post->id)) : ?>
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url($popular_post->id)); ?>" alt="人気記事のサムネイル">
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/noimg.jpg" alt="No image">
                  <?php endif; ?>
                </div>
                <div class="card-02__header">
                  <time class="card-02__date" datetime="<?php echo esc_attr($popular_post->date); ?>"><?php echo esc_html($popular_post->date); ?></time>
                  <h3 class="card-02__title">
                    <?php
                    // タイトルの長さをチェックし、24文字以上の場合は切り詰める
                    if (mb_strlen($popular_post->title) > 24) {
                      $title = mb_substr($popular_post->title, 0, 24);
                      echo esc_html($title) . '...';
                    } else {
                      echo esc_html($popular_post->title);
                    }
                    ?>
                  </h3>
                </div>
              </a>
            </li>
            <!-- /人気記事カード -->
          <?php endforeach; ?>
        <?php endif; ?>

      </ul>

    </div>
    <div class="page-sidebar__comment top-sidebar">
      <div class="page-sidebar__title top-sidebar__title sidebar-header">
        <h2 class="sidebar-header__title">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/whale-icon-b.svg" alt="<?php echo esc_attr('クジラのアイコン'); ?>" />
          <span>口コミ</span>
        </h2>
      </div>
      <?php
      // 最新の「voice」投稿を取得するクエリ
      $news_query = new WP_Query(
        array(
          'post_type'      => 'voice',
          'posts_per_page' => 1,
          'orderby'        => 'date',
          'order'          => 'DESC'
        )
      );
      ?>

      <?php if ($news_query->have_posts()) : ?>
        <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
          <div class="page-sidebar__comment-card">
            <div class="page-sidebar__comment-aside">
              <div class="page-sidebar__comment-figure">
                <div class="page-sidebar__comment-image">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/noimg.jpg" alt="<?php echo esc_attr('No image'); ?>">
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="page-sidebar__comment-header">
              <div class="page-sidebar__comment-attribute">
                <p><?php echo esc_html(get_field('age')) . '代 (' . esc_html(get_field('gender')) . ')'; ?></p>
              </div>
              <h3 class="page-sidebar__comment-title">
                <?php echo esc_html(get_the_title()); ?>
              </h3>
            </div>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>


      <div class="page-sidebar__comment-link">
        <a href="<?php echo esc_url(home_url('/voice')); ?>" class="link-button">View more
          <span class="arrow-x"></span>
        </a>
      </div>
    </div>
    <div class="page-sidebar__campaign top-sidebar">
      <div class="page-sidebar__title top-sidebar__title--c sidebar-header">
        <h2 class="sidebar-header__title">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/whale-icon-b.svg" alt="<?php echo esc_attr('クジラのアイコン'); ?>" />
          <span>キャンペーン</span>
        </h2>
      </div>
      <div class="page-sidebar__campaign-cards">

        <?php
        // 最新の「campaign」投稿を取得するクエリ
        $news_query = new WP_Query(
          array(
            'post_type'      => 'campaign',
            'posts_per_page' => 2,
            'orderby'        => 'date',
            'order'          => 'DESC'
          )
        );
        ?>

        <?php if ($news_query->have_posts()) : ?>
          <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
            <!-- キャンペーンカード -->
            <div class="page-sidebar__campaign-card card-01">
              <a href="<?php echo esc_url(get_permalink()); ?>" class="card-01__link">
                <div class="card-01__img">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/noimg.jpg" alt="<?php echo esc_attr('No image'); ?>">
                  <?php endif; ?>
                </div>
                <div class="card-01__body">
                  <div class="card-01__header">
                    <h3 class="card-01__title"><?php echo esc_html(get_the_title()); ?></h3>
                  </div>
                  <div class="card-01__content">
                    <p class="card-01__lead">全部コミコミ(お一人様)</p>
                    <p class="card-01__discount">
                      <span class="card-01__price">¥<?php echo esc_html(get_field('standard')); ?></span>
                      ¥<?php echo esc_html(get_field('special')); ?>
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <!-- /キャンペーンカード -->
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>

      </div>

      <div class="page-sidebar__campaign-link">
        <a href="<?php echo esc_url(home_url('/campaign')); ?>" class="link-button">View more
          <span class="arrow-x"></span>
        </a>
      </div>
    </div>
    <div class="page-sidebar__archive top-sidebar">
      <div class="page-sidebar__title top-sidebar__title-a sidebar-header">
        <h2 class="sidebar-header__title">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/whale-icon-b.svg" alt="<?php echo esc_attr('クジラのアイコン'); ?>" />
          <span>アーカイブ</span>
        </h2>
      </div>

      <div class="page-sidebar__archive-list js-archive">
        <?php
        global $wpdb;

        // 年月ごとの投稿数を取得するクエリ
        $months = $wpdb->get_results("
          SELECT DISTINCT MONTH(post_date) AS month,
                    YEAR(post_date) AS year,
                    COUNT(id) as post_count
          FROM $wpdb->posts
          WHERE post_status = 'publish'
            AND post_date <= NOW()
            AND post_type = 'post'
          GROUP BY month, year
          ORDER BY post_date DESC
        ");

        $year_prev = null;
        ?>

        <?php foreach ($months as $month) : ?>
          <?php $year_current = $month->year; ?>
          <?php if ($year_current != $year_prev) : ?>
            <?php if ($year_prev != null) : ?>
              </ul> <!-- 前の月のリストを閉じる -->
            <?php endif; ?>
            <div class="page-sidebar__year js-open"><?php echo esc_html($month->year); ?></div>
            <ul class="page-sidebar__month">
            <?php endif; ?>
            <li class="page-sidebar__month-item">
              <a href="<?php echo esc_url(home_url('/' . $month->year . '/' . date('m', mktime(0, 0, 0, $month->month, 1, $month->year)))); ?>">
                <?php echo esc_html(date('n', mktime(0, 0, 0, $month->month, 1, $month->year))); ?>月
              </a>
            </li>
            <?php $year_prev = $year_current; ?>
          <?php endforeach; ?>

            </ul> <!-- 最後の月のリストを閉じる -->
      </div>

    </div>
  </div>
</aside>
</div>
<!-- /page-sidebar -->