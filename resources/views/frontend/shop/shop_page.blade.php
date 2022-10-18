@extends('frontend.main_master')
@section('content')

@section('title')
Shop Page
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">HOME</a></li>
				<li class='active'>SHOP</li>
			</ul>
		</div>
	</div>
</div>


<div class="body-content outer-top-xs">
<div class='container'>


  <div class='row'>
    <div class='col-md-3 sidebar'>

      <!-- ===== == TOP NAVIGATION ======= ==== -->
      @include('frontend.common.vertical_menu')
      <!-- = ==== TOP NAVIGATION : END === ===== -->

      <div class="sidebar-module-container">
        <div class="sidebar-filter">

          <!-- =============== SIDEBAR CATEGORY ===================== -->

          <form action="{{ route('shop.filter') }}" method="post">
            @csrf

          <div class="sidebar-widget wow fadeInUp" style="border-radius: 8px">
            <h3 class="section-title">商品検索</h3>

            <div class="widget-header" style="color:gray">【条件: カテゴリ】</div>

            <div class="sidebar-widget-body">
              <div class="accordion">

                @if(!empty($_GET['category']))
                  @php
                  $filterCat = explode(',',$_GET['category']);
                  @endphp
                @endif

                @foreach($categories as $category)
                <div class="accordion-group">
                <div class="accordion-heading">

                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="category[]" value="{{ $category->category_slug_jp }}" @if(!empty($filterCat) && in_array($category->category_slug_jp,$filterCat)) checked @endif  onchange="this.form.submit()">

                    @if(session()->get('language') == 'cn') {{ $category->category_name_cn }} @else {{$category->category_name_jp }} @endif
                  </label>

                </div>
                </div>
                @endforeach

              </div>
            </div>

            <!--  /////////// This is for Brand Filder /////////////// -->

            <div class="widget-header" style="color:gray">【条件: ブランド】</div>

            <div class="sidebar-widget-body">
              <div class="accordion">

                @if(!empty($_GET['brand']))
                  @php
                  $filterBrand = explode(',',$_GET['brand']);
                  @endphp
                @endif

                @foreach($brands as $brand)
                  <div class="accordion-group">
                    <div class="accordion-heading">

                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="brand[]" value="{{ $brand->brand_slug_jp }}" @if(!empty($filterBrand) && in_array($brand->brand_slug_jp,$filterBrand)) checked @endif onchange="this.form.submit()">

                      @if(session()->get('language') == 'cn') {{ $brand->brand_name_cn }} @else {{ $brand->brand_name_jp }} @endif
                    </label>

                    </div>
                  </div>
                @endforeach

              </div>
            </div>
          </div>

          </form>

          <!-- ============== SIDEBAR CATEGORY : END =============== -->


          {{-- ここから、表示コントロールする --}}


          <!-- ========== PRICE SILDER============ -->
          {{-- <div class="sidebar-widget wow fadeInUp">
            <div class="widget-header">
              <h4 class="widget-title">Price Slider</h4>
            </div>
            <div class="sidebar-widget-body m-t-10">
              <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                <input type="text" class="price-slider" value="" >
              </div>
              <!-- /.price-range-holder -->
              <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
            <!-- /.sidebar-widget-body -->
          </div> --}}
          <!-- /.sidebar-widget -->
          <!-- ================== PRICE SILDER : END ================ -->


          <!-- ======================= MANUFACTURES=============== -->
          {{-- <div class="sidebar-widget wow fadeInUp">
            <div class="widget-header">
              <h4 class="widget-title">Manufactures</h4>
            </div>

            <div class="sidebar-widget-body">
              <ul class="list">
                <li><a href="#">Forever 18</a></li>
                <li><a href="#">Nike</a></li>
                <li><a href="#">Dolce & Gabbana</a></li>
                <li><a href="#">Alluare</a></li>
                <li><a href="#">Chanel</a></li>
                <li><a href="#">Other Brand</a></li>
              </ul>
              <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
            </div>

          </div> --}}
          <!-- ================ MANUFACTURES: END =================== -->


          <!-- ===================== COLOR====================== -->
          {{-- <div class="sidebar-widget wow fadeInUp">
            <div class="widget-header">
              <h4 class="widget-title">Colors</h4>
            </div>
            <div class="sidebar-widget-body">
              <ul class="list">
                <li><a href="#">Red</a></li>
                <li><a href="#">Blue</a></li>
                <li><a href="#">Yellow</a></li>
                <li><a href="#">Pink</a></li>
                <li><a href="#">Brown</a></li>
                <li><a href="#">Teal</a></li>
              </ul>
            </div>
            <!-- /.sidebar-widget-body -->
          </div> --}}
          <!-- ===================== COLOR: END ===================== -->



          <!-- == =============== COMPARE========================= -->
          {{-- <div class="sidebar-widget wow fadeInUp outer-top-vs">
            <h3 class="section-title">Compare products</h3>
            <div class="sidebar-widget-body">
              <div class="compare-report">
                <p>You have no <span>item(s)</span> to compare</p>
              </div>
              <!-- /.compare-report -->
            </div>
            <!-- /.sidebar-widget-body -->
          </div> --}}
          <!-- ===================== COMPARE: END ======================= -->


          <!-- == ====== PRODUCT TAGS ==== ======= -->
            @include('frontend.common.product_tags')
          <!-- == ====== END PRODUCT TAGS ==== ======= -->


          <!-- == ========== Testimonials: ================= -->
            @include('frontend.common.testimonials')
          <!-- == ========== Testimonials: END ============= -->

          <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image" style="border-radius: 8px;"> </div>

        </div>
      </div>
    </div>



    <div class='col-md-9'>

      <!-- == ==== SECTION – HERO === ====== -->
      @include('frontend.common.hero')
      <!-- == ==== SECTION – HERO === ====== -->

      <div class="clearfix filters-container m-t-10" style="border-radius:8px 8px 0 0">
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


      <!--////////////// START Product Grid View  ////////////// -->

      <div class="search-result-container ">
        <div id="myTabContent" class="tab-content category-list">

            <!--============ START Product Grid View  ============ -->
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                  <div class="row" id="grid_view_product">
                  @include('frontend.product.grid_view_product')
                  </div>
              </div>
            </div>
            <!-- ============ END Product Grid View  ============ -->


            <!-- ============ Product List View Start ============ -->
            <div class="tab-pane "  id="list-container">
                <div class="category-product" id="list_view_product">
                    @include('frontend.product.list_view_product')
                </div>
            </div>
            <!--============ Product List View END ============ -->

        </div>


        <div class="clearfix filters-container" style="border-radius:0 0 8px 8px">
            <div class="text-right">
              <div class="pagination-container">
                  <ul class="list-inline list-unstyled">
                      {{ $products->appends($_GET)->links() }}
                      {{-- {{ $products->appends($_GET)->links('vendor.pagination.custom')  }} --}}
                  </ul>
              </div>
            </div>
        </div>


        </div>
      </div>

    </div>

  </div>


</div>
</div>

<br>
<br>

@endsection