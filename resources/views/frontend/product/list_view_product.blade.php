{{-- カテゴリーで商品を検索した結果を一覧リスト表示 --}}

@foreach($products as $product)

<div class="category-product-inner wow fadeInUp">
  <div class="products">

    <div class="product-list product">
      <div class="row product-list-row">

        <div class="col col-sm-4 col-lg-4">
          <div class="product-image">
            <div class="image">
              <img src="{{ asset($product->product_thambnail) }}" alt="" style="border-radius: 8px;">
            </div>
          </div>
        </div>

        <div class="col col-sm-8 col-lg-8">
          <div class="product-info">
            <h3 class="name">
              <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}">
              @if(session()->get('language') == 'cn') {{ $product->product_name_cn }} @else {{ $product->product_name_jp }} @endif</a>
            </h3>

            <div class="rating rateit-small"></div>


            @if ($product->discount_price == NULL)
            <div class="product-price">
              <span class="price"> ¥{{ $product->selling_price }} </span>
            </div>
            @else
            <div class="product-price">
              <span class="price"> ¥{{ $product->discount_price }} </span>
              <span class="price-before-discount">¥{{ $product->selling_price }}</span>
            </div>
            @endif

            <!-- /.product-price -->
            <div class="description m-t-10">
              @if(session()->get('language') == 'cn') {{ $product->short_descp_cn }} @else {{ $product->short_descp_jp }} @endif
            </div>


            {{-- Cart/Wishlist/Compareの3ボタン機能 --}}
            <div class="cart clearfix animate-effect">
              <div class="action">
                <ul class="list-unstyled">
                  <li class="add-cart-button btn-group">

                    <button class="btn btn-primary icon" type="button" title="Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

                    <button class="btn btn-danger icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i></button>

                    <button class="btn btn-success icon" type="button" title="Compare"> <i class="fa fa-signal"></i> </button>

                  </li>
                </ul>
              </div>
            </div>


          </div>
        </div>
      </div>


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

  </div>

</div>

@endforeach