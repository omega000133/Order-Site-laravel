@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl schedule-calendar">
            <div class="card">
                <div class="control-part1">
                    <button class="btn btn-danger" id="prevBtn">&lt;</button>
                    <h2 id="monthYear"></h2>
                    <button class="btn btn-danger" id="nextBtn">&gt;</button>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" id="calendar">
                        <thead>
                            <tr>
                                <th data-day="0">日</th>
                                <th data-day="1">月</th>
                                <th data-day="2">火</th>
                                <th data-day="3">水</th>
                                <th data-day="4">木</th>
                                <th data-day="5">金</th>
                                <th data-day="6">土</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="control-part2">
                <div class="btn-group1">
                    <button class="btn btn-primary" id="every-use">毎日利用</button>
                    <button class="btn btn-success" id="order-save">注文確定</button>
                </div>
                <div class="btn-group2">
                    <button class="btn btn-danger" id="every-cancel">毎日キャンセル</button>
                </div>
            </div>
        </div>
    </div>
@endsection
