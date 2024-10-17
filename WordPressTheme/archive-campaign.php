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
              <a href="<?php echo esc_url( get_term_link($term)); ?>" class="js-category <?php echo $active_class; ?>">
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
          <article class="archive-campaign-cards__card campaign-card">
            <figure class="campaign-card__image campaign-card__image--archive">
              <picture>
              <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('full'); ?>
              <?php else: ?>
                <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/no-image.png" alt="no image" width="520" height="347" loading="lazy">
              <?php endif; ?>
              </picture>
            </figure>
            <div class="campaign-card__content campaign-card__content--archive">
            <?php 
              $terms = get_the_terms($post->ID, 'campaign-category');
                if ( !empty($terms)):
            ?>
              <div class="campaign-card__category"><?php echo esc_html($terms[0]->name); ?></div>
            <?php endif; ?>
              <h2 class="campaign-card__title campaign-card__title--archive"><?php the_title(); ?></h2>
              <p class="campaign-card__text campaign-card__text--archive">全部コミコミ(お一人様)</p>
              <div class="campaign-card__price campaign-card__price--archive">
              <?php
                $original_price = get_field('original_price');
                $discount_price = get_field('discount_price');
                $start_date = get_field('start_date');
                $end_date = get_field('end_date');
              ?>
                <p class="campaign-card__original-price">
                  &yen;<?php echo number_format( esc_html($original_price)); ?>
                </p>
                <p class="campaign-card__discount-price campaign-card__discount-price--archive">
                  &yen;<?php echo number_format( esc_html($discount_price)); ?>
                </p>
              </div>
              <div class="campaign-card__archive u-desktop">
                <p class="campaign-card__archive-text">
                  <?php the_content(); ?>
                </p>
                <p class="campaign-card__archive-date">
                  <?php echo esc_html($start_date.'-'.$end_date); ?>
                </p>
                <a href="<?php echo esc_url( home_url( '/contact/' )); ?>" class="campaign-card__archive-link">ご予約・お問い合わせはコチラ</a>
                <div class="campaign-card__archive-button">
                  <a href="<?php echo esc_url( home_url( '/contact/' )); ?>" class="button">
                    <span>contact us</span>
                    <span></span>
                  </a>
                </div>
              </div>
            </div>
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