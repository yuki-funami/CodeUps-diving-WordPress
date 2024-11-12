<?php get_header(); ?>

  <main>
    <!-- 下層ページのメインビュー -->
    <div class="sub-mv js-mv">
      <div class="sub-mv__image">
        <picture>
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-about-us-sp.webp" type="image/webp" width="375" height="460">
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-about-us-sp.png" type="image/png" width="375" height="460">
          <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-about-us-pc.webp" type="image/webp" width="1440" height="548">
          <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-about-us-pc.png" alt="シーサー" width="1440" height="548" loading="eager">
        </picture>
      </div>
      <div class="sub-mv__content">
        <h1 class="sub-mv__title sub-mv__title--about-us">about us</h1>
      </div>
    </div>

    <!-- パンくず -->
    <?php get_template_part('parts/breadcrumb'); ?>

    <section class="page-about-us layout-page-about-us fish fish--about-us">
      <div class="page-about-us__inner inner">
        <div class="page-about-us__images">
          <picture>
            <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/Raccoon-butterflyfish.webp" type="image/webp" width="880" height="581">
            <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/Raccoon-butterflyfish.png" alt="チョウハン" width="880" height="581" loading="eager">
          </picture>
          <picture>
            <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/Shisa-on-the-roof.webp" type="image/webp" width="400" height="606">
            <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/Shisa-on-the-roof.png" alt="屋根上のシーサー" width="400" height="606" loading="eager">
          </picture>
        </div>
        <!-- /.page-about-us__images -->
        <div class="page-about-us__content">
          <div class="page-about-us__content-left">
            <h3 class="page-about-us__title">Dive&nbsp;into<br>the&nbsp;Ocean</h3>
          </div>
          <div class="page-about-us__content-right">
            <p class="page-about-us__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。</p>
          </div>
        </div>
        <!-- /.page-about-us__content -->
      </div>
      <!-- /.page-about-us__inner .inner -->
    </section>
    <!-- /.page-about-us -->

    <?php 
      $images = SCF::get('gallery_images');
      // 配列内に画像が存在するかをチェック
      $filtered_images = array_filter($images, function($image) {
        return !empty($image['gallery']);
      });
      
      if ( !empty($filtered_images)):
    ?>
    <section class="page-gallery layout-page-gallery fish fish--gallery">
      <div class="page-gallery__inner inner">
        <div class="page-gallery__header section-header">
          <p class="section-header__title">gallery</p>
          <h2 class="section-header__subtitle">フォト</h2>
        </div>
        <!-- /.section-header -->
        <div class="page-gallery__content">
          <div class="page-gallery__images js-modal">
            <!-- Smart Custom Fieldsで実装 -->
            <?php 
              foreach ($filtered_images as $image):
                $id = $image['gallery'];
                $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
                $src = wp_get_attachment_image_src($id, 'full');
            ?>
            <picture>
              <img src="<?php echo esc_url($src[0]); ?>" alt="<?php echo esc_attr($alt); ?>" width="<?php echo esc_attr($src[1]); ?>" height="<?php echo esc_attr($src[2]); ?>" loading="lazy">
            </picture>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <!-- /.page-gallery__inner .inner -->
      <div class="page-gallery__modal modal-background"></div>
    </section>
    <!-- /.page-gallery -->
    <?php endif; ?>

<?php get_footer(); ?>