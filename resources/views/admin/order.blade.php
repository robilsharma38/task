@extends('layouts.admin')
@section('title','Order Index')
@section('content')
<!-- Start Content-->
<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
      <div class="col-12">
         <div class="page-title-box">
            <h4 class="page-title">Order Master</h4>
         </div>
      </div>
   </div>
   <!-- end page title --> 
   <div class="row">
      <div class="col-12">
         @if(Session::has('danger'))
         <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{Session::get('danger')}}</strong> 
         </div>
         @endif
         @if(Session::has('success'))
         <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{Session::get('success')}}</strong> 
         </div>
         @endif
         <div class="card">
            <div class="card-body">
               <div class="row mb-2">
                  <div class="col-sm-12">
                  </div>
               </div>
               <div class="tab-content">
                  <div class="tab-pane show active" id="buttons-table-preview">
                     <table id="example" class="table table-striped dt-responsive nowrap w-100">
                           <thead>
                              <tr>
                                 <th>id</th>
                                 <th>Order id</th>
                                 <th>Name</th>
                                 <th>Quantity</th>
                                 <th>Price</th>
                                 <th>User Name</th>
                                 <th>User Email</th>
                                 <th>User Mobile</th>
                                 <th>User Address</th>
                              </tr>
                           </thead>
                           <tbody>
                           </tbody>
                     </table>                                           
                  </div> <!-- end preview-->
               </div> <!-- end tab-content-->
            </div>
            <!-- end card-body-->
         </div>
         <!-- end card -->
      </div>
      <!-- end col-->
   </div>
   <!-- end row-->
</div>
<!-- container -->
</div> <!-- content -->
@endsection
@section('javascript')
$(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('get_order_data') }}",
        "columns" : [
            { "data" : "id"},
            { "data" : "order_id"},
            { "data" : "name"},
            { "data" : "quantity"},
            { "data" : "total_price"},
            { "data" : "user_name"},
            { "data" : "user_mobile"},
            { "data" : "user_email"},
            { "data" : "user_address"},
        ]
    } );
} );
@endsection