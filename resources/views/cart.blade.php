@extends('layouts/master')
@section('header')
<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 90-92 Johnston, Louisiana</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<!-- <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li> -->
						<li><a href="">Loginnn</a></li>
						<li><a href="">Register</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{Route('home-page')}}" id="logo"><img src="{{asset('source/assets/dest/images/logo-cake.png')}}" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="/">
					        <input type="text" value="" name="s" id="s" placeholder="Enter your key..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Cart (Empty) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
						
						@foreach($carts as $item)
								<div class="cart-item">
									<div class="media">
										<a class="pull-left" href="#"><img src="{{asset('source/assets/dest/images/products/cart/1.png')}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$item->name}}</span>
											<span class="cart-item-options">Size: {{$item->size}}; Color: {{$item->color}}</span>
											<span class="cart-item-amount">${{$item->price*$item->num}}</span>
										</div>
									</div>
								</div>
								@endforeach
								<div class="cart-caption">
									<div class="cart-total text-right">Total: <span class="cart-total-value">$</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{Route('checkout')}}" class="beta-btn primary text-center">Checkout <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{Route('home-page')}}">Home</a></li>
						<li><a href="{{Route('products')}}">Products</a>
							<ul class="sub-menu">
								@php
									$categories = DB::table('type_products')->get();
								@endphp
								@foreach ($categories as $item)
								<li><a href="{{Route('products')}}?id={{$item->id}}">{{$item->name }}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="about.html">About</a></li>
						<li><a href="contacts.html">Contact</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
@endsection
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Shopping Cart</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{Route('home-page')}}">Home</a> / <span>Shopping Cart</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Product</th>
							<th class="product-price">Price</th>
							<th class="product-status">Status</th>
							<th class="product-quantity">Qty.</th>
							<th class="product-subtotal">Total</th>
							<th class="product-remove">Remove</th>
						</tr>
					</thead>
					<tbody>
						@php
						$total = 0;
						@endphp
						@foreach($carts as $item)
					    @php
                            $total += $item->price*$item->num;
					    @endphp
						<tr class="cart_item">
							<td class="product-name">
								<div class="media">
									<img class="pull-left" src="assets/dest/images/shoping1.jpg" alt="">
									<div class="media-body">
										<p class="font-large table-title">{{$item->name}}</p>
										<p class="table-option">Color: {{$item->color}}</p>
										<p class="table-option">Size:{{$item->size}}</p>
										<a class="table-edit" href="#">Edit</a>
									</div>
								</div>
							</td>

							<td class="product-price">
								<span class="amount">${{number_format($item->price)}}</span>
							</td>

							<td class="product-status">
								In Stock
							</td>

							<td class="product-quantity">
								<input type="number" id="number_{{$item->id}}" name="number" value="{{$item->num}}" onchange="updateToCart('{{$item->id}}','{{$item->color}}', '{{$item->size}}')">
							</td>

							<td class="product-subtotal">
								<span class="amount">${{$item->price*$item->num}}</span>
							</td>

							<td class="product-remove">
								<a href="#" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						@endforeach

					</tbody>

					<tfoot>
						<tr>
							<td colspan="6" class="actions">

								<div><a href="{{Route('checkout')}}">
									<button type="submit" class="beta-btn primary" name="apply_coupon">Checkout </button>
								</a>
								</div>
								
							</td>
						</tr>
					</tfoot>
				</table>
				<!-- End of Shop Table Products -->
			</div>


			<!-- Cart Collaterals -->
			<div class="cart-collaterals">


				<div class="cart-totals pull-right">
					<div class="cart-totals-row"><h5 class="cart-total-title">Cart Totals</h5></div>
					<div class="cart-totals-row"><span>Cart Subtotal:</span> <span>${{number_format($total)}}</span></div>
					<div class="cart-totals-row"><span>Shipping:</span> <span>Free Shipping</span></div>
					<div class="cart-totals-row"><span>Order Total:</span> <span>${{number_format($total)}}</span></div>
				</div>

				<div class="clearfix"></div>
			</div>
			<!-- End of Cart Collaterals -->
			<div class="clearfix"></div>

		</div> <!-- #content -->
	</div> <!-- .container -->

	@endsection
