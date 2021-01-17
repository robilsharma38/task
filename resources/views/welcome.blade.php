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
                        @if(count($products) > 0)
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
                        <h1 style="text-align:center;">Products</h1>
                            <div class="row" id="listing">
                            @foreach($products as $product)
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4 item">
                                    <!-- start product image -->
                                    <div class="product-image">
                                        <!-- start product image -->
                                        <a href="{{url('p')}}/{{$product->slug}}" target="_blank">
                                            <!-- image -->
                                            <img class="blur-up lazyload" data-src="{{url('public/images/product')}}/{{$product->id}}/{{$product->image}}" src="{{url('public/images/product')}}/{{$product->id}}/{{$product->image}}" alt="" style="height:100px;width:100px;">
                                            <!-- End image -->
                                        </a>
                                        <!-- end product image -->
                                    </div>
                                    <!-- end product image -->
                                    <!--start product details -->
                                    <div class="product-details text-center">
                                        <!-- product name -->
                                        <div class="product-name">
                                            <a href="{{url('p')}}/{{$product->slug}}" target="_blank"><strong>{{$product->name}}</strong></a>
                                        </div>
                                        <!-- End product name -->
                                    </div>
                                    <!-- End product details -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="pagination">
                     
                    </div>
                    @else
                    <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_Dczay3.json"  background="transparent" speed="1"  style="width: 300px; height: 300px;margin: 0 auto;"  loop autoplay></lottie-player>
                    @endif
                </div>
                <!--End Main Content-->
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
@endsection
@section('javascript')
@endsection