@extends('layouts/master')

@section('content')

<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="{{asset('source/image/product/'.$detail->image)}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$detail->name}}</p>
								<p class="single-item-price">
									<span>
										$
										@php
											$price =$detail->promotion_price; 
												if($price==0)
													$price= $detail-> 	unit_price;
										@endphp
													{{number_format($price)}}
									</span>
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p></p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Options:</p>
							<div class="single-item-options">
								<select class="wc-select" id="size" name="size">
									<option value="">Size</option>
									<option value="XS">XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
								</select>
								<select class="wc-select" id="color" name="color">
									<option value="">Color</option>
									<option value="Red">Red</option>
									<option value="Green">Green</option>
									<option value="Yellow">Yellow</option>
									<option value="Black">Black</option>
									<option value="White">White</option>
								</select>
								<select class="wc-select" id="number" name="number">
									<option value="">Qty</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="{{Route('productCart')}}" onclick="addToCart({{$detail->id}})"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$detail->description}}</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Related Products</h4>

						<div class="row">
							@foreach ($products as $item)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{Route('productDetail', $item->id)}}?id={{$item->id}}"><img src="{{asset('source/image/product/'.$item->image)}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$item->name}}</p>
										<p class="single-item-price">
											<span>$
										@php
											$price =$detail->promotion_price; 
												if($price==0)
													$price= $detail-> 	unit_price;
										@endphp
													{{number_format($price)}}

											</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{Route('productDetail', $item->id)}}?id={{$item->id}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{Route('productDetail', $item->id)}}?id={{$item->id}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
                           @endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									@foreach ($best_seller as $item)
									<a class="" href="{{Route('productDetail', $item->id)}}?id={{$item->id}}"><img src="{{asset('source/image/product/'.$item->image)}}" alt=""></a>
									<div class="media-body">
										{{$item->name}}
										<span class="beta-sales-price">$
										@php
											$price =$detail->promotion_price; 
												if($price==0)
													$price= $item-> 	unit_price;
										@endphp
													{{number_format($price)}} </span>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									@foreach ($newest as $item)
									<a class="" href="{{Route('productDetail', $item->id)}}?id={{$item->id}}"><img src="
										{{asset('source/image/product/'.$item->image)}}
										" alt=""></a>
									<div class="media-body">
										{{$item->name}}
										<span class="beta-sales-price">$
										@php
											$price =$detail->promotion_price; 
												if($price==0)
													$price= $item-> 	unit_price;
										@endphp
													{{number_format($price)}} </span>
									</div>
								@endforeach
							</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div><!-- contain -->
	@endsection

