@extends('layouts.admin')
@section('content')
    <!-- Content -->
    <div class="card mt-3">
        <h4 class="card-header">会員情報</h4>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>メール</th>
                            <th>児童氏名</th>
                            <th>ふりがな</th>
                            <th>学年</th>
                            <th>保護者氏名</th>
                            <th>ふりがな</th>
                            <th>電話番号</th>
                            <th>郵便番号</th>
                            <th>都道府県</th>
                            <th>住所</th>
                            <th>建物・部屋番号</th>
                            <th>クレジットカード</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody id="user-tbody">
                        <tr>
                            <td>{{ $my_info->id }}</td>
                            <td>{{ $my_info->email }}</td>
                            <td>{{ $my_info->c_name1 }}</td>
                            <td>{{ $my_info->c_name2 }}</td>
                            <td>{{ $my_info->c_grade }}</td>
                            <td>{{ $my_info->p_name1 }}</td>
                            <td>{{ $my_info->p_name2 }}</td>
                            <td>{{ $my_info->p_phone }}</td>
                            <td>{{ $my_info->postcode }}</td>
                            <td>{{ $my_info->prefecture }}</td>
                            <td>{{ $my_info->address }}</td>
                            <td>{{ $my_info->building }}</td>
                            <td>{{ $my_info->card }}</td>
                            <td>
                                <button type="button" class="btn btn-icon btn-primary waves-effect waves-light" id="edit_btn"
                                    data-val="{{ $my_info->id }}">
                                    <span class="<tf-icons mdi mdi-pencil-outline"></span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <h4 class="card-header">お支払い/履歴</h4>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ご利用月</th>
                            <th>お支払日</th>
                            <th>お支払方法</th>
                            <th>お支払料金</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2024年8月</td>
                            <td>2024年9月20日</td>
                            <td>口座自動引落</td>
                            <td>500円</td>
                        </tr>
                        <tr>
                            <td>2024年7月</td>
                            <td>2024年6月20日</td>
                            <td>口座自動引落</td>
                            <td>2,500円</td>
                        </tr>
                        <tr>
                            <td>2024年6月</td>
                            <td>2024年7月20日</td>
                            <td>口座自動引落</td>
                            <td>9,000円</td>
                        </tr>
                        <tr>
                            <td>2024年5月</td>
                            <td>2024年8月20日</td>
                            <td>カード自動引落</td>
                            <td>8,500円</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="content-backdrop fade"></div>

    <!-- update modal -->
    <div class="modal" id="update_modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        会員情報更新
                    </h4>
                    <button type="button" class="cancel_btn btn-close"></button>
                </div>
                <div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-4 mt-2">
                                <div class="form-floating form-floating-outline">
                                    <input type="email" id="email" class="form-control" name="email"
                                        placeholder="xxxx@xxx.xx" />
                                    <label for="メール">メール</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-4 mt-2">
                                <div class="form-floating form-floating-outline">
                                    <input id="password" type="password" name="password" class="form-control"
                                        placeholder="xxxx" />
                                    <label for="パスワード">パスワード</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-4 mt-2">
                                <div class="form-floating form-floating-outline">
                                    <input id="confirm_password" type="password" name="confirm_password"
                                        class="form-control" placeholder="xxxx" />
                                    <label for="パスワード確認">パスワード確認</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-4 mt-2">
                                <div class="form-floating form-floating-outline">
                                    <input id="p_name1" type="text" name="p_name1" class="form-control"
                                        placeholder="xxx" />
                                    <label for="保護者氏名">保護者氏名</label>
                                </div>
                            </div>
                            <div class="col mb-4 mt-2">
                                <div class="form-floating form-floating-outline">
                                    <input id="p_name2" type="text" name="p_name2" class="form-control"
                                        placeholder="xxx" />
                                    <label for="ふりがな">ふりがな</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-4 mt-2">
                                <div class="form-floating form-floating-outline">
                                    <input id="p_phone" type="text" name="p_phone" class="form-control"
                                        placeholder="xxx-xxxx-xxxx" />
                                    <label for="電話番号">電話番号</label>
                                </div>
                            </div>
                            <div class="col mb-4 mt-2">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="postcode" class="form-control" name="postcode"
                                        placeholder="xxxxxx" />
                                    <label for="郵便番号">郵便番号</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-4 mt-2">
                                <select id="prefecture" name="prefecture" class="form-select">
                                    <option value="1">都道府県</option>
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
                            </div>
                            <div class="col mb-4 mt-2">
                                <div class="form-floating form-floating-outline">
                                    <input id="address" type="text" name="address" class="form-control"
                                        placeholder="xxxxxxx" />
                                    <label for="住所">住所</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-4 mt-2">
                                <div class="form-floating form-floating-outline">
                                    <input id="building" type="text" name="building" class="form-control"
                                        placeholder="xxx" />
                                    <label for="建物・部屋番号">建物・部屋番号</label>
                                </div>
                            </div>
                            <div class="col mb-4 mt-2">
                                <div class="form-floating form-floating-outline">
                                    <input id="card" type="text" name="card" class="form-control"
                                        placeholder="xxx" />
                                    <label for="クレジットカード">クレジットカード</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="close_btn btn btn-danger">
                                閉じる
                            </button>
                            <button type="button" class="btn btn-primary" id="update_btn">
                                保存
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- update modal / -->
    <!-- content -->
    <script>
        $(".close_btn").click(function() {
            $("#update_modal").hide();
        });

        $(".cancel_btn").click(function() {
            $("#update_modal").hide();
        });
        //Update user 
        var index;
        $("#edit_btn").click(function() {
            $("#update_modal").show();
            index = $(this).attr("data-val");
            $("#email").val($(this).parent().parent().find(':nth-child(2)').html());
            $("#password").val("");
            $("#p_name1").val($(this).parent().parent().find(':nth-child(6)').html());
            $("#p_name2").val($(this).parent().parent().find(':nth-child(7)').html());
            $("#p_phone").val($(this).parent().parent().find(':nth-child(8)').html());
            $("#postcode").val($(this).parent().parent().find(':nth-child(9)').html());
            $("#prefecture").val($(this).parent().parent().find(':nth-child(10)').html());
            $("#address").val($(this).parent().parent().find(':nth-child(11)').html());
            $("#building").val($(this).parent().parent().find(':nth-child(12)').html());
            $("#card").val($(this).parent().parent().find(':nth-child(13)').html());
        });

        $("#update_btn").click(function() {
            var email = $("#email").val();
            var password = $("#password").val();
            var confirm_password = $("#confirm_password").val();
            var p_name1 = $("#p_name1").val();
            var p_name2 = $("#p_name2").val();
            var p_phone = $("#p_phone").val();
            var postcode = $("#postcode").val();
            var selectedOption1 = $('#prefecture').find('option:selected');
            if (!selectedOption1.is(':first-child')) {
                var prefecture = selectedOption1.html();
            }
            var address = $("#address").val();
            var building = $("#building").val();
            var card = $("#card").val();
            var length = password.length;
            var email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (email == "") {
                toastr.error("メール入力");
                $("#email").focus();
            } else if (!email_regex.test(email)) {
                toastr.error("有効なメール入力");
                $("#email").val("");
                $("#email").focus();
            } else if (password == "") {
                toastr.error("パスワード入力");
                $("#password").focus();
            } else if (length < 4) {
                toastr.error("パスワードは少なくとも4文字以上でなければなりません。");
                $("#password").val("");
                $("#password").focus();
            } else if (confirm_password == "") {
                toastr.error("パスワード確認");
                $("#confirm_password").focus();
            } else if (password != confirm_password) {
                toastr.error("パスワードをもう一度入力してください。");
                $("#confirm_password").val("");
                $("#confirm_password").focus();
            } else if (p_name1 == "") {
                toastr.error("保護者氏名を入力してください。");
                $("#p_name1").focus();
            } else if (p_name2 == "") {
                toastr.error("保護者氏名ふりがなを入力してください。");
                $("#p_name2").focus();
            } else if (p_phone == "") {
                toastr.error("電話番号を入力してください。");
                $("#p_phone").focus();
            } else if (postcode == "") {
                toastr.error("郵便番号を入力してください。");
                $("#postcode").focus();
            } else if (prefecture == "" || prefecture == null) {
                toastr.error("都道府県を選択してください。");
                $("#prefecture").focus();
            } else if (address == "") {
                toastr.error("住所を入力してください。");
                $("#address").focus();
            } 
            // else if (building == "") {
            //     toastr.error("権限を入力してください。");
            //     $("#building").focus();
            // } 
            else if (card == "") {
                toastr.error("クレジットカードを入力してください。");
                $("#card").focus();
            } else {
                $.post("{{ route('user.update') }}", {
                    "_token": $('meta[name="csrf_token"]').attr('content'),
                    "index": index,
                    "email": email,
                    "password": password,
                    "p_name1": p_name1,
                    "p_name2": p_name2,
                    "p_phone": p_phone,
                    "postcode": postcode,
                    "prefecture": prefecture,
                    "address": address,
                    "building": building,
                    "card": card
                }, function(data) {
                    var resp = data.user;
                    if (data.status == 200) {
                        toastr.success(data.message);
                        $("#modal").hide();
                        window.location.reload(true);
                    } else if (data.status == 401) {
                        toastr.error(data.message);
                    }
                }, 'json').catch((error) => {
                    toastr.error("エラーが発生しました");
                });
            }
        });
    </script>
@endsection
