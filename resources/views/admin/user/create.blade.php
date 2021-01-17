@extends('layouts.admin')
@section('title','Create User')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row" style="margin-top:40px;">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title margin-mb">Add User</h4>
                                        <ul class="nav nav-tabs nav-bordered mb-1">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="custom-styles-preview">
                                                <form id="add_user" action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                                                @include('admin.user.form')
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
    $("#add_user").validate({

            rules: {
                full_name: "required",
                email: "required",
                mobile: "required",
                country: "required",
                state: "required",
                district: "required",
                password: "required",
                role: "required",
                status: "required",
                profile_image: "required",
            },

            messages: {
                full_name: "* Enter name",
                email: "* Enter email",
                mobile: "* Enter mobile",
                country: "* Select Country",
                state: "* Select State",
                district: "* Select District",
                password: "* Enter password",
                role: "* Select Role",
                status: "* Select Status",
                profile_image: "* Select Profile Image",
            }
        });
@endsection