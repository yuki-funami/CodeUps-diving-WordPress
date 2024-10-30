<?php get_header(); ?>

  <main>
    <!-- 下層ページのメインビュー -->
    <div class="sub-mv js-mv">
      <div class="sub-mv__image">
        <picture>
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-other-sp.webp" type="image/webp" width="375" height="460">
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-other-sp.png" type="image/png" width="375" height="460">
          <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-other-pc.webp" type="image/webp" width="1440" height="548">
          <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-other-pc.png" alt="エメラルドグリーンの渚" width="1440" height="548">
        </picture>
      </div>
      <div class="sub-mv__content">
        <h1 class="sub-mv__title" id="formTitle">site&nbsp;<span class="sub-mv__title--sitemap">map</span></h1>
      </div>
    </div>

    <!-- パンくず -->
    <?php get_template_part('parts/breadcrumb'); ?>

    <section class="page-sitemap layout-page-sitemap fish fish--sitemap">
      <div class="page-sitemap__inner inner">
        <div class="page-sitemap__nav nav nav--sitemap">
          <ul class="nav__items nav__items--sitemap">
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/campaign/' )); ?>">キャンペーン</a>
              <ul class="nav__small-items">
                <li class="nav__small-item">
                  <a href="<?php echo esc_url( home_url( '/campaign-category/license/' )); ?>">ライセンス取得</a>
                </li>
                <li class="nav__small-item">
                  <a href="<?php echo esc_url( home_url( '/campaign-category/experience/' )); ?>">貸切体験ダイビング</a>
                </li>
                <li class="nav__small-item">
                  <a href="<?php echo esc_url( home_url( '/campaign-category/fun/' )); ?>">ナイトダイビング</a>
                </li>
              </ul>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/about-us/' )); ?>">私たちについて</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/information/' )); ?>">ダイビング情報</a>
              <ul class="nav__small-items">
                <li class="nav__small-item">
                  <a href="<?php echo esc_url( add_query_arg('category', 'license', home_url( '/information/' ))); ?>">ライセンス講習</a>
                </li>
                <li class="nav__small-item">
                  <a href="<?php echo esc_url( add_query_arg('category', 'experience', home_url( '/information/' ))); ?>">体験ダイビング</a>
                </li>
                <li class="nav__small-item">
                  <a href="<?php echo esc_url( add_query_arg('category', 'fun', home_url( '/information/' ))); ?>">ファンダイビング</a>
                </li>
              </ul>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/blog/' )); ?>">ブログ</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/voice/' )); ?>">お客様の声</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/price/' )); ?>">料金一覧</a>
              <ul class="nav__small-items">
                <li class="nav__small-item">
                  <a href="<?php echo esc_url( home_url( '/price/#license' )); ?>">ライセンス講習</a>
                </li>
                <li class="nav__small-item">
                  <a href="<?php echo esc_url( home_url( '/price/#experience' )); ?>">体験ダイビング</a>
                </li>
                <li class="nav__small-item">
                  <a href="<?php echo esc_url( home_url( '/price/#fun' )); ?>">ファンダイビング</a>
                </li>
              </ul>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/faq/' )); ?>">よくある質問</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/privacy-policy/' )); ?>">プライバシー<br class="u-mobile">ポリシー</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/terms-of-service/' )); ?>">利用規約</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/contact/' )); ?>">お問い合わせ</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url( home_url( '/sitemap/' )); ?>">サイトマップ</a>
            </li>
          </ul>
        </div>
        <!-- /.page-sitemap__nav .nav -->
      </div>
      <!-- /.page-sitemap__inner .inner -->
    </section>
    <!-- /.page-sitemap -->

<?php get_footer(); ?>