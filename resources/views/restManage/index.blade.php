@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <h4 class="card-header">休日設定</h4>
        <div class="card-body">
            <div class="form-floating form-floating-outline mb-4">
                <select id="c_grade" name="c_grade" class="form-select">
                    <option>学年を選択してください。</option>
                    <option value="0">新入生</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">全校</option>
                </select>
            </div>
            <div class="form-floating form-floating-outline mb-4">
                <input class="form-control" type="date" id="start-date" />
                <label for="sus-date">日付</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
                <input class="form-control" type="date" id="end-date" />
                <label for="sus-date">日付</label>
            </div>
            <button class="btn btn-primary btn-lg waves-effect waves-light" type="button" id="add-btn">追加</button>


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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script></script>
@endsection
