@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl">
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
        </div>
    </div>

@endsection
