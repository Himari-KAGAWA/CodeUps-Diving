<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Gotu&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet" />
  <!-- swiper style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.css" />
  <!-- swiper js -->
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js"></script>

  <?php wp_head(); ?>
</head>

<body <?php body_class(''); ?>>
  <!-- header -->
  <header class="header">
    <div class="header__inner">
      <h1 class="header__logo">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
          <picture>
            <source srcset="<?php echo get_template_directory_uri(); ?>/images/common/pc/logo-header_pc.png" media="(min-width:767px)" />
            <img src="<?php echo get_template_directory_uri(); ?>/images/common/logo-header_sp.png" alt="CodeUps" width="102" height="38" />
          </picture>
        </a>
      </h1>
      <div class="header__drawer hamburger u-mobile js-hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <!-- PCナビ -->
      <nav class="header__pc-nav pc-nav u-desktop">
        <ul class="pc-nav__items">
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/campaign')); ?>" class="pc-nav__link first">キャンペーン
              <span aria-hidden="true">Campaign</span>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/about-us')); ?>">私たちについて
              <span aria-hidden="true">about us</span>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/information')); ?>">ダイビング情報
              <span aria-hidden="true">Information</span>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/blog')); ?>">ブログ
              <span aria-hidden="true">Blog</span>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/voice')); ?>">お客様の声
              <span aria-hidden="true">Voice</span>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/price')); ?>">料金一覧
              <span aria-hidden="true">Price</span>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/faq')); ?>">よくある質問
              <span aria-hidden="true">FAQ</span>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url(home_url('/contact')); ?>">お問合せ
              <span aria-hidden="true">Contact</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /PCナビ -->
      <!-- SPナビ -->
      <div class="header__sp-nav sp-nav js-sp-nav u-mobile">
        <div class="sp-nav__header">
          <div class="sp-nav__logo">
            <img src="<?php echo get_template_directory_uri(); ?>/images/common/logo-nav_sp.png" alt="CodeUps" />
          </div>
        </div>
        <div class="sp-nav__inner inner">
          <div class="sp-nav__content">
            <ul class="sp-nav__items1">
              <li class="sp-nav__item sp-nav__item--bold">
                <a href="<?php echo esc_url(home_url('/campaign')); ?>">キャンペーン</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo esc_url(home_url('/campaign_category/fun')); ?>">ファンダイビング</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo esc_url(home_url('/campaign_category/license')); ?>">ライセンス講習</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo esc_url(home_url('/campaign_category/experience')); ?>">体験ダイビング</a>
              </li>
              <li class="sp-nav__item sp-nav__item--bold sp-nav__item--layout">
                <a href="<?php echo esc_url(home_url('/about-us')); ?>">私たちについて</a>
              </li>
            </ul>
            <ul class="sp-nav__items2">
              <li class="sp-nav__item sp-nav__item--bold">
                <a href="<?php echo esc_url(home_url('/information')); ?>">ダイビング情報</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo esc_url(home_url('/information#panel1')); ?>">ライセンス講習</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo esc_url(home_url('/information#panel3')); ?>">体験ダイビング</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo esc_url(home_url('/information#panel2')); ?>">ファンダイビング</a>
              </li>
              <li class="sp-nav__item sp-nav__item--bold sp-nav__item--layout">
                <a href="<?php echo esc_url(home_url('/blog')); ?>">ブログ</a>
              </li>
            </ul>
            <ul class="sp-nav__items3">
              <li class="sp-nav__item sp-nav__item--bold">
                <a href="<?php echo esc_url(home_url('/voice')); ?>">お客様の声</a>
              </li>
              <li class="sp-nav__item sp-nav__item--bold sp-nav__item--layout">
                <a href="<?php echo esc_url(home_url('/price')); ?>">料金一覧</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo esc_url(home_url('/price#license')); ?>">ライセンス講習</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo esc_url(home_url('/price#experience')); ?>">体験ダイビング</a>
              </li>
              <li class="sp-nav__item">
                <a href="<?php echo esc_url(home_url('/price#fun')); ?>">ファンダイビング</a>
              </li>
            </ul>
            <ul class="sp-nav__items4">
              <li class="sp-nav__item sp-nav__item--bold">
                <a href="<?php echo esc_url(home_url('/faq')); ?>">よくある質問</a>
              </li>
              <li class="sp-nav__item sp-nav__item--bold sp-nav__item--layout">
                <a href="<?php echo esc_url(home_url('/privacy')); ?>">プライバシー<br class="u-mobile" />ポリシー</a>
              </li>
              <li class="sp-nav__item sp-nav__item--bold sp-nav__item--layout">
                <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">利用規約</a>
              </li>
              <li class="sp-nav__item sp-nav__item--bold sp-nav__item--layout">
                <a href="<?php echo esc_url(home_url('/sitemap')); ?>">サイトマップ</a>
              </li>
              <li class="sp-nav__item sp-nav__item--bold sp-nav__item--layout">
                <a href="<?php echo esc_url(home_url('/contact')); ?>">お問わ合せ</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- /SPナビ -->
  </header>
  <!-- /header -->