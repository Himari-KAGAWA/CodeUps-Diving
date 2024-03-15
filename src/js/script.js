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
      $("body").removeClass("no-scroll"); // スクロールバー非表示
    } else {
      $(".js-hamburger").addClass("is-active");
      $(".js-sp-nav").fadeIn(300);
      $("body").addClass("no-scroll");
    }
  });

  // ドロワーメニュー内のリンクがクリックされたとき
  $(".js-sp-nav a").click(function () {
    $(".js-hamburger").removeClass("is-active");
    $(".js-hamburger").removeClass("is-open");
    $(".js-sp-nav").fadeOut(300);
    $("body").removeClass("no-scroll"); // ナビ内のリンクがクリックされたらno-scrollクラスを外す
  });

  // swiper メインビュー
  const initSwiper = () => {
    const swiper = new Swiper(".js-main-visual-swiper", {
      loop: true,
      speed: 3000,
      effect: "fade",
      autoplay: {
        delay: 3500,
      },
    });
  };

  window.addEventListener("load", function () {
    initSwiper(); // ページ読み込み後に初期化
  });

  // swiper campaign
  // overflow:hidden;したクラスを追記する↓
  const campaign__slider = new Swiper(".campaign__slider .js-campaign-swiper", {
    loop: true,
    loopAdditionalSlides: 1,
    slidesPerView: "auto",
    spaceBetween: 23,
    grabCursor: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },

    // overflow:hidden;したクラスを追記する↓
    // Navigation arrows
    navigation: {
      nextEl: ".js-campaign-next",
      prevEl: ".js-campaign-prev",
      clickable: true,
    },

    // PC表示の時の要素間の指定
    breakpoints: {
      767: {
        spaceBetween: 39,
      },
    },
  });

  // スクロール検知＆to-topアイコン制御
  jQuery(document).ready(function ($) {
    var toTop = $(".to-top");
    var footer = $("footer");
    var originalBottom = parseInt(toTop.css("bottom")); // 初期のbottom値を取得

    $(window).on("scroll", function () {
      var scrollPos = $(this).scrollTop();
      var windowHeight = $(this).height();

      if (scrollPos > 200) {
        // スクロールが200px以上の場合
        toTop.addClass("is-show");
      } else {
        // スクロールが200px以下の場合
        toTop.removeClass("is-show");
      }

      if (scrollPos >= footer.offset().top - windowHeight) {
        // フッターの近くに到達した場合
        var newBottom =
          scrollPos + windowHeight - (footer.offset().top - originalBottom);
        toTop.css("bottom", newBottom + "px");
      } else {
        // フッターの近くに到達していない場合
        toTop.css("bottom", originalBottom + "px");
      }
    });
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

  // サイドバー：アコーディオン
  $(".js-archive").on("click", function () {
    $(this).find(".js-open").stop().slideToggle(300);
    $(this).toggleClass("is-open");
  });

  // FAQ：アコーディオン
  $(".js-faq").on("click", function () {
    $(this).find(".js-faq-open").stop().slideToggle(300);
    $(this).toggleClass("is-open");
  });

  // タブ切替：information
  $(function () {
    $(".page-information__tabs li").click(function () {
      var index = $(".page-information__tabs li").index(this); //何番目のタブがクリックされたかを格納
      $(".page-information__tabs li").removeClass("is-active");
      $(this).addClass("is-active");
      $(".page-information__tabs .page-information__tab-panel")
        .removeClass("is-active")
        .eq(index)
        .addClass("is-active"); //○番目のコンテンツのみを表示
    });
  });

  //タブへダイレクトリンクの実装：information
  $(function () {
    //リンクからハッシュを取得
    var hash = location.hash;
    hash = (hash.match(/^#panel\d+$/) || [])[0];

    //リンクにハッシュが入っていればtabnameに格納
    if ($(hash).length) {
      var tabname = hash.slice(1);
    } else {
      var tabname = "panel1";
    }

    //コンテンツ非表示・タブを非アクティブ
    $(".page-information__tabs li").removeClass("is-active");
    $(".page-information__tabs .page-information__tab-panel").removeClass(
      "is-active"
    );

    //何番目のタブかを格納
    var tabno = $(
      ".page-information__tabs .page-information__tab-panel#" + tabname
    ).index();

    //コンテンツ表示
    $(".page-information__tabs .page-information__tab-panel")
      .eq(tabno)
      .addClass("is-active");

    //タブのアクティブ化
    $(".page-information__tabs li").eq(tabno).addClass("is-active");

    // タブへスクロール
    var headerHeight = $(".header").height() + 24; // ヘッダーの高さを取得
    var targetOffset = $(".page-information__tabs").offset().top; // タブの位置を取得
    var scrollTo = targetOffset - headerHeight; // スクロール位置を計算
    $("html, body").scrollTop(scrollTo); // スクロール実行
  });

  // モーダル
  // 変数に要素を入れる
  var trigger = $(".modal__trigger"),
    wrapper = $(".modal__wrapper"),
    layer = $(".modal__layer"),
    container = $(".modal__container"),
    content = $(".modal__content");

  // 『モーダルを開くボタン』をクリックしたら、『モーダル本体』を表示
  $(trigger).click(function () {
    $(wrapper).fadeIn(400);

    // クリックされた画像の元のimg画像を取得して、置き換える
    var originalImgSrc = $(this).find("img").attr("src");
    var originalImgAlt = $(this).find("img").attr("alt");

    // モーダルの中身をクリアしてから新しい画像を追加
    $(content)
      .empty()
      .html('<img src="' + originalImgSrc + '" alt="' + originalImgAlt + '">');

    // スクロール位置を戻す
    $(container).scrollTop(0);

    // サイトのスクロールを禁止にする
    $("html, body").css("overflow", "hidden");
  });

  // 『背景』と『画像』をクリックしたら、『モーダル本体』を非表示
  $(layer)
    .add(content)
    .click(function () {
      $(wrapper).fadeOut(400);

      // サイトのスクロール禁止を解除する
      $("html, body").removeAttr("style");
    });

  // タブ絞り込み：page-campaign,page-voice
  $(function () {
    // 変数を要素をセット
    var $filter = $(".js-tab-btn [data-filter]"),
      $item = $(".js-panel [data-item]");

    // カテゴリをクリックしたら
    $filter.click(function (e) {
      // デフォルトの動作をキャンセル
      e.preventDefault();
      var $this = $(this);

      // クリックしたカテゴリにクラスを付与
      $filter.removeClass("is-show");
      $this.addClass("is-show");

      // クリックした要素のdata属性を取得
      var $filterItem = $this.attr("data-filter");

      // データ属性が ALL なら全ての要素を表示
      if ($filterItem == "ALL") {
        $item
          .removeClass("is-show")
          .fadeOut()
          .promise()
          .done(function () {
            $item.addClass("is-show").fadeIn();
          });
        // all 以外の場合は、クリックした要素のdata属性の値を同じ値のアイテムを表示
      } else {
        $item
          .removeClass("is-show")
          .fadeOut()
          .promise()
          .done(function () {
            $item
              .filter('[data-item = "' + $filterItem + '"]')
              .addClass("is-show")
              .fadeIn();
          });
      }
    });
  });

  // タブ絞り込み用ダイレクトリンク
  $(document).ready(function () {
    // ページロード時にURLのハッシュを読み込んで該当のカテゴリを表示
    var hash = window.location.hash;
    if (hash) {
      var $filterItem = hash.substr(1);
      $(".js-tab-btn [data-filter='" + $filterItem + "']").click();

      // カテゴリの位置を取得し、ヘッダーの高さ＋24pxを加えてスクロール位置を計算
      var headerHeight = $(".header").height() + 24;
      var targetOffset = $(".category-list__items").offset().top;
      var scrollTo = targetOffset - headerHeight;
      $("html, body").scrollTop(scrollTo);
    }
  });
});
