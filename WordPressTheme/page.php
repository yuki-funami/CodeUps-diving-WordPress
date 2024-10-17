<?php get_header(); ?>

  <main>
    <!-- 下層ページのメインビュー -->
    <div class="sub-mv js-mv">
      <div class="sub-mv__image">
        <picture>
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-other-sp.webp" type="image/webp" width="375" height="460">
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-other-sp.png" type="image/png" width="375" height="460">
          <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-other-pc.webp" type="image/webp" width="1440" height="548">
          <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-other-pc.png" alt="エメラルドグリーンの渚" width="1440" height="548" loading="eager">
        </picture>
      </div>
      <div class="sub-mv__content">
      <!-- h1タイトルの条件分岐 -->
      <?php if (is_page('privacy-policy')): ?>
        <h1 class="sub-mv__title" id="formTitle">privacy&nbsp;policy</h1>
      <?php endif; ?>
      <?php if (is_page('terms-of-service')): ?>
        <h1 class="sub-mv__title" id="formTitle">terms&nbsp;<span class="sub-mv__title--terms">of&nbsp;</span>service</h1>
      <?php endif; ?>
      </div>
    </div>

    <!-- パンくず -->
    <?php get_template_part('parts/breadcrumb'); ?>

    <section class="page-terms layout-page-terms fish fish--terms">
      <div class="page-terms__inner inner">
        <div class="page-terms__container terms">
          <h2 class="terms__title"><?php the_title(); ?></h2>
          <div class="terms__content">
            <?php the_content(); ?>
          </div>
        </div>
        <!-- /.page-terms__content .terms -->
      </div>
      <!-- /.page-terms__inner .inner -->
    </section>
    <!-- /.page-terms -->

<?php get_footer(); ?>