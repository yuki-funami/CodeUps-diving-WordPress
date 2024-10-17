          <div class="archive-blog__side side">
            <section class="side__blog side-blog">
              <div class="side-blog__inner inner">
                <div class="side-blog__header side-section-header">
                  <h2 class="side-section-header__title">人気記事</h2>
                </div>
                <div class="side-blog__cards side-blog-cards">
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
                  <a href="<?php the_permalink(); ?>" class="side-blog-cards__item side-blog-card">
                    <div class="side-blog-card__inner">
                      <figure class="side-blog-card__image">
                        <picture>
                        <?php if (has_post_thumbnail()): ?>
                          <?php the_post_thumbnail('full'); ?>
                        <?php else: ?>
                          <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/no-image.png" alt="no image" width="121" height="90" loading="lazy">
                        <?php endif; ?>
                        </picture>
                      </figure>
                      <div class="side-blog-card__content">
                        <time datetime="<?php the_time('C'); ?>" class="side-blog-card__time"><?php the_time('Y.m/d'); ?></time>
                        <h3 class="side-blog-card__title"><?php the_title(); ?></h3>
                      </div>
                    </div>
                  </a>
                <?php endwhile;
                  wp_reset_postdata();
                    endif;
                ?>
                </div>
                <!-- /.side-blog__cards .side-blog-cards -->
              </div>
              <!-- /.side-blog__inner .inner -->
            </section>
            <!-- /.side__blog .side-blog -->

            <section class="side__voice side-voice">
              <div class="side-voice__inner inner">
                <div class="side-voice__header side-section-header">
                  <h2 class="side-section-header__title">口コミ</h2>
                </div>
              <?php 
                $args = [
                  'post_type' => 'voice', // 投稿タイプのスラッグ
                  'posts_per_page' => 1, // 表示件数
                  'no_found_rows' => true, // ページングを無効化
                  'orderby' => 'rand', // ランダムで並び替え
                ];

                $the_query = new WP_Query($args);
                if ($the_query->have_posts()):
                  while ($the_query->have_posts()):
                    $the_query->the_post();
              ?>
                <div class="side-voice__card side-voice-card">
                  <figure class="side-voice-card__image">
                    <picture>
                    <?php if (has_post_thumbnail()): ?>
                      <?php the_post_thumbnail('full'); ?>
                    <?php else: ?>
                      <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/no-image.png" alt="no image" width="294" height="218" loading="lazy">
                    <?php endif; ?>
                    </picture>
                  </figure>
                  <div class="side-voice-card__content">
                  <?php $age = get_field('age'); ?>
                    <div class="side-voice-card__gender"><?php echo esc_html($age); ?></div>
                    <h3 class="side-voice-card__title"><?php the_title(); ?></h3>
                  </div>
                </div>
                <!-- /.side-voice__card .side-voice-card -->
              <?php endwhile;
                wp_reset_postdata();
                  endif;
              ?>
                <div class="side-voice__button">
                  <a href="<?php echo esc_url( home_url( '/voice/' )); ?>" class="button">
                    <span>view more</span>
                    <span></span>
                  </a>
                </div>
              </div>
              <!-- /.side-voice__inner .inner -->
            </section>
            <!-- /.side__voice .side-voice -->

            <section class="side__campaign side-campaign">
              <div class="side-campaign__inner inner">
                <div class="side-campaign__header side-section-header">
                  <h2 class="side-section-header__title">キャンペーン</h2>
                </div>
                <div class="side-campaign__cards side-campaign-cards">
                <?php 
                  $args = [
                    'post_type' => 'campaign', // 投稿タイプのスラッグ
                    'posts_per_page' => 2, // 表示件数
                    'no_found_rows' => true, // ページングを無効化
                    'orderby' => 'rand', // ランダムで並び替え
                  ];

                  $the_query = new WP_Query($args);
                  if ($the_query->have_posts()):
                    while ($the_query->have_posts()):
                      $the_query->the_post();
                ?>
                  <div class="side-campaign-cards__item campaign-card">
                    <figure class="campaign-card__image campaign-card__image--side">
                      <picture>
                      <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('full'); ?>
                      <?php else: ?>
                        <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/no-image.png" alt="no image" width="294" height="188" loading="lazy">
                      <?php endif; ?>
                      </picture>
                    </figure>
                    <div class="campaign-card__content campaign-card__content--side">
                      <div class="campaign-card__title campaign-card__title--side"><?php the_title(); ?></div>
                      <p class="campaign-card__text campaign-card__text--side">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price campaign-card__price--side">
                      <?php
                        $original_price = get_field('original_price');
                        $discount_price = get_field('discount_price');
                      ?>
                        <p class="campaign-card__original-price campaign-card__original-price--side">
                          &yen;<?php echo number_format( esc_html($original_price)); ?>
                        </p>
                        <p class="campaign-card__discount-price campaign-card__discount-price--side">
                          &yen;<?php echo number_format( esc_html($discount_price)); ?>
                        </p>
                      </div>
                    </div>
                  </div>
                  <!-- /.side-campaign-cards__item .campaign-card -->
                <?php endwhile;
                  wp_reset_postdata();
                    endif;
                ?>
                </div>
                <!-- /.side-campaign__cards .side-campaign-cards -->
                <div class="side-campaign-card__button">
                  <a href="<?php echo esc_url( home_url( '/campaign/' )); ?>" class="button">
                    <span>view more</span>
                    <span></span>
                  </a>
                </div>
              </div>
              <!-- /.side-campaign__inner .inner -->
            </section>
            <!-- /.side__campaign .side-campaign -->

            <section class="side__archive side-archive">
              <div class="side-archive__inner inner">
                <div class="side-archive__header side-section-header">
                  <h2 class="side-section-header__title">アーカイブ</h2>
                </div>
                <ul class="side-archive__list side-archive-list">
                <?php 
                  $blog_by_year = [];

                  $args = [
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                    'no_found_rows' => true,
                  ];

                  $the_query = new WP_Query($args);
                  if ($the_query->have_posts()):
                    while ($the_query->have_posts()):
                      $the_query->the_post();
                        $year = get_the_date('Y');
                        $month = get_the_date('n');
                        $blog_by_year[$year][$month][] = $post;

                  endwhile;
                    wp_reset_postdata();
                      endif;
                ?>
                <?php foreach ($blog_by_year as $year => $blog_by_month): ?>
                  <li class="side-archive-list__year"><?php echo esc_html($year); ?>
                    <ul class="side-archive-list__child">
                    <?php foreach ($blog_by_month as $month => $blogs): ?>
                      <li class="side-archive-list__month">
                        <a href="<?php echo esc_url( get_month_link($year, $month)); ?>">
                          <?php echo esc_html($month); ?>月
                        </a>
                      </li>
                    <?php endforeach; ?>
                    </ul>
                  </li>
                <?php endforeach; ?>
                </ul>
                <!-- /.side-archive__list .side-archive-list -->
              </div>
              <!-- /.side-archive__inner .inner -->
            </section>
            <!-- /.side__archive .side-archive -->

          </div>
          <!-- /.archive-blog__side .side -->