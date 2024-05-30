<?php

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


function my_script_init()
{
  // CSSファイルの読み込み
  wp_enqueue_style(
    'my-style', // ハンドル名: スタイルを特定するための名前
    get_template_directory_uri() . '/css/style.css', // CSSファイルのパス
    array(), // 依存するスタイル（今回はなし）
    filemtime(get_theme_file_path('css/style.css')), // バージョン管理: ファイルの最終更新時刻を使用
    'all' // メディアタイプ: 'all' ですべてのデバイスに適用
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


// カスタム投稿タイプの表示件数指定
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


// アーカイブタイトルの書きかえ
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

// SCFオプションページの追加
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
SCF::add_options_page('price', '金額一覧', 'manage_options', 'theme-options', null, 6);

// ホームページのボディクラスを削除
/**
 * ホームページのボディクラスから 'blog' クラスを削除する
 *
 * @param array $classes 既存のボディクラスの配列
 * @return array 修正後のボディクラスの配列
 */
function remove_body_class_from_home_page($classes)
{
  if (is_home()) {
    // home.phpなどのページテンプレートではクラスを削除する
    $classes = array_diff($classes, array('blog'));
  }
  return $classes;
}
add_filter('body_class', 'remove_body_class_from_home_page');
