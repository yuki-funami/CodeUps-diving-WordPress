<?php get_header(); ?>

  <main>
    <!-- 下層ページのメインビュー -->
    <div class="sub-mv js-mv">
      <div class="sub-mv__image">
        <picture>
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-price-sp.webp" type="image/webp" width="375" height="460">
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-price-sp.png" type="image/png" width="375" height="460">
          <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-price-pc.webp" type="image/webp" width="1440" height="548">
          <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-price-pc.png" alt="水面のダイバー" width="1440" height="548" loading="eager">
        </picture>
      </div>
      <div class="sub-mv__content">
        <h1 class="sub-mv__title">price</h1>
      </div>
    </div>

    <!-- パンくず -->
    <?php get_template_part('parts/breadcrumb'); ?>

    <section class="page-price layout-page-price fish">
      <div class="page-price__inner inner">
        <div class="page-price__content page-price-tables">
        <!-- Smart Custom Fieldsで実装 -->
        <?php 
          $data = [
            'license' => SCF::get('license'),
            'experience' => SCF::get('experience'),
            'fun' => SCF::get('fun'),
            'special' => SCF::get('special')
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
          <table class="page-price-tables__table page-price-table" id="<?php echo esc_attr($key); ?>" aria-label="<?php echo esc_html($labels[$key]).'の価格表'; ?>">
            <thead class="page-price-table__head">
              <tr>
                <th>
                  <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/svg/whale.svg" alt="CodeUps" width="24" height="24">
                  <p><?php echo esc_html($labels[$key]); ?></p>
                </th>
              </tr>
            </thead>
            <tbody class="page-price-table__body">
            <?php foreach ($items as $item): ?>
              <tr>
                <th><?php echo esc_html($item[$courses[$key][0]]); ?></th>
                <td><?php echo esc_html($item[$courses[$key][1]]); ?></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
          <!-- /.page-price-tables__table .page-price-table -->
        <?php endif; endforeach; ?>
        </div>
        <!-- /.page-price__content .page-price-tables -->
      </div>
      <!-- /.page-price__inner .inner -->
    </section>
    <!-- /.page-price -->

<?php get_footer(); ?>