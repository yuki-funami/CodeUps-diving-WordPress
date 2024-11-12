'use strict';

jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる

  /*==========================
  # loading-animation
  ==========================*/
  var webStorage = function webStorage() {
    if (sessionStorage.getItem('access')) {
      // 2回目以降アクセス時の処理
      $('.loader').addClass('is-none');
    } else {
      // 初回アクセス時の処理
      sessionStorage.setItem('access', 'true'); //sessionStorageにデータを保存

      $(window).on('load', function () {
        $('.loader__title-wrap').fadeIn(1500);
        $('.loader__title-wrap').delay(1500).fadeOut(300);
        setTimeout(function () {
          $('.loader__left-image').addClass('is-active');
          $('.loader__right-image').addClass('is-active');
        }, 2800);
        $('.loader__title-wrap').queue(function () {
          $(this).addClass('is-loaded').dequeue();
          $('.loader__title-wrap').fadeIn(1200);
        });
        $('.loader').delay(6000).fadeOut('slow', function () {
          $('body').removeClass('no-scroll');
          $('.loader__left-image').removeClass('is-active');
          $('.loader__right-image').removeClass('is-active');
        });
        $('body').addClass('no-scroll');
      });
    }
  };
  webStorage();

  /*==========================
  # hamburger
  ==========================*/
  $('.js-hamburger').on('click', function () {
    var scrollPosition = window.scrollY || window.pageYOffset;
    $('body').toggleClass('is-fixed');
    $('.header').toggleClass('is-open');
    if ($('body').hasClass('is-fixed')) {
      $('body').css('top', '-' + scrollPosition + 'px');
    } else {
      var scrollPos = parseInt($('body').css('top'));
      $('body').css('top', '');
      window.scrollTo(0, -scrollPos);
    }
    return false;
  });

  // spからpcに画面幅が切り替わった際に、sp-navを閉じる
  $(window).resize(function () {
    var windowWidth = $(window).width();
    var pointWidth = 767;
    if (pointWidth < windowWidth) {
      $('body').removeClass('is-fixed');
      $('.header').removeClass('is-open');
    }
    return false;
  });

  /*==========================
  # swiper
  ==========================*/
  // mv
  new Swiper('.js-mv-swiper', {
    loop: true,
    loopedSlides: 3,
    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },
    speed: 2000,
    autoplay: {
      delay: 10000,
      disableOnInteraction: false,
      waitForTransition: false
    }
  });

  // campaign
  new Swiper('.js-campaign-swiper', {
    loop: true,
    slidesPerView: 'auto',
    speed: 700,
    spaceBetween: 24,
    autoplay: {
      delay: 6000,
      disableOnInteraction: false,
      waitForTransition: false
    },
    navigation: {
      prevEl: '.js-campaign-button-prev',
      nextEl: '.js-campaign-button-next'
    },
    breakpoints: {
      768: {
        spaceBetween: 40
      }
    }
  });

  /*==========================
  # to-top
  ==========================*/
  // ページトップボタン
  var toTop = $('.js-to-top');
  var mvHeight = $('.js-mv').innerHeight();
  toTop.hide();
  $(window).scroll(function () {
    if ($(this).scrollTop() > mvHeight) {
      toTop.fadeIn();
    } else {
      toTop.fadeOut();
    }
  });
  toTop.click(function () {
    var speed = 350;
    var easing = 'swing';
    $('body, html').animate({
      scrollTop: 0
    }, speed, easing);
    return false;
  });

  // フッター手前でストップ
  $(window).on('scroll', function () {
    var scrollHeight = $(document).height();
    var scrollPosition = $(window).height() + $(window).scrollTop();
    var footerHeight = $('.footer').innerHeight();
    if (scrollHeight - scrollPosition <= footerHeight) {
      toTop.addClass('is-active');
    } else {
      toTop.removeClass('is-active');
    }
    return false;
  });

  /*==========================
  # color-box
  ==========================*/
  //.js-color-boxの付いた全ての要素に対して下記の処理を行う
  $('.js-color-box').each(function () {
    $(this).append('<div class="color"></div>');
    var color = $(this).find($('.color'));
    var image = $(this).find('img');
    var speed = 700;
    var counter = 0;
    image.css('opacity', '0');
    color.css('width', '0%');

    //inviewを使って背景色が画面に現れたら処理をする
    color.on('inview', function () {
      if (counter == 0) {
        $(this).delay(200).animate({
          'width': '100%'
        }, speed, function () {
          image.css('opacity', '1');
          $(this).css({
            'left': '0',
            'right': 'auto'
          });
          $(this).animate({
            'width': '0%'
          }, speed);
        });
        counter = 1;
      }
    });
  });

  /*==========================
  # modal
  ==========================*/
  var modalBackground = $('.modal-background');
  var bodyOffsetY;
  // モーダル表示
  $('.js-modal picture img').on('click', function () {
    bodyOffsetY = $(window).scrollTop();
    modalBackground.html($(this).prop('outerHTML')); // 画像の HTML(<img>タグ全体)を、modal__background内にコピー
    modalBackground.fadeIn(200);
    $('body').css('top', -bodyOffsetY + 'px'); // top に現在のスクロール量を指定
    $('body').addClass('is-scroll-lock'); // body を固定
    return false;
  });

  // モーダル非表示
  modalBackground.on('click', function () {
    modalBackground.fadeOut(200);
    $('body').removeClass('is-scroll-lock'); // body の固定を解除
    $('body').removeAttr('style'); // top の指定を除去
    $(window).scrollTop(bodyOffsetY); // 元のスクロール位置に戻す
    return false;
  });

  /*==========================
  # tab
  ==========================*/
  /*
  タブをクリックした時の処理
  */
  $('.js-tab').on('click', function (e) {
    e.preventDefault(); // クリック時のデフォルト動作を防止

    var category = $(this).data('category'); // カテゴリー取得

    // カテゴリーに応じて表示を更新
    $('.page-information-card').hide();
    $('.js-tab').removeClass('is-active');
    $(this).addClass('is-active');
    $('.page-information-card[data-category="' + category + '"]').fadeIn('fast');

    // URLを更新
    var newUrl = window.location.pathname + '?category=' + category;
    history.pushState(null, null, newUrl);
  });

  /*
  ページロード時の処理
  */
  $(document).ready(function () {
    updateTabView();
  });

  /*
  戻るボタンをクリックした時の処理
  */
  $(window).on('popstate', function () {
    updateTabView();
  });
  function updateTabView() {
    // URLからcategoryパラメータを取得
    var urlParams = new URLSearchParams(window.location.search);
    var categoryParam = urlParams.get('category') || 'license'; // デフォルトは'license'

    // URLに応じて表示を更新
    $('.page-information-card').hide();
    $('.js-tab').removeClass('is-active');
    $('.page-information-card[data-category="' + categoryParam + '"]').show();
    $('.js-tab[data-category="' + categoryParam + '"]').addClass('is-active');
  }

  /*==========================
  # price
  ==========================*/
  $(document).ready(function () {
    // ページがロードされた際に、URLにハッシュ(例: #license)があればスクロール
    scrollToHash();

    // リンクをクリックした際にスクロール
    $('a[href*="#"]').on('click', function (e) {
      // href属性に '#' が含まれている全てのリンクを対象
      var hash = this.hash; // クリックしたリンクのハッシュを取得
      var currentPath = window.location.pathname; // 現在のページのパス(例: /sitemap )を取得
      var targetPath = new URL(this.href).pathname; // クリックされたリンクのURLからパス(例: /price )を取得

      // 同じページ内のリンクであれば、スムーズスクール
      if (currentPath === targetPath) {
        if (hash) {
          e.preventDefault(); // リンククリック動作をキャンセル
          scrollToHash(hash);
          history.pushState(null, null, hash); // ブラウザのハッシュを更新
        }
      }
    });

    // ブラウザの「戻る」や「進む」でハッシュが変更された場合にスクロール
    $(window).on('hashchange', function () {
      scrollToHash();
    });

    // ハッシュに対応するtableが存在すればスクロール
    function scrollToHash(hash) {
      var target = hash ? hash : window.location.hash;
      if ($(target).length) {
        var targetOffset = $(target).offset().top;
        var headerHeight = $('.header').innerHeight();
        var speed = 1;
        $('html, body').animate({
          scrollTop: targetOffset - (headerHeight + 20)
        }, speed);
      }
    }
  });

  /*==========================
  # sidebar
  ==========================*/
  $('.side-archive-list__year').on('click', function (e) {
    if ($(e.target).is('a')) {
      e.stopPropagation();
      return;
    }
    $(this).toggleClass('is-open');
    $(this).children('.side-archive-list__child').slideToggle();
  });
});

