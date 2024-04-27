<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="" />
    <meta name="description"
      content="" />

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:title" content="お弁当注文サイト" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta property="og:locale" content="ja_JP">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/common/animate.css" />
    <link rel="stylesheet" href="./assets/css/common/slick-theme.min.css">
    <link rel="stylesheet" href="./assets/css/common/slick.min.css">
    <link rel="stylesheet" href="./assets/css/common/swiper.min.css">
    <link rel="stylesheet" href="./assets/css/common/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/style.css" />
     <!-- Icons -->
     <link rel="stylesheet" href="./asset/vendor/fonts/materialdesignicons.css" />
     <link rel="stylesheet" href="./asset/vendor/fonts/fontawesome.css" />
    <title>お弁当注文サイト</title>
  </head>
  <body>
    <header>
      <a href="/" class="logo">
        <img src="./assets/img/logo.png" alt="お弁当注文サイト">
     </a>
      <div class="right">
        <a href="{{route('login')}}" class="login-btn">ログイン</a>
        <a href="{{route('_verifyMailSend')}}" class="login-btn register-btn">会員登録</a>
      </div>
      <button id="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </header>
    <div id="nav-menu">
        <ul>
          <li>
            <a href="/">ホーム</a>
          </li>
  
          <li>
            <a href="{{route('term1')}}">利用規約</a>
          </li>
            <li>
            <a href="">プライバシーポリシー</a>
          </li>
          <li class="login-group">
            <a href="{{route('login')}}" class="book-now1">ログイン</a>
            <a href="{{route('_verifyMailSend')}}" class="book-now1 book-now11">会員登録</a>
          </li>
        </ul>
    </div>

    @yield('content')
    
    <footer>
      <div class="footer-logo">
        <a href="" class="logo-text">
          成田高等学校付属小学校<br>お弁当注文サイト
        </a>
      </div>
      <div class="footer-menu">
          <a href="/" class="menu-item">ホーム</a>
          <a href="{{route('term1')}}" class="menu-item">利用規約</a>
          <a href="" class="menu-item">プライバシーポリシー</a>
      </div>
    </footer>
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <script src="https://sdk.form.run/js/v2/embed.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <script src="https://kit.fontawesome.com/8cbdf0a85f.js" crossorigin="anonymous"></script>
    <script src="./assets/js/main.js"></script>
  </body>
</html>
