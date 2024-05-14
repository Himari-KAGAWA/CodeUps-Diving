"use strict";

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

  // ウィンドウがリサイズされたときのイベント
  $(window).resize(function () {
    if ($(window).width() > 768) {
      // ウィンドウ幅が768px以上のときにスマホナビを非表示にする
      $(".js-sp-nav").fadeOut();
      $(".js-hamburger").removeClass("is-open");
      $("body").removeClass("no-scroll");
    }
  });

  // swiper メインビュー
  var initSwiper = function initSwiper() {
    var swiper = new Swiper(".js-main-visual-swiper", {
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
  var campaign__slider = new Swiper(".campaign__slider .js-campaign-swiper", {
    loop: true,
    loopAdditionalSlides: 1,
    slidesPerView: "auto",
    spaceBetween: 23,
    grabCursor: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
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

  // ページトップへのスクロール
  document.querySelector(".to-top").addEventListener("click", function () {
    if (typeof window.top !== "undefined") {
      // 'top' プロパティが定義されている場合の処理
      window.top.scrollTo(0, 0); // 例えば、ページのトップにスクロールする
    } else {
      // 'top' プロパティが定義されていない場合のエラーハンドリング
      console.error("'top' プロパティが定義されていません。");
    }
  });

  // スムーススクロール
  // #から始まるURLがクリックされた時
  jQuery('a[href^="#"]').click(function () {
    // .headerクラスがついた要素の高さを取得
    var header = jQuery(".header").innerHeight();
    // 移動速度を指定（ミリ秒）
    var speed = 300;
    // hrefで指定されたidを取得
    var id = jQuery(this).attr("href");
    // idの値が#のみだったらターゲットをhtmlタグにしてトップへ戻るようにする
    var target = jQuery("#" == id ? "html" : id);
    // ページのトップを基準にターゲットの位置を取得
    var position = jQuery(target).offset().top - header;
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
          .animate(
            {
              width: "100%",
            },
            speed,
            function () {
              image.css("opacity", "1");
              $(this).css({
                left: "0",
                right: "auto",
              });
              $(this).animate(
                {
                  width: "0%",
                },
                speed
              );
            }
          );
        counter = 1;
      }
    });
  });

  // サイドバー：アコーディオン
  $(document).ready(function () {
    $(".js-open").click(function () {
      $(this).toggleClass("is-rotated"); // クリックされた要素にis-rotatedを追加または削除
      $(this).next(".page-sidebar__month").slideToggle(); // 直後の.page-sidebar__monthをスライドで開閉
    });
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

    // タブへスクロール（タブへのダイレクトリンクの場合にのみ実行）
    if (hash) {
      var headerHeight = $(".header").height() + 24; // ヘッダーの高さを取得
      var targetOffset = $(".page-information__tabs").offset().top; // タブの位置を取得
      var scrollTo = targetOffset - headerHeight; // スクロール位置を計算
      $("html, body").scrollTop(scrollTo); // スクロール実行
    }
  });

  // モーダル
  // ギャラリーの各画像要素を取得
  var triggers = document.querySelectorAll(".js-modal__trigger");

  // モーダル内の画像要素を取得
  var modalImage = document.querySelector(".modal__img");

  // クリックイベントリスナーを追加
  triggers.forEach(function (trigger) {
    trigger.addEventListener("click", function () {
      // クリックされた画像のパスを取得
      var imagePath = trigger.querySelector("img").getAttribute("src");

      // モーダル内の画像要素に画像を表示
      modalImage.innerHTML = '<img src="'.concat(
        imagePath,
        '" alt="\u753B\u50CF">'
      );

      // モーダルを表示
      var modal = document.querySelector(".js-modal");
      modal.classList.add("active");

      // 背景を固定してスクロールしないようにする
      document.body.style.overflow = "hidden";

      // モーダルを表示するために、displayプロパティを変更
      modal.style.display = "block";
    });
  });

  // モーダルの背景と画像をクリックして閉じるイベントリスナー
  var modalBackground = document.querySelector(".modal__bg");
  modalBackground.addEventListener("click", closeModal);
  modalImage.addEventListener("click", closeModal);
  function closeModal() {
    // モーダルを非表示
    var modal = document.querySelector(".js-modal");
    modal.classList.remove("active");

    // 背景のスクロールを有効にする
    document.body.style.overflow = "auto";

    // モーダルを非表示するために、displayプロパティを変更
    modal.style.display = "none";
  }

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
