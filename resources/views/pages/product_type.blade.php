@extends('master') 
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Products {{$k_prod->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('Home')}}">Home</a> / <span>Products </span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($allType as $aType)
							<li><a href="{{route('ProductType',$aType->id)}}">{{$aType->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($prod_Ftype)}}  found</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">

							@foreach($prod_Ftype as $sp)

								<div class="col-sm-4">
									<div class="single-item">
										@if($sp->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('ProductDetail',$sp->id)}}"><img src="{{asset('source/image/product/'.$sp->image)}}" alt="" height="250px" /></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp->name}}</p>
											<p class="single-item-price">
												@if($sp->promotion_price != 0)
												<span class="flash-del">
									 {{number_format($sp->unit_price)}}
   												</span>
												<span class="flash-sale">{{number_format($sp->promotion_price)}} 
												</span>
												@else
												 <span class="flash-del">
									 {{number_format($sp->unit_price)}}
   												</span>
                                                @endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addcart',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('ProductDetail',$sp->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
                            @endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Other Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($prod_elsetype)}} found</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($prod_elsetype as $pe)

								<div class="col-sm-4">
									<div class="single-item">
										@if($pe->promotion_price!=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('ProductDetail',$pe->id)}}"><img src="{{asset('source/image/product/'.$pe->image)}}" alt="" height="250px" /></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$pe->name}}</p>
											<p class="single-item-price">
												@if($pe->promotion_price != 0)
												<span class="flash-del">
									 {{number_format($pe->unit_price)}}
   												</span>
												<span class="flash-sale">{{number_format($pe->promotion_price)}} 
												</span>
												@else
												 <span class="flash-del">
									 {{number_format($pe->unit_price)}}
   												</span>
                                                @endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addcart',$pe->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('ProductDetail',$pe->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
                            @endforeach
                        </div>
                            <div class="row">{{$prod_elsetype->links()}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> 
	@endsection
