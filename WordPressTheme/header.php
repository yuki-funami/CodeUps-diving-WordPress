<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <?php wp_head(); ?>
</head>

<body class="<?php if (is_404()) echo 'is-404'; ?>">
<?php $is_front_page = is_front_page(); ?>
<?php if ($is_front_page): ?>
  <div class="loader">
    <div class="loader__image">
      <div class="loader__image-wrap">
        <div class="loader__left-image">
          <picture>
            <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/mv-left-sp.webp" type="image/webp" width="375" height="667">
            <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/mv-left-sp.png" type="image/png" width="375" height="667">
            <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/mv-left-pc.webp" type="image/webp" width="720" height="768">
            <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/mv-left-pc.png" alt="" width="720" height="768" loading="eager">
          </picture>
        </div>
        <div class="loader__right-image">
          <picture>
            <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/mv-right-sp.webp" type="image/webp" width="375" height="667">
            <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/mv-right-sp.png" type="image/png" width="375" height="667">
            <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/mv-right-pc.webp" type="image/webp" width="720" height="768">
            <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/mv-right-pc.png" alt="" width="720" height="768" loading="eager">
          </picture>
        </div>
      </div>
    </div>
    <div class="loader__title-wrap">
      <h2 class="loader__title">diving</h2>
      <p class="loader__text">into the ocean</p>
    </div>
  </div>
<?php endif; ?>

  <header class="header layout-header">
    <div class="header__inner">
    <!-- フロントページのみh1タグ、下層ページはdivタグに変更させる -->
    <?php if ($is_front_page): ?>
      <h1 class="header__logo">
    <?php else: ?>
      <div class="header__logo">
    <?php endif; ?>
        <a class="header__logo-link" href="<?php echo esc_url( home_url( '/' )); ?>">
          <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/svg/CodeUps.svg" alt="CodeUps" width="133" height="50" loading="eager">
        </a>
    <?php if ($is_front_page): ?>
      </h1>
    <?php else: ?>
      </div>
    <?php endif; ?>
      <!-- /.header__logo -->
      <button type="button" class="header__hamburger hamburger js-hamburger u-mobile" aria-label="メインのナビゲーションメニューを開く">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <!-- /.header__hamburger .hamburger -->
      <nav class="header__sp-nav sp-nav u-mobile" aria-label="メインのナビゲーションメニュー">
        <ul class="sp-nav__items">
          <li class="sp-nav__item">
            <a href="<?php echo esc_url( home_url( '/campaign/' )); ?>">キャンペーン</a>
            <ul class="sp-nav__small-items">
              <li class="sp-nav__small-item">
                <a href="<?php echo esc_url( home_url( '/campaign-category/license/' )); ?>">ライセンス取得</a>
              </li>
              <li class="sp-nav__small-item">
                <a href="<?php echo esc_url( home_url( '/campaign-category/experience/' )); ?>">貸切体験ダイビング</a>
              </li>
              <li class="sp-nav__small-item">
                <a href="<?php echo esc_url( home_url( '/campaign-category/fun/' )); ?>">ナイトダイビング</a>
              </li>
            </ul>
          </li>
          <li class="sp-nav__item">
            <a href="<?php echo esc_url( home_url( '/about-us/' )); ?>">私たちについて</a>
          </li>
          <li class="sp-nav__item">
            <a href="<?php echo esc_url( home_url( '/information/' )); ?>">ダイビング情報</a>
            <ul class="sp-nav__small-items">
              <li class="sp-nav__small-item">
                <a href="<?php echo esc_url( add_query_arg('category', 'license', home_url( '/information/' ))); ?>">ライセンス講習</a>
              </li>
              <li class="sp-nav__small-item">
                <a href="<?php echo esc_url( add_query_arg('category', 'experience', home_url( '/information/' ))); ?>">体験ダイビング</a>
              </li>
              <li class="sp-nav__small-item">
                <a href="<?php echo esc_url( add_query_arg('category', 'fun', home_url( '/information/' ))); ?>">ファンダイビング</a>
              </li>
            </ul>
          </li>
          <li class="sp-nav__item">
            <a href="<?php echo esc_url( home_url( '/blog/' )); ?>">ブログ</a>
          </li>
          <li class="sp-nav__item">
            <a href="<?php echo esc_url( home_url( '/voice/' )); ?>">お客様の声</a>
          </li>
          <li class="sp-nav__item">
            <a href="<?php echo esc_url( home_url( '/price/' )); ?>">料金一覧</a>
            <ul class="sp-nav__small-items">
              <li class="sp-nav__small-item">
                <a href="<?php echo esc_url( home_url( '/price/#license' )); ?>">ライセンス講習</a>
              </li>
              <li class="sp-nav__small-item">
                <a href="<?php echo esc_url( home_url( '/price/#experience' )); ?>">体験ダイビング</a>
              </li>
              <li class="sp-nav__small-item">
                <a href="<?php echo esc_url( home_url( '/price/#fun' )); ?>">ファンダイビング</a>
              </li>
            </ul>
          </li>
          <li class="sp-nav__item">
            <a href="<?php echo esc_url( home_url( '/faq/' )); ?>">よくある質問</a>
          </li>
          <li class="sp-nav__item">
            <a href="<?php echo esc_url( home_url( '/privacy-policy/' )); ?>">プライバシー<br>ポリシー</a>
          </li>
          <li class="sp-nav__item">
            <a href="<?php echo esc_url( home_url( '/terms-of-service/' )); ?>">利用規約</a>
          </li>
          <li class="sp-nav__item">
            <a href="<?php echo esc_url( home_url( '/contact/' )); ?>">お問い合わせ</a>
          </li>
          <li class="sp-nav__item">
            <a href="<?php echo esc_url( home_url( '/sitemap/' )); ?>">サイトマップ</a>
          </li>
        </ul>
      </nav>
      <!-- /.header__sp-nav .sp-nav -->
      <nav class="header__pc-nav pc-nav u-desktop" aria-label="トップのナビゲーションメニュー">
        <ul class="pc-nav__items">
          <li class="pc-nav__item">
            <a href="<?php echo esc_url( home_url( '/campaign/' )); ?>">
              <p class="pc-nav__item-english">campaign</p>
              <p class="pc-nav__item-japanese">キャンペーン</p>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url( home_url( '/about-us/' )); ?>">
              <p class="pc-nav__item-english">about us</p>
              <p class="pc-nav__item-japanese">私たちについて</p>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url( home_url( '/information/' )); ?>">
              <p class="pc-nav__item-english">information</p>
              <p class="pc-nav__item-japanese">ダイビング情報</p>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url( home_url( '/blog/' )); ?>">
              <p class="pc-nav__item-english">blog</p>
              <p class="pc-nav__item-japanese">ブログ</p>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url( home_url( '/voice/' )); ?>">
              <p class="pc-nav__item-english">voice</p>
              <p class="pc-nav__item-japanese">お客様の声</p>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url( home_url( '/price/' )); ?>">
              <p class="pc-nav__item-english">price</p>
              <p class="pc-nav__item-japanese">料金一覧</p>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url( home_url( '/faq/' )); ?>">
              <p class="pc-nav__item-english">faq</p>
              <p class="pc-nav__item-japanese">よくある質問</p>
            </a>
          </li>
          <li class="pc-nav__item">
            <a href="<?php echo esc_url( home_url( '/contact/' )); ?>">
              <p class="pc-nav__item-english">contact</p>
              <p class="pc-nav__item-japanese">お問い合わせ</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.header__pc-nav .pc-nav -->
    </div>
    <!-- /.header__inner -->
  </header>
  <!-- /.header -->