<?php get_header(); ?>

  <main>
    <!-- 下層ページのメインビュー -->
    <div class="sub-mv js-mv">
      <div class="sub-mv__image">
        <picture>
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-campaign-sp.webp" type="image/webp" width="375" height="460">
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-campaign-sp.png" type="image/png" width="375" height="460">
          <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-campaign-pc.webp" type="image/webp" width="1440" height="548">
          <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-campaign-pc.png" alt="チョウハン" width="1440" height="548" loading="eager">
        </picture>
      </div>
      <div class="sub-mv__content">
        <h1 class="sub-mv__title">campaign</h1>
      </div>
    </div>

    <!-- パンくず -->
    <?php get_template_part('parts/breadcrumb'); ?>

    <section class="archive-campaign layout-archive-campaign fish">
      <div class="archive-campaign__inner inner">
        <div class="archive-campaign__category-list category-list">
          <ul class="category-list__items">
            <li class="category-list__item">
              <a href="<?php echo esc_url( home_url( '/campaign/' )); ?>" class="js-category <?php if (is_post_type_archive('campaign')) echo 'is-active'; ?>">all</a>
            </li>
          <?php 
            // 現在のタームを取得
            $current_term_id = get_queried_object_id();

            // タクソノミー'voice-category'のタームを取得
            $terms = get_terms([
              'taxonomy' => 'campaign-category',
              'orderby' => 'term_id', // タームID順に並び替え
              'order' => 'ASC', // 昇順
              'hide_empty' => false, // 投稿がないタームも表示する
            ]);

            if ( !empty($terms) && !is_wp_error($terms) ):
              foreach ($terms as $term):
                $active_class = ($current_term_id === $term->term_id) ? 'is-active' : '';
          ?>
            <li class="category-list__item">
              <a href="<?php echo esc_url( get_term_link($term)) ?>" class="js-category <?php echo $active_class; ?>">
                <?php echo esc_html($term->name); ?>
              </a>
            </li>
          <?php endforeach; endif; ?>
          </ul>
        </div>
        <!-- /.archive-campaign__category-list .category-list -->
        <div class="archive-campaign__cards archive-campaign-cards">
        <?php
          if (have_posts()):
            while (have_posts()):
              the_post();
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

          // 'campaign_text' フィールドを取得
          $campaign_text = get_field('campaign_text');

          // 'campaign_period' フィールドを取得
          $campaign_period = get_field('campaign_period');
        ?>
          <article class="archive-campaign-cards__card campaign-card">
            <figure class="campaign-card__image campaign-card__image--archive">
              <picture>
              <?php if ($campaign_image): ?>
                <img src="<?php echo esc_url($campaign_image['url']); ?>" alt="<?php echo esc_attr($campaign_image['alt']); ?>" width="520" height="347" loading="lazy">
              <?php else: ?>
                <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/no-image.png" alt="no image" width="520" height="347" loading="lazy">
              <?php endif; ?>
              </picture>
            </figure>
            <div class="campaign-card__content campaign-card__content--archive">
              <?php if ($campaign_category): ?>
              <div class="campaign-card__category"><?php echo esc_html($campaign_category->name); ?></div>
              <?php endif; ?>
              <h2 class="campaign-card__title campaign-card__title--archive"><?php the_title(); ?></h2>
              <p class="campaign-card__text campaign-card__text--archive">全部コミコミ(お一人様)</p>
              <?php if ($campaign_price): ?>
              <div class="campaign-card__price campaign-card__price--archive">
                <?php if ($campaign_price_before): ?>
                <p class="campaign-card__original-price">
                  &yen;<?php echo number_format( esc_html($campaign_price_before)); ?>
                </p>
                <?php endif; ?>
                <?php if ($campaign_price_after): ?>
                <p class="campaign-card__discount-price campaign-card__discount-price--archive">
                  &yen;<?php echo number_format( esc_html($campaign_price_after)); ?>
                </p>
                <?php endif; ?>
              </div>
              <?php endif; ?>
              <div class="campaign-card__archive u-desktop">
                <p class="campaign-card__archive-text">
                <?php if ($campaign_text): ?>
                  <?php echo nl2br( esc_textarea($campaign_text)); ?>
                <?php endif; ?>
                </p>
                <p class="campaign-card__archive-date">
                <?php if ($campaign_period): ?>
                  <?php echo esc_html($campaign_period); ?>
                <?php endif; ?>
                </p>
                <a href="<?php echo esc_url( home_url( '/contact/' )); ?>" class="campaign-card__archive-link">ご予約・お問い合わせはコチラ</a>
                <div class="campaign-card__archive-button">
                  <a href="<?php echo esc_url( home_url( '/contact/' )); ?>" class="button">
                    <span>contact us</span>
                    <span></span>
                  </a>
                </div>
              </div>
              <!-- /.campaign-card__archive -->
            </div>
            <!-- /.campaign-card__content .campaign-card__content--archive -->
          </article>
          <!-- /.archive-campaign-cards__card .campaign-card -->
        <?php endwhile; endif; ?>
        </div>
        <!-- /.archive-campaign__cards .archive-campaign-cards -->
        <div class="archive-campaign__page-navigation">
          <?php if (function_exists('wp_pagenavi')) {
            wp_pagenavi();
          } ?>
        </div>
        <!-- /.archive-campaign__page-navigation -->
      </div>
      <!-- /.archive-campaign__inner .inner -->
    </section>
    <!-- /.archive-campaign -->

<?php get_footer(); ?>