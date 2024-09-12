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
        <h2 class="sub-mv__title">blog</h2>
      </div>
    </div>

    <!-- パンくず -->
    <?php get_template_part('parts/breadcrumb'); ?>

    <section class="archive-blog layout-archive-blog fish">
      <div class="archive-blog__inner inner">
        <div class="archive-blog__body">
          <div class="archive-blog__main">
          <?php
            if (have_posts()):
              while (have_posts()):
                the_post();
          ?>
            <article class="archive-blog__article blog-article">
              <time datetime="<?php the_time('C'); ?>" class="blog-article__time"><?php the_time('Y.m/d'); ?></time>
              <div class="blog-article__title">
                <h1><?php the_title(); ?></h1>
              </div>
              <!-- アイキャッチ画像があれば表示する -->
              <?php if (has_post_thumbnail()): ?>
              <figure class="blog-article__thumbnail">
                <?php the_post_thumbnail('full'); ?>
              </figure>
              <?php endif; ?>
              <div class="blog-article__content">
                <?php the_content(); ?>
              </div>
            </article>
            <!-- /.single-blog__article .blog-article -->
            <div class="archive-blog__page-navigation archive-blog__page-navigation--single">
              <div class="wp-pagenavi wp-pagenavi--single">
              <?php 
                $prev = get_previous_post();
                $next = get_next_post();
              ?>
              <?php if ($prev): ?>
                <a class="previouspostslink" rel="prev" href="<?php echo esc_url( get_permalink($prev->ID)); ?>">&nbsp;</a>
              <?php endif; ?>
              <?php if ($next): ?>
                <a class="nextpostslink" rel="next" href="<?php echo esc_url( get_permalink($next->ID)); ?>">&nbsp;</a>
              <?php endif; ?>
              </div>
            </div>
            <!-- /.archive-blog__page-navigation -->
          <?php endwhile; endif; ?>
          </div>
          <!-- /.archive-blog__main -->
          
          <?php get_sidebar(); ?>

        </div>
        <!-- /.archive-blog__body -->
      </div>
      <!-- /.archive-blog__inner .inner -->
    </section>
    <!-- /.archive-blog -->

<?php get_footer(); ?>