<?php get_header(); ?>

  <main>
    <!-- 下層ページのメインビュー -->
    <div class="sub-mv js-mv">
      <div class="sub-mv__image">
        <picture>
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-blog-sp.webp" type="image/webp" width="375" height="460">
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-blog-sp.png" type="image/png" width="375" height="460">
          <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-blog-pc.webp" type="image/webp" width="1440" height="548">
          <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-blog-pc.png" alt="水面近くの魚群" width="1440" height="548" loading="eager">
        </picture>
      </div>
      <div class="sub-mv__content">
        <h1 class="sub-mv__title">blog</h1>
      </div>
    </div>

    <!-- パンくず -->
    <?php get_template_part('parts/breadcrumb'); ?>

    <section class="archive-blog layout-archive-blog fish fish--blog">
      <div class="archive-blog__inner inner">
        <div class="archive-blog__body">
          <div class="archive-blog__main">
            <?php if (have_posts()): ?>
            <div class="archive-blog__cards blog-cards blog-cards--archive">
              <?php while (have_posts()): the_post(); ?>
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
                    <p class="blog-card__text"><?php echo esc_html( wp_trim_words(get_the_content(), 85, '…')); ?></p>
                  </div>
                </div>
              </a>
              <?php endwhile; ?>
            </div>
            <!-- /.archive-blog__cards .blog-cards .blog-cards--archive -->
            <div class="archive-blog__page-navigation">
              <?php if (function_exists('wp_pagenavi')) {
                wp_pagenavi();
              } ?>
            </div>
            <!-- /.archive-blog__page-navigation -->
            <?php endif; ?>
          </div>
          <!-- /.archive-blog__main -->
          
          <div class="archive-blog__side">
            <?php get_sidebar(); ?>
          </div>
          <!-- /.archive-blog__side -->

        </div>
        <!-- /.archive-blog__body -->
      </div>
      <!-- /.archive-blog__inner .inner -->
    </section>
    <!-- /.archive-blog -->

<?php get_footer(); ?>