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
# カスタム投稿の詳細ページは404
==========================*/
function my_force_404() {
  if (is_singular(['campaign', 'voice'])) {
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    nocache_headers();
    include(get_template_directory() . '/404.php');
    exit;
  }
}

add_action('template_redirect', 'my_force_404');

// 特定のページへリダイレクトしたい場合はこちらを使用
// function my_redirect() {
//   if (is_singular('campaign') || is_tax('campaign-category') || is_date()) {
//     $url = esc_url( home_url( '/campaign/' ));
//     wp_safe_redirect($url, 302); // 302リダイレクト、本番環境は301リダイレクトに修正
//     exit;
//   }

//   if (is_singular('voice') || is_tax('voice-category') || is_date()) {
//     $url = esc_url( home_url( '/voice/' ));
//     wp_safe_redirect($url, 302); // 302リダイレクト、本番環境は301リダイレクトに修正
//     exit;
//   }
// }

// add_action('template_redirect', 'my_redirect');

/*==========================
# 人気記事
==========================*/
// 閲覧数をカウント
function setPostViews($postID) {
  $count_key = 'post_views_count'; // カスタムフィールドキー
  $count = get_post_meta($postID, $count_key, true); // 閲覧数を取得

  if ($count == '') {
    $count = 0;
    delete_post_meta($postID, $count_key); // メタ情報を削除
    add_post_meta($postID, $count_key, '0'); // 閲覧数を0に初期化
  } else {
    $count++; // 閲覧数をインクリメント
    update_post_meta($postID, $count_key, $count); // 閲覧数を更新
  }
}

// 閲覧数を取得
function getPostViews($postID) {
  $count_key = 'post_views_count'; // カスタムフィールドキー
  $count = get_post_meta($postID, $count_key, true); // 閲覧数を取得

  if ($count == '') {
    delete_post_meta($postID, $count_key); // メタ情報を削除
    add_post_meta($postID, $count_key, '0'); // 閲覧数を0に初期化
    return '0 view'; // '0 view'を返す
  }
  return $count.' view'; // カウント済みの閲覧数を返す
}

remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// クローラーはカウントしない
function is_bot() {
  $user_agent = $_SERVER['HTTP_USER_AGENT'];

  $bots = [
    'Googlebot',
		'Yahoo! Slurp',
		'Mediapartners-Google',
		'msnbot',
		'bingbot',
		'MJ12bot',
		'Ezooms',
		'pirst; MSIE 8.0;',
		'Google Web Preview',
		'ia_archiver',
		'Sogou web spider',
		'Googlebot-Mobile',
		'AhrefsBot',
		'YandexBot',
		'Purebot',
		'Baiduspider',
		'UnwindFetchor',
		'TweetmemeBot',
		'MetaURI',
		'PaperLiBot',
		'Showyoubot',
		'JS-Kit',
		'PostRank',
		'Crowsnest',
		'PycURL',
		'bitlybot',
		'Hatena',
		'facebookexternalhit',
		'NINJA bot',
		'YahooCacheSystem',
		'NHN Corp.',
		'Steeler',
		'DoCoMo',
  ];

  foreach ($bots as $bot) {
    // ユーザーエージェント文字列を検索し、ボットが含まれているかを確認
    if (stripos($user_agent, $bot) !== false) {
      return true;
    }
  }
  return false;
}

// 管理画面に閲覧数の項目追加
function count_add_column($columns) {
  $columns['views'] = '閲覧数';
  return $columns;
}

add_filter('manage_posts_columns', 'count_add_column');

// 管理画面にPV数を表示
function count_add_column_data($column, $post_id) {
  switch ($column) {
    case 'views':
      echo getPostViews($post_id);
      break;
  }
}

add_action('manage_posts_custom_column', 'count_add_column_data', 10, 2);

// 閲覧数項目を並び替え要素にする
function column_views_sortable($columns) {
  $columns['views'] = 'views_sort';
  return $columns;
}

add_filter('manage_edit-post_sortable_columns', 'column_views_sortable');

// 閲覧数で並び替えを実行
function my_add_sort_by_meta($query) {
  if ($query->is_main_query() && ($orderby = $query->get('orderby'))) {
    switch ($orderby) {
      case 'views_sort':
        $query->set('meta_key', 'post_views_count');
        $query->set('orderby', 'meta_value_num');
        break;
    }
  }
}

add_action('pre_get_posts', 'my_add_sort_by_meta', 1);

/*==========================
# 編集画面のエディタや不要な項目を非表示
==========================*/
function disable_editor_for_pages($use_block_editor, $post) {
  if ($post->post_type === 'page') {
    if (in_array ($post->post_name, [
        'front-page',
        'about-us',
        'information',
        'blog',
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

function disable_editor_for_posts() {
  // 通常投稿 'blog' の設定
  remove_post_type_support('post', 'author');
  remove_post_type_support('post', 'excerpt');
  remove_post_type_support('post', 'comments');
  unregister_taxonomy_for_object_type('category', 'post');
  unregister_taxonomy_for_object_type('post_tag', 'post');

  // カスタム投稿 'campaign' の設定
  remove_post_type_support('campaign', 'editor');
  remove_post_type_support('campaign', 'thumbnail');

  // カスタム投稿 'voice' の設定
  remove_post_type_support('voice', 'editor');
  remove_post_type_support('voice', 'thumbnail');
}

add_action('init', 'disable_editor_for_posts');

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
# Contact Form 7のセレクトボックスを動的
==========================*/
function add_select_menu($scanned_tag, $replace) {
  if ( !empty($scanned_tag) && $scanned_tag['name'] === 'menu_name') {
    global $post;

    $args = [
      'post_type' => 'campaign',
      'posts_per_page' => -1,
      'post_status' => 'publish',
    ];

    $custom_posts = get_posts($args);
    if ($custom_posts) {
      foreach ($custom_posts as $post) {
        $title = get_the_title($post->ID);
        $scanned_tag['values'][] = $title;
        $scanned_tag['labels'][] = $title;
      }
    }
  }
  return $scanned_tag;
}

add_filter('wpcf7_form_tag', 'add_select_menu', 11, 2);

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

/*==========================
# クラシックエディタ (ブロックエディタを無効化)
==========================*/
// add_filter('use_block_editor_for_post', '__return_false');

/*==========================
# 管理画面のメニューを非表示 (コメントを非表示)
==========================*/
function disable_menus() {
  remove_menu_page('edit-comments.php');
}

add_action('admin_menu', 'disable_menus');