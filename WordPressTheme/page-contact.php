<?php get_header(); ?>

  <main>
    <!-- 下層ページのメインビュー -->
    <div class="sub-mv js-mv">
      <div class="sub-mv__image">
        <picture>
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-contact-sp.webp" type="image/webp" width="375" height="460">
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-contact-sp.png" type="image/png" width="375" height="460">
          <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-contact-pc.webp" type="image/webp" width="1440" height="548">
          <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-contact-pc.png" alt="エメラルドグリーンの渚" width="1440" height="548" loading="eager">
        </picture>
      </div>
      <div class="sub-mv__content">
        <h1 class="sub-mv__title" id="formTitle">contact</h1>
      </div>
    </div>

    <!-- パンくず -->
    <?php get_template_part('parts/breadcrumb'); ?>

    <section class="page-contact layout-page-contact fish">
      <div class="page-contact__inner inner">
        <?php echo do_shortcode('[contact-form-7 id="4199d49" title="お問い合わせ" html_class="page-contact__form contact-form"]'); ?>
      </div>
      <!-- /.page-contact__inner .inner -->
    </section>
    <!-- /.page-contact -->

<?php get_footer(); ?>