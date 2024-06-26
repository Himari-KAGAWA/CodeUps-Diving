<?php get_header(); ?>

<main>
  <!-- 下層ページメインビュー -->
  <section class="sub-mv sub-mv__bg sub-mv__bg--voice">
    <div class="sub-mv_inner">
      <div class="sub-mv__header">
        <h1 class="sub-mv__title sub-mv__title--blog">voice</h1>
      </div>
    </div>
    <div class="sub-mv__icon"></div>
  </section>
  <!-- /下層ページメインビュー -->

  <!-- breadcrumbs -->
  <?php get_template_part('breadcrumb'); ?>
  <!-- /breadcrumbs -->

  <!-- page-contents -->
  <div class="page top-page">
    <div class="page__inner inner">
      <div class="page__content page-voice">
        <div class="page-voice__nav category-list">
          <div class="category-list__tabs">
            <ul class="category-list__items">
              <li class="category-list__item">
                <a href="<?php echo esc_url(home_url('/voice')); ?>" class="category-list__item-link category category--link">ALL</a>
              </li>
              <?php $voice_category_terms = get_terms('voice_category', array('hide_empty => false')); ?>
              <?php foreach ($voice_category_terms as $voice_category_term) : ?>
                <li class="category-list__item">
                  <a href="<?php echo get_term_link($voice_category_term, 'voice_category'); ?>" class="category-list__item-link category category--link <?php if (is_tax('voice_category') && $voice_category_term->slug == get_queried_object()->slug) echo 'is-show'; ?>"><?php echo $voice_category_term->name; ?></a>
                <?php endforeach; ?>
                </li>
            </ul>
          </div>
        </div>

        <div class="page-voice__items voice-cards">
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <!-- Voice-card -->
              <div class="voice-cards__item card-03" data-item="tab01">
                <div class="card-03__header">
                  <div class="card-03__left">
                    <div class="card-03__attribute">
                      <p><?php echo esc_html(get_field('age')); ?>代(<?php echo esc_html(get_field('gender')); ?>)</p>
                      <span class="category">
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'voice_category');
                        if ($terms && !is_wp_error($terms)) {
                          echo esc_html($terms[0]->name);
                        }
                        ?>
                      </span>
                    </div>
                    <h3 class="card-03__title">
                      <?php echo esc_html(get_the_title()); ?>
                    </h3>
                  </div>
                  <div class="card-03__img js-inview">
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail(); ?>
                    <?php else : ?>
                      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/noimg.jpg" alt="<?php echo esc_attr('No image'); ?>">
                    <?php endif; ?>
                  </div>
                </div>
                <div class="card-03__content">
                  <p>
                    <?php the_content(); ?>
                  </p>
                </div>
              </div>
              <!-- /Voice-card -->
            <?php endwhile; ?>
          <?php else : ?>
            <p>現在、表示する投稿はありません。</p>
          <?php endif; ?>
        </div>

      </div>
      <!-- pagination -->
      <div class="top-pagination">
        <?php if (function_exists('wp_pagenavi')) {
          wp_pagenavi();
        } ?>
      </div>
      <!-- /pagination -->

    </div>
  </div>
  <!-- /page-contents -->

</main>

<?php get_footer(); ?>