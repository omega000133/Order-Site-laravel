@extends('layouts.admin')
@section('content')
<div class="card massetb-4">
   {{-- <div class="user-profile-header-banner">
      <img src="../../asset/img/pages/profile-banner.png" alt="Banner image" class="rounded-top">
    </div> --}}
   <h3 class="card-header">ご利用案内</h3>
   <div class="card-body usage-card-body">
      <p class="demo-inline-spacing mt-5">
         <a class="me-1" data-bs-toggle="collapse" href="#usage-method" aria-expanded="false" aria-controls="collapseExample">
            ▼ご注文方法
          </a>
          <div class="collapse" id="usage-method">
            <div class="d-grid d-sm-flex p-3 border">
              <img src="../../asset/img/elements/m1.jpg" alt="collapse-image" height="125" class="me-4 mb-sm-0 mb-2">
              <a href="uploads/usage_pdf/order.pdf" target="_blank">
                こちらの説明をご覧ください。
              </a>
            </div>
          </div>
      </p>
      <p class="demo-inline-spacing mt-5">
          <a class="me-1" data-bs-toggle="collapse" href="#usage-period" aria-expanded="false" aria-controls="collapseExample">
            ▼ご注文期限と変更
          </a>
          <div class="collapse" id="usage-period">
            <div class="d-grid d-sm-flex p-3 border">
              <img src="../../asset/img/elements/m4.jpg" alt="collapse-image" height="125" class="me-4 mb-sm-0 mb-2">
              <span>
                ご利用日の前日１５時が変更締め切りです。それ以降のご注文、キャンセルはできません。（当日お休みされた場合も代金は頂きます。事前にご了承ください。）
              </span>
            </div>
          </div>
      </p>
      <p class="demo-inline-spacing mt-5">
          <a class="me-1" data-bs-toggle="collapse" href="#usage-pay" aria-expanded="false" aria-controls="collapseExample">
            ▼お支払い方法
         </a>
         <div class="collapse" id="usage-pay">
           <div class="d-grid d-sm-flex p-3 border">
             <img src="../../asset/img/elements/m3.jpg" alt="collapse-image" height="125" class="me-4 mb-sm-0 mb-2">
             <span>
              クレジットカードでのお支払いのみとなります。月末で締めて、翌月に登録されたクレジットカードに請求させて頂きます。
             </span>
           </div>
         </div>
      </p>
      <p class="demo-inline-spacing mt-5">
          <a class="me-1" data-bs-toggle="collapse" href="#usage-other" aria-expanded="false" aria-controls="collapseExample">
            ▼その他注意事項
          </a>
          <div class="collapse" id="usage-other">
            <div class="d-grid d-sm-flex p-3 border">
              <img src="../../asset/img/elements/m2.jpg" alt="collapse-image" height="125" class="me-4 mb-sm-0 mb-2">
              <span>
                休校など、学校の都合によりお弁当の提供ができない場合は自動的にキャンセルされ、代金は発生しません。
              </span>
            </div>
          </div>
      </p>
   </div>
</div>


@endsection
