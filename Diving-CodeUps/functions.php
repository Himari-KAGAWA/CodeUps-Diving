<?php

/*------------------------------------------
標準機能の設定
/*----------------------------------------*/
function my_setup()
{
  // アイキャッチ画像（サムネイル）をサポート
  add_theme_support('post-thumbnails');

  // RSSフィードリンクを自動的に生成
  add_theme_support('automatic-feed-links');

  // HTMLの<title>タグを自動生成
  add_theme_support('title-tag');

  // HTML5マークアップのサポートを追加
  add_theme_support('html5', array(
    'comment-list',    // コメントリストのマークアップをHTML5に
    'comment-form',    // コメントフォームのマークアップをHTML5に
    'search-form',     // 検索フォームのマークアップをHTML5に
    'gallery',         // ギャラリーのマークアップをHTML5に
    'caption',         // キャプションのマークアップをHTML5に
    'style',           // スタイルのマークアップをHTML5に
    'script'           // スクリプトのマークアップをHTML5に
  ));
}
// テーマの初期設定を行うフック
add_action('after_setup_theme', 'my_setup');


/*------------------------------------------
CSS・JavaScript・font・swiperの設定
/*----------------------------------------*/
function my_script_init()
{
  // jQueryの読み込み
  wp_enqueue_script('jquery');

  // Google Fontsの読み込み
  wp_enqueue_style(
    'google-fonts', // ハンドル名: スタイルを特定するための名前
    'https://fonts.googleapis.com/css2?family=Gotu&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;500;700&display=swap', // Google FontsのURL
    array(), // 依存するスタイル（今回はなし）
    null // バージョン管理（今回は使用しない）
  );

  // Swiperのスタイルシートを読み込み
  wp_enqueue_style(
    'swiper-css', // ハンドル名: スタイルを特定するための名前
    'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.css', // SwiperのCSSファイルのURL
    array(), // 依存するスタイル（今回はなし）
    '8.4.7' // バージョン管理: Swiperのバージョン番号
  );

  // 既存のCSSファイルの読み込み
  wp_enqueue_style(
    'my-style', // ハンドル名: スタイルを特定するための名前
    get_template_directory_uri() . '/css/style.css', // CSSファイルのパス
    array(), // 依存するスタイル（今回はなし）
    filemtime(get_theme_file_path('css/style.css')), // バージョン管理: ファイルの最終更新時刻を使用
    'all' // メディアタイプ: 'all' ですべてのデバイスに適用
  );

  // Swiperのスクリプトを読み込み
  wp_enqueue_script(
    'swiper-js', // ハンドル名: スクリプトを特定するための名前
    'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js', // SwiperのJSファイルのURL
    array(), // 依存するスクリプト（今回はなし）
    '8.4.7', // バージョン管理: Swiperのバージョン番号
    true // フッターで読み込み: true で </body> タグの直前に挿入
  );

  // jQuery InViewプラグインの読み込み
  wp_enqueue_script(
    'jquery-inview', // ハンドル名: スクリプトを特定するための名前
    get_template_directory_uri() . '/js/jquery.inview.min.js', // JSファイルのパス
    array('jquery'), // 依存するスクリプト: jQueryに依存
    filemtime(get_theme_file_path('js/jquery.inview.min.js')), // バージョン管理: ファイルの最終更新時刻を使用
    true // フッターで読み込み: true で </body> タグの直前に挿入
  );

  // メインのJSファイルの読み込み
  wp_enqueue_script(
    'my-script', // ハンドル名: スクリプトを特定するための名前
    get_template_directory_uri() . '/js/script.js', // JSファイルのパス
    array('jquery'), // 依存するスクリプト: jQueryに依存
    filemtime(get_theme_file_path('js/script.js')), // バージョン管理: ファイルの最終更新時刻を使用
    true // フッターで読み込み: true で </body> タグの直前に挿入
  );
}
// wp_enqueue_scripts フックに my_script_init 関数を追加
add_action('wp_enqueue_scripts', 'my_script_init');


