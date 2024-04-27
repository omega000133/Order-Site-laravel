@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <h4 class="card-header">請求データ出力</h4>
        <div class="card-body">
            <div class="form-floating form-floating-outline mb-4">
                <input class="form-control" type="month" id="billing-date">
                <label for="html5-month-input">出力年月</label>
            </div>
            <button class="btn btn-primary btn-lg waves-effect waves-light" type="button" id="bill-btn">出力</button>
        </div>
    </div>
    <script>
        var billing_date = document.getElementById('billing-date');
        billing_date.addEventListener('change', function() {
            billingDate = this.value;
        });

        $("#bill-btn").click(function() {
            
        })

    </script>
@endsection
