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

            // インデックスで配列を取得
            $sp_mv_values = array_values($sp_mv_group);
            $pc_mv_values = array_values($pc_mv_group);

            foreach ($sp_mv_values as $index => $sp_mv):
              // pc_mvのデータをインデックスで取得
              $pc_mv = $pc_mv_values[$index];

              // どちらかが空の場合はスキップ
              if (empty($sp_mv) || empty($pc_mv)) {
                continue;
              }
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
          <?php endforeach; ?>
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

    <?php 
      $args = [
        'post_type' => 'campaign', // 投稿タイプのスラッグ
        'posts_per_page' => -1, // 表示件数
      ];

      $the_query = new WP_Query($args);
      if ($the_query->have_posts()):
    ?>
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
              while ($the_query->have_posts()):
                $the_query->the_post();
            ?>
            <?php
              // カスタムフィールドからデータを取得し、存在しない場合にはデフォルト値を返す関数
              if ( !function_exists('get_field_value')) {
                function get_field_value($field_array, $key, $default = ''): mixed {
                  return isset($field_array[$key]) ? $field_array[$key] : $default;
                }
              }

              // 'campaign_image' フィールドを取得
              $campaign_image = get_field('campaign_image');

              // 'campaign_category' フィールドを取得
              $campaign_category = get_field('campaign_category');

              // 'campaign_price' フィールドを取得
              $campaign_price = get_field('campaign_price');
              
              // 'campaign_price' フィールドの各データを取得
              $campaign_price_before = get_field_value($campaign_price, 'campaign_price_before');
              $campaign_price_after = get_field_value($campaign_price, 'campaign_price_after');
            ?>
            <div class="swiper-slide">
              <div class="campaign__card campaign-card">
                <figure class="campaign-card__image">
                  <picture>
                    <?php if ($campaign_image): ?>
                    <img src="<?php echo esc_url($campaign_image['url']); ?>" alt="<?php echo esc_attr($campaign_image['alt']); ?>" width="520" height="347" loading="lazy">
                    <?php else: ?>
                    <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/no-image.png" alt="no image" width="520" height="347" loading="lazy">
                    <?php endif; ?>
                  </picture>
                </figure>
                <div class="campaign-card__content">
                  <?php if ($campaign_category): ?>
                  <div class="campaign-card__category"><?php echo esc_html($campaign_category->name); ?></div>
                  <?php endif; ?>
                  <div class="campaign-card__title"><?php the_title(); ?></div>
                  <?php if ($campaign_price): ?>
                  <div class="campaign-card__price-container">
                    <p class="campaign-card__package">全部コミコミ(お一人様)</p>
                    <div class="campaign-card__price">
                      <?php if ($campaign_price_before): ?>
                      <p class="campaign-card__original-price">
                        &yen;<?php echo number_format( esc_html($campaign_price_before)); ?>
                      </p>
                      <?php endif; ?>
                      <?php if ($campaign_price_after): ?>
                      <p class="campaign-card__discount-price">
                        &yen;<?php echo number_format( esc_html($campaign_price_after)); ?>
                      </p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <?php endif; ?>
                </div>
                <!-- /.campaign-card__content -->
              </div>
              <!-- /.campaign__card .campaign-card -->
            </div>
            <!-- /.swiper-slide -->
            <?php endwhile; ?>
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
    <?php 
      wp_reset_postdata();
        endif;
    ?>

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

    <?php 
      $args = [
        'post_type' => 'post', // 投稿タイプのスラッグ(通常投稿なので 'post')
        'posts_per_page' => 3, // 表示件数
      ];

      $the_query = new WP_Query($args);
      if ($the_query->have_posts()):
    ?>
    <section class="blog layout-blog">
      <div class="blog__inner inner">
        <div class="blog__header section-header">
          <p class="section-header__title section-header__title--white">blog</p>
          <h2 class="section-header__subtitle section-header__subtitle--white">ブログ</h2>
        </div>
        <!-- /.section-header -->
        <div class="blog__cards blog-cards">
          <?php 
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
                  <?php 
                    $content = mb_substr( strip_tags(get_the_content()), 0, 86);
                    echo esc_html($content);
                  ?>
                </p>
              </div>
            </div>
          </a>
          <?php endwhile; ?>
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
    <?php 
      wp_reset_postdata();
        endif;
    ?>

    <?php 
      $args = [
        'post_type' => 'voice', // 投稿タイプのスラッグ
        'posts_per_page' => 2, // 表示件数
      ];

      $the_query = new WP_Query($args);
      if ($the_query->have_posts()):
    ?>
    <section class="voice layout-voice">
      <div class="voice__inner inner">
        <div class="voice__header section-header">
          <p class="section-header__title">voice</p>
          <h2 class="section-header__subtitle">お客様の声</h2>
        </div>
        <!-- /.section-header -->
        <div class="voice__cards voice-cards">
          <?php 
            while ($the_query->have_posts()):
              $the_query->the_post();
          ?>
          <?php
            // カスタムフィールドからデータを取得し、存在しない場合にはデフォルト値を返す関数
            if ( !function_exists('get_field_value')) {
              function get_field_value($field_array, $key, $default = ''): mixed {
                return isset($field_array[$key]) ? $field_array[$key] : $default;
              }
            }

            // 'voice_upper' フィールドを取得
            $voice_upper = get_field('voice_upper');

            // 'voice_upper' フィールドの各データを取得
            $voice_upper_age = get_field_value($voice_upper, 'voice_upper_age');
            $voice_upper_category = get_field_value($voice_upper, 'voice_upper_category');
            $voice_upper_image = get_field_value($voice_upper, 'voice_upper_image');

            // 'voice_text' フィールドを取得
            $voice_text = get_field('voice_text');
          ?>
          <article class="voice-cards__item voice-card">
            <div class="voice-card__inner">
              <div class="voice-card__upper">
                <div class="voice-card__heading">
                  <?php if ($voice_upper_age || $voice_upper_category): ?>
                  <div class="voice-card__meta">
                    <?php if ($voice_upper_age): ?>
                    <div class="voice-card__gender">
                      <?php echo esc_html($voice_upper_age); ?>
                    </div>
                    <?php endif; ?>
                    <?php if ($voice_upper_category): ?>
                    <div class="voice-card__category">
                      <?php echo esc_html($voice_upper_category->name); ?>
                    </div>
                    <?php endif; ?>
                  </div>
                  <!-- /.voice-card__meta -->
                  <?php endif; ?>
                  <h3 class="voice-card__title"><?php the_title(); ?></h3>
                </div>
                <!-- /.voice-card__heading -->
                <figure class="voice-card__image">
                  <div class="color-box js-color-box">
                    <picture>
                      <?php if ($voice_upper_image): ?>
                      <img src="<?php echo esc_url($voice_upper_image['url']); ?>" alt="<?php echo esc_attr($voice_upper_image['alt']); ?>" width="180" height="140" loading="lazy">
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
              <?php if ($voice_text): ?>
              <p class="voice-card__text">
                <?php 
                  $content = mb_substr( strip_tags($voice_text, '<br>'), 0, 173);
                  echo nl2br( esc_textarea($content));
                ?>
              </p>
              <?php endif; ?>
            </div>
            <!-- /.voice-card__inner -->
          </article>
          <!-- /.voice-cards__item .voice-card -->
          <?php endwhile; ?>
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
    <?php 
      wp_reset_postdata();
        endif;
    ?>

    <?php 
      $price_slug = get_page_by_path('price');
      $price_id = $price_slug->ID;
      
      $data = [
        'license' => SCF::get('license', $price_id),
        'experience' => SCF::get('experience', $price_id),
        'fun' => SCF::get('fun', $price_id),
        'special' => SCF::get('special', $price_id)
      ];

      // すべてのカスタムフィールドが空かどうかを確認
      $has_content = false;
      foreach ($data as $items) {
        if ( !empty(array_filter($items))) {
          $has_content = true;
          break;
        }
      }

      if ($has_content):
    ?>
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
            ?>
            <dl class="price__menu price-menu">
              <dt class="price-menu__title"><?php echo esc_html($labels[$key]); ?></dt>
              <?php foreach ($items as $item): ?>
              <div class="price-menu__course">
                <dt><?php echo esc_html($item[$courses[$key][0]]); ?></dt>
                <dd><?php echo esc_html('¥' .number_format($item[$courses[$key][1]])); ?></dd>
              </div>
              <?php endforeach; ?>
            </dl>
            <?php endforeach; ?>
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
    <?php endif; ?>

<?php get_footer(); ?>