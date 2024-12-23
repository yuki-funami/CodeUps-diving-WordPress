          <aside class="side">
            <?php 
              $args = [
                'post_type' => 'post', // 投稿タイプのスラッグ(通常投稿なので 'post')
                'posts_per_page' => 3, // 表示件数
                'orderby' => 'meta_value_num', // カスタムフィールドの値で並び替え
                'meta_key' => 'post_views_count', // カスタムフィールドに閲覧数を指定
              ];

              $the_query = new WP_Query($args);
              if ($the_query->have_posts()):
            ?>
            <section class="side__blog side-blog">
              <div class="side-blog__inner inner">
                <div class="side-blog__header side-section-header">
                  <h2 class="side-section-header__title">人気記事</h2>
                </div>
                <div class="side-blog__cards side-blog-cards">
                  <?php 
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
                  <?php endwhile; ?>
                </div>
                <!-- /.side-blog__cards .side-blog-cards -->
              </div>
              <!-- /.side-blog__inner .inner -->
            </section>
            <!-- /.side__blog .side-blog -->
            <?php 
              wp_reset_postdata();
                endif;
            ?>

            <?php 
              $args = [
                'post_type' => 'voice', // 投稿タイプのスラッグ
                'posts_per_page' => 1, // 表示件数
              ];

              $the_query = new WP_Query($args);
              if ($the_query->have_posts()):
            ?>
            <section class="side__voice side-voice">
              <div class="side-voice__inner inner">
                <div class="side-voice__header side-section-header">
                  <h2 class="side-section-header__title">口コミ</h2>
                </div>
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
                  $voice_upper_image = get_field_value($voice_upper, 'voice_upper_image');
                ?>
                <div class="side-voice__card side-voice-card">
                  <figure class="side-voice-card__image">
                    <picture>
                      <?php if ($voice_upper_image): ?>
                      <img src="<?php echo esc_url($voice_upper_image['url']); ?>" alt="<?php echo esc_attr($voice_upper_image['alt']); ?>" width="180" height="140" loading="lazy">
                      <?php else: ?>
                      <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/no-image.png" alt="no image" width="180" height="140" loading="lazy">
                      <?php endif; ?>
                    </picture>
                  </figure>
                  <div class="side-voice-card__content">
                    <?php if ($voice_upper_age): ?>
                    <div class="side-voice-card__gender">
                      <?php echo esc_html($voice_upper_age); ?>
                    </div>
                    <?php endif; ?>
                    <h3 class="side-voice-card__title"><?php the_title(); ?></h3>
                  </div>
                </div>
                <!-- /.side-voice__card .side-voice-card -->
                <?php endwhile; ?>
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
            <?php 
              wp_reset_postdata();
                endif;
            ?>

            <?php 
              $args = [
                'post_type' => 'campaign', // 投稿タイプのスラッグ
                'posts_per_page' => 2, // 表示件数
              ];

              $the_query = new WP_Query($args);
              if ($the_query->have_posts()):
            ?>
            <section class="side__campaign side-campaign">
              <div class="side-campaign__inner inner">
                <div class="side-campaign__header side-section-header">
                  <h2 class="side-section-header__title">キャンペーン</h2>
                </div>
                <div class="side-campaign__cards side-campaign-cards">
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

                    // 'campaign_price' フィールドを取得
                    $campaign_price = get_field('campaign_price');
                    
                    // 'campaign_price' フィールドの各データを取得
                    $campaign_price_before = get_field_value($campaign_price, 'campaign_price_before');
                    $campaign_price_after = get_field_value($campaign_price, 'campaign_price_after');
                  ?>
                  <div class="side-campaign-cards__item campaign-card campaign-card--side">
                    <figure class="campaign-card__image campaign-card__image--side">
                      <picture>
                        <?php if ($campaign_image): ?>
                        <img src="<?php echo esc_url($campaign_image['url']); ?>" alt="<?php echo esc_attr($campaign_image['alt']); ?>" width="520" height="347" loading="lazy">
                        <?php else: ?>
                        <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/no-image.png" alt="no image" width="520" height="347" loading="lazy">
                        <?php endif; ?>
                      </picture>
                    </figure>
                    <div class="campaign-card__content campaign-card__content--side">
                      <div class="campaign-card__title campaign-card__title--side"><?php the_title(); ?></div>
                      <?php if ($campaign_price): ?>
                      <div class="campaign-card__price-container campaign-card__price-container--side">
                        <p class="campaign-card__package campaign-card__package--side">全部コミコミ(お一人様)</p>
                        <div class="campaign-card__price campaign-card__price--side">
                          <?php if ($campaign_price_before): ?>
                          <p class="campaign-card__original-price campaign-card__original-price--side">
                            &yen;<?php echo number_format( esc_html($campaign_price_before)); ?>
                          </p>
                          <?php endif; ?>
                          <?php if ($campaign_price_after): ?>
                          <p class="campaign-card__discount-price campaign-card__discount-price--side">
                            &yen;<?php echo number_format( esc_html($campaign_price_after)); ?>
                          </p>
                          <?php endif; ?>
                        </div>
                      </div>
                      <?php endif; ?>
                    </div>
                    <!-- /.campaign-card__content .campaign-card__content--side -->
                  </div>
                  <!-- /.side-campaign-cards__item .campaign-card .campaign-card--side -->
                  <?php endwhile; ?>
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
            <?php 
              wp_reset_postdata();
                endif;
            ?>

            <?php 
              $blog_by_year = [];

              $args = [
                'post_type' => 'post',
                'posts_per_page' => -1,
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
            <?php if ( !empty($blog_by_year)): ?>
            <section class="side__archive side-archive">
              <div class="side-archive__inner inner">
                <div class="side-archive__header side-section-header">
                  <h2 class="side-section-header__title">アーカイブ</h2>
                </div>
                <ul class="side-archive__list side-archive-list">
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
            <?php endif; ?>

          </aside>
          <!-- /.archive-blog__side .side -->