/* JavaScriptで記載 */
/*==========================
# accordion
==========================*/
document.addEventListener('DOMContentLoaded', function () {
  setUpAccordion();
});

/*
ブラウザの標準機能(Web Animations API)を使ってアコーディオンのアニメーションを制御
*/

function setUpAccordion() {
  var details = document.querySelectorAll('.js-details');
  var RUNNING_VALUE = 'running'; // アニメーション実行中のときに付与する予定のカスタムデータ属性の値

  details.forEach(function (element) {
    var summary = element.querySelector('.js-summary');
    var answer = element.querySelector('.js-answer');
    summary.addEventListener('click', function (e) {
      // デフォルトの挙動を無効化
      e.preventDefault();

      // 連打防止用。アニメーション中だったらクリックイベントを受け付けないでリターンする
      if (element.dataset.animStatus === RUNNING_VALUE) {
        return;
      }

      // detailsのopen属性を判定
      if (element.open) {
        // アコーディオンを閉じるときの処理

        // アイコン操作用クラスを切り替える(クラスを取り除く)
        element.classList.toggle('is-opened');
        // アニメーションを実行
        var closingAnim = answer.animate(closingAnimKeyframes(answer), animTiming);
        // アニメーション実行中用の値を付与
        element.dataset.animStatus = RUNNING_VALUE;

        // アニメーションの完了後に
        closingAnim.onfinish = function () {
          // open属性を取り除く
          element.removeAttribute('open');
          // アニメーション実行中用の値を取り除く
          element.dataset.animStatus = '';
        };
      } else {
        // アコーディオンを開くときの処理

        // open属性を付与
        element.setAttribute('open', 'true');
        // アイコン操作用クラスを切り替える(クラスを付与)
        element.classList.toggle('is-opened');
        // アニメーションを実行
        var openingAnim = answer.animate(openingAnimKeyframes(answer), animTiming);
        // アニメーション実行中用の値を入れる
        element.dataset.animStatus = RUNNING_VALUE;

        // アニメーション完了後にアニメーション実行中用の値を取り除く
        openingAnim.onfinish = function () {
          element.dataset.animStatus = '';
        };
      }
    });
  });
}

/*
アニメーションの時間とイージング
*/
var animTiming = {
  duration: 250,
  easing: 'ease-out'
};

/*
アコーディオンを閉じるときのキーフレーム
*/
function closingAnimKeyframes(answer) {
  return [{
    height: answer.offsetHeight + 'px',
    // height: 'auto'だとうまく計算されないため要素の高さを指定する
    opacity: 1
  }, {
    height: 0,
    opacity: 0
  }];
}

/*
アコーディオンを開くときのキーフレーム
*/
function openingAnimKeyframes(answer) {
  return [{
    height: 0,
    opacity: 0
  }, {
    height: answer.offsetHeight + 'px',
    opacity: 1
  }];
}