<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../../asset/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>お弁当注文サイト</title>

    <meta name="description" content="" />

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
                        <form id="" class="mb-3" action="{{ route('register') }}" method="POST">
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
                                    <select id="c_grade" name="c_grade"
                                        class="form-select @error('c_grade') is-invalid @enderror" value="{{ old('c_grade') }}" required autofocus>
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
                                    <input type="text" class="form-control @error('p_phone') is-invalid @enderror"
                                        id="p_phone" name="p_phone" placeholder="電話"
                                        value="{{ old('p_phone') }}" required autocomplete="postcode" autofocus />
                                    @error('p_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="p_phone">電話</label>
                                </div>
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
                            </div>
                            <div class="mb-3 row">
                                <div class="form-floating form-floating-outline col">
                                    <select id="prefecture" name="prefecture"
                                        class="form-select @error('prefecture') is-invalid @enderror" value="{{ old('prefecture') }}" required
                                        autofocus>
                                        <option value="北海道">北海道</option>
                                        <option value="青森県">青森県</option>
                                        <option value="岩手県">岩手県</option>
                                        <option value="宮城県">宮城県</option>
                                        <option value="秋田県">秋田県</option>
                                        <option value="山形県">山形県</option>
                                        <option value="福島県">福島県</option>
                                        <option value="茨城県">茨城県</option>
                                        <option value="栃木県">栃木県</option>
                                        <option value="群馬県">群馬県</option>
                                        <option value="埼玉県">埼玉県</option>
                                        <option value="千葉県">千葉県</option>
                                        <option value="東京都">東京都</option>
                                        <option value="神奈川県">神奈川県</option>
                                        <option value="新潟県">新潟県</option>
                                        <option value="富山県">富山県</option>
                                        <option value="石川県">石川県</option>
                                        <option value="福井県">福井県</option>
                                        <option value="山梨県">山梨県</option>
                                        <option value="長野県">長野県</option>
                                        <option value="岐阜県">岐阜県</option>
                                        <option value="静岡県">静岡県</option>
                                        <option value="愛知県">愛知県</option>
                                        <option value="三重県">三重県</option>
                                        <option value="滋賀県">滋賀県</option>
                                        <option value="京都府">京都府</option>
                                        <option value="大阪府">大阪府</option>
                                        <option value="兵庫県">兵庫県</option>
                                        <option value="奈良県">奈良県</option>
                                        <option value="和歌山県">和歌山県</option>
                                        <option value="鳥取県">鳥取県</option>
                                        <option value="島根県">島根県</option>
                                        <option value="岡山県">岡山県</option>
                                        <option value="広島県">広島県</option>
                                        <option value="山口県">山口県</option>
                                        <option value="徳島県">徳島県</option>
                                        <option value="香川県">香川県</option>
                                        <option value="愛媛県">愛媛県</option>
                                        <option value="高知県">高知県</option>
                                        <option value="福岡県">福岡県</option>
                                        <option value="佐賀県">佐賀県</option>
                                        <option value="長崎県">長崎県</option>
                                        <option value="熊本県">熊本県</option>
                                        <option value="大分県">大分県</option>
                                        <option value="宮崎県">宮崎県</option>
                                        <option value="鹿児島県">鹿児島県</option>
                                        <option value="沖縄県">沖縄県</option>
                                    </select>
                                    @error('prefecture')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating form-floating-outline col">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" placeholder="住所" value="{{ old('address') }}"
                                        required autocomplete="address" autofocus />
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="address">住所</label>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="form-floating form-floating-outline col">
                                    <input type="text"
                                        class="form-control @error('building') is-invalid @enderror" id="building"
                                        name="building" placeholder="建物・部屋番号" value="{{ old('building') }}" 
                                        autocomplete="building" autofocus />
                                    @error('building')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="building">建物・部屋番号</label>
                                </div>
                                <div class="form-floating form-floating-outline col">
                                    <input type="text" class="form-control @error('grade_year') is-invalid @enderror"
                                        id="grade_year" name="grade_year" placeholder="卒業年代" value="{{ old('grade_year') }}" required autocomplete="grade_year" autofocus />
                                    @error('grade_year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="grade_year">卒業年代</label>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control @error('card') is-invalid @enderror"
                                        id="card" name="card" placeholder="クレジットカード" value="{{ old('card') }}" required autocomplete="card" autofocus />
                                    @error('card')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="card">クレジットカード</label>
                                </div>
                            </div>
                            <div class="mb-2">
                                <button class="btn btn-primary d-grid w-100" type="submit">新規登録</button>
                            </div>
                            <a href="/" class="cancel-button">キャンセル</a>

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
                 <img alt="mask" src="../../asset/img/illustrations/auth-basic-login-mask-light.png" class="authentication-image d-none d-lg-block" data-app-light-img="illustrations/auth-basic-login-mask-light.png" data-app-dark-img="illustrations/auth-basic-login-mask-dark.png">
                
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
