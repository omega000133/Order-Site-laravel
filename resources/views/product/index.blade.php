@extends('layouts.admin')
@section('content')
    <div class="card massetb-4">
        {{-- <div class="user-profile-header-banner">
      <img src="../../asset/img/pages/profile-banner.png" alt="Banner image" class="rounded-top">
    </div> --}}
        <h3 class="card-header">商品情報</h3>
        <div class="card-body">
            <div class="form-floating form-floating-outline mb-4">
               <input class="form-control" type="text" value="普通食" id="product_name" readonly>
               <label for="product_name">商品名※</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
               <input class="form-control" type="text" value="8%" id="product_tax_rate" readonly>
               <label for="product_tax_rate">税率※</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
               <input class="form-control" type="text" value="500円" id="product_total_price" readonly>
               <label for="product_total_price">税込単価※</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
               <input class="form-control" type="text" value="40円" id="product_tax_price" readonly>
               <label for="product_tax_price">消費税額※</label>
            </div>
        </div>
    </div>
@endsection
