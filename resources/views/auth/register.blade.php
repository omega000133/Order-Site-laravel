<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../../asset/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>お弁当注文サイ</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../asset/img/favicon/favicon.ico" />

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
                                <img src="../../assets/img/logo.png" alt="お弁当注文サイ">
                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->

                    <div class="card-body mt-2">
                        <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                            <div class="form-floating form-floating-outline mb-3">
                                @csrf
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="current_email" name="email" placeholder="メールを入力してください。"
                                    value="{{ isset($email) ? $email : old('email') }}" required readonly
                                    autocomplete="email" autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="email">メール</label>
                            </div>
                            <div class="mb-3">
                                <div class="form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" required autocomplete="new-password" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="password">パスワード</label>
                                        </div>
                                        <span class="input-group-text cursor-pointer"><i
                                                class="mdi mdi-eye-off-outline"></i></span>
                                    </div>
                                </div>
                            </div>
                            <input id="email" type="hidden" class="text email" name="email" placeholder="メールアドレス"
                                value="{{ isset($email) ? $email : old('email') }}" required autocomplete="email">
                            <div class="mb-3">
                                <div class="form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" id="password-confirm"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password_confirmation"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" required autocomplete="new-password" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="password-confirm">パスワード確認</label>
                                        </div>
                                        <span class="input-group-text cursor-pointer"><i
                                                class="mdi mdi-eye-off-outline"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="form-floating form-floating-outline col">
                                    <input type="text" class="form-control @error('c_name1') is-invalid @enderror"
                                        id="c_name1" name="c_name1" placeholder="児童氏名"
                                        value="{{ old('c_name1') }}" required autocomplete="c_name1" autofocus />
                                    @error('c_name1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="c_name1">児童氏名</label>
                                </div>
                                <div class="form-floating form-floating-outline col">
                                    <input type="text" class="form-control @error('c_name2') is-invalid @enderror"
                                        id="c_name2" name="c_name2" placeholder="ふりがな"
                                        value="{{ old('c_name2') }}" required autocomplete="c_name2" autofocus />
                                    @error('c_name2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="c_name2">ふりがな</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating form-floating-outline">
                                    <select id="c_grade" name="c_grade" class="form-select @error('c_grade') is-invalid @enderror" required autofocus>
                                        <option>学年を選択してください。</option>
                                        <option value="0">新入生</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                    @error('c_grade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <p>※3月末までは、現在の学年を入力してください。</p>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="form-floating form-floating-outline col">
                                    <input type="text" class="form-control @error('p_name1') is-invalid @enderror"
                                        id="p_name1" name="p_name1" placeholder="保護者氏名"
                                        value="{{ old('p_name1') }}" required autocomplete="p_name1" autofocus />
                                    @error('p_name1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="p_name1">保護者氏名</label>
                                </div>
                                <div class="form-floating form-floating-outline col">
                                    <input type="text" class="form-control @error('p_name2') is-invalid @enderror"
                                        id="p_name2" name="p_name2" placeholder="ふりがな"
                                        value="{{ old('p_name2') }}" required autocomplete="p_name2" autofocus />
                                    @error('p_name2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="p_name2">ふりがな</label>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="form-floating form-floating-outline col">
                                    <input type="text" class="form-control @error('postcode') is-invalid @enderror"
                                        id="postcode" name="postcode" placeholder="郵便番号"
                                        value="{{ old('postcode') }}" required autocomplete="postcode" autofocus />
                                    @error('postcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="postcode">郵便番号</label>
                                </div>
                                <div class="form-floating form-floating-outline col">
                                    <select id="prefecture" name="prefecture" class="form-select @error('prefecture') is-invalid @enderror" required autofocus>
                                        <option>都道府県</option>
                                        <option value="1">北海道</option>
                                        <option value="2">青森県</option>
                                        <option value="3">岩手県</option>
                                        <option value="4">宮城県</option>
                                        <option value="5">秋田県</option>
                                        <option value="6">山形県</option>
                                        <option value="7">福島県</option>
                                        <option value="8">茨城県</option>
                                        <option value="9">栃木県</option>
                                        <option value="10">群馬県</option>
                                        <option value="11">埼玉県</option>
                                        <option value="12">千葉県</option>
                                        <option value="13">東京都</option>
                                        <option value="14">神奈川県</option>
                                        <option value="15">新潟県</option>
                                        <option value="16">富山県</option>
                                        <option value="17">石川県</option>
                                        <option value="18">福井県</option>
                                        <option value="19">山梨県</option>
                                        <option value="20">長野県</option>
                                        <option value="21">岐阜県</option>
                                        <option value="22">静岡県</option>
                                        <option value="23">愛知県</option>
                                        <option value="24">三重県</option>
                                        <option value="25">滋賀県</option>
                                        <option value="26">京都府</option>
                                        <option value="27">大阪府</option>
                                        <option value="28">兵庫県</option>
                                        <option value="29">奈良県</option>
                                        <option value="30">和歌山県</option>
                                        <option value="31">鳥取県</option>
                                        <option value="32">島根県</option>
                                        <option value="33">岡山県</option>
                                        <option value="34">広島県</option>
                                        <option value="35">山口県</option>
                                        <option value="36">徳島県</option>
                                        <option value="37">香川県</option>
                                        <option value="38">愛媛県</option>
                                        <option value="39">高知県</option>
                                        <option value="40">福岡県</option>
                                        <option value="41">佐賀県</option>
                                        <option value="42">長崎県</option>
                                        <option value="43">熊本県</option>
                                        <option value="44">大分県</option>
                                        <option value="45">宮崎県</option>
                                        <option value="46">鹿児島県</option>
                                        <option value="47">沖縄県</option>
                                    </select>
                                    @error('prefecture')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="form-floating form-floating-outline col">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" placeholder="住所"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus />
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="address">住所</label>
                                </div>
                                <div class="form-floating form-floating-outline col">
                                    <input type="text" class="form-control @error('building') is-invalid @enderror"
                                        id="building" name="building" placeholder="建物・部屋番号"
                                        value="{{ old('building') }}" required autocomplete="building" autofocus />
                                    @error('building')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="building">建物・部屋番号</label>
                                </div>
                            </div>
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" class="form-control @error('card') is-invalid @enderror"
                                    id="card" name="card" placeholder="お支払いクレジットカード登録"
                                    required autocomplete="card" autofocus />
                                @error('card')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="card">お支払いクレジットカード登録</label>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">新規登録</button>
                            </div>
                            <p class="text-center">
                                <span>すでに登録されていますか？</span>
                                <a href="{{ route('login') }}">
                                    <span>ログインはこちら</span>
                                </a>
                            </p>
                        </form>
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

<!-- Main JS -->
<script src="../../asset/js/main.js"></script>

<!-- Page JS -->
<script src="../../asset/js/pages-auth.js"></script>

</html>