/*------------------------------------------
カスタム投稿タイプの表示件数指定
/*----------------------------------------*/
function custom_posts_per_page($query)
{
  // 管理画面以外かつメインクエリの場合に実行
  if (!is_admin() && $query->is_main_query()) {
    // カスタム投稿タイプ 'campaign' または 'campaign_category' タクソノミーアーカイブページの場合
    if ($query->is_post_type_archive('campaign') || $query->is_tax('campaign_category')) {
      $query->set('posts_per_page', 4); // 投稿数を 4 に設定
    }
    // カスタム投稿タイプ 'voice' または 'voice_category' タクソノミーアーカイブページの場合
    elseif ($query->is_post_type_archive('voice') || $query->is_tax('voice_category')) {
      $query->set('posts_per_page', 6); // 投稿数を 6 に設定
    }
  }
}
// アクションフック 'pre_get_posts' にフック
add_action('pre_get_posts', 'custom_posts_per_page');


/*------------------------------------------
【ダッシュボード】メニューの並び順
/*----------------------------------------*/
function custom_menu_order($menu_order)
{
  if (!$menu_order) return true;

  // メニューの新しい順序を定義
  return array(
    'index.php',                    // ダッシュボード
    'edit.php',                     // 投稿
    'edit.php?post_type=campaign',  // カスタム投稿タイプ: キャンペーン
    'edit.php?post_type=voice',     // カスタム投稿タイプ: ボイス
    'edit.php?post_type=page',      // 固定ページ
    'upload.php',                   // メディア
    'link-manager.php',             // リンク (リンクマネージャープラグインが有効な場合)
    'edit-comments.php',            // コメント
    'themes.php',                   // 外観
    'plugins.php',                  // プラグイン
    'users.php',                    // ユーザー
    'tools.php',                    // ツール
    'options-general.php',          // 設定
    'separator1',                   // 最初の区切り
    'separator2',                   // 2番目の区切り
    'separator-last',               // 最後の区切り
  );
}

add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');


/*------------------------------------------
アーカイブタイトルの書きかえ
/*----------------------------------------*/
function my_archive_title($title)
{

  if (is_category()) { // カテゴリーアーカイブの場合
    $title = single_cat_title('', false);
  } elseif (is_tag()) { // タグアーカイブの場合
    $title = single_tag_title('', false);
  } elseif (is_post_type_archive()) { // 投稿タイプのアーカイブの場合
    $title = post_type_archive_title('', false);
  } elseif (is_tax()) { // タームアーカイブの場合
    $title = single_term_title('', false);
  } elseif (is_author()) { // 作者アーカイブの場合
    $title = get_the_author();
  } elseif (is_date()) { // 日付アーカイブの場合
    $title = '';
    if (get_query_var('year')) {
      $title .= get_query_var('year') . '年';
    }
    if (get_query_var('monthnum')) {
      $title .= get_query_var('monthnum') . '月';
    }
    if (get_query_var('day')) {
      $title .= get_query_var('day') . '日';
    }
  }
  return $title;
};
add_filter('get_the_archive_title', 'my_archive_title');


/*------------------------------------------
【ダッシュボード】SCFオプションページの追加
/*----------------------------------------*/
/**
 * SCF::add_options_page
 * 管理画面にオプションページを追加
 *
 * @param string $page_title ページのtitle属性値
 * @param string $menu_title 管理画面のメニューに表示するタイトル
 * @param string $capability メニューを操作できる権限（manage_options とか）
 * @param string $menu_slug オプションページのスラッグ。ユニークな値にすること。
 * @param string|null $icon_url メニューに表示するアイコンの URL
 * @param int $position メニューの位置
 */
// 現在非表示
// SCF::add_options_page('price', '金額一覧', 'manage_options', 'theme-options', null, 6);

// ホームページのボディクラスを削除
/**
 * ホームページのボディクラスから 'blog' クラスを削除する
 *
 * @param array $classes 既存のボディクラスの配列
 * @return array 修正後のボディクラスの配列
 */

/*------------------------------------------
footer：自動で追記されるクラス名を削除
/*----------------------------------------*/
function remove_body_class_from_home_page($classes)
{
  if (is_home()) {
    // home.phpなどのページテンプレートではクラスを削除する
    $classes = array_diff($classes, array('blog'));
  }
  return $classes;
}
add_filter('body_class', 'remove_body_class_from_home_page');


/*------------------------------------------
【投稿一覧】アイキャッチを利用できるようにする
/*----------------------------------------*/
add_theme_support('post-thumbnails');

// カスタム画像サイズを追加
add_image_size('admin-list-thumb', 100, 100, true); // true はハードクロップを指定

