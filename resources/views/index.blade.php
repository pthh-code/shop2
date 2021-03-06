@extends('layouts/master')
@section('banner')
<div class="rev-slider">
	<div class="fullwidthbanner-container">

					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									@foreach($banner as $item)
									@php

										$photo_url = $item->link;
										if($photo_url ==null || $photo_url ="")
										$photo_url=asset('source/image/slide/'.$item->image)
									@endphp
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{$photo_url}}" data-src="{{$photo_url}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{$photo_url}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						        </li>
						        @endforeach
							</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
@endsection
@section('content')

	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left"></p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($newest  as  $item)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{Route('products')}}">
												<img src="{{asset('source/image/product/'.$item->image)}}" alt="" height="200px"></a>
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
											<a class="add-to-cart pull-left" href="{{Route('productCart')}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{Route('productDetail', $item->id)}}?id={{$item->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Top Products</h4>
							<div class="beta-products-details">
								<p class="pull-left"></p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@php
								$count=0;
								@endphp
								@foreach ($best_seller  as $item)
								
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{Route('products')}}"><img src="{{asset('source/image/product/'.$item->image)}}" alt="" height="200px"></a>
										</div>
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
											<a class="add-to-cart pull-left" href="{{Route('productCart')}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{Route('products')}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								
                             @endforeach
						 
                         </div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection