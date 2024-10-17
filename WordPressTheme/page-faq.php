<?php get_header(); ?>

  <main>
    <!-- 下層ページのメインビュー -->
    <div class="sub-mv js-mv">
      <div class="sub-mv__image">
        <picture>
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-faq-sp.webp" type="image/webp" width="375" height="460">
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-faq-sp.png" type="image/png" width="375" height="460">
          <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-faq-pc.webp" type="image/webp" width="1440" height="548">
          <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-faq-pc.png" alt="白浜のビーチ" width="1440" height="548" loading="eager">
        </picture>
      </div>
      <div class="sub-mv__content">
        <h1 class="sub-mv__title sub-mv__title--faq">faq</h1>
      </div>
    </div>

    <!-- パンくず -->
    <?php get_template_part('parts/breadcrumb'); ?>

    <section class="page-faq layout-page-faq fish">
      <div class="page-faq__inner inner">
        <div class="page-faq__items page-faq-items">
        <!-- Smart Custom Fieldsで実装 -->
        <?php 
          $faqs = SCF::get('faqs');
          if ( !empty($faqs)):
            foreach ($faqs as $faq):
              $question = $faq['question'];
              $answer = $faq['answer'];
        ?>
          <details class="page-faq-items__item accordion js-details is-opened" open>
            <summary class="accordion__question js-summary">
              <span class="accordion__question-text-box">
                <span class="accordion__question-text"><?php echo esc_html($question); ?></span>
                <span class="accordion__icon"></span>
              </span>
            </summary>
            <div class="accordion__answer js-answer">
              <p class="accordion__answer-text"><?php echo nl2br( esc_html($answer)); ?></p>
            </div>
          </details>
        <?php endforeach; endif; ?>
        </div>
        <!-- /.page-faq__items .page-faq-items -->
      </div>
      <!-- /.page-faq__inner .inner -->
    </section>
    <!-- /.page-faq -->

<?php get_footer(); ?>