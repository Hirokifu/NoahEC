@php
$categories = App\Models\Category::orderBy('id','ASC')->get();
@endphp


<div class="side-menu animate-dropdown outer-bottom-xs" style="border-radius:8px">
    <div class="head" style="border-radius:5px 5px 0px 0px"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
    <ul class="nav">


        {{-- カテゴリー --}}
        @foreach($categories as $category)

          <li type="hidden" name="id" value="{{ $category->id }}">

          <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $category->category_icon }}" aria-hidden="true"></i>

          @if(session()->get('language') == 'cn') {{ $category->category_name_cn }} @else {{ $category->category_name_jp }} @endif
          </a>

          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">

                <!--   // Get SubCategory Table Data -->
                @php
                $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('id','ASC')->get();
                @endphp


                {{-- サブカテゴリー --}}
                @foreach($subcategories as $subcategory)
                  <div class="col-sm-12 col-md-3">

                      <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_jp ) }}">
                      <h2 class="title">
                        @if(session()->get('language') == 'cn') {{ $subcategory->subcategory_name_cn }} @else {{ $subcategory->subcategory_name_jp }} @endif
                      </h2>
                      </a>

                        <!--   // Get SubSubCategory Table Data -->
                      @php
                      $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('id','ASC')->get();
                      @endphp


                      {{-- サブサブカテゴリー --}}
                      @foreach($subsubcategories as $subsubcategory)
                          <ul class="links list-unstyled">
                            <li><a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_jp ) }}">
                            @if(session()->get('language') == 'cn') {{ $subsubcategory->subsubcategory_name_cn }} @else {{ $subsubcategory->subsubcategory_name_jp }} @endif</a></li>

                          </ul>
                      @endforeach <!-- // End SubSubCategory Foreach -->

                    </div>
                    <!-- /.col -->
                @endforeach  <!-- End SubCategory Foreach -->

              </div>
              <!-- /.row -->
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu -->
        </li>
        <!-- /.menu-item -->
        </li>
        @endforeach  <!-- End Category Foreach -->


        {{-- メニュー追加の場合、下記使用すること --}}
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>メニュー</a>
        <!-- /.dropdown-menu -->
        </li>

        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>メニュー</a>
          <!-- /.dropdown-menu -->
        </li>

        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>メニュー</a>
          <!-- /.dropdown-menu -->
        </li>


    </ul>
    <!-- /.nav -->
  </nav>
  <!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->