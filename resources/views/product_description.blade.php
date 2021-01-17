@extends('layouts.front')
@section('content')
<!--Body Content-->
<div id="page-content">
<!--MainContent-->
<div id="MainContent" class="main-content" role="main">
<!--Breadcrumb-->
<div class="bredcrumbWrap">
   <div class="container breadcrumbs">
   </div>
</div>
<!--End Breadcrumb-->
<div id="ProductSection-product-template" class="product-template__container prstyle1 ">
<!--product-single-->
<div class="product-single container">
   <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
         <div class="product-details-img">
            <div class="product-thumb">
               <div id="gallery" class="product-dec-slider-2 product-tab-left">
                  <a data-image="{{url('public/images/product')}}/{{$product->id}}/{{$product->image}}" data-zoom-image="{{url('public/images/product')}}/{{$product->id}}/{{$product->image}}" class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1">
                  <img class="blur-up lazyload" src="{{url('public/images/product')}}/{{$product->id}}/{{$product->image}}" alt="" />
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
         <div class="product-single__meta">
            <h1 class="product-single__title">{{$product->name}}</h1>
            <table class="table table-striped product_table">
               <tbody>
                  <tr>
                     <td>Quantity</td>
                     <td>{{$product->quantity}}</td>
                  </tr>
                  <tr>
                     <td>Price</td>
                     <td>{{$product->price}}</td>
                  </tr>
               </tbody>
            </table>
            <form method="post" action="{{route('addToCart')}}" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
               <!-- Product Action -->
               <div class="product-action clearfix">
                  <div class="product-form__item--quantity">
                     <div class="wrapQtyBtn">
                        <div class="quantity">
                              <input class="form-control qty" type="number" step="1" min="1" name="quantity" id="quantity" value="1" title="Qty">
                              <input type="hidden" name="slug" value="{{$slug}}">
                        </div>
                     </div>
                  </div>
                  <div class="product-form__item--submit">
                     <button type="submit" name="add" class="btn product-form__cart-submit">
                     <span>Add to cart</span>
                     </button>
                  </div>
               </div>
               <!-- End Product Action -->
               <label id="label_error" style="color:red;"></label>
               @csrf
            </form>
         </div>
      </div>
      <div class="product-single__description rte">
         <h2>Description :- </h2>
         <?php echo $product->description; ?>
      </div>
   </div>
   <!--End-product-single-->
</div>
<!--End Body Content-->

@endsection
