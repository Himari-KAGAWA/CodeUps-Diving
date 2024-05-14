<?php if (!is_404() && !is_page(array('contact', 'thanks'))) : ?>
  <!-- contact -->
  <section id="contact" class="contact section">
    <div class="contact__inner inner">
      <div class="contact__wrapper">
        <div class="contact__info">
          <div class="contact__logo">
            <picture>
              <source srcset="<?php echo get_template_directory_uri(); ?>/images/common/pc/logo-contact.svg" media="(min-width:768px)" />
              <img src="<?php echo get_template_directory_uri(); ?>/images/common/logo-contact.png" alt="CodeUps" width="174" height="65" />
            </picture>
          </div>
          <div class="contact__access">
            <div class="contact__store-info">
              <address class="contact__address">沖縄県那覇市1-1</address>
              <p>TEL:<a href="tel:0120-000-0000">0120-000-0000</a></p>
              <p>営業時間:8:30-19:00</p>
              <p>定休日:毎週火曜日</p>
            </div>
            <div class="contact__map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.0378408422885!2d139.96050337620395!3d35.72528787257302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601880e228629bdb%3A0xed622313a1e48d27!2z5Lit5bGx56u26aas5aC0!5e0!3m2!1sja!2sjp!4v1701989823861!5m2!1sja!2sjp" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="link-button">Contact us
              <span class="arrow-x"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="contact__img-icon">
      <img src="<?php echo get_template_directory_uri(); ?>/images/common/pc/fish-illust_2.png" alt="魚の群れのアイコン" width="109" height="50" />
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
        <img src="<?php echo get_template_directory_uri(); ?>/images/common/logo-footer_sp.png" alt="CodeUps" width="120" height="45" />

        <ul class="footer-nav__sns">
          <li class="footer-nav__icon">
            <a href="https://www.facebook.com/?locale=ja_JP" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/common/FacebookLogo.png" alt="facebookアイコン" width="24" height="24" /></a>
          </li>
          <li class="footer-nav__icon">
            <a href="https://about.instagram.com/ja-jp" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/common/InstagramLogo.png" alt="instagramアイコン" width="24" height="24" /></a>
          </li>
        </ul>
      </div>
      <div class="footer-nav__content">
        <ul class="footer-nav__items1">
          <li class="footer-nav__item footer-nav__item-bold">
            <a href="<?php echo esc_url( home_url( '/campaign' ) ); ?>">キャンペーン</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url( home_url( '/campaign_category/fun' ) ); ?>">ファンダイビング</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url( home_url( '/campaign_category/license' ) ); ?>">ライセンス講習</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url( home_url( '/campaign_category/experience' ) ); ?>">体験ダイビング</a>
          </li>
          <li class="footer-nav__item footer-nav__item-bold footer-nav__item--layout">
            <a href="<?php echo esc_url( home_url( '/about-us' ) ); ?>">私たちについて</a>
          </li>
        </ul>
        <ul class="footer-nav__items2">
          <li class="footer-nav__item footer-nav__item-bold">
            <a href="<?php echo esc_url( home_url( '/information' ) ); ?>">ダイビング情報</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url( home_url( '/information#panel1' ) ); ?>">ライセンス講習</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url( home_url( '/information#panel3' ) ); ?>">体験ダイビング</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url( home_url( '/information#panel2' ) ); ?>">ファンダイビング</a>
          </li>
          <li class="footer-nav__item footer-nav__item-bold footer-nav__item--layout">
            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">ブログ</a>
          </li>
        </ul>
        <ul class="footer-nav__items3">
          <li class="footer-nav__item footer-nav__item-bold">
            <a href="<?php echo esc_url( home_url( '/voice' ) ); ?>">お客様の声</a>
          </li>
          <li class="footer-nav__item footer-nav__item-bold footer-nav__item--layout">
            <a href="<?php echo esc_url( home_url( '/price' ) ); ?>">料金一覧</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url( home_url( '/price#license' ) ); ?>">ライセンス講習</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url( home_url( '/price#experience' ) ); ?>">体験ダイビング</a>
          </li>
          <li class="footer-nav__item">
            <a href="<?php echo esc_url( home_url( '/price#fun' ) ); ?>">ファンダイビング</a>
          </li>
        </ul>
        <ul class="footer-nav__items4">
          <li class="footer-nav__item footer-nav__item-bold">
            <a href="<?php echo esc_url( home_url( '/faq' ) ); ?>">よくある質問</a>
          </li>
          <li class="footer-nav__item footer-nav__item-bold footer-nav__item--layout">
            <a href="<?php echo esc_url( home_url( '/privacypolicy' ) ); ?>">プライバシー<br class="u-mobile" />ポリシー</a>
          </li>
          <li class="footer-nav__item footer-nav__item-bold footer-nav__item--layout">
            <a href="<?php echo esc_url( home_url( '/terms-of-service' ) ); ?>">利用規約</a>
          </li>
          <li class="footer-nav__item footer-nav__item-bold footer-nav__item--layout">
            <a href="<?php echo esc_url( home_url( '/sitemap' ) ); ?>">サイトマップ</a>
          </li>
          <li class="footer-nav__item footer-nav__item-bold footer-nav__item--layout">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">お問わ合せ</a>
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