// WordPress管理画面の投稿一覧のテーブルヘッダーに新しい列を追加
function add_featured_image_column_to_posts($columns)
{
  $columns['featured_image'] = __('アイキャッチ');
  return $columns;
}
add_filter('manage_posts_columns', 'add_featured_image_column_to_posts');


/*------------------------------------------
【投稿一覧】アイキャッチ画像を表示する
/*----------------------------------------*/
function show_featured_image_column_in_posts($column_name, $post_id)
{
  if ('featured_image' === $column_name) {
    $post_featured_image = get_the_post_thumbnail($post_id, 'admin-list-thumb');
    if ($post_featured_image) {
      echo $post_featured_image;
    } else {
      echo __('画像なし');
    }
  }
}
add_action('manage_posts_custom_column', 'show_featured_image_column_in_posts', 10, 2);


/*------------------------------------------
【管理画面】アイキャッチ画像カラムの幅を調整
/*----------------------------------------*/
function custom_admin_css()
{
  echo '<style>
        .column-featured_image {
            width: 100px;
        }
        .column-featured_image img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>';
}
add_action('admin_head', 'custom_admin_css');


/*---------------------------------------
【ダッシュボード】ブログ投稿のアイコン
/*--------------------------------------*/
function change_post_menu_icon()
{
?>
  <style>
    #adminmenu .menu-icon-post div.wp-menu-image:before {
      content: '\f464';
      /* Dashicons Edit アイコン */
    }
  </style>
<?php
}
add_action('admin_head', 'change_post_menu_icon');


/*---------------------------------------
【ダッシュボード】左メニューのカスタマイズ
/*--------------------------------------*/
/* 「ブログ投稿」ラベル変更 */
function change_post_menu_label()
{
  global $menu;
  global $submenu;
  $name = 'ブログ投稿';
  $menu[5][0] = $name;
  $submenu['edit.php'][5][0] = $name . '一覧';
  $submenu['edit.php'][10][0] = '新しい' . $name;
}
function change_post_object_label()
{
  global $wp_post_types;
  $name = 'ブログ投稿';
  $labels = &$wp_post_types['post']->labels;
  $labels->name = $name;
  $labels->singular_name = $name;
  $labels->add_new = _x('追加', $name);
  $labels->add_new_item = $name . 'の新規追加';
  $labels->edit_item = $name . 'の編集';
  $labels->new_item = '新規' . $name;
  $labels->view_item = $name . 'を表示';
  $labels->search_items = $name . 'を検索';
  $labels->not_found = $name . 'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}
add_action('init', 'change_post_object_label');
add_action('admin_menu', 'change_post_menu_label');


/*---------------------------------------
【投稿画面】タイトルプレイスホルダー変更
/*--------------------------------------*/
// 管理画面用カスタマイズのcssファイルを指定
function my_admin_style()
{
  wp_enqueue_style('my_admin_style', get_template_directory_uri() . '/css/admin-style.css');
}
add_action('admin_enqueue_scripts', 'my_admin_style');

// タイトルのプレイスホルダーの変更
function custom_enter_title_here($title, $post)
{
  // 投稿タイプをチェック
  if ($post->post_type == 'campaign') {
    $title = 'キャンペーンのタイトルを入力してください';
  } elseif ($post->post_type == 'voice') {
    $title = 'お客様の声のタイトルを入力してください';
  } elseif ($post->post_type == 'post') {
    $title = '記事のタイトルを入力してください';  // デフォルトの投稿タイプのタイトルプレースホルダー
  }
  return $title;
}
add_filter('enter_title_here', 'custom_enter_title_here', 10, 2);


/*---------------------------------------
【投稿画面】本文プレイスホルダーの変更
/*--------------------------------------*/
/* 本文の説明テキストを変更(クリックしたら戻る) */
function custom_enter_placeholder($text)
{
  $screen = get_current_screen();
  if ($screen->post_type == 'post') {
    $text = 'ここにブログ記事の本文・画像などを入力してください';
  } elseif ($screen->post_type == 'campaign') {
    $text = 'ここにキャンペーンの説明を入力してください';
  } elseif ($screen->post_type == 'voice') {
    $text = 'ここにお客様の声の本文を入力してください';
  }
  return $text;
}
add_filter('write_your_story', 'custom_enter_placeholder', 10, 2);
