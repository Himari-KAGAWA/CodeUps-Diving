<!-- page-sidebar -->
<aside class="page-sidebar top-sidebar">
  <div class="page-sidebar__contents">
    <div class="page-sidebar__popular-articles">
      <div class="page-sidebar__title sidebar-header">
        <h2 class="sidebar-header__title">
          <img src="<?php echo get_template_directory_uri(); ?>/images/common/whale-icon-b.svg" alt="クジラのアイコン" /><span>人気記事</span>
        </h2>
      </div>
      <ul class="page-sidebar__articles">

        <?php
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
        $popular_posts = new \WordPressPopularPosts\Query($args);
        ?>

        <?php if ($popular_posts) : ?>
          <?php
          foreach ($popular_posts->get_posts() as $popular_post) :
          ?>

            <!-- card -->
            <li class="page-sidebar__article card-02">
              <a href="<?php echo get_permalink($popular_post->id); ?>" class="card-02__link">
                <div class="card-02__img">
                  <?php if (has_post_thumbnail($popular_post->id)) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url($popular_post->id); ?>" alt="人気記事のサムネイル">
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/noimg.jpg" alt="No image">
                  <?php endif; ?>
                </div>
                <div class="card-02__header">
                  <time class="card-02__date" datetime="<?php echo $popular_post->date; ?>"><?php echo $popular_post->date; ?></time>
                  <h3 class="card-02__title">
                    <?php
                    if (mb_strlen($popular_post->title) > 24) {
                      $title = mb_substr($popular_post->title, 0, 24);
                      echo $title . '...';
                    } else {
                      echo $popular_post->title;
                    }
                    ?>
                  </h3>
                </div>
              </a>
            </li>
            <!-- /card -->
          <?php endforeach; ?>
        <?php endif; ?>

      </ul>

    </div>
    <div class="page-sidebar__comment top-sidebar">
      <div class="page-sidebar__title top-sidebar__title sidebar-header">
        <h2 class="sidebar-header__title">
          <img src="<?php echo get_template_directory_uri(); ?>/images/common/whale-icon-b.svg" alt="クジラのアイコン" /><span>口コミ</span>
        </h2>
      </div>
      <?php
      $news_query = new WP_Query(
        array(
          'post_type'      => 'voice',
          'posts_per_page' => 1,
          'orderby' => 'date',
          'order' => 'DESC'
        )
      );
      ?>
      <?php if ($news_query->have_posts()) : ?>
        <?php while ($news_query->have_posts()) : ?>
          <?php $news_query->the_post(); ?>
          <div class="page-sidebar__comment-card">
            <div class="page-sidebar__comment-aside">
              <div class="page-sidebar__comment-figure">
                <div class="page-sidebar__comment-image">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/noimg.jpg" alt="No image">
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="page-sidebar__comment-header">
              <div class="page-sidebar__comment-attribute">
                <p><?php the_field('age') ?>代(<?php the_field('gender') ?>)</p>
              </div>
              <h3 class="page-sidebar__comment-title">
                <?php the_title(); ?>
              </h3>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>

      <div class="page-sidebar__comment-link">
        <a href="<?php echo esc_url(home_url('/voice')); ?>" class="link-button">View more
          <span class="arrow-x"></span>
        </a>
      </div>
    </div>
    <div class="page-sidebar__campaign top-sidebar">
      <div class="page-sidebar__title top-sidebar__title--c sidebar-header">
        <h2 class="sidebar-header__title">
          <img src="<?php echo get_template_directory_uri(); ?>/images/common/whale-icon-b.svg" alt="クジラのアイコン" /><span>キャンペーン</span>
        </h2>
      </div>
      <div class="page-sidebar__campaign-cards">

        <?php
        $news_query = new WP_Query(
          array(
            'post_type'      => 'campaign',
            'posts_per_page' => 2,
            'orderby' => 'date',
            'order' => 'DESC'
          )
        );
        ?>
        <?php if ($news_query->have_posts()) : ?>
          <?php while ($news_query->have_posts()) : ?>
            <?php $news_query->the_post(); ?>
            <!-- card -->
            <div class="page-sidebar__campaign-card card-01">
              <a href="<?php the_permalink(); ?>" class="card-01__link">
                <div class="card-01__img">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/noimg.jpg" alt="No image">
                  <?php endif; ?>
                </div>
                <div class="card-01__body">
                  <div class="card-01__header">
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
              </a>
            </div>
            <!-- /card -->
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

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
          <img src="<?php echo get_template_directory_uri(); ?>/images/common/whale-icon-b.svg" alt="クジラのアイコン" /><span>アーカイブ</span>
        </h2>
      </div>

      <div class="page-sidebar__archive-list js-archive">
        <?php
        $year_prev = null;
        $months = $wpdb->get_results("SELECT DISTINCT MONTH(post_date) AS month,
                            YEAR(post_date) AS year,
                            COUNT(id) as post_count FROM $wpdb->posts
                            WHERE post_status = 'publish' and post_date <= now()
                            and post_type = 'post'
                            GROUP BY month, year
                            ORDER BY post_date DESC"); ?>
        <?php
        foreach ($months as $month) : $year_current = $month->year;
        ?>
          <?php if ($year_current != $year_prev) : ?>
            <?php if ($year_prev != null) : ?>
              </ul> <!-- Close the previous month's list -->
            <?php endif; ?>
            <div class="page-sidebar__year js-open"><?php echo $month->year; ?></div>
            <ul class="page-sidebar__month">
            <?php endif; ?>
            <li class="page-sidebar__month-item">
              <a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>">
                <?php echo date("n", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>月
              </a>
            </li>
          <?php
          $year_prev = $year_current;
        endforeach;
          ?>

            </ul> <!-- Close the last month's list -->

      </div>
    </div>
  </div>
</aside>
</div>
<!-- /page-sidebar -->