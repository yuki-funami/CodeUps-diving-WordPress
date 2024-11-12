    <?php if ( !is_page( 'contact' ) && !is_page( 'contact/thanks' ) && !is_404() ): ?>
    <section class="contact layout-contact <?php echo is_front_page() ? 'layout-contact--front' : ''; ?>">
      <div class="contact__inner inner">
        <div class="contact__body">
          <div class="contact__left-body contact-left">
            <div class="contact-left__upper">
              <div class="contact-left__logo">
                <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/svg/CodeUps_accent.svg" alt="CodeUps" width="200" height="75" loading="lazy">
              </div>
            </div>
            <div class="contact-left__content">
              <p class="contact-left__address">
                沖縄県那覇市1-1<br>
                TEL:0120-000-0000<br>
                営業時間:8:30-19:00<br>
                定休日:毎週火曜日
              </p>
              <div class="contact-left__map">
                <div class="contact-left__map-inner">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d11953.626157735102!2d127.68305550218774!3d26.216620135949825!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sja!2sjp!4v1697440792418!5m2!1sja!2sjp" title="google maps" width="600" height="450" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
            </div>
          </div>
          <!-- /.contact__left-body .contact-left -->
          <div class="contact__right-body contact-right">
            <div class="contact-right__header section-header">
              <p class="section-header__title section-header__title--large">contact</p>
              <h2 class="section-header__subtitle section-header__subtitle--large">お問い合わせ</h2>
            </div>
            <!-- /.section-header -->
            <a href="<?php echo esc_url( home_url( '/contact/' )); ?>" class="contact-right__link">ご予約・お問い合わせはコチラ</a>
            <div class="contact-right__button">
              <a href="<?php echo esc_url( home_url( '/contact/' )); ?>" class="button">
                <span>contact us</span>
                <span></span>
              </a>
            </div>
          </div>
          <!-- /.contact__right-body .contact-right -->
        </div>
        <!-- /.contact__body -->
      </div>
      <!-- /.contact__inner .inner -->
    </section>
    <!-- /.contact -->
    <?php endif; ?>
  </main>
  <!-- /.main -->

  <footer class="footer layout-footer <?php echo is_404() ? 'layout-footer--404' : (is_page( 'contact' ) ? 'layout-footer--contact' : (is_page( 'contact/thanks' ) ? 'layout-footer--thanks' : '')); ?>">
    <div class="footer__inner inner">
      <div class="footer__upper">
        <figure class="footer__logo">
          <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/svg/CodeUps.svg" alt="CodeUps" width="200" height="75" loading="lazy">
        </figure>
        <div class="footer__sns footer-sns">
          <ul class="footer-sns__items">
            <li class="footer-sns__item">
              <a class="footer-sns__item-link" href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/sns/Facebook_Logo_Secondary.png" alt="facebook" width="26" height="26" loading="lazy">
              </a>
            </li>
            <li class="footer-sns__item">
              <a class="footer-sns__item-link" href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/sns/Instagram_Glyph_White.png" alt="instagram" width="26" height="26" loading="lazy">
              </a>
            </li>
          </ul>
        </div>
        <!-- /.footer__sns -->
      </div>
      <!-- /.footer__upper -->
      <div class="footer__nav nav">
        <ul class="nav__items">
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
      <!-- /.footer__nav .nav -->
      <p class="footer__copyrights">
        <small>Copyright &copy; 2021 - 2023 CodeUps LLC. All&nbsp;Rights&nbsp;Reserved.</small>
      </p>
    </div>
    <!-- /.footer__inner -->
  </footer>
  <!-- /.footer -->

  <div class="to-top js-to-top">
    <a href="#" role="button" aria-label="ページトップへ戻る">&nbsp;</a>
  </div>
  <?php wp_footer(); ?>
</body>

</html>