@extends('frontend.main_master')
@section('content')

@section('title')
タグ商品
@endsection

<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="/">HOME</a></li>
        <li class='active'>タグ</li>
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


        <div class="sidebar-module-container">
          <div class="sidebar-filter">

              <!-- ============ SIDEBAR CATEGORY ===================== -->
              @include('frontend.common.category_menu')
              <!-- ============= SIDEBAR CATEGORY : END ================ -->



              <!-- ======================= PRICE SILDER================ -->
              <div class="sidebar-widget wow fadeInUp">
                <div class="widget-header">
                  <h4 class="widget-title">Price Slider</h4>
                </div>
                <div class="sidebar-widget-body m-t-10">
                  <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">¥200.00</span> <span class="pull-right">¥800.00</span> </span>
                    <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                    <input type="text" class="price-slider" value="" >
                  </div>
                  <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
              </div>
              <!-- ====================== PRICE SILDER : END ================== -->


              <!-- ================== MANUFACTURES============================ -->
              {{-- <div class="sidebar-widget wow fadeInUp">
                <div class="widget-header">
                  <h4 class="widget-title">Manufactures</h4>
                </div>
                <div class="sidebar-widget-body">
                  <ul class="list">
                    <li><a href="#">Forever 18</a></li>
                    <li><a href="#">Nike</a></li>
                  </ul>
                  <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                </div>
              </div> --}}
              <!-- ==================== MANUFACTURES: END ========================= -->


              <!-- ======================= COLOR===================== -->
              {{-- <div class="sidebar-widget wow fadeInUp">
                <div class="widget-header">
                  <h4 class="widget-title">Colors</h4>
                </div>
                <div class="sidebar-widget-body">
                  <ul class="list">
                    <li><a href="#">Red</a></li>
                    <li><a href="#">Blue</a></li>
                  </ul>
                </div>
              </div> --}}
              <!-- ======================== COLOR: END ====================== -->



              <!-- ======================== COMPARE====================== -->
              {{-- <div class="sidebar-widget wow fadeInUp">
                <h3 class="section-title">Compare products</h3>
                <div class="sidebar-widget-body">
                  <div class="compare-report">
                    <p>You have no <span>item(s)</span> to compare</p>
                  </div>
                </div>
              </div> --}}
              <!-- ======================== COMPARE: END ========================= -->


              <!-- ======================== PRODUCT TAGS ========================= -->
              @include('frontend.common.product_tags')
              <!-- ======================== PRODUCT TAGS ========================= -->


              <!-- =================== Testimonials ===================== -->
              @include('frontend.common.testimonials')
              <!-- =================== Testimonials ===================== -->


              <div class="home-banner">
                <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
              </div>
              <br>

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
                        <li role="presentation"><a href="#">Price:HIghest first</a></li>
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

        {{-- //////////////////// START Product Grid View  ////////////// --}}

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
                  {{ $products->links() }}
                </ul>
              </div>
            </div>
          </div>

      </div>


    </div>
  </div>
</div>


@endsection