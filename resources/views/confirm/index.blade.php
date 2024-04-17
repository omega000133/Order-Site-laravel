<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../../asset/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>お弁当注文サイト</title>

    <meta name="description" content="" />
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    {{-- <link rel="icon" type="image/x-icon" href="../../asset/img/favicon/favicon.ico" /> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../../asset/vendor/fonts/materialdesignicons.css" />
    <link rel="stylesheet" href="../../asset/vendor/fonts/fontawesome.css" />
    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="../../asset/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../asset/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../asset/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../asset/css/demo.css" />
    <link rel="stylesheet" href="../../asset/css/custom.css" />
    <link rel="stylesheet" href="./asset/vendor/libs/toastr/toastr.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../asset/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="../../asset/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../../asset/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../../asset/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../asset/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../asset/js/config.js"></script>
</head>

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
                                <img src="../../assets/img/logo.png" alt="お弁当注文サイ">
                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <div class="card-body mt-2">
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="email" class="form-control" id="current_email" name="email"
                                placeholder="メール" value={{ $data->email }} disabled />
                            <label for="email">メール</label>
                        </div>
                        <div class="mb-3">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" value={{ $data->password }} disabled />
                                        <label for="password">パスワード</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i
                                            class="mdi mdi-eye-off-outline"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="form-floating form-floating-outline col">
                                <input type="text" class="form-control @error('c_name1') is-invalid @enderror"
                                    id="c_name1" name="c_name1" placeholder="児童氏名" value="{{ $data->c_name1 }}"
                                    disabled />
                                <label for="c_name1">児童氏名</label>
                            </div>
                            <div class="form-floating form-floating-outline col">
                                <input type="text" class="form-control" id="c_name2" name="c_name2"
                                    placeholder="ふりがな" value={{ $data->c_name2 }} disabled />
                                <label for="c_name2">ふりがな</label>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" id="c_grade" name="c_grade"
                                    placeholder="**年" value={{ $data->c_grade }} disabled />
                                <label for="c_grade">学年</label>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="form-floating form-floating-outline col">
                                <input type="text" class="form-control" id="p_name1" name="p_name1"
                                    placeholder="保護者氏名" value={{ $data->p_name1 }} disabled />
                                <label for="p_name1">保護者氏名</label>
                            </div>
                            <div class="form-floating form-floating-outline col">
                                <input type="text" class="form-control @error('p_name2') is-invalid @enderror"
                                    id="p_name2" name="p_name2" placeholder="ふりがな" value={{ $data->p_name2 }}
                                    disabled />
                                <label for="p_name2">ふりがな</label>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="form-floating form-floating-outline col">
                                <input type="text" class="form-control" id="p_phone" name="p_phone"
                                    placeholder="電話" value={{ $data->p_phone }} disabled />
                                <label for="p_phone">電話</label>
                            </div>
                            <div class="form-floating form-floating-outline col">
                                <input type="text" class="form-control" id="postcode" name="postcode"
                                    placeholder="郵便番号" value={{ $data->postcode }} disabled />
                                <label for="postcode">郵便番号</label>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="form-floating form-floating-outline col">
                                <input type="text" class="form-control" id="prefecture" name="prefecture"
                                    placeholder="都道府県" value={{ $data->prefecture }} disabled />
                                <label for="prefecture">都道府県</label>
                            </div>
                            <div class="form-floating form-floating-outline col">
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="住所" value={{ $data->address }} disabled />
                                <label for="address">住所</label>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" id="building" name="building"
                                    placeholder="建物・部屋番号" value={{ $data->building }} disabled />
                                <label for="building">建物・部屋番号</label>
                            </div>
                        </div>
                        <div class="mb-2">
                            <form action="https://credit.j-payment.co.jp/link/creditcard" method ="POST">
                                <input type="HIDDEN" name="aid" value="128470">
                                <input type="HIDDEN" name="am" value="500">
                                <input type="HIDDEN" name="tx" value="0">
                                <input type="HIDDEN" name="sf" value="0">
                                <input type="HIDDEN" name="jb" value="CAPTURE">
                                <button type="submit" name="submit"
                                    class="btn btn-primary d-grid w-100">カード情報登録</button>
                            </FORM>
                        </div>
                        <button id="cancel-button" class="cancel-button" data-val={{ $data->email }} style="border: 1px solid white;">キャンセル</button>
                    </div>
                </div>
                <!-- /Login -->
                <img alt="mask" src="../../asset/img/illustrations/auth-basic-login-mask-light.png"
                    class="authentication-image d-none d-lg-block"
                    data-app-light-img="illustrations/auth-basic-login-mask-light.png"
                    data-app-dark-img="illustrations/auth-basic-login-mask-dark.png">

            </div>
        </div>
    </div>

    <!-- / Content -->
</body>
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../../asset/vendor/libs/jquery/jquery.js"></script>
<script src="../../asset/vendor/libs/popper/popper.js"></script>
<script src="../../asset/vendor/js/bootstrap.js"></script>
<script src="../../asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../../asset/vendor/libs/node-waves/node-waves.js"></script>

<script src="../../asset/vendor/libs/hammer/hammer.js"></script>
<script src="../../asset/vendor/libs/i18n/i18n.js"></script>
<script src="../../asset/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="../../asset/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../../asset/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="../../asset/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="../../asset/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
<script src="./asset/vendor/libs/toastr/toastr.js"></script>

<!-- Main JS -->
<script src="../../asset/js/main.js"></script>

<!-- Page JS -->
<script src="../../asset/js/pages-auth.js"></script>

</html>
<script>
    $("#cancel-button").click(function() {
        var index = $(this).attr("data-val");
        $.post("{{ route('confirm.delete') }}", {
            "_token": $('meta[name="csrf_token"]').attr('content'),
            "index": index
        }, function(data) {
            if (data.status == 200) {
                toastr.success(data.message);
                window.location.href = "/";
            } else if (data.status == 401) {
                toastr.error("エラーが発生しました。");
            }
        }, 'json').catch((error) => {
            toastr.error("エラーが発生しました。");
        });
    })
</script>
