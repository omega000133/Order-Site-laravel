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
            // console.log(billingDate)
            $.post("{{ route('bill.get') }}", {
                "_token": $('meta[name="csrf_token"]').attr('content'),
                "billingDate": billingDate,
            }, function(data) {
                var resp = data.user;
                if (data.status == 200) {

                } else if (data.status == 401) {
                    toastr.error(data.message);
                }
            }, 'json').catch((error) => {
                toastr.error("エラーが発生しました");
            });
        })
    </script>
@endsection
