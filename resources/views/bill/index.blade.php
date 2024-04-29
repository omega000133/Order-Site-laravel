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
            $.post("{{ route('bill.get') }}", {
                "_token": $('meta[name="csrf_token"]').attr('content'),
                "billingDate": billingDate,
            }, function(response) {
                // Create a blob object from the response
                var blob = new Blob([response], {
                    type: 'text/csv'
                });

                // Create a temporary URL for the blob
                var url = window.URL.createObjectURL(blob);

                // Create a link element
                var link = document.createElement('a');
                link.href = url;
                link.download = '決済_' + billingDate + '.csv';

                // Append the link to the document body
                document.body.appendChild(link);

                // Trigger a click event on the link to start the download
                link.click();

                // Cleanup: remove the link and revoke the URL
                document.body.removeChild(link);
                window.URL.revokeObjectURL(url);
                toastr.success("成果的にダウンロードしました。");
                window.location.reload('true');
            }).fail(function() {
                toastr.error("エラーが発生しました");
            });
        });
    </script>
@endsection
