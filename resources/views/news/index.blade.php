@extends('layouts.admin')
@section('content')
    <div class="card massetb-4">
        {{-- <div class="user-profile-header-banner">
      <img src="../../asset/img/pages/profile-banner.png" alt="Banner image" class="rounded-top">
    </div> --}}
        <h3 class="card-header">お知らせ登録</h3>
        <div class="card-body">
            <div class="form-floating form-floating-outline mb-4">
                <input class="form-control" type="text" placeholder="" id="news_title">
                <label for="news_title">タイトル</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
                <textarea class="form-control h-px-100" id="news_content" placeholder=""></textarea>
                <label for="news_content">内容</label>
            </div>
            <p style="color: #000">メール通知先 : </p>
            <div class="form-row mt-2 grade-search grade-filter">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="0" id="grade0" checked>
                        <label class="form-check-label" for="grade1">新入生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="1" id="grade1" checked>
                        <label class="form-check-label" for="grade1">1年生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="2" id="grade2" checked>
                        <label class="form-check-label" for="grade2">2年生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade " type="checkbox" value="3" id="grade3" checked>
                        <label class="form-check-label" for="grade3">3年生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="4" id="grade4" checked>
                        <label class="form-check-label" for="grade4">4年生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="5" id="grade5" checked>
                        <label class="form-check-label" for="grade5">5年生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="6" id="grade6" checked>
                        <label class="form-check-label" for="grade6">6年生</label>
                    </div>
                </div>
            </div>
            <div class="form-floating form-floating-outline mt-3">
                <input class="form-control" type="date" id="news_date">
                <label for="news_date">公開日</label>
            </div>
            <button class="btn btn-primary waves-effect waves-light mt-3" id="register_btn">登録</button>
            <div class="table-responsive text-nowrap mt-5">
                <table class="table table-bordered table-hover table-striped" id="news_table">
                    <thead>
                        <tr>
                            <th>コード</th>
                            <th>公開日</th>
                            <th>タイトル</th>
                            <th>内容</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->news_date }}</td>
                                <td>{{ $item->news_title }}</td>
                                <td>{{ $item->news_content }}</td>
                                <td>
                                    <button type="button"
                                        class="btn btn-icon btn-danger waves-effect waves-light news_delete_btn"
                                        data-val="{{ $item->id }}">
                                        <span class="<tf-icons mdi mdi-pencil-outline"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#news_table').DataTable({
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
                    "sSearch": "検索:",
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

            var grades;
            var checkboxes = document.querySelectorAll('.grade');
            $(".grade").change(function() {
                grades = [];
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        grades.push(checkbox.value);
                    }
                })
            });

            $("#register_btn").click(function() {
                // console.log(grades)
                var news_date = $("#news_date").val();
                var news_title = $("#news_title").val();
                var news_content = $("#news_content").val();
                if (news_title == "") {
                    toastr.error("お知らせタイトルを入力してください。");
                    $("#news_title").focus();
                } else if (news_content == "") {
                    toastr.error("お知らせ内容を入力してください。");
                    $("#news_content").focus();
                } else if (grades == "" || grades == null) {
                    toastr.error("学年を選択してください。");
                } else if (news_date == "" || news_date == null) {
                    toastr.error("公開日を選択してください。");
                } else {
                    $.post("{{ route('news.store') }}", {
                        "_token": $('meta[name="csrf_token"]').attr('content'),
                        "news_date": news_date,
                        "news_title": news_title,
                        "news_content": news_content,
                        "grades": grades
                    }, function(data) {
                        if (data.status == 200) {
                            toastr.success(data.message);
                            window.location.reload(true);
                        } else if (data.status == 401) {
                            toastr.error("エラーが発生しました。");
                        }
                    }, 'json').catch((error) => {
                        toastr.error("エラーが発生しました。");
                    });
                }
            });

            $(".news_delete_btn").click(function() {
                var index = $(this).attr("data-val");
                $.post("{{ route('news.delete') }}", {
                    "_token": $('meta[name="csrf_token"]').attr('content'),
                    "index": index
                }, function(data) {
                    if (data.status == 200) {
                        toastr.success(data.message);
                        window.location.reload(true);
                    } else if (data.status == 401) {
                        toastr.error("エラーが発生しました。");
                    }
                }, 'json').catch((error) => {
                    toastr.error("エラーが発生しました。");
                });
            })
        });
    </script>
@endsection
