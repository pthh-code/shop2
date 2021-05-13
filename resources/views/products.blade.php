@extends('layouts/master')
@section('header')
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="index.html">Home</a></li>
						<li><a href="#">Products</a>
							<ul class="sub-menu">
								<li><a href="product_type.html">Sản phẩm 1</a></li>
								<li><a href="product_type.html">Sản phẩm 2</a></li>
								<li><a href="product_type.html">Sản phẩm 4</a></li>
							</ul>
						</li>
						<li><a href="about.html">Giới thiệu</a></li>
						<li><a href="contacts.html">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
@endsection
@section('banner')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Products</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{Route('home-page')}}">Home</a> / <span><a href="{{Route('products')}}">Products</a></span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
@endsection
@section('content')
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
								@php
									$categories = DB::table('type_products')->get();
								@endphp
								@foreach ($categories as $item)
							<li><a href="{{Route('products')}}?id={{$item->id}}">{{$item->name}}</a></li>
							    @endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>List of Products</h4>
							<div class="beta-products-details">
								<p class="pull-left"></p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach ($products as $item)
									@php
										$photo_url=asset('source/image/product/'.$item->image)
									@endphp
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{Route('products')}}"><img src="{{$photo_url}}" height="210px" width="200px" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$item->name}}</p>
											<p class="single-item-price" style="margin-bottom: 10px">
												<span>$
													@php
													$price =$item->promotion_price; 
													 if($price==0)
													   $price= $item-> 	unit_price;
													@endphp
													{{number_format($price)}}
												</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{Route('products')}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
                                @endforeach
                                <div class="col-md-12">
                                	{{ $products->appends($_GET)->links() }}
                                </div>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection