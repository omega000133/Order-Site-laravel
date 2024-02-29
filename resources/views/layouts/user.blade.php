<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="./asset/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>お弁当注文サイト</title>

    <meta name="description" content="" />
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./asset/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
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
    <link rel="stylesheet" href="./asset/vendor/libs/dropzone/dropzone.css" />
    <link rel="stylesheet" href="./asset/vendor/libs/toastr/toastr.css" />
    <link rel="stylesheet" href="./asset/vendor/libs/animate-css/animate.css" />

    <link rel="stylesheet" href="./asset/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="./asset/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="./asset/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="./asset/vendor/libs/swiper/swiper.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="./asset/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
    <!-- Page -->
    <link rel="stylesheet" href="./asset/vendor/css/pages/page-auth.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="./asset/vendor/css/pages/cards-statistics.css" />
    <link rel="stylesheet" href="./asset/vendor/css/pages/cards-analytics.css" />

    <!-- custom css -->
    <link rel="stylesheet" href="./asset/css/custom.css">

    <!-- Helpers -->
    <script src="./asset/vendor/js/helpers.js"></script>

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="./asset/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="./asset/js/config.js"></script>
    <script src="./asset/vendor/libs/jquery/jquery.js"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
           
            <!-- / Menu -->

            <div class="layout-page">
             
                @yield('content')

                <div class="layout-overlay layout-menu-toggle"></div>
                <div class="drag-target"></div>
            </div>
        </div>
    </div>
</body>

<!-- build:js assets/vendor/js/core.js -->
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
<script src="./asset/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="./asset/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="./asset/vendor/libs/swiper/swiper.js"></script>
<script src="./asset/vendor/libs/dropzone/dropzone.js"></script>
<script src="./asset/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="./asset/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="./asset/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
<script src="./asset/vendor/libs/toastr/toastr.js"></script>

<!-- Main JS -->
<script src="./asset/js/main.js"></script>

<!-- Page JS -->
<script src="./asset/js/dashboards-crm.js"></script>
<script src="./asset/js/forms-file-upload.js"></script>
<script src="./asset/js/pages-auth.js"></script>
<script src="./asset/js/ui-toasts.js"></script>

</html>
