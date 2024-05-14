<?php

function my_setup()
{
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
}
add_action("after_setup_theme", "my_setup");

function my_script_init()
{
  // CSSファイルの読み込み
  wp_enqueue_style("my", get_template_directory_uri() . "/css/style.css", array(), filemtime(get_theme_file_path('css/style.css')), "all");

  // JSファイルの読み込み
  wp_enqueue_script("jquery-inview", get_template_directory_uri() . "/js/jquery.inview.min.js", array("jquery"), filemtime(get_theme_file_path('js/jquery.inview.min.js')), true);
  wp_enqueue_script("my", get_template_directory_uri() . "/js/script.js", array("jquery"), filemtime(get_theme_file_path('js/script.js')), true);
}
add_action("wp_enqueue_scripts", "my_script_init");


// カスタム投稿タイプの表示件数指定
function custom_posts_per_page($query)
{
  if (!is_admin() && $query->is_main_query()) {
    if ($query->is_post_type_archive('campaign') || $query->is_tax('campaign_category')) {
      $query->set('posts_per_page', 4); // campaign_category タクソノミーのアーカイブページの投稿数を 4 に設定
    } elseif ($query->is_post_type_archive('voice') || is_tax('voice_category')) {
      $query->set('posts_per_page', 6); // voice_category タクソノミーのアーカイブページの投稿数を 6 に設定
    }
  }
}
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

// SCF
/**
 * @param string $page_title ページのtitle属性値
 * @param string $menu_title 管理画面のメニューに表示するタイトル
 * @param string $capability メニューを操作できる権限（manage_options とか）
 * @param string $menu_slug オプションページのスラッグ。ユニークな値にすること。
 * @param string|null $icon_url メニューに表示するアイコンの URL
 * @param int $position メニューの位置
 */
SCF::add_options_page('price', '金額一覧', 'manage_options', 'theme-options');

function remove_body_class_from_home_page($classes)
{
  if (is_home()) {
    // home.phpなどのページテンプレートではクラスを削除する
    $classes = array_diff($classes, array('blog'));
  }
  return $classes;
}
add_filter('body_class', 'remove_body_class_from_home_page');
