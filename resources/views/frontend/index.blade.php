@extends('frontend.main_master')
@section('content')

@section('title')
ノアショップ
@endsection


<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
  <div class="row">

  <!-- ===================== SIDEBAR =============================== -->
  <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

    <!-- =============== TOP NAVIGATION : END ====================== -->
    @include('frontend.common.vertical_menu')

        <!-- ================HOT DEALS ================== -->
        {{-- HOT DEALSなおかつ、割引付の商品を表示する --}}
        @include('frontend.common.hot_deals')
        <!-- =============== HOT DEALS: END ==================== -->

  <!-- =============== SPECIAL OFFER ======================= -->
  <div class="sidebar-widget outer-bottom-small wow fadeInUp" style="border-radius:8px">
    <h3 class="section-title">感謝セールス</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

        <div class="item">
        <div class="products special-product">

        @foreach($special_offer as $product)
        <div class="product">
          <div class="product-micro">
            <div class="row product-micro-row">
              <div class="col col-xs-5">
                <div class="product-image">

                  <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}"> <img src="{{ asset($product->product_thambnail) }}" alt="" style="border-radius: 8px;"> </a> </div>
                </div>

              </div>

              <div class="col col-xs-7">
                <div class="product-info">
                  <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}">@if(session()->get('language') == 'cn') {{ $product->product_name_cn }} @else {{ $product->product_name_jp }} @endif</a></h3>

                  <div class="rating rateit-small"></div>
                  <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span> </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        </div>
        </div>

      </div>
    </div>
  </div>
  <!-- ======================= SPECIAL OFFER : END ==================== -->


  <!-- ====================== PRODUCT TAGS ======================= -->
  {{-- @include('frontend.common.product_tags') --}}
  <!-- ======================= PRODUCT TAGS : END ========================= -->


  <!-- =========================== SPECIAL DEALS ========================== -->
  <div class="sidebar-widget outer-bottom-small wow fadeInUp" style="border-radius:8px">
    <h3 class="section-title">特売会</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

        <div class="item">
        <div class="products special-product">

          @foreach($special_deals as $product)
            <div class="product">
              <div class="product-micro">
                <div class="row product-micro-row">
                  <div class="col col-xs-5">
                    <div class="product-image">
                      <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}"> <img src="{{ asset($product->product_thambnail) }}"  alt="" style="border-radius: 8px;"> </a> </div>
                      <!-- /.image -->

                    </div>
                    <!-- /.product-image -->
                  </div>
                  <!-- /.col -->
                  <div class="col col-xs-7">
                    <div class="product-info">
                      <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}">@if(session()->get('language') == 'cn') {{ $product->product_name_cn }} @else {{ $product->product_name_jp }} @endif</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span> </div>
                      <!-- /.product-price -->

                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.product-micro-row -->
              </div>
              <!-- /.product-micro -->

          </div>
          @endforeach <!-- // end special deals foreach -->

        </div>
        </div>

      </div>
    </div>
    <!-- /.sidebar-widget-body -->
  </div>
  <!-- ======================== SPECIAL DEALS : END ====================== -->


  <!-- ======================== NEWSLETTER ========================= -->
  {{-- <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small" style="border-radius:8px">
    <h3 class="section-title">Newsletters</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <p>Sign Up for Our Newsletter!</p>
      <form>
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
        </div>
        <button class="btn btn-primary">Subscribe</button>
      </form>
    </div>
  </div> --}}
  <!-- ========================== NEWSLETTER: END ===================== -->

    <!-- ======================== Testimonials====================== -->
    {{-- @include('frontend.common.testimonials') --}}
    <!-- ========================= Testimonials: END ======================== -->

  {{-- <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image" style="border-radius: 8px;"> </div> --}}
</div>

<!-- ========================== SIDEBAR : END ======================= -->





  <!-- =========================== CONTENT ========================= -->
  <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">

    <!-- === ========= SECTION – HERO =========== -->

    <div id="hero">
        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

        @foreach($sliders as $slider)
        <div class="item" style="border-radius:8px 8px 0px 0px; background-image: url({{ asset($slider->slider_img) }});">
          <div class="container-fluid">
            <div class="caption bg-color vertical-center text-left">

              <div class="big-text fadeInDown-1">{{ $slider->title }} </div>
              <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span> </div>

              <div class="button-holder fadeInDown-3"> <a href="/shop" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
            </div>
            <!-- /.caption -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.item -->
        @endforeach


        </div>
        <!-- /.owl-carousel -->
    </div>

    <!-- ==== ===== SECTION – HERO : END === ============== -->


    <!-- ========================== INFO BOXES ======================== -->
    <div class="info-boxes wow fadeInUp">
      <div class="info-boxes-inner" style="border-radius:0px 0px 8px 8px">
        <div class="row">

          @foreach($sliders as $slider)
          <div class="col-md-6 col-sm-4 col-lg-4">
            <div class="info-box">
              <div class="row">
                <div class="col-xs-12">
                  <h4 class="info-box-heading green">{{ $slider->sales_point }} </h4>
                </div>
              </div>
              <h6 class="text">{{ $slider->user_merit }}</h6>
            </div>
          </div>
          @endforeach

        </div>
        <!-- /.row -->
      </div>
      <!-- /.info-boxes-inner -->

    </div>
    <!-- /.info-boxes -->
    <!-- =========================== INFO BOXES : END ======================= -->


    <!-- = ===== SCROLL TABS ========================= -->

    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp" style="border-radius:8px">
      <div class="more-info-tab clearfix ">
        <h3 class="new-product-title pull-left">新発売</h3>
        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
          <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>

          @foreach($categories as $category)
            <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">{{ $category->category_name_jp }}</a></li>
          @endforeach

        </ul>
      </div>

      <div class="tab-content outer-top-xs">

        <div class="tab-pane in active" id="all">
          <div class="product-slider">
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

              @foreach($products as $product)
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt="" style="border-radius: 8px;"></a> </div>
                      <!-- /.image -->

                      @php
                      $amount = $product->selling_price - $product->discount_price;
                      $discount = ($amount/$product->selling_price) * 100;
                      @endphp

                      <div>
                        @if ($product->discount_price == NULL)
                        <div class="tag new"><span>new</span></div>
                        @else
                        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                        @endif
                      </div>
                    </div>

                  <!-- /.product-image -->

        <div class="product-info text-left">

            <h3 class="name">
                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}">
                @if(session()->get('language') == 'cn') {{ $product->product_name_cn }} @else {{ $product->product_name_jp }} @endif</a>
            </h3>

            <div class="rating rateit-small"></div>
            <div class="description"></div>

            @if ($product->discount_price == NULL)
              <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
            @else
              <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
            @endif

        </div>

        {{-- Cart/Wishlist/Compareの3ボタン機能 --}}
        <div class="cart clearfix animate-effect">
        <div class="action">
          <ul class="list-unstyled">
            <li class="add-cart-button btn-group">

              <button class="btn btn-primary icon" type="button" title="Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

              {{-- Modal --}}
              <button class="btn btn-primary cart-btn" type="button">カートに入れる</button>

              <button class="btn btn-danger icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i></button>

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




    @foreach($categories as $category)
    <div class="tab-pane" id="category{{ $category->id }}">
      <div class="product-slider">
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

        @php
          $catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
        @endphp


        @forelse($catwiseProduct as $product)
        <div class="item item-carousel">
          <div class="products">
            <div class="product">
              <div class="product-image">
                <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt="" style="border-radius: 8px;"></a> </div>
                <!-- /.image -->

                @php
                $amount = $product->selling_price - $product->discount_price;
                $discount = ($amount/$product->selling_price) * 100;
                @endphp

              <div>
                @if ($product->discount_price == NULL)
                <div class="tag new"><span>new</span></div>
                @else
                <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                @endif
              </div>
              </div>

                        <!-- /.product-image -->

        <div class="product-info text-left">
          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}">
          @if(session()->get('language') == 'cn') {{ $product->product_name_cn }} @else {{ $product->product_name_jp }} @endif
                      </a></h3>
              <div class="rating rateit-small"></div>
              <div class="description"></div>

          @if ($product->discount_price == NULL)
              <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
          @else
              <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
          @endif


        <!-- /.product-price -->

      </div>


      {{-- Cart/Wishlist/Compareの3ボタン機能 --}}
      <div class="cart clearfix animate-effect">
        <div class="action">
          <ul class="list-unstyled">
            <li class="add-cart-button btn-group">

              <button class="btn btn-primary icon" type="button" title="Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

              {{-- Modal --}}
              <button class="btn btn-primary cart-btn" type="button">カートに入れる</button>

              <button class="btn btn-danger icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i></button>

              <button class="btn btn-success icon" type="button" title="Compare"> <i class="fa fa-signal"></i> </button>

            </li>
          </ul>
        </div>
      </div>

      </div>
      <!-- /.product -->

    </div>
    <!-- /.products -->
  </div>
  <!-- /.item -->

    @empty
    <h5 class="text-danger">入荷待ち</h5>

    @endforelse<!--  // end all optionproduct foreach  -->




      </div>
      <!-- /.home-owl-carousel -->
    </div>
    <!-- /.product-slider -->
    </div>
    <!-- /.tab-pane -->
    @endforeach <!-- end categor foreach -->

    </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.scroll-tabs -->
    <!-- =========================== SCROLL TABS : END ============================== -->






        <!-- == === FEATURED PRODUCTS == ==== -->

        <section class="section featured-product wow fadeInUp" style="border-radius:8px">
          <h3 class="section-title">おすすめ商品</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


            @foreach($featured as $product)
            <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt="" style="border-radius: 8px;"></a> </div>
                          <!-- /.image -->

                    @php
                    $amount = $product->selling_price - $product->discount_price;
                    $discount = ($amount/$product->selling_price) * 100;
                    @endphp

                      <div>
                        @if ($product->discount_price == NULL)
                        <div class="tag new"><span>new</span></div>
                        @else
                        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                        @endif
                      </div>
                      </div>

                                    <!-- /.product-image -->

                    <div class="product-info text-left">
                      <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}">
                      @if(session()->get('language') == 'cn') {{ $product->product_name_cn }} @else {{ $product->product_name_jp }} @endif
                        </a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="description"></div>

                        @if ($product->discount_price == NULL)
                        <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
                        @else
                        <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                        @endif

                    </div>

                    {{-- Cart/Wishlist/Compareの3ボタン機能 --}}
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">

                            <button class="btn btn-primary icon" type="button" title="Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

                            {{-- Modal --}}
                            <button class="btn btn-primary cart-btn" type="button">カートに入れる</button>

                            <button class="btn btn-danger icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i></button>

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
        </section>
        <!-- == ==== FEATURED PRODUCTS : END ==== === -->



        {{-- ここから、カテゴリー別の製品群表示を始める --}}

                <!-- == === skip_product_0 PRODUCTS == ==== -->

                <section class="section featured-product wow fadeInUp">
                  <h3 class="section-title">
                  @if(session()->get('language') == 'cn') {{ $skip_category_0->category_name_cn }}
                  @else {{ $skip_category_0->category_name_jp }}
                  @endif
                    </h3>
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


                  @foreach($skip_product_0 as $product)
                  <div class="item item-carousel">
                          <div class="products">
                            <div class="product">
                              <div class="product-image">
                                <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt="" style="border-radius: 8px;"></a> </div>
                                <!-- /.image -->

                  @php
                  $amount = $product->selling_price - $product->discount_price;
                  $discount = ($amount/$product->selling_price) * 100;
                  @endphp

                  <div>
                    @if ($product->discount_price == NULL)
                    <div class="tag new"><span>new</span></div>
                    @else
                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                    @endif
                  </div>
                  </div>


                  <div class="product-info text-left">
                      <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}">
                      @if(session()->get('language') == 'cn') {{ $product->product_name_cn }} @else {{ $product->product_name_jp }} @endif
                        </a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="description"></div>

                        @if ($product->discount_price == NULL)
                            <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
                        @else
                            <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                        @endif

                  </div>

                  {{-- Cart/Wishlist/Compareの3ボタン機能 --}}
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">

                          <button class="btn btn-primary icon" type="button" title="Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

                          {{-- Modal --}}
                          <button class="btn btn-primary cart-btn" type="button">カートに入れる</button>

                          <button class="btn btn-danger icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i></button>

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
                </section>
                <!-- == ==== skip_product_0 PRODUCTS : END ==== === -->



              <!-- == === skip_product_1 PRODUCTS == ==== -->

                <section class="section featured-product wow fadeInUp">
                  <h3 class="section-title">
                    @if(session()->get('language') == 'cn') {{ $skip_category_1->category_name_cn }}
                    @else {{ $skip_category_1->category_name_jp }}
                    @endif
                    </h3>
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


                    @foreach($skip_product_1 as $product)
                    <div class="item item-carousel">
                        <div class="products">
                          <div class="product">
                            <div class="product-image">
                              <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt="" style="border-radius: 8px;"></a> </div>
                              <!-- /.image -->

                            @php
                            $amount = $product->selling_price - $product->discount_price;
                            $discount = ($amount/$product->selling_price) * 100;
                            @endphp

                              <div>
                                @if ($product->discount_price == NULL)
                                <div class="tag new"><span>new</span></div>
                                @else
                                <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                @endif
                              </div>
                              </div>

                            <div class="product-info text-left">
                              <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}">

                                @if(session()->get('language') == 'cn') {{ $product->product_name_cn }}
                                @else {{ $product->product_name_jp }}
                                @endif

                                </a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>

                              @if ($product->discount_price == NULL)
                              <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
                              @else
                              <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                              @endif

                            </div>

                            {{-- Cart/Wishlist/Compareの3ボタン機能 --}}
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">

                                    <button class="btn btn-primary icon" type="button" title="Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

                                    {{-- Modal --}}
                                    <button class="btn btn-primary cart-btn" type="button">カートに入れる</button>

                                    <button class="btn btn-danger icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i></button>

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
                </section>

                <!-- == ==== skip_product_1 PRODUCTS : END ==== === -->

        {{-- ここまで、カテゴリー別の製品群表示を完了する --}}


        {{-- ここから、ブランド別の製品群表示を始める --}}

              <!-- =========================== WIDE PRODUCTS ====================== -->
                  <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="wide-banner cnt-strip">
                          <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner.jpg') }}" alt="" style="border-radius: 8px;"> </div>
                          <div class="strip strip-text">
                            <div class="strip-inner">
                              <h2 class="text-right">New Mens Fashion<br>
                                <span class="shopping-needs">Save up to 40% off</span></h2>
                            </div>
                          </div>
                          <div class="new-label">
                            <div class="text">NEW</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              <!-- == ===== WIDE PRODUCTS : END ====== ====== -->



              <!-- == === skip_brand_product_1 PRODUCTS == ==== -->

                <section class="section featured-product wow fadeInUp">
                  <h3 class="section-title">
                    @if(session()->get('language') == 'cn') {{ $skip_brand_1->brand_name_cn }}
                    @else {{ $skip_brand_1->brand_name_jp }}
                    @endif
                  </h3>
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


                    @foreach($skip_brand_product_1 as $product)
                    <div class="item item-carousel">
                            <div class="products">
                              <div class="product">
                                <div class="product-image">
                                  <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt="" style="border-radius: 8px;"></a> </div>

                                  @php
                                  $amount = $product->selling_price - $product->discount_price;
                                  $discount = ($amount/$product->selling_price) * 100;
                                  @endphp

                                    <div>
                                      @if ($product->discount_price == NULL)
                                      <div class="tag new"><span>new</span></div>
                                      @else
                                      <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                      @endif
                                    </div>
                                  </div>

                                    <div class="product-info text-left">
                                      <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}">
                                    @if(session()->get('language') == 'cn') {{ $product->product_name_cn }} @else {{ $product->product_name_jp }} @endif
                                        </a></h3>
                                      <div class="rating rateit-small"></div>
                                      <div class="description"></div>

                                    @if ($product->discount_price == NULL)
                                    <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
                                    @else
                                    <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
                                    @endif

                                </div>


                                {{-- Cart/Wishlist/Compareの3ボタン機能 --}}
                                <div class="cart clearfix animate-effect">
                                  <div class="action">
                                    <ul class="list-unstyled">
                                      <li class="add-cart-button btn-group">

                                        <button class="btn btn-primary icon" type="button" title="Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

                                        {{-- Modal --}}
                                        <button class="btn btn-primary cart-btn" type="button">カートに入れる</button>

                                        <button class="btn btn-danger icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i></button>

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
                </section>
                <!-- == ==== skip_brand_product_1 PRODUCTS : END ==== === -->

        {{-- ここまで、ブランド別の製品群表示を完了する --}}




        <!-- =========================== ADS2: WIDE PRODUCTS ====================== -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
              <div class="row">
                <div class="col-md-12">
                  <div class="wide-banner cnt-strip">
                    <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner.jpg') }}" alt="" style="border-radius: 8px;"> </div>
                    <div class="strip strip-text">
                      <div class="strip-inner">
                        <h2 class="text-right">New Mens Fashion<br>
                          <span class="shopping-needs">Save up to 40% off</span></h2>
                      </div>
                    </div>
                    <div class="new-label">
                      <div class="text">NEW</div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
        <!-- == ===== WIDE PRODUCTS : END ====== ====== -->


        <!-- =================ADS1:  WIDE PRODUCTS ================ -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs" style="border-radius:8px">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner1.jpg') }}" alt="" style="border-radius: 8px;"> </div>
              </div>
            </div>

            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner2.jpg') }}" alt="" style="border-radius: 8px;"> </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ================= WIDE PRODUCTS : END ================== -->




        <!-- ===================== BEST SELLER ===================== -->

        <div class="best-deal wow fadeInUp outer-bottom-xs" style="border-radius:8px">
          <h3 class="section-title">人気商品</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p20.jpg') }}" alt="" style="border-radius: 8px;"> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p21.jpg') }}" alt="" style="border-radius: 8px;"> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p22.jpg') }}" alt="" style="border-radius: 8px;"> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p23.jpg') }}" alt="" style="border-radius: 8px;"> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p24.jpg') }}" alt="" style="border-radius: 8px;"> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p25.jpg') }}" alt="" style="border-radius: 8px;"> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p26.jpg') }}" alt="" style="border-radius: 8px;"> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p27.jpg') }}" alt="" style="border-radius: 8px;"> </a> </div>
                            <!-- /.image -->

                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price -->

                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- =================== BEST SELLER : END =================== -->


        <!-- =================== FEATURED PRODUCTS =================== -->
        <section class="section wow fadeInUp new-arriavls" style="border-radius:8px">
          <h3 class="section-title">新作入荷</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p19.jpg') }}" alt="" style="border-radius: 8px;"></a> </div>
                    <!-- /.image -->

                    <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price -->

                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->

              </div>
              <!-- /.products -->
            </div>
            <!-- /.item -->

            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p28.jpg') }}" alt="" style="border-radius: 8px;"></a> </div>
                    <!-- /.image -->

                    <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price -->

                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->

              </div>
              <!-- /.products -->
            </div>
            <!-- /.item -->

            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p30.jpg') }}" alt="" style="border-radius: 8px;"></a> </div>
                    <!-- /.image -->

                    <div class="tag hot"><span>hot</span></div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price -->

                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->

              </div>
              <!-- /.products -->
            </div>
            <!-- /.item -->

            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p1.jpg') }}" alt="" style="border-radius: 8px;"></a> </div>
                    <!-- /.image -->

                    <div class="tag hot"><span>hot</span></div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price -->

                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->

              </div>
              <!-- /.products -->
            </div>
            <!-- /.item -->

            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p2.jpg') }}" alt="" style="border-radius: 8px;"></a> </div>
                    <!-- /.image -->

                    <div class="tag sale"><span>sale</span></div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price -->

                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p3.jpg') }}" alt="" style="border-radius: 8px;"></a> </div>
                    <!-- /.image -->

                    <div class="tag sale"><span>sale</span></div>
                  </div>
                  <!-- /.product-image -->

                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price -->

                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>
        <!-- ===================== FEATURED PRODUCTS : END ======================= -->



        <!-- ========================= BLOG SLIDER ======================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">最新投稿</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">

              @foreach($blogpost as $blog)
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="{{ asset($blog->post_image) }}" style="border-radius: 8px" wedth="100%" height="250"></a> </div>
                  </div>

                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">@if(session()->get('language') == 'cn') {{ $blog->post_title_cn }} @else {{ $blog->post_title_jp }} @endif</a></h3>

                    <span class="info">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>

                    <p class="text">@if(session()->get('language') == 'cn') {!! Str::limit($blog->post_details_cn, 200 ) !!} @else {!! Str::limit($blog->post_details_jp, 200 ) !!} @endif</p>

                    <a href="{{ route('post.details',$blog->id) }}" class="link btn btn-primary">展開</a> </div>

                </div>
              </div>
              @endforeach

            </div>
          </div>
        </section>
        <!-- ================= BLOG SLIDER : END =================== -->




      </div>
      <!-- /.homebanner-holder -->
      <!-- =============== CONTENT : END ===================== -->
    </div>
    <!-- /.row -->


    <!-- =================== BRANDS CAROUSEL ================= -->
    @include('frontend.body.brands')
    <!-- ==================== BRANDS CAROUSEL : END ================== -->
  </div>
  <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->


@endsection