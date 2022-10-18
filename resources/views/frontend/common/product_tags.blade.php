{{-- 商品タグ --}}

@php
    $tags_jp = App\Models\Product::groupBy('product_tags_jp')->select('product_tags_jp')->get();
    $tags_cn = App\Models\Product::groupBy('product_tags_cn')->select('product_tags_cn')->get();
@endphp

<div class="sidebar-widget product-tag wow fadeInUp outer-top-vs" style="border-radius:8px">

    <h3 class="section-title">商品タグ</h3>
    <div class="sidebar-widget-body outer-top-xs">

        <div class="tag-list">
        @if(session()->get('language') == 'cn')
            @foreach($tags_cn as $tag)
            <a class="item active" title="tag" href="{{ url('product/tag/'.$tag->product_tags_cn) }}">
                {{ str_replace(',',' ',$tag->product_tags_cn)  }}</a>
            @endforeach

        @else
            @foreach($tags_jp as $tag)
            <a class="item active" title="tag" href="{{ url('product/tag/'.$tag->product_tags_jp) }}">
                {{ str_replace(',',' ',$tag->product_tags_jp)  }}</a>
            @endforeach

        @endif
        </div>

    </div>

</div>