
<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="./asset/"
  data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>お弁当注文サイ</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./asset/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="./asset/vendor/fonts/materialdesignicons.css" />
    <link rel="stylesheet" href="./asset/vendor/fonts/fontawesome.css" />
    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="./asset/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="./asset/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./asset/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./asset/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="./asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="./asset/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="./asset/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
    <link rel="stylesheet" href="./asset/vendor/libs/toastr/toastr.css" />
    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="./asset/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="./asset/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="./asset/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="./asset/js/config.js"></script>
  </head>

  <style>
    .app-brand-logo img {
      width: 30%;
      margin-left: 90px
    }
    @media only screen and (max-width: 768px) {
        .app-brand-logo img {
            margin-left: 60px
        }
    }
  </style>
  <body>
    <!-- Content -->

    <div class="position-relative">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Login -->
          <div class="card p-2">
            <!-- Logo -->
            <div class="app-brand justify-content-center mt-5">
              <a href="/" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                    <img src="./assets/img/logo.png" alt="">
                </span>
              </a>
            </div>
            <!-- /Logo -->

            <div class="card-body mt-2">
              {{-- <form id="formAuthentication" class="mb-3" action="{{ route('verifyMailSend') }}"> --}}
                <div class="form-floating form-floating-outline mb-3">
                  <p>メールアドレスに確認メールを送信しました。</p>
                  <p>送信した確認メールで新規登録を進めてください。</p>
                </div>
                <div class="mb-3">
                  <a class="btn btn-primary d-grid w-100" href="{{route('_verifyMailSend')}}">メール再送信</a>
                </div>
              {{-- </form> --}}
            </div>
          </div>
          <!-- /Login -->
        </div>
      </div>
    </div>

    <!-- / Content -->
    </body>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="./asset/vendor/libs/jquery/jquery.js"></script>
    <script src="./asset/vendor/libs/popper/popper.js"></script>
    <script src="./asset/vendor/js/bootstrap.js"></script>
    <script src="./asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="./asset/vendor/libs/node-waves/node-waves.js"></script>

    <script src="./asset/vendor/libs/hammer/hammer.js"></script>
    <script src="./asset/vendor/libs/i18n/i18n.js"></script>
    <script src="./asset/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="./asset/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="./asset/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="./asset/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="./asset/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="./asset/vendor/libs/toastr/toastr.js"></script>
    
    <!-- Main JS -->
    <script src="./asset/js/main.js"></script>

    <!-- Page JS -->
    <script src="./asset/js/pages-auth.js"></script>
  
    @if(session('error'))
    <script>
        $(document).ready(function () {
            toastr.error('{{ session('error') }}');
        });
    </script>
    @endif
</html>
