@extends('layouts.front')
@section('content')
    <!--Body Content-->
    <div id="page-content">
        <div class="container">
        	<div class="row">
                <!--Main Content-->
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                	<div class="productList">
                        <!--Toolbar-->
                    	<div class="toolbar">
                        	<div class="filters-toolbar-wrapper">
                            	<div class="row">
                                    <div class="col-12 col-md-12 col-lg-12 text-right filters-toolbar__item filters-toolbar__item--count">
                                    	<span class="filters-toolbar__product-count"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Toolbar-->
                        <div class="grid-products grid--view-items">
                            <div class="row" id="listing">
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 item">
                                    <p>Your Order is done!! {{Session::get('order_id')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Main Content-->
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
@endsection
@section('javascript')
@endsection