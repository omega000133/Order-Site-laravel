@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <h4 class="card-header">休日設定</h4>
        <div class="card-body">
            <div class="setting-part mb-4">
                <div class="form-floating form-floating-outline mb-3">
                    <select id="c_grade" name="c_grade" class="form-select">
                        <option value="8">全校</option>
                        <option value="7">先生</option>
                        <option value="0">新入生</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <div class="form-floating form-floating-outline mb-3">
                    <input class="form-control" type="date" id="start-date" />
                    <label for="sus-date">開始日時</label>
                </div>
                <div class="form-floating form-floating-outline mb-3">
                    <input class="form-control" type="date" id="end-date" />
                    <label for="sus-date">締切日時</label>
                </div>
                <button class="btn btn-primary waves-effect waves-light" type="button" id="add-btn">追加</button>
            </div>

            <div class="display-part">
                <div class="form-floating form-floating-outline mb-3">
                    <p>全校</p>
                    <select class="form-select rest-date">
                        @foreach ($rest8 as $item)
                            <option value="{{ $item->rest_day }}">{{ $item->rest_day }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="mt-3 delete-btn btn btn-danger waves-effect waves-light"
                        data-val="8">削除</button>
                </div>
                <div class="form-floating form-floating-outline mb-3">
                    <p>先生</p>
                    <select class="form-select rest-date">
                        @foreach ($rest7 as $item)
                            <option value="{{ $item->rest_day }}">{{ $item->rest_day }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="mt-3 delete-btn btn btn-danger waves-effect waves-light"
                        data-val="7">削除</button>
                </div>
                <div class="form-floating form-floating-outline mb-3">
                    <p>6年生</p>
                    <select class="form-select rest-date">
                        @foreach ($rest6 as $item)
                            <option value="{{ $item->rest_day }}">{{ $item->rest_day }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="mt-3 delete-btn btn btn-danger waves-effect waves-light"
                        data-val="6">削除</button>
                </div>
                <div class="form-floating form-floating-outline mb-3">
                    <p>5年生</p>
                    <select class="form-select rest-date">
                        @foreach ($rest5 as $item)
                            <option value="{{ $item->rest_day }}">{{ $item->rest_day }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="mt-3 delete-btn btn btn-danger waves-effect waves-light"
                        data-val="5">削除</button>
                </div>
                <div class="form-floating form-floating-outline mb-3">
                    <p>4年生</p>

                    <select class="form-select rest-date">
                        @foreach ($rest4 as $item)
                            <option value="{{ $item->rest_day }}">{{ $item->rest_day }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="mt-3 delete-btn btn btn-danger waves-effect waves-light"
                        data-val="4">削除</button>
                </div>
                <div class="form-floating form-floating-outline mb-3">
                    <p>3年生</p>

                    <select class="form-select rest-date">
                        @foreach ($rest3 as $item)
                            <option value="{{ $item->rest_day }}">{{ $item->rest_day }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="mt-3 delete-btn btn btn-danger waves-effect waves-light"
                        data-val="3">削除</button>
                </div>
                <div class="form-floating form-floating-outline mb-3">
                    <p>2年生</p>

                    <select class="form-select rest-date">
                        @foreach ($rest2 as $item)
                            <option value="{{ $item->rest_day }}">{{ $item->rest_day }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="mt-3 delete-btn btn btn-danger waves-effect waves-light"
                        data-val="2">削除</button>
                </div>
                <div class="form-floating form-floating-outline mb-3">
                    <p>1年生</p>

                    <select class="form-select rest-date">
                        @foreach ($rest1 as $item)
                            <option value="{{ $item->rest_day }}">{{ $item->rest_day }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="mt-3 delete-btn btn btn-danger waves-effect waves-light"
                        data-val="1">削除</button>
                </div>
                <div class="form-floating form-floating-outline mb-3">
                    <p>新入生</p>

                    <select class="form-select rest-date">
                        @foreach ($rest0 as $item)
                            <option value="{{ $item->rest_day }}">{{ $item->rest_day }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="mt-3 delete-btn btn btn-danger waves-effect waves-light"
                        data-val="0">削除</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            const cGradeSelect = document.getElementById("c_grade");
            const startDateInput = document.getElementById("start-date");
            const endDateInput = document.getElementById("end-date");
            const addButton = document.getElementById("add-btn");

            // Function to get all dates between start date and end date
            function getAllDates(startDate, endDate) {
                const datesArray = [];
                let currentDate = new Date(startDate);
                const end = new Date(endDate);

                while (currentDate <= end) {
                    // Format the date as "YYYY-MM-DD"
                    const formattedDate = currentDate.toISOString().split('T')[0];
                    datesArray.push(formattedDate);
                    currentDate.setDate(currentDate.getDate() + 1);
                }

                return datesArray;
            }

            $("#add-btn").click(function() {
                // Get selected c_grade value
                const selectedGrade = cGradeSelect.value;
                // Get start and end dates
                const startDate = startDateInput.value;
                const endDate = endDateInput.value;
                let allDates;

                if (startDate && !endDate) {
                    allDates = [startDate];
                } else {
                    allDates = getAllDates(startDate, endDate);
                }

                if (selectedGrade == "" || selectedGrade == null) {
                    toastr.error("学年を選択してください。")
                } else if (startDate == "" || startDate == null) {
                    toastr.error("日付を指定してください。")
                } else {
                    console.log(allDates);
                    $.post("{{ route('restManage.store') }}", {
                        "_token": $('meta[name="csrf_token"]').attr('content'),
                        "c_grade": selectedGrade,
                        "rest_day": allDates,
                    }, function(data) {
                        if (data.status == 200) {
                            toastr.success("追加成功");
                            window.location.reload(true);
                        } else if (data.status == 401) {
                            toastr.error("一致するデータが存在しません。");
                        }
                    }, 'json').catch((error) => {
                        toastr.error("一致するデータが存在しません。");
                    });
                }
            })

            //Delete rest date by each grade
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const restDate = this.parentElement.querySelector('.rest-date').value;
                    const dataVal = this.getAttribute('data-val');
                    deleteRestDay(restDate, dataVal);
                });
            });

            function deleteRestDay(restDate, dataVal) {
               $.post("{{ route('restManage.delete') }}", {
                        "_token": $('meta[name="csrf_token"]').attr('content'),
                        "c_grade": dataVal,
                        "rest_day": restDate,
                    }, function(data) {
                        if (data.status == 200) {
                            toastr.success(data.message);
                            window.location.reload(true);
                        } else if (data.status == 401) {
                            toastr.error("一致するデータが存在しません。");
                        }
                    }, 'json').catch((error) => {
                        toastr.error("一致するデータが存在しません。");
                    });
            }

        })
    </script>
@endsection
