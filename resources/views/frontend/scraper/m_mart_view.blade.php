@extends('frontend.main_master')
@section('content')

@section('title')
農林水産品
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">HOME</a></li>
				<li class='active'>農林水産品</li>
			</ul>
		</div>
	</div>
</div>


{{-- Mマートの国産牛肉・水産品スクラッピング --}}

<div class="body-content outer-top-xs">
    <div class='container'>

    <form action="{{ route('shop.filter') }}" method="post">
    @csrf



    <div class='row'>
        <div class='col-md-3 sidebar'>

        <!-- ===== == TOP NAVIGATION ======= ==== -->
        @include('frontend.common.vertical_menu')
        <!-- = ==== TOP NAVIGATION : END === ===== -->

        <div class="sidebar-module-container">

        </div>

    </div>



    <div class='col-md-9'>

        <!-- == ==== SECTION – HERO === ====== -->

        <div id="category" class="category-carousel hidden-xs">
        <div class="item">
            <div class="image"> <img src="{{ asset('frontend/assets/images/banners/cat-banner-3.jpg') }}" alt="" class="img-responsive" style="border-radius: 8px;"> </div>
            <div class="container-fluid">
            <div class="caption vertical-top text-left">
                <div class="big-text"> JUST FOR YOU! </div>
                <div class="excerpt hidden-sm hidden-md"> 至上の和牛肉を貴殿にお届けいたします </div>
                {{-- <div class="excerpt-normal hidden-sm hidden-md"> 至上の和牛肉を世界のお客様にお届けいたします。</div> --}}
            </div>
            </div>
        </div>
        </div>


        <div class="clearfix filters-container m-t-10">
        <div class="row">
            <div class="col col-sm-6 col-md-2">
            <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                </ul>
            </div>
            <!-- /.filter-tabs -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-12 col-md-6">
            <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                    <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                    <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">position</a></li>
                        <li role="presentation"><a href="#">Price:Lowest first</a></li>
                        <li role="presentation"><a href="#">Price:Highest first</a></li>
                        <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                    </ul>
                    </div>
                </div>
                <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Show</span>
                <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                    <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                    <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">1</a></li>
                        <li role="presentation"><a href="#">2</a></li>
                        <li role="presentation"><a href="#">3</a></li>
                        <li role="presentation"><a href="#">4</a></li>
                        <li role="presentation"><a href="#">5</a></li>
                        <li role="presentation"><a href="#">6</a></li>
                        <li role="presentation"><a href="#">7</a></li>
                        <li role="presentation"><a href="#">8</a></li>
                        <li role="presentation"><a href="#">9</a></li>
                        <li role="presentation"><a href="#">10</a></li>
                    </ul>
                    </div>
                </div>
                <!-- /.fld -->
                </div>
                <!-- /.lbl-cnt -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.col -->
            <div class="col col-sm-6 col-md-4 text-right">

            <!-- /.pagination-container --> </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>


        <!--    //////////////////// START Product Grid View  ////////////// -->

        <div class="search-result-container ">
        <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
            <div class="category-product">
                <div class="row">

                @foreach($data as $key => $value)
                <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                    <div class="product">
                        <div class="product-image">
                            <div class="image"> <a href="{{ url('m_mart_detail/'.($key+1).'/') }}"><img  src="{{ asset($value['img']) }}" alt="" style="border-radius: 8px" width="200px" height="200px"></a> </div>
                            <!-- /.image -->

                            {{-- @php
                            $amount = $product->selling_price - $product->discount_price;
                            $discount = ($amount/$product->selling_price) * 100;
                            @endphp

                            <div>
                                @if ($product->discount_price == NULL)
                                <div class="tag new"><span>new</span></div>
                                @else
                                <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                @endif
                            </div> --}}
                        </div>
                        <!-- /.product-image -->


                        <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('m_mart_detail/'.$key.'/') }}">
                                {{-- @if(session()->get('language') == 'cn') {{ $product->product_name_cn }} @else {{ $product->product_name_jp }} @endif</a></h3> --}}

                                {{ Str::limit($value['title'], 62) }}</a>
                            </h3>

                            <div class="rating rateit-small"></div>
                            <div class="description"> <b>原産地：</b>{{ Str::limit($value['spec'][2],25) }} </div>
                            <div class="description"> <b>最小発注数：</b>{{ Str::limit($value['spec'][1],22) }} </div>
                            <div class="product-price"> <span class="price"> 価格：{{ $price }}（税込）</span></div>


                        <!-- /.product-price -->
                        </div>
                        <!-- /.product-info -->


                        {{-- <div class="cart clearfix animate-effect">
                        <div class="action">
                            <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                            </li>
                            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                            <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                            </ul>
                        </div>
                        <!-- /.action -->
                        </div> --}}
                        <!-- /.cart -->
                    </div>
                    <!-- /.product -->

                    </div>
                    <!-- /.products -->
                </div>
                <!-- /.item -->
                @endforeach

                </div>
                <!-- /.row -->
            </div>
            <!-- /.category-product -->

            </div>
            <!-- /.tab-pane -->

        <!--//////////////////// END Product Grid View  ////////////// -->




        <!--//////////////////// Product List View Start ////////////// -->

        {{-- <div class="tab-pane "  id="list-container">
        <div class="category-product">

            @foreach($products as $product)
            <div class="category-product-inner wow fadeInUp">
            <div class="products">
                <div class="product-list product">
                <div class="row product-list-row">
                    <div class="col col-sm-4 col-lg-4">
                    <div class="product-image">
                        <div class="image"> <img src="{{ asset($product->product_thambnail) }}" alt="" style="border-radius: 8px;"> </div>
                    </div>
                    <!-- /.product-image -->
                    </div>
                    <!-- /.col -->
                    <div class="col col-sm-8 col-lg-8">
                    <div class="product-info">
                        <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}">
                        @if(session()->get('language') == 'cn') {{ $product->product_name_cn }} @else {{ $product->product_name_jp }} @endif</a></h3>
                        <div class="rating rateit-small"></div>


                        @if ($product->discount_price == NULL)
                        <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
                        @else
                        <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                        @endif

                        <!-- /.product-price -->
                        <div class="description m-t-10">
                        @if(session()->get('language') == 'cn') {{ $product->short_descp_cn }} @else {{ $product->short_descp_jp }} @endif</div>
                        <div class="cart clearfix animate-effect">
                        <div class="action">
                            <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                            </li>
                            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                            <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                            </ul>
                        </div>
                        <!-- /.action -->
                        </div>
                        <!-- /.cart -->

                    </div>
                    <!-- /.product-info -->
                    </div>
                    <!-- /.col -->
                </div>


                @php
                $amount = $product->selling_price - $product->discount_price;
                $discount = ($amount/$product->selling_price) * 100;
                @endphp

                <!-- /.product-list-row -->
                <div>
                    @if ($product->discount_price == NULL)
                    <div class="tag new"><span>new</span></div>
                    @else
                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                    @endif
                </div>

                </div>
                <!-- /.product-list -->
            </div>
            <!-- /.products -->
            </div>
            <!-- /.category-product-inner -->
            @endforeach


        <!-- //////////////////// Product List View END ////////////// -->


        </div>
        <!-- /.category-product -->
        </div> --}}
        <!-- /.tab-pane #list-container -->
    </div>
    <!-- /.tab-content -->

        {{-- {{ $data->appends($_GET)->links('vendor.pagination.custom') }} --}}

    </div>
    <!-- /.search-result-container -->

</div>
<!-- /.col -->
</div>
<!-- /.row -->



</form>

</div>
<!-- /.container -->

</div>
<!-- /.body-content -->
<br>
<br>

@endsection