@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <h4 class="card-header">生徒情報</h4>
        <div class="card-body">
            <div class="form-row mt-2 grade-search">
                <div class="col">
                    <div class="form-check">
                        <label class="form-check-label label-text">学年 : </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="1" id="grade1">
                        <label class="form-check-label" for="grade1">1年生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="2" id="grade2">
                        <label class="form-check-label" for="grade2">2年生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade " type="checkbox" value="3" id="grade3">
                        <label class="form-check-label" for="grade3">3年生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="4" id="grade4">
                        <label class="form-check-label" for="grade4">4年生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="5" id="grade5">
                        <label class="form-check-label" for="grade5">5年生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="6" id="grade6">
                        <label class="form-check-label" for="grade6">6年生</label>
                    </div>
                </div>
            </div>

            <div class="form-row mt-2 graduation_year">
                <label for="graduation_year" class="label-text label-padding">卒業年代: </label>
                <input type="text" class="" id="graduation_year" placeholder="">
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-hover table-striped" id="client_table">
                    <thead>
                        <tr>
                            <th>コード</th>
                            <th>生徒氏名</th>
                            <th>学年</th>
                            <th>卒業</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody id="user-tbody">
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->c_name1 }}</td>
                                <td>{{ $student->c_grade }}</td>
                                <td>{{ $student->grade_year }}</td>
                                <td>
                                    <button type="button"
                                        class="btn btn-icon btn-primary waves-effect waves-light edit_btn"
                                        data-val="{{ $student->id }}">
                                        <span class="<tf-icons mdi mdi-pencil-outline"></span>
                                    </button>
                                    <a href="{{ route('orderManage', ['id' => $student->id]) }}" class="btn btn-icon btn-danger waves-effect waves-light order_btn">
                                       <span class="<tf-icons mdi mdi-calendar-text"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- update modal -->
    <div class="modal" id="update_modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        得意先情報
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
                                    <input id="c_name1" type="text" name="c_name1" class="form-control"
                                        placeholder="xxx" />
                                    <label for="生徒氏名">生徒氏名</label>
                                </div>
                            </div>
                            <div class="col mb-4 mt-2">
                                <div class="form-floating form-floating-outline">
                                    <input id="c_name2" type="text" name="c_name2" class="form-control"
                                        placeholder="xxx" />
                                    <label for="ふりがな">ふりがな</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-4 mt-2">
                                <div class="form-floating form-floating-outline">
                                    <select id="c_grade" name="c_grade" class="form-select">
                                        <option>学年を選択してください。</option>
                                        <option value="0">新入生</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col mb-4 mt-2">
                                <div class="form-floating form-floating-outline">
                                    <input id="grade_year" type="text" name="grade_year" class="form-control"
                                        placeholder="xxxx年" />
                                    <label for="卒業年代">卒業年代</label>
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
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="permission" type="checkbox" />
                                    <label class="form-check-label" for="permission">利用停止</label>
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

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#client_table').DataTable({
                "searching": true,
                "language": {
                    "sEmptyTable": "テーブルにデータがありません",
                    "sInfo": " _TOTAL_ 件中 _START_ から _END_ まで表示",
                    "sInfoEmpty": " 0 件中 0 から 0 まで表示",
                    "sInfoFiltered": "（全 _MAX_ 件より抽出）",
                    "sInfoThousands": ",",
                    "sLengthMenu": "_MENU_ 件表示",
                    "sLoadingRecords": "読み込み中...",
                    "sProcessing": "処理中...",
                    "sSearch": "生徒氏名:",
                    "sZeroRecords": "一致するレコードがありません",
                    "oPaginate": {
                        "sFirst": "先頭",
                        "sLast": "最終",
                        "sNext": "次",
                        "sPrevious": "前"
                    },
                    "oAria": {
                        "sSortAscending": ": 列を昇順に並べ替えるにはアクティブにする",
                        "sSortDescending": ": 列を降順に並べ替えるにはアクティブにする"
                    }
                }
            });

            // Filter by Grade checkboxes
            $(".grade").change(function() {
                applyFilters();
            });

            // Filter by graduation year
            $("#graduation_year").on('input', function() {
                applyFilters();
            });

            function applyFilters() {
                var gradeFilters = getSelectedGrades();
                var graduationYear = $("#graduation_year").val();

                // Apply filters
                table.columns(2).search(gradeFilters.join('|'), true, false).draw();
                table.column(3).search(graduationYear).draw();
            }

            function getSelectedGrades() {
                var grades = [];
                $('.grade:checked').each(function() {
                    grades.push($(this).val());
                });
                return grades;
            }

            // Hide DataTable info
            $('#client_table_info').addClass('d-none');

          
            /* User information update
               START
            */
            // $(".close_btn").click(function() {
            //     $("#update_modal").hide();
            // });

            // $(".cancel_btn").click(function() {
            //     $("#update_modal").hide();
            // });

            $(document).on("click", ".close_btn, .cancel_btn", function() {
                $("#update_modal").hide();
            });


            $(document).on("click", ".edit_btn", function() {
                $("#update_modal").show();
                var index = $(this).attr("data-val");
                console.log(index)
                $.post("{{ route('userManage.get') }}", {
                        "_token": $('meta[name="csrf_token"]').attr('content'),
                        "id": index
                    },
                    function(data) {
                        if (data.status == 200) {
                            // console.log(data.user_info)
                            var user = data.user_info;
                            $("#email").val(user.email);
                            $("#c_name1").val(user.c_name1);
                            $("#c_name2").val(user.c_name2);
                            $("#c_grade").val(user.c_grade);
                            $("#grade_year").val(user.grade_year);
                            $("#p_name1").val(user.p_name1);
                            $("#p_name2").val(user.p_name2);
                            $("#p_phone").val(user.p_phone);
                            $("#postcode").val(user.postcode);
                            $("#prefecture").val(user.prefecture);
                            $("#address").val(user.address);
                            $("#building").val(user.building);
                            if (user.permission == 0) {
                                $("#permission").prop("checked", true);
                            } else {
                                $("#permission").prop("checked", false);
                            }

                        } else if (data.status == 401) {
                            toastr.error(data.message);
                        }
                    }
                )
            })


            $(document).on("click", "#update_btn", function() {
               // console.log(index)
                var email = $("#email").val();
                var password = $("#password").val();
                var confirm_password = $("#confirm_password").val();
                var c_name1 = $("#c_name1").val();
                var c_name2 = $("#c_name2").val();
                var c_grade = $("#c_grade").val();
                var grade_year = $("#grade_year").val();
                var p_name1 = $("#p_name1").val();
                var p_name2 = $("#p_name2").val();
                var p_phone = $("#p_phone").val();
                var postcode = $("#postcode").val();
                var prefecture = $("#prefecture").val();
                var address = $("#address").val();
                var building = $("#building").val();
                var permission;
                if ($("#permission").is(":checked")) {
                    permission = 0;
                } else {
                    permission = 1;
                }
               //  console.log(permission);
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
                } else if (c_name1 == "") {
                    toastr.error("生徒氏名を入力してください。");
                    $("#c_name1").focus();
                } else if (c_name2 == "") {
                    toastr.error("生徒氏名ふりがなを入力してください。");
                    $("#c_name2").focus();
                } else if (c_grade == "") {
                    toastr.error("学年を選択してください。");
                    $("#c_grade").focus();
                } else if (grade_year == "") {
                    toastr.error("卒業年代を入力してください。");
                    $("#grade_year").focus();
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
                } else {
                    $.post("{{ route('userManage.update') }}", {
                        "_token": $('meta[name="csrf_token"]').attr('content'),
                        "index": index,
                        "email": email,
                        "password": password,
                        "c_name1" : c_name1,
                        "c_name2" : c_name2,
                        "c_grade" : c_grade,
                        "grade_year" : grade_year,
                        "p_name1": p_name1,
                        "p_name2": p_name2,
                        "p_phone": p_phone,
                        "postcode": postcode,
                        "prefecture": prefecture,
                        "address": address,
                        "building": building,
                        "permission" : permission
                    }, function(data) {
                        var resp = data.user;
                        if (data.status == 200) {
                            toastr.success(data.message);
                            $("#update_modal").hide();
                            window.location.reload(true);
                        } else if (data.status == 401) {
                            toastr.error(data.message);
                        }
                    }, 'json').catch((error) => {
                        toastr.error("エラーが発生しました");
                    });
                }
            });

            /* User information update
               END
            */



        });
    </script>
@endsection
