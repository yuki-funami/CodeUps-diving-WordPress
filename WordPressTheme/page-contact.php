<?php get_header(); ?>

  <main>
    <!-- 下層ページのメインビュー -->
    <div class="sub-mv js-mv">
      <div class="sub-mv__image">
        <picture>
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-contact-sp.webp" type="image/webp" width="375" height="460">
          <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-contact-sp.png" type="image/png" width="375" height="460">
          <source srcset="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-contact-pc.webp" type="image/webp" width="1440" height="548">
          <img src="<?php echo esc_url( get_theme_file_uri()); ?>/assets/images/common/head-contact-pc.png" alt="エメラルドグリーンの渚" width="1440" height="548" loading="eager">
        </picture>
      </div>
      <div class="sub-mv__content">
        <h1 class="sub-mv__title" id="formTitle">contact</h1>
      </div>
    </div>

    <!-- パンくず -->
    <?php get_template_part('parts/breadcrumb'); ?>

    <section class="page-contact layout-page-contact fish">
      <div class="page-contact__inner inner">
        <form action="" method="post" class="page-contact__form contact-form js-form" aria-labelledby="formTitle">
          <div class="contact-form__error">
            <p class="contact-form__error-message js-error"></p>
          </div>
          <dl class="contact-form__row">
            <dt>
              <label for="name">お名前<span>必須</span></label>
            </dt>
            <dd>
              <input type="text" name="name" id="name" autocomplete="name" placeholder="沖縄&emsp;太郎" enterkeyhint="done" required>
            </dd>
          </dl>
          <dl class="contact-form__row">
            <dt>
              <label for="email">メールアドレス<span>必須</span></label>
            </dt>
            <dd>
              <input type="email" name="email" id="email" autocomplete="email" pattern="[\w\-.]+@[\w\-.]+\.[A-Za-z]+" title="'@'を含んだメールアドレスの形式で入力してください" placeholder="aaa000@ggmail.com" enterkeyhint="done" required>
            </dd>
          </dl>
          <dl class="contact-form__row">
            <dt>
              <label for="tel">電話番号<span>必須</span></label>
            </dt>
            <dd>
              <input type="tel" name="tel" id="tel" autocomplete="tel" pattern="[\d\-]*" title="半角数字で入力してください" placeholder="000-0000-0000" required>
            </dd>
          </dl>
          <div class="contact-form__row contact-form__row--checkbox">
            <fieldset>
              <legend>お問合せ項目<span>必須</span></legend>
              <div class="contact-form__fieldset-content">
                <div class="contact-form__fieldset-item">
                  <label for="course">
                    <input type="checkbox" name="inquiries[]" id="course" value="ダイビング講習について">
                    <span>ダイビング講習について</span>
                  </label>
                </div>
                <div class="contact-form__fieldset-item">
                  <label for="fun">
                    <input type="checkbox" name="inquiries[]" id="fun" value="ファンダイビングについて">
                    <span>ファンダイビングについて</span>
                  </label>
                </div>
                <div class="contact-form__fieldset-item">
                  <label for="experience">
                    <input type="checkbox" name="inquiries[]" id="experience" value="体験ダイビングについて">
                    <span>体験ダイビングについて</span>
                  </label>
                </div>
              </div>
            </fieldset>
          </div>
          <dl class="contact-form__row contact-form__row--select">
            <dt>
              <label for="campaign">キャンペーン</label>
            </dt>
            <dd>
              <select name="campaign" id="campaign">
                <option value="choice">キャンペーン内容を選択</option>
                <option value="select1">キャンペーン1</option>
                <option value="select2">キャンペーン2</option>
                <option value="select3">キャンペーン3</option>
              </select>
            </dd>
          </dl>
          <dl class="contact-form__row contact-form__row--textarea">
            <dt>
              <label for="contents">お問合せ内容<span>必須</span></label>
            </dt>
            <dd>
              <textarea name="contents" id="contents" required></textarea>
            </dd>
          </dl>
          <div class="contact-form__privacy">
            <label for="privacy">
              <input type="checkbox" name="privacy-policy[]" id="privacy" value="個人情報の取り扱いに同意する" required>
              <span>個人情報の取り扱いについて同意のうえ送信します。</span>
            </label>
          </div>
          <div class="contact-form__submit">
            <button type="submit" class="button button--submit">
              <span>send</span>
              <span></span>
            </button>
          </div>
        </form>
      </div>
      <!-- /.page-contact__inner .inner -->
    </section>
    <!-- /.page-contact -->

<?php get_footer(); ?>