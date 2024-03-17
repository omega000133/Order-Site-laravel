@extends('layouts.admin')
@section('content')
<div class="card mt-3">
   <h4 class="card-header">注文管理</h4>
   <div class="card-body">
       <div class="table-responsive text-nowrap">
           <table class="table table-bordered table-hover table-striped">
               <thead>
                   <tr>
                       <th>id</th>
                       <th>児童氏名</th>
                       <th>学年</th>
                       <th>卒業年代</th>
                       <th>保護者氏名</th>
                       <th>電話番号</th>
                       <th>住所</th>
                   </tr>
               </thead>
               <tbody id="user-tbody">
                   <tr>
                       <td>{{ $order_info->id }}</td>
                       <td>{{ $order_info->c_name1 }}</td>
                       <td>{{ $order_info->c_grade }}</td>
                       <td>{{ $order_info->grade_year }}</td>
                       <td>{{ $order_info->p_name1 }}</td>
                       <td>{{ $order_info->p_phone }}</td>
                       <td>{{ $order_info->address }}</td>
                   </tr>
               </tbody>
           </table>
       </div>
   </div>
</div>
@endsection