<?php if (!is_404() && !is_page(array('contact', 'thanks'))) : ?>
  <!-- contact -->
  <section id="contact" class="contact section">
    <div class="contact__inner inner">
      <div class="contact__wrapper">
        <div class="contact__info">
          <div class="contact__logo">
            <picture>
              <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/pc/logo-contact.svg" media="(min-width:768px)" />

              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/logo-contact.png" alt="<?php echo esc_attr('CodeUps'); ?>" width="174" height="65" />

            </picture>
          </div>
          <div class="contact__access">
            <?php
            // ページID 6のACFグループフィールドから店舗情報を取得
            $top_information = get_field('top_information', 6);

            if ($top_information) : // 店舗情報が存在する場合のみ表示
              $address = $top_information['address'];
              $tel_number = $top_information['tel_number'];
              $open_hours = $top_information['open_hours'];
              $close_hours = $top_information['close_hours'];
              $holiday = $top_information['holiday'];
            ?>
              <div class="contact__store-info">
                <address class="contact__address"><?php echo esc_html($address); ?></address>
                <p>TEL:<a href="tel:<?php echo esc_html($tel_number); ?>"><?php echo esc_html($tel_number); ?></a></p>
                <p>営業時間:<?php echo esc_html($open_hours); ?>-<?php echo esc_html($close_hours); ?></p>
                <p>定休日:<?php echo esc_html($holiday); ?></p>
              </div>
            <?php endif; ?>

            <div class="contact__map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.373539314044!2d127.7169083755944!3d26.217049689639595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e56bfe6cf4db67%3A0xc0899fbab29e4f8b!2z6aaW6YeM5Z-O5YWs5ZyS!5e0!3m2!1sja!2sjp!4v1718065701523!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
        <div class="contact__inquiry">
          <div class="contact__header section-header">
            <div class="section-header__engtitle section-header__engtitle--contact">
              contact
            </div>
            <h2 class="section-header__jatitle section-header__jatitle--layout">
              お問い合わせ
            </h2>
          </div>
          <p class="contact__text">ご予約・お問い合わせはコチラ</p>
          <div class="contact__link">
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="link-button">Contact us
              <span class="arrow-x"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="contact__img-icon">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/pc/fish-illust_2.png" alt="<?php echo esc_attr('魚の群れのアイコン'); ?>" width="109" height="50" />
    </div>
  </section>
  <!-- /contact -->
<?php endif; ?>

<div class="to-top" style="">
  <a href="#top" class="to-top__link arrow"></a>
</div>
<!-- footer -->
<footer class="footer section">
  <div class="footer__inner inner">
    <div class="footer__wrapper footer-nav">
      <div class="footer-nav__logo">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/logo-footer_sp.png" alt="<?php echo esc_attr('CodeUps'); ?>" width="120" height="45" />
        <?php
        // ACFのグループフィールドからSNSリンクを取得
        $sns_link = get_field('sns_link', 6); // ページIDが6の場合

        if ($sns_link) :
          $facebook_link = $sns_link['facebook_link'];
          $instagram_link = $sns_link['instagram_link'];
          $x_link = $sns_link['x_link'];
        ?>
          <ul class="footer-nav__sns">
            <?php if ($facebook_link) : ?>
              <li class="footer-nav__icon">
                <a href="<?php echo esc_url($facebook_link); ?>" target="_blank">
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/FacebookLogo.png" alt="<?php echo esc_attr('facebookアイコン'); ?>" width="24" height="24" />
                </a>
              </li>
            <?php endif; ?>

            <?php if ($instagram_link) : ?>
              <li class="footer-nav__icon">
                <a href="<?php echo esc_url($instagram_link); ?>" target="_blank">
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/InstagramLogo.png" alt="<?php echo esc_attr('instagramアイコン'); ?>" width="24" height="24" />
                </a>
              </li>
            <?php endif; ?>

            <?php if ($x_link) : ?>
              <li class="footer-nav__icon footer-nav__icon--x">
                <a href="<?php echo esc_url($x_link); ?>" target="_blank">
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/common/x-icon.svg" alt="<?php echo esc_attr('Xアイコン'); ?>" width="24" height="24" />
                </a>
              </li>
            <?php endif; ?>
          </ul>
        <?php endif; ?>

      </div>
      <div class="footer-nav__content">
        <ul class="footer-nav__items1">
          <li class="footer-nav__item footer-nav__item-bold">
            <a href="<?php echo esc_url(home_url('/campaign')); ?>">キャンペーン</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url(home_url('/campaign_category/fun')); ?>">ファンダイビング</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url(home_url('/campaign_category/license')); ?>">ライセンス講習</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url(home_url('/campaign_category/experience')); ?>">体験ダイビング</a>
          </li>
          <li class="footer-nav__item footer-nav__item-bold footer-nav__item--layout">
            <a href="<?php echo esc_url(home_url('/about-us')); ?>">私たちについて</a>
          </li>
        </ul>
        <ul class="footer-nav__items2">
          <li class="footer-nav__item footer-nav__item-bold">
            <a href="<?php echo esc_url(home_url('/information')); ?>">ダイビング情報</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url(home_url('/information#panel1')); ?>">ライセンス講習</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url(home_url('/information#panel3')); ?>">体験ダイビング</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url(home_url('/information#panel2')); ?>">ファンダイビング</a>
          </li>
          <li class="footer-nav__item footer-nav__item-bold footer-nav__item--layout">
            <a href="<?php echo esc_url(home_url('/blog')); ?>">ブログ</a>
          </li>
        </ul>
        <ul class="footer-nav__items3">
          <li class="footer-nav__item footer-nav__item-bold">
            <a href="<?php echo esc_url(home_url('/voice')); ?>">お客様の声</a>
          </li>
          <li class="footer-nav__item footer-nav__item-bold footer-nav__item--layout">
            <a href="<?php echo esc_url(home_url('/price')); ?>">料金一覧</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url(home_url('/price#license')); ?>">ライセンス講習</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url(home_url('/price#experience')); ?>">体験ダイビング</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url(home_url('/price#fun')); ?>">ファンダイビング</a>
          </li>
        </ul>
        <ul class="footer-nav__items4">
          <li class="footer-nav__item footer-nav__item-bold">
            <a href="<?php echo esc_url(home_url('/faq')); ?>">よくある質問</a>
          </li>
          <li class="footer-nav__item footer-nav__item-bold footer-nav__item--layout">
            <a href="<?php echo esc_url(home_url('/privacypolicy')); ?>">プライバシー<br class="u-mobile" />ポリシー</a>
          </li>
          <li class="footer-nav__item footer-nav__item-bold footer-nav__item--layout">
            <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">利用規約</a>
          </li>
          <li class="footer-nav__item footer-nav__item-bold footer-nav__item--layout">
            <a href="<?php echo esc_url(home_url('/sitemap')); ?>">サイトマップ</a>
          </li>
          <li class="footer-nav__item footer-nav__item-bold footer-nav__item--layout">
            <a href="<?php echo esc_url(home_url('/contact')); ?>">お問わ合せ</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer__corporate">
    <small>
      Copyright © 2021 - 2023 CodeUps LLC. All Rights Reserved.
    </small>
  </div>
</footer>
<!-- /footer -->

<?php wp_footer(); ?>
</body>

</html>