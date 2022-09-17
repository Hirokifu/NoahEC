@extends('frontend.main_master')
@section('content')

@section('title')
{{-- {{ $data['title'] }} Product Details --}}
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">HOME</a></li>
                <li><a href="/m_mart_view">農林水産</a></li>
				<li class='active'>和牛肉</li>
			</ul>
		</div>
	</div>
</div>

<div class="body-content outer-top-xs">
	<div class='container'>
	<div class='row single-product'>

		<div class='col-md-0 sidebar'>
			<div class="sidebar-module-container">

            {{-- @include('frontend.common.hot_deals') --}}

            </div>
        </div><!-- /.sidebar -->


        <div class='col-md-12'>
            <div class="detail-block">
            <div class="row  wow fadeInUp">

                <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                <div class="product-item-holder size-big single-product-gallery small-gallery">

                    <div id="owl-single-product">

                        @foreach($data as $key => $value)
                        <div class="single-product-gallery-item" id="slide{{ $key }}">
                            <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($value['img'] ) }} ">
                                <img class="img-responsive" alt="" src="{{ asset($value['img'] ) }} " data-echo="{{ asset($value['img'] ) }} " style="border-radius: 8px" width="100%">
                            </a>
                        </div>
                        @endforeach

                    </div><!-- /.single-product-slider -->

                    {{-- <div class="single-product-gallery-thumbs gallery-thumbs">
                        <div id="owl-single-product-thumbnails">

                            @foreach($data as $key => $value)
                            <div class="item">
                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{ $key }}">
                                    <img class="img-responsive" width=100% alt="" src="{{ asset($value['img']) }} " data-echo="{{ asset($value['img']) }}" style="border-radius: 2px;">
                                </a>
                            </div>
                            @endforeach

                        </div><!-- /#owl-single-product-thumbnails -->
                    </div><!-- /.gallery-thumbs --> --}}

                </div><!-- /.single-product-gallery -->
                </div><!-- /.gallery-holder -->


                {{-- @php
                    $reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                    $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                @endphp --}}


                <div class='col-sm-6 col-md-7 product-info-block'>
                    <div class="product-info">

                        @foreach($data as $key => $value)

                        <h3 class="name" id="pname">
                            {{ $value['title'] }}
                        </h3>
{{--
                        <div class="rating-reviews m-t-20">
                            <div class="row">
                                <div class="col-sm-3">

                                @if($avarage == 0)
                                No Rating
                                @elseif($avarage == 1 || $avarage < 2)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                @elseif($avarage == 2 || $avarage < 3)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                @elseif($avarage == 3 || $avarage < 4)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>

                                @elseif($avarage == 4 || $avarage < 5)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                @elseif($avarage == 5 || $avarage < 5)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                @endif

                                </div>

                            <div class="col-sm-8">
                                <div class="reviews">
                                    <a href="#" class="lnk">({{ count($reviewcount) }}Reviews)</a>
                                </div>
                            </div>
                            </div><!-- /.row -->
                        </div><!-- /.rating-reviews --> --}}



                        <div class="stock-container info-container m-t-10">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="stock-box">
                                        <span class="label">販売最小ロット:</span>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="stock-box">
                                        <span class="value">{{ $value['spec'][1] }}</span>
                                    </div>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.stock-container -->

                        <div class="description-container m-t-20">
                            包装形態：{{ $value['spec'][5] }}
                        </div><!-- /.description-container -->

                        <div class="price-container info-container m-t-20">
                            <div class="row">

                            <div class="col-sm-6">
                                <div class="price-box">
                                    <span class="price">{{ $price }}</span>
                                    {{-- @if ($product->discount_price == NULL)
                                        <span class="price">${{ $product->selling_price }}</span>
                                    @else
                                        <span class="price">${{ $product->discount_price }}</span>
                                        <span class="price-strike">${{ $product->selling_price }}</span>
                                    @endif --}}
                                </div>
                            </div>

                            </div><!-- /.row -->
                        </div><!-- /.price-container -->


                        <!-- End Add Product Color And Product Size -->

                        <div class="quantity-container info-container">
                            <div class="row">

                            <div class="col-sm-2">
                                <span class="label">数量：</span>
                            </div>

                            <div class="col-sm-2">
                                <div class="cart-quantity">
                                    <div class="quant-input">
                                        <div class="arrows">
                                            <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                            <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                        </div>
                                        <input type="text" id="qty" value="1" min="1">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="key" value="{{ ($key+1) }}" min="1">

                            <div class="col-sm-7">
                                <button type="submit" onclick="addToCart()" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> カートに入れる</button>
                            </div>

                            </div><!-- /.row -->
                        </div><!-- /.quantity-container


                {{-- www.addthis.com/dashboardにてリンク先などをカスタマイズすること --}}
                <div class="addthis_inline_share_toolbox_8tvu"></div>-->

                        @endforeach
                    </div><!-- /.product-info
                </div><!-- /.col-sm-7 -->
</div><!-- /.row -->
</div>


