@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <h4 class="card-header">一括休配</h4>
        <div class="card-body">
            <div class="form-row mt-2 grade-search grade-filter">
                <div class="col">
                    <div class="form-check">
                        <label class="form-check-label label-text">学年 : </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="0" id="grade0">
                        <label class="form-check-label" for="grade0">新入生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="1" id="grade1">
                        <label class="form-check-label" for="grade1">1年生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="2" id="grade2">
                        <label class="form-check-label" for="grade2">2年生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade " type="checkbox" value="3" id="grade3">
                        <label class="form-check-label" for="grade3">3年生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="4" id="grade4">
                        <label class="form-check-label" for="grade4">4年生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="5" id="grade5">
                        <label class="form-check-label" for="grade5">5年生</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input grade" type="checkbox" value="6" id="grade6">
                        <label class="form-check-label" for="grade6">6年生</label>
                    </div>
                </div>
            </div>
            <div class="form-row mt-2 sus-row">
                <div class="form-floating form-floating-outline mb-4">
                    <input class="form-control" type="date" id="sus-date" />
                    <label for="sus-date">休配日付</label>
                </div>
                <div class="form-floating form-floating-outline mb-4">
                   <input id="sus-reason" class="form-control" type="text" placeholder="休配理由">
                   <label for="sus-reason">休配理由</label>
                </div>
                <button class="btn btn-primary btn-lg waves-effect waves-light" type="button" id="apply-btn">実行</button>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="checkModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">注意</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-4 mt-2">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="choosedOrders" class="form-control" placeholder="" />
                                <label for="choosedOrders">対象食数</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4 mt-2">
                            <div class="form-floating form-floating-outline">
                                <p>この対象食数に対して一括休配を設定しますか？</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close_btn btn btn-danger">
                        閉じる
                    </button>
                    <button type="button" class="btn btn-primary" id="applyBtn">
                        設定
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
         var susDate, susGrade, susReason;

            //suspension date
            var sus_date = document.getElementById('sus-date');
            sus_date.addEventListener('change', function() {
               susDate = this.value;
            });

            //suspension grade
            var checkboxes = document.querySelectorAll('.grade');
            checkboxes.forEach(function(checkbox) {
               checkbox.addEventListener('change', function() {
                  susGrade = [];
                  checkboxes.forEach(function(checkbox) {
                     if (checkbox.checked) {
                        susGrade.push(checkbox.value);
                     }
                  });
               });
            });

            
            $("#apply-btn").click(function() {
               susReason = $("#sus-reason").val();
               // console.log(susDate)
                if (susGrade == "" || susGrade == null) {
                    toastr.error("学年を選択してください。")
                } else if (susDate == "" || susDate == null) {
                    toastr.error("休配日付を指定してください。")
                } else if (susReason == "" || susReason == null) {
                    toastr.error("休配理由を入力してください。")
                    $("#sus-reason").focus();
                } else {
                   $.post("{{ route('suspension.store') }}", {
                      "_token": $('meta[name="csrf_token"]').attr('content'),
                      "susGrade": susGrade,
                      "susDate": susDate,
                      "susReason": susReason
                     }, function(data) {
                        if(data.status == 200) {
                           $("#checkModal").modal("show");
                           $("#choosedOrders").val(data.totalCount);

                        } else if(data.status == 401) {
                           toastr.error("一致するデータが存在しません。");
                        }
                    }, 'json').catch((error) => {
                        toastr.error("一致するデータが存在しません。");
                    });
                }
            });

            $("#applyBtn").on("click", function() {
               toastr.success("成果的に設定されました。");
               window.location.reload(true);
               $("#checkModal").modal("hide");
            })

            $(".close_btn").on("click", function() {
                $("#checkModal").modal("hide");
            });

            $(".cancel_btn").on("click", function() {
                $("#checkModal").modal("hide");
            });
        })
    </script>
@endsection
