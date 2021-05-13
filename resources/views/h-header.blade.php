	<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 456, New Orleans</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<li><a href="#"><i class="fa fa-user"></i>Account</a></li>
						<li><a href="#">Log in</a></li>
						<li><a href="#">Log up</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="{{asset('source/assets/dest/images/logo-cake.png')}}" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="/">
					        <input type="text" value="" name="s" id="s" placeholder="Enter words here..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart">Cart</i>(
								@if(Session::has('cart')){{Session('cart')->totalQty}})
								@else Empty 
								@endif 
								<i class="fa  fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@if(Session::has('cart'))
								@foreach($product_cart as $product)
								<div class="cart-item">
												<a class="cart-item-delete" href="{{route('deletecart',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="#"><img src="{{asset('source/image/product/'.$product['item']['image'])}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}}</span>
											<span class="cart-item-amount">{{$product['qty']}}*<span>
									@if($product['item']['promotion_price']==0)
									{{number_format($product['item']['unit_price'])}}
								    @else 
								    {{number_format($product['item']['promotion_price'])}} 
								    @endif</span></span>
										</div>
									</div>
								</div>
								@endforeach
                               
								<div class="cart-caption">
									<div class="cart-total text-right">Total: <span class="cart-total-value">@if(Session::has('cart')){{number_format(Session('cart')->totalPrice)}} @else 0 @endif</span>
									</div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('order')}}" class="beta-btn primary text-center">Order<i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							@endif
						</div>
					  </div>
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
						<li><a href="{{route('Home')}}">Home</a></li>
						<li><a href="#">Types of Product</a>
							<ul class="sub-menu">
								@foreach($type_product as $type)
								<li><a href={{route('ProductType',$type->id)}}>{{$type->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{route('About')}}">About</a></li>
						<li><a href="{{route('Contact')}}">Contact</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> 