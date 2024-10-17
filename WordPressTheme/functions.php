<?php 
/*==========================
# ファイルの読み込み
==========================*/
function enqueue_my_scripts() {
  // WordPressのデフォルトjQueryを読み込まない
  wp_deregister_script('jquery');
  // Google Fonts
  wp_enqueue_style(
    'google-fonts',
    'https://fonts.googleapis.com/css2?family=Gotu&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@400;500;700&display=swap',
    array(),
    null
  );

  // Swiper CSS
  wp_enqueue_style(
    'swiper-css',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
    array(),
    '11.1.9'
  );

  // Custom CSS
  wp_enqueue_style(
    'style-css',
    get_theme_file_uri('/assets/css/style.css'),
    array(),
    filemtime(get_theme_file_path('/assets/css/style.css'))
  );

  // jQuery
  wp_enqueue_script(
    'jquery',
    'https://code.jquery.com/jquery-3.6.0.js',
    array(),
    '3.6.0',
    array('strategy' => 'defer', 'in_footer' => 'true',)
  );

  // jQuery Validate
  wp_enqueue_script(
    'jquery-validate',
    'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js',
    array('jquery'),
    '1.19.5',
    array('strategy' => 'defer', 'in_footer' => 'true',)
  );

  // Swiper JS
  wp_enqueue_script(
    'swiper-js',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
    array(),
    '11.1.9',
    array('strategy' => 'defer', 'in_footer' => 'true',)
  );

  // Custom jQuery Plugin
  wp_enqueue_script(
    'jquery-inview',
    get_theme_file_uri('/assets/js/jquery.inview.min.js'),
    array('jquery'),
    filemtime(get_theme_file_path('/assets/js/jquery.inview.min.js')),
    array('strategy' => 'defer', 'in_footer' => 'true',)
  );

  // Custom JS
  wp_enqueue_script(
    'script-js',
    get_theme_file_uri('/assets/js/script.js'),
    array('jquery'),
    filemtime(get_theme_file_path('/assets/js/script.js')),
    array('strategy' => 'defer', 'in_footer' => 'true',)
  );
}

add_action('wp_enqueue_scripts', 'enqueue_my_scripts');

/*==========================
# テーマの基本設定
==========================*/
function my_setup() {
	add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
	add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
	add_theme_support('title-tag'); // titleタグ自動生成
	add_theme_support('html5', array( // HTML5のタグで出力
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
	));
}

add_action('after_setup_theme', 'my_setup');

/*==========================
# 管理画面の「投稿」の名前を変更
==========================*/
// メインナビゲーション
function change_post_label() {
  global $menu;
  global $submenu;
  $name = 'ブログ';
  $menu[5][0] = $name;
  $submenu['edit.php'][5][0] = $name.'一覧';
  $submenu['edit.php'][10][0] = '新規'.$name.'を追加';
}

add_action('admin_menu', 'change_post_label');

// ワークエリア
function change_object_label() {
  global $wp_post_types;
  $name = 'ブログ';
  $labels = &$wp_post_types['post']->labels;
  $labels->name = $name;
  $labels->singular_name = $name;
  $labels->add_new = _x('新規'.$name.'を追加', $name);
  $labels->add_new_item = $name.'の新規追加';
  $labels->edit_item = $name.'の編集';
  $labels->new_item = '新規'.$name;
  $labels->view_item = $name.'を表示';
  $labels->view_items = $name.'一覧を表示';
  $labels->search_items = $name.'を検索';
  $labels->not_found = $name.'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}

add_action('init', 'change_object_label');

// ツールバー
function rename_admin_bar($wp_admin_bar) {
  $name = 'ブログ';
  $new_post_node = $wp_admin_bar->get_node('new-post');
  $new_post_node->title = $name;
  $wp_admin_bar->add_node($new_post_node);
}

add_action('admin_bar_menu', 'rename_admin_bar', 80);

/*==========================
# カスタム投稿の表示件数
==========================*/
function change_posts_per_page($query) {
  // 管理画面やメインクエリ以外(サブクエリなど)には適用させない
  if (is_admin() || !$query->is_main_query()) {
    return;
  }
  
  // 'campaign' カスタム投稿アーカイブの場合
  if ($query->is_post_type_archive('campaign')) {
    $query->set('posts_per_page', 4);

  // 'voice' カスタム投稿アーカイブの場合
  } elseif ($query->is_post_type_archive('voice')) {
    $query->set('posts_per_page', 6);

  // 'campaign-category' タクソノミーページの場合
  } elseif ($query->is_tax('campaign-category')) {
    $query->set('posts_per_page', 4);

  // 'voice-category' タクソノミーページの場合
  } elseif ($query->is_tax('voice-category')) {
    $query->set('posts_per_page', 6);
  }
}

add_action('pre_get_posts', 'change_posts_per_page');

/*==========================
# WordPress管理画面のエディタ等を非表示
==========================*/
function disable_editor_for_pages($use_block_editor, $post) {
  if ($post->post_type === 'page') {
    if (in_array ($post->post_name, [
        'front-page',
        'about-us',
        'information',
        'blog',
        'voice',
        'price',
        'faq',
        'contact',
        'thanks',
        'sitemap',
      ])) {
      remove_post_type_support('page', 'editor');
      remove_post_type_support('page', 'author');
      remove_post_type_support('page', 'thumbnail');
      remove_post_type_support('page', 'comments');
      remove_post_type_support('page', 'page-attributes');
    }

    if (in_array ($post->post_name, [
        'privacy-policy',
        'terms-of-service',
      ])) {
      remove_post_type_support('page', 'author');
      remove_post_type_support('page', 'thumbnail');
      remove_post_type_support('page', 'comments');
      remove_post_type_support('page', 'page-attributes');
    }
  }
  return $use_block_editor;
}

add_filter('use_block_editor_for_post', 'disable_editor_for_pages', 10, 2);

/*==========================
# ブロックエディタにCSSを適用させる場合
==========================*/
// function add_block_editor_styles() {
//   wp_enqueue_style(
//     'editor-style-css',
//     get_theme_file_uri('/assets/css/editor-style.css'),
//     array(),
//     filemtime(get_theme_file_path('/assets/css/editor-style.css'))
//   );
// }

// add_action('enqueue_block_editor_assets', 'add_block_editor_styles');

/*==========================
# Contact Form 7で自動挿入される <p>, <br>を削除
==========================*/
function wpcf7_autop_return_false() {
  return false;
}

add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');

/*==========================
# Contact Form 7サンクスページへの遷移設定
==========================*/
function add_origin_thanks_page() {
  $thanks = esc_url( home_url( '/contact/thanks/' ));
    echo <<< EOC
      <script>
        let thanksPage = {
          217: '{$thanks}',
        };
      document.addEventListener( 'wpcf7mailsent', function(event) {
        location = thanksPage[event.detail.contactFormId];
      }, false);
      </script>
    EOC;
}

add_action('wp_footer', 'add_origin_thanks_page');