@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <h4 class="card-header">配達伝票</h4>
        <div class="card-body">
            <div class="form-row mt-2 sus-row">
                <div class="form-floating form-floating-outline mb-4">
                    <input class="form-control" type="date" id="delivery-date" />
                    <label for="delivery-date">配達日</label>
                </div>
                <button class="btn btn-primary btn-lg waves-effect waves-light" type="button" id="display-btn">表示</button>
                <button class="btn btn-success btn-lg waves-effect waves-light" type="button" id="display-btn">印刷</button>
            </div>
            <div class="table-responsive text-nowrap">
               <table class="table table-bordered table-hover table-striped">
                   <thead>
                       <tr>
                           <th>コード</th>
                           <th>児童氏名</th>
                           <th>ふりがな</th>
                       </tr>
                   </thead>
                   <tbody>
                   </tbody>
               </table>
           </div>
        </div>
    </div>

    <script>
      
    </script>
@endsection
