jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる

  //ナビバートグル
  $(".js-hamburger").on("click", function () {
    if ($(".js-hamburger").hasClass("is-open")) {
      $(".js-drawer-menu").fadeOut();
      $(this).removeClass("is-open");
    } else {
      $(".js-drawer-menu").fadeIn();
      $(this).addClass("is-open");
    }
  });

  //ドロワーメニュー
  $(".js-hamburger").click(function () {
    if ($(".js-hamburger").hasClass("is-active")) {
      $(".js-hamburger").removeClass("is-active");
      $(".js-sp-nav").fadeOut(300);
    } else {
      $(".js-hamburger").addClass("is-active");
      $(".js-sp-nav").fadeIn(300);
    }
  });

  // ドロワーメニュー内のリンクがクリックされたとき
  $(".js-sp-nav a").click(function () {
    $(".js-hamburger").removeClass("is-active");
    $(".js-hamburger").removeClass("is-open");
    $(".js-sp-nav").fadeOut(300);
  });

  // swiper メインビュー
  const initSwiper = () => {
    const slide01 = new Swiper("#js-main-visual-swiper", {
      loop: true,
      slidesPerView: 1,
      speed: 10000,
      allowTouchMove: false,
      autoplay: {
        delay: 0,
      },
    });
  };

  window.addEventListener("load", function () {
    initSwiper(); // ページ読み込み後に初期化
  });

  // swiper campaign
  // overflow:hidden;したクラスを追記する↓
  const campaign__slider = new Swiper(".campaign__slider #js-campaign-swiper", {
    loop: true,
    loopAdditionalSlides: 1,
    slidesPerView: "auto",
    spaceBetween: 22,
    grabCursor: true,

    // overflow:hidden;したクラスを追記する↓
    // Navigation arrows
    navigation: {
      nextEl: "#js-campaign-next",
      prevEl: "#js-campaign-prev",
      clickable: true,
    },

    // PC表示の時の要素間の指定
    breakpoints: {
      767: {
        spaceBetween: 39,
      },
    },
  });

  // スクロール検知
  jQuery(window).on("scroll", function () {
    // トップから200px以上スクロールしたら
    if (200 < jQuery(this).scrollTop()) {
      // is-showクラスをつける
      jQuery(".to-top").addClass("is-show");
    } else {
      // 100pxを下回ったらis-showクラスを削除
      jQuery(".to-top").removeClass("is-show");
    }
  });

  // ヘッダー色変更
  // ヘッダークラス名付与
  let header = $(".header");
  // ヘッダーの高さ取得
  let headerHeight = $(".header").height();
  // メインビューの高さを取得
  let height = $(".main-visual").height();
  // メインビューの高さ - ヘッダーの高さ
  $(window).scroll(function () {
    if ($(this).scrollTop() > height - headerHeight) {
      // 指定px以上のスクロールでクラス名付与
      header.addClass("is-color");
    } else {
      // クラス名が付いてたら削除
      header.removeClass("is-color");
    }
  });

  // スムーススクロール
  // #から始まるURLがクリックされた時
  jQuery('a[href^="#"]').click(function () {
    // .headerクラスがついた要素の高さを取得
    let header = jQuery(".header").innerHeight();
    // 移動速度を指定（ミリ秒）
    let speed = 300;
    // hrefで指定されたidを取得
    let id = jQuery(this).attr("href");
    // idの値が#のみだったらターゲットをhtmlタグにしてトップへ戻るようにする
    let target = jQuery("#" == id ? "html" : id);
    // ページのトップを基準にターゲットの位置を取得
    let position = jQuery(target).offset().top - header;
    // その分だけ移動すればヘッダーと被りません
    jQuery("html, body").animate(
      {
        scrollTop: position,
      },
      speed
    );
    return false;
  });

  // js-inview
  //要素の取得とスピードの設定
  var box = $(".js-inview"),
    speed = 700;

  //.colorboxの付いた全ての要素に対して下記の処理を行う
  box.each(function () {
    $(this).append('<div class="color"></div>');
    var color = $(this).find($(".color")),
      image = $(this).find("img");
    var counter = 0;

    image.css("opacity", "0");
    color.css("width", "0%");
    //inviewを使って背景色が画面に現れたら処理をする
    color.on("inview", function () {
      if (counter == 0) {
        $(this)
          .delay(200)
          .animate({ width: "100%" }, speed, function () {
            image.css("opacity", "1");
            $(this).css({ left: "0", right: "auto" });
            $(this).animate({ width: "0%" }, speed);
          });
        counter = 1;
      }
    });
  });
});
