@php
$brands = App\Models\Brand::latest()->get();
@endphp

<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">

            @foreach($brands as $brand)

            <img src="{{ asset($brand->brand_image) }}" class="card-img-top" style="border-radius: 8px; height: 100px; width: 160px;">

            @endforeach

        </div>
    </div>
</div>
