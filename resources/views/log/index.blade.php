@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <h4 class="card-header">操作ログ</h4>
        <div class="card-body">
            <div class="form-floating form-floating-outline mb-4">
                <input class="form-control" type="date" id="filter-date" />
                <label for="sus-date">日付</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
                <input id="filter-days" class="form-control" type="number" min="1" max="100" placeholder="検索日数">
                <label for="filter-days">検索日数</label>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-hover table-striped" id="log_table">
                    <thead>
                        <tr>
                            <th>コード</th>
                            <th>日時</th>
                            <th>生徒氏名</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody id="log-tbody">
                        @foreach ($logs as $log)
                            <tr>
                                <td>{{ $log->id }}</td>
                                <td>{{ $log->log_date }}</td>
                                <td>{{ $log->log_user }}</td>
                                <td>{{ $log->log_content }}</td>
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
            var table = $('#log_table').DataTable({
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


            // Hide DataTable info
            $('#log_table_info').addClass('d-none');

            // Event listener for filter-date input
            $('#filter-date').on('change', function() {
                filterLogs();
            });

            // Event listener for filter-days input
            $('#filter-days').on('input', function() {
                filterLogs();
            });

            // Function to filter logs based on selected date and number of days
            function filterLogs() {
                var selectedDate = $('#filter-date').val();
                var filterDays = $('#filter-days').val();

                if (selectedDate !== "" && filterDays !== "") {
                    var startDate = new Date(selectedDate);
                    var endDate = new Date(selectedDate);
                    endDate.setDate(startDate.getDate() + parseInt(filterDays) - 1);

                    table.columns(1).search('').draw(); // Clear existing search

                    var startDateFormat = formatDate(startDate);
                    var endDateFormat = formatDate(endDate);

                    var searchValue = '';

                    // Iterate through each date within the range and construct search value
                    for (var d = new Date(startDate); d <= endDate; d.setDate(d.getDate() + 1)) {
                        var dateFormat = formatDate(d);
                        searchValue += '^' + dateFormat + '$|';
                    }

                    // Remove trailing '|' character
                    searchValue = searchValue.slice(0, -1);
                    table.column(1).search(searchValue, true, false).draw();
                } else if (selectedDate !== "" && filterDays === "") {
                    // If filter-days is empty, only filter by selected date
                    table.columns(1).search('^' + selectedDate, true, false).draw();
                } else if (selectedDate === "" && filterDays !== "") {
                    // If filter-date is empty but filter-days is not, don't apply filter
                    table.columns(1).search('').draw();
                } else {
                    // If both filter-date and filter-days are empty, show all data
                    table.columns(1).search('').draw();
                }
            }

            // Function to format date as yyyy-mm-dd
            function formatDate(date) {
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();

                if (day < 10) {
                    day = '0' + day;
                }

                if (month < 10) {
                    month = '0' + month;
                }

                return year + '-' + month + '-' + day;
            }
        });
    </script>
@endsection
