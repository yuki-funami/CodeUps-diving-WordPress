<?php get_header(); ?>

  <main>
    <section class="not-found layout-not-found">
      <div class="not-found__inner inner">

        <!-- パンくず -->
        <?php get_template_part('parts/breadcrumb'); ?>
        
        <div class="not-found__content">
          <h1 class="not-found__title">404</h1>
          <p class="not-found__text">
            申し訳ありません。<br>
            お探しのページが見つかりません。
          </p>
          <div class="not-found__button">
            <a href="<?php echo esc_url( home_url( '/' )); ?>" class="button button--white">
              <span>page TOP</span>
              <span></span>
            </a>
          </div>
        </div>
      </div>
      <!-- /.not-found__inner .inner -->
    </section>
    <!-- /.not-found -->

<?php get_footer(); ?>