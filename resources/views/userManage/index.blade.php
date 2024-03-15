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
                                        class="btn btn-icon btn-primary waves-effect waves-light edit_btn" data-val="">
                                        <span class="<tf-icons mdi mdi-pencil-outline"></span>
                                    </button>
                                    <button type="button"
                                        class="btn btn-icon btn-danger waves-effect waves-light order_btn" data-val="">
                                        <span class="<tf-icons mdi mdi-calendar-text"></span>
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
        });
    </script>
@endsection
