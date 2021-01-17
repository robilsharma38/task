@extends('layouts.front')
@section('content')
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Your cart</h1></div>
      		</div>
		</div>
        <!--End Page Title-->

        <div class="container">
                <form action="{{url('checkout')}}" method="post" class="cart style2">
        	        <div class="row">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 main-col">
                    <fieldset>
                                <h2 class="login-title mb-3">Billing details</h2>
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                        <label for="input-firstname">Name <span class="required-f">*</span></label>
                                        <input name="firstname" value="" id="input-firstname" type="text" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-email">Mobile<span class="required-f">*</span></label>
                                        <input name="mobile" value="" id="input-email" type="text" required>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-telephone">Email <span class="required-f">*</span></label>
                                        <input name="email" value="" id="input-telephone" type="email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                        <label for="input-firstname">Address <span class="required-f">*</span></label>
                                        <textarea name="address" id="" cols="30" rows="10" required></textarea>
                                    </div>
                                </div>
                            </fieldset>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 main-col">
                		<table>
                            <thead class="cart__row cart__header">
                                <tr>
                                    
                                    <th colspan="2" class="text-center">Product</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="action">&nbsp;</th>
                                </tr>
                            </thead>
                    		<tbody>
                            @php $total = 0;$total_quantity = 0;@endphp
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $product)
                                <tr class="cart__row border-bottom line1 cart-flex border-top">
                                    <td class="cart__meta small--text-left cart-flex-item">
                                        <div class="list-view-item__title">
                                            <a target="_blank" href="{{url('p')}}/{{$product['slug']}}">{{$product['name']}} </a>
                                        </div>
                                    </td>
                                    <td class="text-center cart__update-wrapper cart-flex-item text-right">
                                        <div class="cart__qty text-center">
                                            <div class="qtyField">
                                                <input class="cart__qty-input qty" type="text" name="qty" id="qty" value="{{$product['quantity']}}" readonly>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center small--hide cart-price">
                                        <div><span class="money">Rs. {{$product['price']}} </span></div>
                                    </td>
                                </tr>
                                    @php
                                        $total += $product['price'];
                                        $product_id[] = $product['id'];
                                        $id = base64_encode(serialize($product_id));
                                        $quantity[] = $product['quantity'];
                                        $q = base64_encode(serialize($quantity));
                                        $product_price[] = $product['price'];
                                        $price = base64_encode(serialize($product_price));
                                    @endphp
                                @endforeach
                                <input type="hidden" name="product" value="{{$id}}">
                                <input type="hidden" name="cart" value="{{$q}}">
                                <input type="hidden" name="price" value="{{$price}}">
                            @endif
                            </tbody>
                    </table>
                    <span style="float:right;margin-right:6%;font-size:20px;margin-bottom:10px;color:#ff5353;">Total : Rs.{{$total}}</span>
                    <input type="submit" id="cartCheckout" class="btn btn--small-wide checkout" value="Checkout">
                    @csrf
                    </form>
               	</div>
                <!-- <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                    <div class="solid-border">
                      <div class="row">
                      	<span class="col-12 col-sm-6 cart__subtotal-title"><strong>Subtotal</strong></span>
                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money">Rs. {{$total}}</span></span>
                      </div>
                      <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
                      <p class="cart_tearm">
                        <label>
                          <input type="checkbox" name="tearm" id="cartTearm" class="checkbox" value="tearm" required="">
                           I agree with the terms and conditions</label>
                      </p>
                      <div class="paymnet-img"><img src="{{url('public/assets/images/payment-img.jpg')}}" alt="Payment"></div>
                    </div>
                </div> -->
            </div>
        </div>

    </div>
    <!--End Body Content-->
@endsection
