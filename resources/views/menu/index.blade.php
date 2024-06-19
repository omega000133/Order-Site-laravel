@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <h4 class="card-header">メニュー表登録</h4>
        <div class="card-body">
            <label for="formFile1" class="form-label">今月のメニュー表</label>
            <div class="menu-part">
                <div class="form-floating form-floating-outline mb-3">
                    <select id="month1" name="month1" class="form-select">
                        <option value="1">1月</option>
                        <option value="2">2月</option>
                        <option value="3">3月</option>
                        <option value="4">4月</option>
                        <option value="5">5月</option>
                        <option value="6">6月</option>
                        <option value="7">7月</option>
                        <option value="8">8月</option>
                        <option value="9">9月</option>
                        <option value="10">10月</option>
                        <option value="11">11月</option>
                        <option value="12">12月</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="file" id="formFile1">
                </div>
            </div>
            <label for="formFile2" class="form-label">来月のメニュー表</label>
            <div class="menu-part">
                <div class="form-floating form-floating-outline mb-3">
                    <select id="month2" name="month2" class="form-select">
                        <option value="0">非表示</option>
                        <option value="1">1月</option>
                        <option value="2">2月</option>
                        <option value="3">3月</option>
                        <option value="4">4月</option>
                        <option value="5">5月</option>
                        <option value="6">6月</option>
                        <option value="7">7月</option>
                        <option value="8">8月</option>
                        <option value="9">9月</option>
                        <option value="10">10月</option>
                        <option value="11">11月</option>
                        <option value="12">12月</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="file" id="formFile2">
                </div>
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
                var month1 = $("#month1").val();
                var month2 = $("#month2").val();
    
                // Check if file1 is selected
                if (!file1) {
                    toastr.error("今月のメニュー表を選択してください。");
                } else {
                    // Check file extensions for PDF
                    var isPDF1 = file1.name.toLowerCase().endsWith('.pdf');
                    var isPDF2 = !file2 || file2.name.toLowerCase().endsWith('.pdf'); // Check if file2 exists
    
                    if (!isPDF1) {
                        toastr.error("今月のメニュー表はPDF形式である必要があります。");
                    } else if (!isPDF2 && month2 != 0) {
                        toastr.error("来月のメニュー表を選択してください。");
                    } else {
                        // Create FormData object
                        var formData = new FormData();
                        var csrfToken = $('meta[name="csrf_token"]').attr('content');
                        formData.append("file1", file1);
                        if (month2 != 0 && !file2) { // Ensure file2 is selected when month2 is not 0
                            toastr.error("来月のメニュー表を選択してください。");
                            return;
                        }
                        if (file2) {
                            formData.append("file2", file2);
                        }
                        formData.append("month1", month1);
                        formData.append("month2", month2);
    
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
