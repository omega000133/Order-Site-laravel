@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
   <div class="container-xxl flex-grow-1 container-p-y">
       <!-- Content -->
       <div class="card mt-3">
           <h5 class="card-header">会員情報</h5>
           <div class="card-body">
               <div class="table-responsive text-nowrap">
                   <table class="table table-bordered table-hover table-striped">
                       <thead>
                           <tr>
                               <th>id</th>
                               <th>Eメール</th>
                               <th>児童氏名</th>
                               <th>ふりがな</th>
                               <th>学年</th>
                               <th>保護者氏名</th>
                               <th>ふりがな</th>
                               <th>電話</th>
                               <th>郵便番号</th>
                               <th>都道府県</th>
                               <th>住所</th>
                               <th>建物・部屋番号</th>
                               <th>クレジットカード</th>
                               <th>操作</th>
                           </tr>
                       </thead>
                       <tbody id="user_tbody">
                           <tr>
                              <td>{{ $my_info->id }}</td>
                              <td>{{ $my_info->email }}</td>
                              <td>{{ $my_info->c_name1 }}</td>
                              <td>{{ $my_info->c_name2 }}</td>
                              <td>{{ $my_info->c_grade }}</td>
                              <td>{{ $my_info->p_name1 }}</td>
                              <td>{{ $my_info->p_name2 }}</td>
                              <td>{{ $my_info->p_phone }}</td>
                              <td>{{ $my_info->postcode }}</td>
                              <td>{{ $my_info->prefecture }}</td>
                              <td>{{ $my_info->address }}</td>
                              <td>{{ $my_info->building }}</td>
                              <td>{{ $my_info->card }}</td>
                              <td>
                                 <button type="button"
                                       class="btn btn-icon btn-primary waves-effect waves-light edit_btn"
                                       data-val="{{ $my_info->id }}">
                                       <span class="<tf-icons mdi mdi-pencil-outline"></span>
                                 </button>
                              </td>
                           </tr>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
       <!-- / Content -->

       <div class="content-backdrop fade"></div>

       <!-- update_modal -->
       {{-- <div class="modal" id="update_modal">
           <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h4 class="modal-title">
                           更新
                       </h4>
                       <button type="button" class="cancel_btn btn-close"></button>
                   </div>
                   <div>
                       <div class="modal-body">
                           <div class="row">
                               <div class="col mb-4 mt-2">
                                   <div class="form-floating form-floating-outline">
                                       <input type="email" id="update_email" class="form-control" name="email"
                                           placeholder="xxxx@xxx.xx" />
                                       <label for="メール">メール</label>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col mb-4 mt-2">
                                   <div class="form-floating form-floating-outline">
                                       <input id="update_password" type="password" name="password"
                                           class="form-control" placeholder="xxxxxxxx" />
                                       <label for="パスワード">パスワード</label>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col mb-4 mt-2">
                                   <div class="form-floating form-floating-outline">
                                       <input id="update_confirm_password" type="password"
                                           name="update_confirm_password" class="form-control"
                                           placeholder="xxxxxxxx" />
                                       <label for="パスワード確認">パスワード確認</label>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col mb-4 mt-2">
                                   <div class="form-floating form-floating-outline">
                                       <input id="update_c_name" type="text" name="update_c_name"
                                           class="form-control" placeholder="xxx" />
                                       <label for="事業者名">事業者名</label>
                                   </div>
                               </div>
                               <div class="col mb-4 mt-2">
                                   <div class="form-floating form-floating-outline">
                                       <input id="update_c_address" type="text" name="update_c_address"
                                           class="form-control" placeholder="xxxxxxx" />
                                       <label for="所在地">所在地</label>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col mb-4 mt-2">
                                   <div class="form-floating form-floating-outline">
                                       <input id="update_c_member" type="text" name="update_c_member"
                                           class="form-control" placeholder="xxx" />
                                       <label for="担当者">担当者</label>
                                   </div>
                               </div>
                               <div class="col mb-4 mt-2">
                                   <div class="form-floating form-floating-outline">
                                       <input type="email" id="update_c_member_email" class="form-control"
                                           name="update_c_member_email" placeholder="xxxx@xxx.xx" />
                                       <label for="担当者メール">担当者メール</label>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col mb-4 mt-2">
                                   <div class="form-floating form-floating-outline">
                                       <input id="update_c_phone" type="text" name="update_c_phone"
                                           class="form-control" placeholder="xxxxxxx" />
                                       <label for="電話番号">電話番号</label>
                                   </div>
                               </div>
                               <div class="col mb-4 mt-2">
                                   <div class="form-floating form-floating-outline">
                                       <input id="update_c_site" type="url" name="update_c_site"
                                           class="form-control" placeholder="https://xxxx" />
                                       <label for="自社サイト">自社サイト</label>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col mb-4 mt-2">
                                   <div class="form-floating form-floating-outline">
                                       <input id="update_role" type="number" name="role" max="2"
                                           class="form-control" placeholder="xxxxxxxx" />
                                       <label for="role">役割</label>
                                   </div>
                               </div>
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="close_btn btn btn-label-secondary">
                                   閉じる
                               </button>
                               <button type="button" class="btn btn-primary" id="update_btn">
                                   保存
                               </button>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div> --}}
       <!-- update_modal / -->
   </div>
   <!-- content -->
</div>

@endsection
