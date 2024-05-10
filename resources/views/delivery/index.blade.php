@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <h4 class="card-header">配達伝票</h4>
        <div class="card-body">
            <div class="form-row mt-2 sus-row">
                <div class="form-floating form-floating-outline mb-4">
                    <input class="form-control" type="date" id="delivery-date" />
                    <label for="delivery-date">配達日</label>
                </div>
                <button class="btn btn-primary waves-effect waves-light" type="button" id="display-btn">表示</button>
                <button class="btn btn-success waves-effect waves-light" type="button" id="print-btn">印刷</button>
            </div>
            <div id="grade-tables" class="mt-5">
                <!-- Grade Tables will be inserted here -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var delivery_date;
            $("#delivery-date").on("change", function() {
                delivery_date = $(this).val();
            });

            $("#display-btn").click(function() {
                $.post("{{ route('delivery.get') }}", {
                    "_token": $('meta[name="csrf_token"]').attr('content'),
                    "delivery_date": delivery_date,
                }, function(data) {
                    if (data.status == 200) {
                        toastr.success(data.message);
                        console.log(data.usersByGrade);
                        displayGradeTables(data.usersByGrade);
                    } else if (data.status == 401) {
                        toastr.error(data.message);
                    }
                }, 'json').catch((error) => {
                    toastr.error("エラーが発生しました。");
                });
            });

            function displayGradeTables(usersByGrade) {
                $("#grade-tables").empty(); // Clear previous tables
                $.each(usersByGrade, function(grade, users) {
                    var gradeHtml = '<p class="mt-5" style="display:inline-block; font-size:20px; font-style:bold; border: 1px solid black; padding: 5px 20px;">' + grade + '年生</p>';
                    var table = '<table class="table table-bordered table-hover table-striped">' +
                        '<thead style="text-align: center">' +
                        '<tr>' +
                        '<th>コード</th>' +
                        '<th>児童氏名</th>' +
                        '<th>ふりがな</th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody>';
                    $.each(users, function(index, user) {
                        table += '<tr style="text-align: center">' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + user.c_name1 + '</td>' +
                            '<td>' + user.c_name2 + '</td>' +
                            '</tr>';
                    });
                    table += '</tbody></table>';
                    $("#grade-tables").append(gradeHtml); // Prepend gradeHtml before each table
                    $("#grade-tables").append(table);
                });
            }
        });
    </script>
@endsection
