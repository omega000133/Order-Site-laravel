@extends('layouts.admin')
@section('content')
<div class="card massetb-4">
   <div class="user-profile-header-banner">
      <img src="../../asset/img/pages/profile-banner.png" alt="Banner image" class="rounded-top">
    </div>
   <h4 class="card-header">ご利用案内</h4>
   <div class="card-body">
      <p class="demo-inline-spacing mt-4">
         <a class="me-1" data-bs-toggle="collapse" href="#usage-method" aria-expanded="false" aria-controls="collapseExample">
            ▼ご注文方法
          </a>
          <div class="collapse" id="usage-method">
            <div class="d-grid d-sm-flex p-3 border">
              <img src="../../asset/img/elements/m1.jpg" alt="collapse-image" height="125" class="me-4 mb-sm-0 mb-2">
              <span>
               テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
               テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
              </span>
            </div>
          </div>
      </p>
      <p class="demo-inline-spacing mt-4">
          <a class="me-1" data-bs-toggle="collapse" href="#usage-period" aria-expanded="false" aria-controls="collapseExample">
            ▼ご注文期限と変更
          </a>
          <div class="collapse" id="usage-period">
            <div class="d-grid d-sm-flex p-3 border">
              <img src="../../asset/img/elements/m4.jpg" alt="collapse-image" height="125" class="me-4 mb-sm-0 mb-2">
              <span>
               テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
               テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
              </span>
            </div>
          </div>
      </p>
      <p class="demo-inline-spacing mt-4">
          <a class="me-1" data-bs-toggle="collapse" href="#usage-pay" aria-expanded="false" aria-controls="collapseExample">
            ▼お支払い方法
         </a>
         <div class="collapse" id="usage-pay">
           <div class="d-grid d-sm-flex p-3 border">
             <img src="../../asset/img/elements/m3.jpg" alt="collapse-image" height="125" class="me-4 mb-sm-0 mb-2">
             <span>
              テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
              テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
             </span>
           </div>
         </div>
      </p>
      <p class="demo-inline-spacing mt-4">
          <a class="me-1" data-bs-toggle="collapse" href="#usage-other" aria-expanded="false" aria-controls="collapseExample">
            ▼その他注意事項
          </a>
          <div class="collapse" id="usage-other">
            <div class="d-grid d-sm-flex p-3 border">
              <img src="../../asset/img/elements/m2.jpg" alt="collapse-image" height="125" class="me-4 mb-sm-0 mb-2">
              <span>
               テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
               テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
              </span>
            </div>
          </div>
      </p>
   </div>
</div>


@endsection
