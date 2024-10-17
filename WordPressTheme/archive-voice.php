<?php get_header(); ?>

  <main>
    <!-- 下層ページのメインビュー -->
    <div class="sub-mv js-mv">
      <div class="sub-mv__image">
        <picture>
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-voice-sp.webp" type="image/webp" width="375" height="460">
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-voice-sp.png" type="image/png" width="375" height="460">
          <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-voice-pc.webp" type="image/webp" width="1440" height="548">
          <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-voice-pc.png" alt="上空から見たダイバーたち" width="1440" height="548" loading="eager">
        </picture>
      </div>
      <div class="sub-mv__content">
        <h1 class="sub-mv__title">voice</h1>
      </div>
    </div>

    <!-- パンくず -->
    <?php get_template_part('parts/breadcrumb'); ?>

    <section class="archive-voice layout-archive-voice fish">
      <div class="archive-voice__inner inner">
        <div class="archive-voice__category-list category-list">
          <ul class="category-list__items">
            <li class="category-list__item">
              <a href="<?php echo esc_url( home_url( '/voice/' )); ?>" class="js-category <?php if (is_post_type_archive('voice')) echo 'is-active'; ?>">all</a>
            </li>
          <?php 
            // 現在のタームを取得
            $current_term_id = get_queried_object_id();

            // タクソノミー'voice-category'のタームを取得
            $terms = get_terms([
              'taxonomy' => 'voice-category',
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
        <!-- /.archive-voice__category-list .category-list -->
        <div class="archive-voice__cards voice-cards">
        <?php
          if (have_posts()):
            while (have_posts()):
              the_post();
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
                  <h2 class="voice-card__title"><?php the_title(); ?></h2>
                </div>
                <figure class="voice-card__image">
                  <picture>
                  <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('full'); ?>
                  <?php else: ?>
                    <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/no-image.png" alt="no image" width="180" height="140" loading="lazy">
                  <?php endif; ?>
                  </picture>
                </figure>
              </div>
              <p class="voice-card__text">
                <?php the_content(); ?>
              </p>
            </div>
          </article>
          <!-- /.voice-cards__item .voice-card -->
        <?php endwhile; endif; ?>
        </div>
        <!-- /.archive-voice__cards .voice-cards -->
        <div class="archive-voice__page-navigation">
          <?php if (function_exists('wp_pagenavi')) {
            wp_pagenavi();
          } ?>
        </div>
        <!-- /.archive-voice__page-navigation -->
      </div>
      <!-- /.archive-voice__inner .inner -->
    </section>
    <!-- /.archive-voice -->

<?php get_footer(); ?>