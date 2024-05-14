<?php get_header(); ?>

<main>
  <section class="sub-mv sub-mv__bg sub-mv__bg--info">
    <div class="sub-mv_inner">
      <div class="sub-mv__header">
        <h1 class="sub-mv__title sub-mv__title--info">information</h1>
      </div>
    </div>
    <div class="sub-mv__icon"></div>
  </section>

  <!-- breadcrumbs -->
  <?php get_template_part('breadcrumb'); ?>
  <!-- /breadcrumbs -->

  <!-- page-contents -->
  <div class="page top-page--info">
    <div class="page__inner inner">
      <div class="page__content page-information">
        <div class="page-information__tabs">
          <ul class="page-information__tab">
            <li id="tab1" class="page-information__tab-nav is-active">
              <span>ライセンス<br class="u-mobile" />講習</span>
            </li>
            <li id="tab2" class="page-information__tab-nav">
              <span>ファン<br class="u-mobile" />ダイビング</span>
            </li>
            <li id="tab3" class="page-information__tab-nav">
              <span>体験<br class="u-mobile" />ダイビング</span>
            </li>
          </ul>
          <div class="page-information__tab-panels">
            <div id="panel1" class="page-information__tab-panel is-active">
              <div class="page-information__panel-wrapper">
                <div class="page-information__content">
                  <p class="page-information__title">ライセンス講習</p>
                  <p class="page-information__desc">
                    泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
                  </p>
                </div>
                <div class="page-information__img js-inview">
                  <picture>
                    <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/common/pc/page-info-panel-pc_01.jpg
                          " />
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/page-info-panel_01.jpg" alt="ダイビングをするダイバー達の画像" />
                  </picture>
                </div>
              </div>
            </div>
            <div id="panel2" class="page-information__tab-panel">
              <div class="page-information__panel-wrapper">
                <div class="page-information__content">
                  <p class="page-information__title">ファンダイビング</p>
                  <p class="page-information__desc">
                    ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                  </p>
                </div>
                <div class="page-information__img js-inview">
                  <picture>
                    <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/common/pc/page-info-panel-pc_02.jpg
                          " />
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/page-info-panel_02.jpg" alt="ダイビングをするダイバー達の画像" />
                  </picture>
                </div>
              </div>
            </div>
            <div id="panel3" class="page-information__tab-panel">
              <div class="page-information__panel-wrapper">
                <div class="page-information__content">
                  <p class="page-information__title">体験ダイビング</p>
                  <p class="page-information__desc">
                    ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                  </p>
                </div>
                <div class="page-information__img js-inview">
                  <picture>
                    <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/images/common/pc/page-info-panel-pc_03.jpg
                          " />
                    <img src="<?php echo get_template_directory_uri(); ?>/images/common/page-info-panel_03.jpg" alt="ダイビングをするダイバー達の画像" />
                  </picture>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page-contents -->

</main>

<?php get_footer(); ?>