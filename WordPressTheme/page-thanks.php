<?php get_header(); ?>

  <main>
    <!-- 下層ページのメインビュー -->
    <div class="sub-mv js-mv">
      <div class="sub-mv__image">
        <picture>
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-contact-sp.webp" type="image/webp" width="375" height="460">
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-contact-sp.png" type="image/png" width="375" height="460">
          <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-contact-pc.webp" type="image/webp" width="1440" height="548">
          <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-contact-pc.png" alt="エメラルドグリーンの渚" width="1440" height="548">
        </picture>
      </div>
      <div class="sub-mv__content">
        <h1 class="sub-mv__title" id="formTitle">contact</h1>
      </div>
    </div>

    <!-- パンくず -->
    <?php get_template_part('parts/breadcrumb'); ?>

    <section class="page-contact-thanks layout-page-contact-thanks fish">
      <div class="page-contact-thanks__inner inner">
        <div class="page-contact-thanks__content contact-thanks">
          <p class="contact-thanks__text-a">
            お問い合わせ内容を送信完了しました。<br>
          </p>
          <p class="contact-thanks__text-b">
            このたびは、お問い合わせ頂き<br class="u-mobile">誠にありがとうございます。<br>
            お送り頂きました内容を確認の上、<br class="u-mobile">3営業日以内に折り返しご連絡させて頂きます。<br>
            また、ご記入頂いたメールアドレスへ、<br class="u-mobile">自動返信の確認メールをお送りしております。
          </p>
        </div>
      </div>
      <!-- /.page-contact-thanks__inner .inner -->
    </section>
    <!-- /.page-contact-thanks -->

<?php get_footer(); ?>