<?php get_header(); ?>

  <main>
    <div class="mv js-mv">
      <div class="mv__slider swiper js-mv-swiper">
        <div class="swiper-wrapper">
        <!-- Advanced Custom Fieldsで実装 -->
        <?php 
          // グループを取得
          $sp_mv_group = get_field('sp_mv');
          $pc_mv_group = get_field('pc_mv');

          for ($i = 1; $i <= 4; $i++):
            // サブフィールドを取得
            $sp_mv = $sp_mv_group['sp_mv_'.$i];
            $pc_mv = $pc_mv_group['pc_mv_'.$i];
        ?>
          <div class="swiper-slide">
            <div class="mv__image">
              <picture>
                <source media="(max-width: 767px)" srcset="<?php echo esc_url($sp_mv['url']); ?>" type="<?php echo esc_attr($sp_mv['mime_type']); ?>" width="<?php echo esc_attr($sp_mv['width']); ?>" height="<?php echo esc_attr($sp_mv['height']); ?>">
                <source srcset="<?php echo esc_url($pc_mv['url']); ?>" type="<?php echo esc_attr($pc_mv['mime_type']); ?>" width="<?php echo esc_attr($pc_mv['width']); ?>" height="<?php echo esc_attr($pc_mv['height']); ?>">
                <img src="<?php echo esc_url($pc_mv['url']); ?>" alt="<?php echo esc_attr($pc_mv['alt']); ?>" width="<?php echo esc_attr($pc_mv['width']); ?>" height="<?php echo esc_attr($pc_mv['height']); ?>" loading="eager">
              </picture>
            </div>
          </div>
        <?php endfor; ?>
        </div>
        <!-- /.swiper-wrapper -->
      </div>
      <!-- /.swiper -->
      <div class="mv__content">
        <h2 class="mv__title">diving</h2>
        <p class="mv__text">into the ocean</p>
      </div>
    </div>
    <!-- /.mv -->

    <section class="campaign layout-campaign">
      <div class="campaign__inner inner">
        <div class="campaign__header section-header">
          <p class="section-header__title">campaign</p>
          <h2 class="section-header__subtitle">キャンペーン</h2>
        </div>
        <!-- /.section-header -->
        <div class="swiper campaign__slider js-campaign-swiper">
          <div class="swiper-wrapper">
          <?php 
            $args = [
              'post_type' => 'campaign', // 投稿タイプのスラッグ
              'posts_per_page' => -1, // 表示件数
              'no_found_rows' => true, // ページングを無効化
            ];

            $the_query = new WP_Query($args);
            if ($the_query->have_posts()):
              while ($the_query->have_posts()):
                $the_query->the_post();
          ?>
            <div class="swiper-slide">
              <div class="campaign__card campaign-card">
                <figure class="campaign-card__image">
                  <picture>
                  <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('full'); ?>
                  <?php else: ?>
                    <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/no-image.png" alt="no image" width="333" height="223" loading="lazy">
                  <?php endif; ?>
                  </picture>
                </figure>
                <div class="campaign-card__content">
                <?php 
                  $terms = get_the_terms($post->ID, 'campaign-category');
                    if ( !empty($terms)):
                ?>
                  <div class="campaign-card__category"><?php echo esc_html($terms[0]->name); ?></div>
                <?php endif; ?>
                  <div class="campaign-card__title"><?php the_title(); ?></div>
                  <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                  <div class="campaign-card__price">
                  <?php
                    $original_price = get_field('original_price');
                    $discount_price = get_field('discount_price');
                  ?>
                    <p class="campaign-card__original-price">
                      &yen;<?php echo number_format( esc_html($original_price)); ?>
                    </p>
                    <p class="campaign-card__discount-price">
                      &yen;<?php echo number_format( esc_html($discount_price)); ?>
                    </p>
                  </div>
                </div>
                <!-- /.campaign-card__content -->
              </div>
              <!-- /.campaign__card .campaign-card -->
            </div>
            <!-- /.swiper-slide -->
          <?php endwhile;
            wp_reset_postdata();
              endif;
          ?>
          </div>
          <!-- /.swiper-wrapper -->
        </div>
        <!-- /.swiper -->
        <div class="swiper-button-prev js-campaign-button-prev"></div>
        <div class="swiper-button-next js-campaign-button-next"></div>
        <!-- .swiper-button-xxx -->

        <div class="campaign__button">
          <a href="<?php echo esc_url( home_url( '/campaign/' )); ?>" class="button">
            <span>view more</span>
            <span></span>
          </a>
        </div>
      </div>
      <!-- /.campaign_inner .inner -->
    </section>
    <!-- /.campaign -->

    <section class="about-us layout-about-us">
      <div class="about-us__inner inner">
        <div class="about-us__header section-header">
          <p class="section-header__title section-header__title--about-us">about us</p>
          <h2 class="section-header__subtitle">私たちについて</h2>
        </div>
        <!-- /.section-header -->
        <div class="about-us__images">
          <picture>
            <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/Raccoon-butterflyfish.webp" type="image/webp" width="880" height="581">
            <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/Raccoon-butterflyfish.png" alt="チョウハン" width="880" height="581" loading="lazy">
          </picture>
          <picture>
            <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/Shisa-on-the-roof.webp" type="image/webp" width="400" height="606">
            <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/Shisa-on-the-roof.png" alt="屋根上のシーサー" width="400" height="606" loading="lazy">
          </picture>
        </div>
        <!-- /.about-us__images -->
        <div class="about-us__content">
          <div class="about-us__content-left">
            <h3 class="about-us__title">Dive&nbsp;into<br>the&nbsp;Ocean</h3>
          </div>
          <div class="about-us__content-right">
            <p class="about-us__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。</p>
            <div class="about-us__button">
              <a href="<?php echo esc_url( home_url( '/about-us/' )); ?>" class="button">
                <span>view more</span>
                <span></span>
              </a>
            </div>
          </div>
        </div>
        <!-- /.about-us__content -->
      </div>
      <!-- /.about-us__inner .inner -->
    </section>
    <!-- /.about-us -->

    <section class="information layout-information">
      <div class="information__inner inner">
        <div class="information__header section-header">
          <p class="section-header__title">information</p>
          <h2 class="section-header__subtitle">ダイビング情報</h2>
        </div>
        <!-- /.section-header -->
        <div class="information__body">
          <div class="information__image">
            <div class="color-box js-color-box">
              <picture>
                <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/top-information.webp" type="image/webp" width="540" height="356">
                <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/top-information.png" alt="ゴールデンバタフライフィッシュとサンゴ礁" width="540" height="356" loading="lazy">
              </picture>
            </div>
            <!-- /.color-box -->
          </div>
          <!-- /.information__image -->
          <div class="information__content">
            <h3 class="information__title">ライセンス講習</h3>
            <p class="information__text">
              当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br>
              正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。</p>
            <div class="information__button">
              <a href="<?php echo esc_url( home_url( '/information/' )); ?>" class="button">
                <span>view more</span>
                <span></span>
              </a>
            </div>
          </div>
          <!-- /.information__content -->
        </div>
        <!-- /.information__body -->
      </div>
      <!-- /.information__inner .inner -->
    </section>
    <!-- /.information -->

    <section class="blog layout-blog">
      <div class="blog__inner inner">
        <div class="blog__header section-header">
          <p class="section-header__title section-header__title--white">blog</p>
          <h2 class="section-header__subtitle section-header__subtitle--white">ブログ</h2>
        </div>
        <!-- /.section-header -->
        <div class="blog__cards blog-cards">
        <?php 
          $args = [
            'post_type' => 'post', // 投稿タイプのスラッグ(通常投稿なので 'post')
            'posts_per_page' => 3, // 表示件数
            'no_found_rows' => true, // ページングを無効化
          ];

          $the_query = new WP_Query($args);
          if ($the_query->have_posts()):
            while ($the_query->have_posts()):
              $the_query->the_post();
        ?>
          <a href="<?php the_permalink(); ?>" class="blog-cards__item blog-card">
            <div class="blog-card__inner">
              <figure class="blog-card__image">
                <picture>
                <?php if (has_post_thumbnail()): ?>
                  <?php the_post_thumbnail('full'); ?>
                <?php else: ?>
                  <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/no-image.png" alt="no image" width="301" height="201" loading="lazy">
                <?php endif; ?>
                </picture>
              </figure>
              <div class="blog-card__content">
                <time datetime="<?php the_time('C'); ?>" class="blog-card__time"><?php the_time('Y.m/d'); ?></time>
                <h3 class="blog-card__title"><?php the_title(); ?></h3>
                <p class="blog-card__text">
                  <?php echo esc_html( wp_trim_words(get_the_content(), 85, '…')); ?>
                </p>
              </div>
            </div>
          </a>
        <?php endwhile;
          wp_reset_postdata();
            endif;
        ?>
        </div>
        <!-- /.blog__cards -->
        <div class="blog__button">
          <a href="<?php echo esc_url( home_url( '/blog/' )); ?>" class="button">
            <span>view more</span>
            <span></span>
          </a>
        </div>
      </div>
      <!-- /.blog__inner .inner -->
    </section>
    <!-- /.blog -->
    
    <section class="voice layout-voice">
      <div class="voice__inner inner">
        <div class="voice__header section-header">
          <p class="section-header__title">voice</p>
          <h2 class="section-header__subtitle">お客様の声</h2>
        </div>
        <!-- /.section-header -->
        <div class="voice__cards voice-cards">
        <?php 
          $args = [
            'post_type' => 'voice', // 投稿タイプのスラッグ
            'posts_per_page' => 2, // 表示件数
            'no_found_rows' => true, // ページングを無効化
          ];

          $the_query = new WP_Query($args);
          if ($the_query->have_posts()):
            while ($the_query->have_posts()):
              $the_query->the_post();
        ?>
          <article class="voice-cards__item voice-card">
            <div class="voice-card__inner">
              <div class="voice-card__upper">
                <div class="voice-card__heading">
                  <div class="voice-card__meta">
                  <?php $age = get_field('age'); ?>
                    <div class="voice-card__gender"><?php echo esc_html($age); ?></div>
                  <?php 
                    $terms = get_the_terms($post->ID, 'voice-category');
                      if ( !empty($terms)):
                  ?>
                    <div class="voice-card__category"><?php echo esc_html($terms[0]->name); ?></div>
                  <?php endif; ?>
                  </div>
                  <!-- /.voice-card__meta -->
                  <h3 class="voice-card__title"><?php the_title(); ?></h3>
                </div>
                <!-- /.voice-card__heading -->
                <figure class="voice-card__image">
                  <div class="color-box js-color-box">
                    <picture>
                    <?php if (has_post_thumbnail()): ?>
                      <?php the_post_thumbnail('full'); ?>
                    <?php else: ?>
                      <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/no-image.png" alt="no image" width="180" height="140" loading="lazy">
                    <?php endif; ?>
                    </picture>
                  </div>
                  <!-- /.color-box -->
                </figure>
                <!-- /.voice-card__image -->
              </div>
              <!-- /.voice-card__upper -->
              <p class="voice-card__text">
                <?php the_content(); ?>
              </p>
            </div>
            <!-- /.voice-card__inner -->
          </article>
          <!-- /.voice-cards__item .voice-card -->
        <?php endwhile;
          wp_reset_postdata();
            endif;
        ?>
        </div>
        <!-- /.voice__cards -->
        <div class="voice__button">
          <a href="<?php echo esc_url( home_url( '/voice/' )); ?>" class="button">
            <span>view more</span>
            <span></span>
          </a>
        </div>
      </div>
      <!-- /.voice__inner .inner -->
    </section>
    <!-- /.voice -->

    <section class="price layout-price">
      <div class="price__inner inner">
        <div class="price__header section-header">
          <p class="section-header__title">price</p>
          <h2 class="section-header__subtitle">料金一覧</h2>
        </div>
        <!-- /.section-header -->
        <div class="price__body">
          <div class="price__image">
            <div class="color-box js-color-box">
              <picture>
                <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/top-price-sp.webp" type="image/webp" width="345" height="227">
                <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/top-price-sp.png" type="image/png" width="345" height="227">
                <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/Coral-reef-and-school-of-red-fish.webp" type="image/webp" width="492" height="746">
                <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/Coral-reef-and-school-of-red-fish.png" alt="サンゴ礁と赤い魚の群れ" width="492" height="746" loading="lazy">
              </picture>
            </div>
            <!-- /.color-box -->
          </div>
          <!-- /.price__image -->
          <div class="price__content">
          <!-- Smart Custom Fieldsで実装 -->
          <?php 
            $price_slug = get_page_by_path('price');
            $price_id = $price_slug->ID;
            
            $data = [
              'license' => SCF::get('license', $price_id),
              'experience' => SCF::get('experience', $price_id),
              'fun' => SCF::get('fun', $price_id),
              'special' => SCF::get('special', $price_id)
            ];

            $labels = [
              'license' => 'ライセンス講習',
              'experience' => '体験ダイビング',
              'fun' => 'ファンダイビング',
              'special' => 'スペシャルダイビング'
            ];

            $courses = [
              'license' => ['course1', 'price1'],
              'experience' => ['course2', 'price2'],
              'fun' => ['course3', 'price3'],
              'special' => ['course4', 'price4']
            ];
            
            foreach ($data as $key => $items):
              if ( !empty($items)):
          ?>
            <dl class="price__menu price-menu">
              <dt class="price-menu__title"><?php echo esc_html($labels[$key]); ?></dt>
              <?php foreach ($items as $item): ?>
              <div class="price-menu__course">
                <dt><?php echo esc_html($item[$courses[$key][0]]); ?></dt>
                <dd><?php echo esc_html($item[$courses[$key][1]]); ?></dd>
              </div>
              <?php endforeach; ?>
            </dl>
          <?php endif; endforeach; ?>
          </div>
          <!-- /.price__content -->
        </div>
        <!-- /.price__body -->
        <div class="price__button">
          <a href="<?php echo esc_url( home_url( '/price/' )); ?>" class="button">
            <span>view more</span>
            <span></span>
          </a>
        </div>
      </div>
      <!-- /.price__inner .inner -->
    </section>
    <!-- /.price -->

<?php get_footer(); ?>