@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <h4 class="card-header">メニュー表登録</h4>
        <div class="card-body">
            <div class="mb-3">
                <label for="formFile1" class="form-label">今月のメニュー表</label>
                <input class="form-control" type="file" id="formFile1">
            </div>
            <div class="mb-3">
                <label for="formFile2" class="form-label">来月のメニュー表</label>
                <input class="form-control" type="file" id="formFile2">
            </div>
            <button class="btn btn-primary waves-effect waves-light" type="button" id="register-btn">登録</button>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $("#register-btn").on("click", function() {
                // Fetch files
                var file1 = $("#formFile1")[0].files[0];
                var file2 = $("#formFile2")[0].files[0];

                // Check if both files are selected
                if (!file1) {
                    toastr.error("今月のメニュー表を選択してください。");
                } else if (!file2) {
                    toastr.error("来月のメニュー表を選択してください。");
                } else {
                    // Check file extensions for PDF
                    var isPDF1 = file1.name.toLowerCase().endsWith('.pdf');
                    var isPDF2 = file2.name.toLowerCase().endsWith('.pdf');

                    if (!isPDF1) {
                        toastr.error("今月のメニュー表はPDF形式である必要があります。");
                    } else if (!isPDF2) {
                        toastr.error("来月のメニュー表はPDF形式である必要があります。");
                    } else {
                        // Create FormData object
                        var formData = new FormData();
                        var csrfToken = $('meta[name="csrf_token"]').attr('content');
                        formData.append("file1", file1);
                        formData.append("file2", file2);

                        // Send AJAX request
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            },
                            type: 'POST',
                            url: "{{ url('/menu/store/menu_upload') }}",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                toastr.success("登録成功");
                                window.location.reload(true);
                            },
                            error: function(xhr, status, error) {
                                toastr.error("ファイル形式エラー");
                            }
                        });
                    }
                }
            });
        });
    </script>
@endsection
