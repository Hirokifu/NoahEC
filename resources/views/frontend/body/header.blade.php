<header class="header-style-1">

    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
            <div class="cnt-account">
                <ul class="list-unstyled">

                {{-- <li><a href="/login"><i class="icon fa fa-user"></i>
                    @if(session()->get('language') == 'cn')
                        登錄
                    @else
                        My Account
                    @endif
                </a></li> --}}

                <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li>
                <li><a href="" type="button" data-toggle="modal" data-target="#ordertraking"><i class="icon fa fa-check"></i>Order Traking</a></li>

                <li>
                @auth
                    <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>{{ Auth::user()->name }}</a>
                @else
                    <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>MyPage</a>
                @endauth
                </li>

                </ul>
            </div>


            <div class="cnt-block">
                <ul class="list-unstyled list-inline">

                {{-- <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="#">USD</a></li>
                    <li><a href="#">INR</a></li>
                    <li><a href="#">GBP</a></li>
                    </ul>
                </li> --}}

                <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
                    @if(session()->get('language') == 'cn') 中文 @else 日本語 @endif
                </span><b class="caret"></b></a>

                    <ul class="dropdown-menu">
                        @if(session()->get('language') == 'cn')
                        <li><a href="{{ route('jp.language') }}">日本語</a></li>
                        @else
                        <li><a href="{{ route('cn.language') }}">中文</a></li>
                        @endif
                    </ul>

                </li>
                </ul>
            </div>
            <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">

                    @php
                    $setting = App\Models\SiteSetting::find(1);
                    @endphp

                    <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset($setting->logo) }}" alt="logo"> </a> </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">

                    <div class="search-area">

                    <form method="post" action="{{ route('product.search') }}">
                        @csrf

                        <div class="control-group">

                            <ul class="categories-filter animate-dropdown">
                                <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="#">Categories<b class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu" >
                                    <li class="menu-header">Computer</li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">- Clothing</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">- Electronics</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">- Shoes</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">- Watches</a></li>
                                </ul>
                                </li>
                            </ul>

                            <input class="search-field" onfocus="search_result_show()" onblur="search_result_hide()" id="search" name="search" placeholder="Search for a product" />

                            <button class="search-button" type="submit"></button>

                        </div>

                    </form>

                    <div id="searchProducts"></div>
                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">

                    {{-- === SHOPPING CART DROPDOWN ===== --}}

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                    <div class="items-cart-inner">
                        <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                        <div class="basket-item-count"><span class="count" id="cartQty"></span></div>
                        <div class="total-price-basket"> <span class="lbl"></span>
                            <span class="total-price"> <span class="sign"> ¥</span>
                            <span class="value" id="cartSubTotal"></span></span>
                        </div>
                    </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li>

                        {{--  Mini Cart Start with Ajax  --}}
                        <div id="miniCart">

                        </div>

                        <!--   // End Mini Cart Start with Ajax -->
                        <div class="clearfix cart-total">
                            <div class="pull-right"> <span class="text">合計金額:</span>
                                <span class='price'  id="cartSubTotal"> </span> </div>
                            <div class="clearfix"></div>
                            <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">チェックアウト</a>
                        </div>

                        </li>
                    </ul>
                    </div>
                    {{-- === SHOPPING CART DROPDOWN : END=== --}}

                </div>
            </div>
        </div>

    </div>


    <div class="header-nav animate-dropdown">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
        <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>

        <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
                <ul class="nav navbar-nav">


                <li class="dropdown yamm mega-menu"> <a href="/" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home
                    {{-- @if(session()->get('language') == 'cn') 主頁
                    @else Home
                    @endif --}}
                </a> </li>


                <!--   // Get Category Table Data -->
                @php
                $categories = App\Models\Category::orderBy('id','ASC')->get();
                @endphp


                @foreach($categories as $category)
                <li class="dropdown yamm mega-menu"> <a href="/" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                    @if(session()->get('language') == 'cn') {{ $category->category_name_cn }}
                    @else {{ $category->category_name_jp }}
                    @endif
                    {{-- <span class="menu-label hot-menu hidden-xs">hot</span> --}}
                    </a>

                    <ul class="dropdown-menu container">
                        <li class="dropdown">
                        <div class="yamm-content ">
                            <div class="row">

                            <!--// Get SubCategory Table Data -->
                            @php
                            $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('id','ASC')->get();
                            @endphp

                            @foreach($subcategories as $subcategory)
                                <div class="col-xs-12 col-sm-6 col-md-2 col-menu">

                                    <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_jp ) }}">
                                    <h2 class="title">
                                        @if(session()->get('language') == 'cn') {{ $subcategory->subcategory_name_cn }}
                                        @else {{ $subcategory->subcategory_name_jp }}
                                        @endif
                                    </h2>
                                    </a>

                                    <!--   // Get SubSubCategory Table Data -->
                                    @php
                                    $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('id','ASC')->get();
                                    @endphp

                                    @foreach($subsubcategories as $subsubcategory)
                                        <ul class="links">
                                        <li><a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_jp ) }}">
                                            @if(session()->get('language') == 'cn') {{ $subsubcategory->subsubcategory_name_cn }}
                                            @else {{ $subsubcategory->subsubcategory_name_jp }}
                                            @endif
                                        </a></li>

                                        </ul>
                                    @endforeach

                                </div>
                            @endforeach

                            {{-- メニューをクリックすると関連商品の写真を表示する --}}
                            @php
                            $menu_imgs = App\Models\Slider::where('status',0)->inRandomOrder()->take(1)->get(); //ランダムに1件取得
                            @endphp

                            @foreach($menu_imgs as $img)
                            <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{ asset($img->slider_img) }}" style="border-radius: 8px"> </div>
                            @endforeach

                            </div>
                        </div>
                        </li>
                    </ul>

                </li>
                @endforeach


                {{-- special-menuを追加 --}}
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Special</a>
                    <ul class="dropdown-menu pages">
                    <li>
                    <div class="yamm-content">
                        <div class="row">
                        <div class="col-xs-12 col-menu">
                            <ul class="links">

                            <li><a href="/m_mart_view">Mマート</a></li>
                            <li><a href="/m_mart_view_old">Mマート_old</a></li>
                            <li><a href="/meaturls">MマートのURL更新</a></li>
                            <li><a href="/myjobs">マイナビ転職</a></li>
                            <li><a href="/indian_car">インドカレー</a></li>

                            </ul>
                        </div>
                        </div>
                    </div>
                    </li>
                    </ul>
                </li>


                <li class="dropdown navbar-right special-menu"><a href="/production-comparison">Comparison</a></li>
                <li class="dropdown navbar-right special-menu"><a href="/contact">CONTACT</a></li>
                <li class="dropdown navbar-right special-menu"><a href="/faq">FAQ</a></li>
                <li class="dropdown navbar-right special-menu"><a href="/blog">BLOG</a></li>
                <li class="dropdown navbar-right special-menu"><a href="/shop">SHOP</a></li>
                <li class="dropdown navbar-right special-menu"><a href="/scraper">SCRAPER</a></li>


                </ul>
                <div class="clearfix"></div>
            </div>
            </div>

        </div>
        </div>

    </div>
    </div>

    <!-- Order Traking Modal -->
    <div class="modal fade" id="ordertraking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Track Your Order </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                <form method="post" action="{{ route('order.tracking') }}">
                    @csrf
                    <div class="modal-body">
                        <label>Invoice Code</label>
                        <input type="text" name="code" required="" class="form-control" placeholder="Your Order Invoice Number">
                    </div>

                    <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Track Now </button>
                </form>

                </div>

            </div>
        </div>
    </div>

</header>


<style>
    .search-area{
        position: relative;
    }
        #searchProducts {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
        }
</style>


<script>
    function search_result_hide(){
        $("#searchProducts").slideUp();
    }
    function search_result_show(){
        $("#searchProducts").slideDown();
    }
</script>