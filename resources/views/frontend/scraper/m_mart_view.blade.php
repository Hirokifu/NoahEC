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
            </div>

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
                </div>
            </div>

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
                </div>
            </div>
            </div>

            <div class="col col-sm-6 col-md-4 text-right">
            </div>

        </div>
        </div>


        <!--    ///////////// START Product Grid View  ////////////// -->

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
                        </div>


                        {{-- 商品のキーワードを表示する --}}
                        <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('m_mart_detail/'.$key.'/') }}">

                                {{-- Str::limitを使って指定文字数以上の文字を[...]と表示する --}}
                                {{ Str::limit($value['title'], 62) }}</a>
                            </h3>

                            <div class="rating rateit-small"></div><span>{{ $value['id'] }}</span>

                            <div class="description"> <b>原産地：</b>{{ Str::limit($value['spec'][2],25) }} </div>
                            <div class="description"> <b>最小発注数：</b>{{ Str::limit($value['spec'][1],22) }} </div>
                            <div class="product-price"><b>価格：</b><span class="price" style="color: red"> {{ $price }}</span>（税込）</div>
                        </div>


                        {{-- Cart/Wishlist/Compareの3ボタン機能 --}}
                        <div class="cart clearfix animate-effect">
                            <div class="action">
                            <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">

                                <button class="btn btn-primary icon" type="button" title="Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $key }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

                                {{-- Modal --}}
                                <button class="btn btn-primary cart-btn" type="button">カートに入れる</button>

                                <button class="btn btn-danger icon" type="button" title="Wishlist" id="{{ $key }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i></button>

                                <button class="btn btn-success icon" type="button" title="Compare"> <i class="fa fa-signal"></i> </button>

                            </li>
                            </ul>
                        </div>
                        </div>


                    </div>
                    </div>
                </div>
                @endforeach

                </div>

            </div>
            </div>

        <!--//////////////////// END Product Grid View  ////////////// -->




        <!--//////////////////// Product List View Start ////////////// -->

        <div class="tab-pane "  id="list-container">
        <div class="category-product">

            @foreach($data as $key => $value)
            <div class="category-product-inner wow fadeInUp">
            <div class="products">
                <div class="product-list product">
                <div class="row product-list-row">
                    <div class="col col-sm-4 col-lg-4">
                    <div class="product-image">
                        <div class="image"> <a href="{{ url('m_mart_detail/'.($key+1).'/') }}"><img  src="{{ asset($value['img']) }}" alt="" style="border-radius: 8px" width="200px" height="200px"></a> </div>
                    </div>
                    <!-- /.product-image -->
                    </div>
                    <!-- /.col -->
                    <div class="col col-sm-8 col-lg-8">
                    <div class="product-info">
                        <h3 class="name"><a href="{{ url('m_mart_detail/'.$key.'/') }}" style="font-size:15px">
                            {{-- Str::limitを使って指定文字数以上の文字を[...]と表示する --}}
                            {{ Str::limit($value['title'], 62) }}</a>
                        </h3>

                        <div class="rating rateit-small"></div><
                        <div class="description"> <b>原産地：</b>{{ Str::limit($value['spec'][2],25) }} </div>
                        <div class="description"> <b>最小発注数：</b>{{ Str::limit($value['spec'][1],22) }} </div>
                        <div class="product-price"><b>価格：</b><span class="price" style="color: red"> {{ $price }}</span>（税込）</div>

                        <div class="product-price"> <span class="price"> ${{ $price }} </span>  </div>

                        {{-- Cart/Wishlist/Compareの3ボタン機能 --}}
                        <div class="cart clearfix animate-effect">
                            <div class="action">
                            <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">

                                <button class="btn btn-primary icon" type="button" title="カートに入れる" data-toggle="modal" data-target="#exampleModal" id="{{ $key }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

                                <button class="btn btn-danger icon" type="button" title="お気に入り登録" id="{{ $key }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i></button>

                                <button class="btn btn-success icon" type="button" title="比較"> <i class="fa fa-signal"></i> </button>

                            </li>
                            </ul>
                        </div>
                        </div>

                    </div>
                    </div>

                </div>


                </div>
            </div>
            </div>
            @endforeach


        <!-- //////////////////// Product List View END ////////////// -->


        </div>
        </div>
    </div>


    {{-- <div class="clearfix filters-container">
        <div class="text-right">
            <div class="pagination-container" style="text-align:center; font-weight:500;font-size:16px">
                <ul class="list-inline list-unstyled">
                    {{ $scraperUrls->appends($_GET)->links() }}
                </ul>
            </div>
        </div>
    </div> --}}
                {{-- {{ $scraperUrls->onEachSide(5)->links('vendor.pagination.custom') }} --}}
                {{-- {{ $scraperUrls->links() }} --}}
    </div>

</div>
</div>



</form>

</div>

</div>
<br>
<br>

@endsection