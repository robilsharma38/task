@extends('layouts.admin')
@section('title','Create Product')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title margin-mb">Add Product</h4>
                                        <ul class="nav nav-tabs nav-bordered mb-1">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="custom-styles-preview">
                                                <form id="add_product" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                                @include('admin.product.form')
                                                @csrf
                                                </form>                                            
                                            </div> <!-- end preview-->
                                        </div> <!-- end tab-content-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
@endsection
@section('javascript')

$.validator.setDefaults({
        submitHandler : function(form) {
            form.submit();
        }
    });
    $("#add_product").validate({

            rules: {
                title: "required",
                description: "required",
                quantity: "required",
                price: "required",
                image: "required",
            },

            messages: {
                title: "* Enter Title",
                description: "* Enter Description",
                quantity: "* Enter Quantity",
                price: "* Enter Price",
                image: "* Select Image",
            }
        });
@endsection