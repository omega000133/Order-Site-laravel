<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:title" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta property="og:locale" content="ja_JP">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./asset/vendor/libs/toastr/toastr.css" />
    <link rel="stylesheet" href="./assets/css/common/animate.css" />
    <link rel="stylesheet" href="./assets/css/common/slick-theme.min.css">
    <link rel="stylesheet" href="./assets/css/common/slick.min.css">
    <link rel="stylesheet" href="./assets/css/style.css" />
    <script src="./asset/vendor/libs/jquery/jquery.js"></script>
    <title>お弁当注文サイト</title>
</head>

<body>
    <header>
        <div class="wrap">
            <div class="header-logo">
                <a href="/">
                    <img src="./assets/img/logo.png" alt="お弁当注文サイ">
                </a>
            </div>
            <div class="right">
                <a href="{{route('login')}}" class="login-btn">ログイン</a>
                <a href="{{route('_verifyMailSend')}}" class="login-btn register-btn">会員登録</a>
                <button id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>

    <nav id="menu">
        <ul class="nav-menu">
            <li>
                <a href="/" class="nav-home">ホーム</a>
            </li>
            <li>
                <a href="" class="nav-rule">会員規約</a>
            </li>
            <li>
                <a href="" class="nav-recruit">プライバシーポリシー</a>
            </li>
            <li class="nav-login">
                <a href="{{route('login')}}">ログイン</a>
            </li>
            <li class="nav-login nav-register">
                <a href="{{route('_verifyMailSend')}}">会員登録</a>
            </li>
        </ul>
    </nav>

    @yield('content')

    <footer>
        <div class="footer01">
            <div class="copy">
                copyright@xxx company
            </div>
            <div class="wrap">
               <div class="menu-part">
                  <a href="/" class="menu-item">ホーム</a>
                  <a href="" class="menu-item">会員規約</a>
                  <a href="" class="menu-item">プライバシーポリシー</a>
               </div>
            </div>
        </div>
    </footer>

    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./asset/vendor/libs/toastr/toastr.js"></script>
    <script src="./asset/js/ui-toasts.js"></script>
</body>

</html>
