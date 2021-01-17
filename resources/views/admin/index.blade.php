@extends('layouts.admin')
@section('title','Admin Dashboard')
@section('content')

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Admin Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-12 col-lg-6">

                                <div class="row">
                                    <!-- category div starts here  -->
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-currency-usd widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted font-weight-normal mt-0" title="Categories">User</h5>
                                                <h3 class="mt-3 mb-3">{{$user}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> 
                                    <!-- category div ends here  -->

                                    <!-- sub category div starts here  -->
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Live Product</h5>
                                                <h3 class="mt-3 mb-3">{{$live_product}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div>
                                    <!-- sub category div ends here  -->

                                    <!-- seller div starts here  -->
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Disabled Product</h5>
                                                <h3 class="mt-3 mb-3">{{$disable_product}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> 
                                     <!-- seller div ends here  -->

                                    <!-- weave div starts here  -->
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Order</h5>
                                                <h3 class="mt-3 mb-3">1</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div>
                                     <!-- weave div ends here  -->                                   
                                    
                                </div> <!-- end row -->
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->
                    </div>
                    <!-- container -->
                </div>
                <!-- content -->
                
@endsection