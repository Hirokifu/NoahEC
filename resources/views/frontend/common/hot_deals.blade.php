@php
    $hot_deals = App\Models\Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
@endphp

<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs" style="border-radius:8px">
    <h3 class="section-title">お得情報</h3>

    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

        @foreach($hot_deals as $product)

        <div class="item">
        <div class="products">
            <div class="hot-deal-wrapper">
                <div class="image">
                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt="" style="border-radius: 8px;"></a>
                </div>

                @php
                $amount = $product->selling_price - $product->discount_price;
                $discount = ($amount/$product->selling_price) * 100;
                @endphp

                @if ($product->discount_price == NULL)
                <div class="tag new"><span>new</span></div>
                @else
                <div class="sale-offer-tag"><span>{{ round($discount) }}%<br>
                    off</span>
                </div>
                @endif


                {{-- カスタマイズ内容 --}}
                <div class="timing-wrapper">
                    <div class="box-wrapper">
                        <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                    </div>
                    <div class="box-wrapper">
                        <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                        <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper hidden-md">
                        <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                    </div>
                </div>

            </div>
            <!-- /.hot-deal-wrapper -->



            <div class="product-info text-left m-t-20">

                <h3 class="name">
                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_jp ) }}">
                    @if(session()->get('language') == 'cn') {{ $product->product_name_cn }} @else {{ $product->product_name_jp }} @endif
                </a></h3>
                    <div class="rating rateit-small"></div>

                @if ($product->discount_price == NULL)
                    <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
                @else
                    <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">${{ $product->selling_price }}</span> </div>
                @endif

            </div>

            <div class="cart clearfix animate-effect">
                <div class="action">
                <div class="add-cart-button btn-group">
                    <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

                    <button type="submit" onclick="addToCart()" class="btn btn-info">カートに入れる</button>
                    {{-- <button type="submit" onclick="addToCart()" class="btn btn-info" style="width:60%; margin:0 20% 0 20%""><i class="fa fa-shopping-cart inner-right-vs"></i>カートに入れる</button> --}}
                </div>
                </div>
            </div>
        </div>
        </div>

        @endforeach
        <!-- // end hot deals foreach -->


    </div>
</div>