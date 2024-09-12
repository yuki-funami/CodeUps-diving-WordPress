<?php get_header(); ?>

  <main>
    <!-- 下層ページのメインビュー -->
    <div class="sub-mv js-mv">
      <div class="sub-mv__image">
        <picture>
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-information-sp.webp" type="image/webp" width="375" height="460">
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-information-sp.png" type="image/png" width="375" height="460">
          <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-information-pc.webp" type="image/webp" width="1440" height="548">
          <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-information-pc.png" alt="黄色の魚たちとダイバー" width="1440" height="548" loading="eager">
        </picture>
      </div>
      <div class="sub-mv__content">
        <h1 class="sub-mv__title">information</h1>
      </div>
    </div>

    <!-- パンくず -->
    <?php get_template_part('parts/breadcrumb'); ?>

    <section class="page-information layout-page-information fish fish--information">
      <div class="page-information__inner inner">
        <div class="page-information__tab tab-list">
          <ul class="tab-list__items">
            <li class="tab-list__item">
              <button type="button" class="js-tab" data-category="license">ライセンス<br class="u-mobile">講習</button>
            </li>
            <li class="tab-list__item">
              <button type="button" class="js-tab" data-category="fun">ファン<br class="u-mobile">ダイビング</button>
            </li>
            <li class="tab-list__item">
              <button type="button" class="js-tab" data-category="experience">体験<br class="u-mobile">ダイビング</button>
            </li>
          </ul>
        </div>
        <!-- /.page-information__tab .tab-list -->
        <article class="page-information__card page-information-card" data-category="license">
          <div class="page-information-card__inner">
            <div class="page-information-card__body">
              <div class="page-information-card__content">
                <h2 class="page-information-card__title">ライセンス講習</h2>
                <p class="page-information-card__text">
                  泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
                </p>
              </div>
              <figure class="page-information-card__image">
                <picture>
                  <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/Divers-seen-from-above.webp" type="image/webp" width="492" height="313">
                  <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/Divers-seen-from-above.png" alt="上空から見たダイバーたち" width="492" height="313" loading="lazy">
                </picture>
              </figure>
            </div>
          </div>
        </article>
        <article class="page-information__card page-information-card js-category-content" data-category="fun">
          <div class="page-information-card__inner">
            <div class="page-information-card__body">
              <div class="page-information-card__content">
                <h2 class="page-information-card__title">ファンダイビング</h2>
                <p class="page-information-card__text">
                  ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                </p>
              </div>
              <figure class="page-information-card__image">
                <picture>
                  <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/School-of-white-fish.webp" type="image/webp" width="492" height="313">
                  <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/School-of-white-fish.png" alt="白い魚たち" width="492" height="313" loading="lazy">
                </picture>
              </figure>
            </div>
          </div>
        </article>
        <article class="page-information__card page-information-card js-category-content" data-category="experience">
          <div class="page-information-card__inner">
            <div class="page-information-card__body">
              <div class="page-information-card__content">
                <h2 class="page-information-card__title">体験ダイビング</h2>
                <p class="page-information-card__text">
                  ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                </p>
              </div>
              <figure class="page-information-card__image">
                <picture>
                  <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/Threadfin-butterflyfish.webp" type="image/webp" width="492" height="313">
                  <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/Threadfin-butterflyfish.png" alt="2匹のトゲチョウチョウウオ" width="492" height="313" loading="lazy">
                </picture>
              </figure>
            </div>
          </div>
        </article>
      </div>
      <!-- /.page-information__inner .inner -->
    </section>
    <!-- /.page-information -->

<?php get_footer(); ?>