<div class="product-tabs inner-bottom-xs  wow fadeInUp">
	<div class="row">
		<div class="col-sm-3">
			<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
				<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
				<li><a data-toggle="tab" href="#review">REVIEW</a></li>
				<li><a data-toggle="tab" href="#tags">TAGS</a></li>
			</ul>
		</div>
		<div class="col-sm-9">

		<div class="tab-content">

            @foreach($data as $key => $value)
			<div id="description" class="tab-pane in active">
				<div class="product-tab">

					<div class="text">{{ $value['spec'][0] }}</div>
                    <div class="text">{{ $value['spec'][1] }}</div>
                    <div class="text">{{ $value['spec'][2] }}</div>
                    <div class="text">{{ $value['spec'][3] }}</div>
                    <div class="text">{{ $value['spec'][18] }}</div>
                    <div class="text"><a href="{{ $url }}">販売会社</a></div>

				</div>
			</div><!-- /.tab-pane -->
            @endforeach

			{{-- <div id="review" class="tab-pane">
				<div class="product-tab">

				<div class="product-reviews">
					<h4 class="title">Customer Reviews</h4>

					@php
					$reviews = App\Models\Review::where('product_id',$product->id)->latest()->limit(5)->get();
					@endphp

						<div class="reviews">

						@foreach($reviews as $item)
						@if($item->status == 0)

						@else

						<div class="review">

						<div class="row">
							<div class="col-md-6">
							<img style="border-radius: 50%" src="{{ (!empty($item->user->profile_photo_path))? url('upload/user_images/'.$item->user->profile_photo_path):url('upload/no_image.jpg') }}" width="40px;" height="40px;"><b> {{ $item->user->name }}</b>

							@if($item->rating == NULL)

							@elseif($item->rating == 1)
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							@elseif($item->rating == 2)
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>

							@elseif($item->rating == 3)
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<span class="fa fa-star"></span>

							@elseif($item->rating == 4)
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							@elseif($item->rating == 5)
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>

							@endif

							</div>

							<div class="col-md-6">

							</div>
						</div> <!-- // end row -->



							<div class="review-title"><span class="summary">{{ $item->summary }}</span><span class="date"><i class="fa fa-calendar"></i><span> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </span></span></div>
							<div class="text">"{{ $item->comment }}"</div>
							</div>

							@endif
						@endforeach
				</div><!-- /.reviews -->


				</div><!-- /.product-reviews -->

                <div class="product-add-review">
                    <h4 class="title">Write your own review</h4>
                    <div class="review-table">

                    </div><!-- /.review-table -->

                    <div class="review-form">
                        @guest
                        <p> <b> For Add Product Review. You Need to Login First <a href="{{ route('login') }}">Login Here</a> </b> </p>

                        @else

                        <div class="form-container">

                        <form role="form" class="cnt-form" method="post" action="{{ route('review.store') }}">
                            @csrf

                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cell-label">&nbsp;</th>
                                        <th>1 star</th>
                                        <th>2 stars</th>
                                        <th>3 stars</th>
                                        <th>4 stars</th>
                                        <th>5 stars</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell-label">Quality</td>
                                        <td><input type="radio" name="quality" class="radio" value="1"></td>
                                        <td><input type="radio" name="quality" class="radio" value="2"></td>
                                        <td><input type="radio" name="quality" class="radio" value="3"></td>
                                        <td><input type="radio" name="quality" class="radio" value="4"></td>
                                        <td><input type="radio" name="quality" class="radio" value="5"></td>
                                    </tr>

                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                        <input type="text" name="summary" class="form-control txt" id="exampleInputSummary" placeholder="">
                                    </div><!-- /.form-group -->
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                        <textarea class="form-control txt txt-review" name="comment" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                    </div><!-- /.form-group -->
                                </div>
                            </div><!-- /.row -->

                            <div class="action text-right">
                                <button type="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                            </div><!-- /.action -->

                            </form><!-- /.cnt-form -->
                            </div><!-- /.form-container -->

                            @endguest

                        </div><!-- /.review-form -->

                    </div><!-- /.product-add-review -->

                </div><!-- /.product-tab -->
            </div><!-- /.tab-pane --> --}}


	<div id="tags" class="tab-pane">
	<div class="product-tag">

		<h4 class="title">Product Tags</h4>
		<form role="form" class="form-inline form-cnt">
			<div class="form-container">

				<div class="form-group">
					<label for="exampleInputTag">Add Your Tags: </label>
					<input type="email" id="exampleInputTag" class="form-control txt">
				</div>

				<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
			</div><!-- /.form-container -->
		</form><!-- /.form-cnt -->

		<form role="form" class="form-inline form-cnt">
			<div class="form-group">
				<label>&nbsp;</label>
				<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
			</div>
		</form><!-- /.form-cnt -->



		</div><!-- /.product-tab -->
		</div><!-- /.tab-pane -->

		</div><!-- /.tab-content -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.product-tabs -->

</div>
</div>
</div>
</div>

@endsection