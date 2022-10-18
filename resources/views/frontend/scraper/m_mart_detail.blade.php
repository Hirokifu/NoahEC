@extends('frontend.main_master')
@section('content')

{{-- @section('title')
{{ $product->product_name_jp }} Product Details
@endsection --}}


{{-- <style>
	.checked {
	color: orange;
	}
</style> --}}


<!-- ============= HEADER : END ========================= -->

{{-- @php
$breadsubsubcat = App\Models\SubSubCategory::with(['category','subcategory'])->where('id',$subsubcat_id)->get();
@endphp --}}

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
                <li><a href="/">HOME</a></li>
                <li><a href="/m_mart_view">農林水産</a></li>
                {{-- <li class='active'>和牛肉</li> --}}
                <li class='active'>{{ $product['title'] }}</li>

                {{-- @foreach($breadsubsubcat as $item)
                <li>{{ $item->category->category_name_jp }}</li>
                @endforeach

                @foreach($breadsubsubcat as $item)
                <li>{{ $item->subcategory->subcategory_name_jp }}</li>
                @endforeach

                @foreach($breadsubsubcat as $item)
                <li class='active'>{{ $item->subsubcategory_name_jp }}</li>
                @endforeach --}}

			</ul>
		</div>
	</div>
</div>


<div class="body-content outer-top-xs">
<div class='container'>

	<div class='row single-product'>

		<div class='col-md-3 sidebar'>
			<div class="sidebar-module-container">

			{{-- <div class="home-banner outer-top-n">
				<img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
			</div> --}}

            <!-- ================= HOT DEALS ================== -->
            @include('frontend.common.hot_deals')
            <!-- ============= HOT DEALS: END ==================== -->


            <!-- ======================= Testimonials====================== -->

            <!-- =================== Testimonials: END =================== -->


            </div>
        </div>



        <div class='col-md-9'>
            <div class="detail-block">
                <div class="row  wow fadeInUp">

                    <div class="col-xs-12 col-sm-6 col-md-6 gallery-holder">
                        <div class="product-item-holder size-big single-product-gallery small-gallery">

                            {{-- 上にある拡大した商品写真 --}}
                            <div id="owl-single-product">

                                {{-- @foreach($multiImag as $img)
                                <div class="single-product-gallery-item" id="slide{{ $img->id }}">
                                    <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($img->photo_name ) }} ">
                                        <img class="img-responsive" width=100% src="{{ asset($img->photo_name ) }} " data-echo="{{ asset($img->photo_name ) }} " style="border-radius: 8px;">
                                    </a>
                                </div>
                                @endforeach --}}

                                {{-- @foreach($product => $value) --}}
                                <div class="single-product-gallery-item" id="slide{{ 'id' }}">
                                    <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($product['img'] ) }} ">
                                        <img class="img-responsive" alt="" src="{{ asset($product['img'] ) }} " data-echo="{{ asset($product['img'] ) }} " style="border-radius: 8px" width="100%">
                                    </a>
                                </div>
                                {{-- @endforeach --}}

                            </div>

                            {{-- 下に並べる縮小した商品写真 --}}
                            {{-- <div class="single-product-gallery-thumbs gallery-thumbs">
                                <div id="owl-single-product-thumbnails">

                                    @foreach($multiImag as $img)
                                    <div class="item">
                                        <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{ $img->id }}">
                                            <img class="img-responsive" width=100% src="{{ asset($img->photo_name ) }} " data-echo="{{ asset($img->photo_name ) }}" style="border-radius: 8px;">
                                        </a>
                                    </div>
                                    @endforeach

                                </div>
                            </div> --}}

                        </div>
                    </div>


                    {{-- @php
                        $data = App\Models\ScraperUrl::where('id',$key)->latest()->get();
                    @endphp --}}


                    <div class='col-sm-6 col-md-6 product-info-block'>
                        <div class="product-info">

                            {{-- @foreach($data as $key => $value) --}}

                            <h3 class="name" id="pname">
                                {{-- @if(session()->get('language') == 'cn') {{ $product->product_name_cn }} @else {{ $product->product_name_jp }} @endif --}}
                                {{ $product['title'] }}
                            </h3>

                            {{-- <div class="rating-reviews m-t-20">
                                <div class="row">
                                    <div class="col-sm-3">

                                    @if($avarage == 0)
                                    評価待ち
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

                                <div class="col-sm-9">
                                    <div class="reviews">
                                        <a href="#" class="lnk">({{ count($reviewcount) }}個の評価)</a>
                                    </div>
                                </div>
                                </div>
                            </div> --}}


                            {{-- <div class="stock-container info-container m-t-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="stock-box">
                                            <span class="label">在庫状況 </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="stock-box">
                                            <span class="value"><strong>{{ $product->product_qty }}</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}


                            <div class="stock-container info-container m-t-8">
                                <div class="row">
                                    <div class="col-sm-3">

                                        <div class="rating rateit-small"></div><span>{{ $product['id'] }}</span>

                                        <div class="stock-box" style="margin:8px 0 0 0">
                                            <span class="label">在庫状況 </span>
                                        </div>

                                        <div class="stock-box" style="margin:8px 0 0 0">
                                            <span class="label">HSコード </span>
                                        </div>

                                        <div class="stock-box" style="margin:8px 0 0 0">
                                            <span class="label">管理番号 </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="stock-box" style="margin:8px 0 0 0">
                                            <span class="value"><strong>{{ $product['spec'][1] }}</strong></span>
                                        </div>

                                        <div class="stock-box" style="margin:8px 0 0 0">
                                            <span class="value"><strong>{{ $product['spec'][5] }}</strong></span>
                                        </div>

                                        <div class="stock-box" style="margin:8px 0 0 0">
                                            <span class="value"><strong>M111100{{ 'id' }}</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="description-container m-t-20">
                                {{-- @if(session()->get('language') == 'cn') {!! $product->long_descp_cn !!} @else {!! $product->long_descp_jp !!} @endif --}}

                                <div class="product-tab">

                                    <div class="text">{{ $product['spec'][0] }}</div>
                                    <div class="text">{{ $product['spec'][1] }}</div>
                                    <div class="text">{{ $product['spec'][2] }}</div>
                                    <div class="text">{{ $product['spec'][3] }}</div>
                                    <div class="text">{{ $product['spec'][18] }}</div>
                                    <div class="text"><a href="{{ $url }}">販売会社</a></div>

                                </div>
                            </div>

                            <div class="price-container info-container m-t-20">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="price-box">
                                            {{-- @if ($product->discount_price == NULL)
                                                <span class="price"><span style="font-size: 50%">￥</span>{{ $product->selling_price }}</span><span style="font-weight: 700">（税込）</span>
                                            @else
                                                <span class="price"><span style="font-size: 50%">￥</span>{{ $product->discount_price }}</span>
                                                <span class="price-strike"><span style="font-size: 50%">￥</span>{{ $product->selling_price }}</span>
                                            @endif--}}

                                            <span class="price"><span style="font-size: 50%">￥</span>{{ $price }}</span><span style="font-weight: 700">（税込）</span>

                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="favorite-button">
                                            <a class="btn btn-danger" data-toggle="tooltip" style="float:right" title="お気に入り登録" id="{{ 'id' }}" onclick="addToWishList(this.id)"><i class="fa fa-heart"></i>
                                            </a>
                                            {{-- <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                                                <i class="fa fa-signal"></i>
                                            </a>
                                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                                                <i class="fa fa-envelope"></i>
                                            </a> --}}
                                        </div>
                                    </div>

                                </div>
                            </div>


                            {{-- 商品サイズや色を選択する --}}
                            <div class="quantity-container info-container">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="label">包装形態:</span>
                                            <select class="form-control" id="color">
                                                {{-- @foreach($product_color_jp as $color) --}}
                                                <option value="{{ $product['spec'][5] }}">{{ ucwords($product['spec'][5]) }}</option>
                                                {{-- @endforeach --}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            @if($product['spec'][6] == null)
                                            @else
                                            <span class="label">サイズ:</span>
                                            <select class="form-control" id="size">
                                                {{-- @foreach($product_size_jp as $size) --}}
                                                <option value="{{ $product['spec'][6] }}">{{ ucwords($product['spec'][6]) }}</option>
                                                {{-- @endforeach --}}
                                            </select>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="label">数量:</span>
                                            <select class="form-control" id="qty">
                                                <option value="1" selected="">1 </option>
                                                <option value="2">2 </option>
                                                <option value="3">3 </option>
                                                <option value="4">4 </option>
                                                <option value="5">5 </option>
                                                <option value="6">6 </option>
                                                <option value="7">7 </option>
                                                <option value="8">8 </option>
                                                <option value="9">9 </option>
                                                <option value="10">10 </option>
                                                <option value="11">11 </option>
                                                <option value="12">12 </option>
                                                <option value="13">13 </option>
                                                <option value="14">14 </option>
                                                <option value="15">15 </option>
                                                <option value="16">16 </option>
                                                <option value="17">17 </option>
                                                <option value="18">18 </option>
                                                <option value="19">19 </option>
                                                <option value="20">20 </option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- 商品サイズや色を選択する --}}



                            {{-- @php
                            $id = Auth::user()->id;
                            $user = App\Models\User::find($id);
                            @endphp --}}

                            {{-- <div class="row">
                                <div class="col-sm-12">
                                    <div class="d-grid gap-2">
                                        <input type="hidden" id="product_id" value="{{ 'id' }}" min="1">

                                        <p><a onclick="addToCart()" class="btn btn-warning" style="width:60%; margin:0 20% 0 20%""><i class="fa fa-shopping-cart inner-right-vs"></i>カートに入れる</a></p>

                                        <p><a href="" class="btn btn-success" style="width:60%; margin:0 20% 0 20%"><i class="fa fa-calendar inner-right-vs"></i>商談する</a></p>

                                        <p><a href="{{ route('inquiry.add') }}" class="btn btn-danger" style="width:60%; margin:0 20% 0 20%""><i class="fa fa-whatsapp inner-right-vs"></i>お問合せ</a></p>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- www.addthis.com/dashboardにてリンク先などをカスタマイズすること --}}
                            {{-- <div class="addthis_inline_share_toolbox_8tvu"></div> --}}

                            {{-- @endforeach --}}
                        </div>
                    </div>

                </div>
            </div>

            <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                <div class="row">
                    <div class="col-sm-3">
                        <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                            <li class="active"><a data-toggle="tab" href="#description">この商品について</a></li>
                            <li><a data-toggle="tab" href="#review">カスタマーレビュー</a></li>
                            <li><a data-toggle="tab" href="#tags">商品タグを作成</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-9">

                        <div class="tab-content">

                            <div id="description" class="tab-pane in active">
                                <div class="product-tab">
                                    {{-- <p class="text">@if(session()->get('language') == 'cn')
                                        {!! $product->long_descp_cn !!} @else {!! $product->long_descp_jp !!} @endif</p> --}}

                                    <div class="product-tab">
                                        <div class="text">{{ $product['spec'][0] }}</div>
                                        <div class="text">{{ $product['spec'][1] }}</div>
                                        <div class="text">{{ $product['spec'][2] }}</div>
                                        <div class="text">{{ $product['spec'][3] }}</div>
                                        <div class="text">{{ $product['spec'][18] }}</div>
                                        <div class="text"><a href="{{ $url }}">販売会社</a></div>
                                    </div>

                                </div>
                            </div><!-- /.tab-pane -->

                            {{-- <div id="review" class="tab-pane">
                                <div class="product-tab">

                                <div class="product-reviews">
                                    <h4 class="title">カスタマーレビュー</h4>

                                    @php
                                    $reviews = App\Models\Review::where('product_id','id')->latest()->limit(5)->get();
                                    @endphp

                                    <div class="reviews">

                                    @foreach($reviews as $item)
                                    @if($item->status == 0)

                                    @else

                                    <div class="review">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="{{ (!empty($item->user->profile_photo_path))? url('upload/user_images/'.$item->user->profile_photo_path):url('upload/no_image.jpg') }}" style="border-radius: 50%" width="30px;" height="30px;"><b> {{ $item->user->name }}</b>

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
                                        </div>

                                        <div class="review-title">
                                            <span class="summary"><strong>{{ $item->summary }}</strong></span>
                                            <span class="date"><i class="fa fa-calendar"></i><span> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </span></span>
                                        </div>

                                        <div class="text">"{{ $item->comment }}"</div>

                                    </div>

                                    @endif
                                    @endforeach

                                    </div>
                                </div>

                                <div class="product-add-review">

                                    <div class="review-table">
                                    </div>

                                    <div class="review-form">

                                        @guest
                                        <p> <b>ログインしてレビューを書こう。 <a href="{{ route('login') }}">ログイン</a></b> </p>
                                        @else

                                        <div class="form-container">

                                        <form role="form" class="cnt-form" method="post" action="{{ route('review.store') }}">
                                            @csrf

                                            <input type="hidden" name="product_id" value="{{ $key }}">

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
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                        <input type="text" name="summary" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                        <textarea class="form-control txt txt-review" name="comment" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="action text-right">
                                                <button type="submit" class="btn btn-primary btn-upper">送信する</button>
                                            </div>

                                        </form>
                                        </div>

                                        @endguest

                                    </div>

                                </div>

                                </div>
                            </div> --}}

                            <div id="tags" class="tab-pane">
                                <div class="product-tag">

                                    <h4 class="title">商品タグを書く</h4>
                                    <form role="form" class="form-inline form-cnt">
                                        <div class="form-container">

                                            <div class="form-group">
                                                <input type="text" id="exampleInputTag" class="form-control txt">
                                            </div>

                                            <button class="btn btn-upper btn-primary" type="submit">新規タグ</button>
                                        </div>
                                    </form>

                                    <form role="form" class="form-inline form-cnt">
                                        <div class="form-group">
                                            {{-- <label>&nbsp;</label> --}}
                                            <span>スペースを使ってタグを区切る。「'」を使って改行する</span>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <!-- =============== 関連商品================== -->
            {{-- <section class="section featured-product wow fadeInUp">
                <h3 class="section-title">この商品に関連する商品</h3>
                <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

                    @foreach($relatedProduct as $product)

                    <div class="item item-carousel">
                        <div class="products">

                        <div class="product">
                        <div class="product-image">
                            <div class="image">
                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt="" style="border-radius: 8px;"></a>
                            </div>

                            <div class="tag sale"><span>sale</span></div>
                        </div>


                        <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}">
                                @if(session()->get('language') == 'cn') {{ $product->product_name_cn }} @else {{ $product->product_name_jp }} @endif</a>
                            </h3>

                            <div class="rating rateit-small"></div>
                            <div class="description"></div>

                            @if ($product->discount_price == NULL)
                                <div class="product-price">
                                <span class="price">
                                    ${{ $product->selling_price }}
                                </span>
                                </div>
                            @else

                            <div class="product-price">
                                <span class="price">
                                    ${{ $product->discount_price }}
                                </span>
                                <span class="price-before-discount">
                                    ${{ $product->selling_price }}
                                </span>
                            </div>

                            @endif

                        </div>


                        <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                    </li>

                                <li class="lnk wishlist">
                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                            <i class="icon fa fa-heart"></i>
                                        </a>
                                    </li>

                                    <li class="lnk">
                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                        <i class="fa fa-signal"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </div>

                        </div>
                    </div>

                    @endforeach

                </div>
            </section> --}}
            <!-- ============= 関連商品 : END =============== -->

        </div>

        <div class="clearfix"></div>

    </div>
</div>
</div>

@endsection