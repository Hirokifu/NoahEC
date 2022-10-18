{{-- 広告バナー：会社概要＆人物像 --}}

@php
$companies = App\Models\Company::orderBy('id','DESC')->get();
@endphp

<div class="sidebar-widget  wow fadeInUp outer-top-vs" style="border-radius:8px">
    <div id="advertisement" class="advertisement">
    {{-- <div id="owl-main" class="advertisement"> --}}

      @foreach($companies as $item)
        <div class="item">

          @if(!empty($item->homepage))
            <div style="text-align: center; margin:0 0 20px 0">
              <a href="{{ url($item->homepage) }}"><img src="{{ url('upload/company/thambnail/'.$item->company_thambnail) }}" style="border-radius: 50%; width:80%; height:auto"></a>
            </div>

            <div class="testimonials">{!! $item->long_descp_jp !!}</div>

            <div class="clients_author">
              <a href="{{ url($item->homepage) }}" style="font-size:16px">{{ $item->company_jp }}</a><span>{{ $item->manager }}</span>
            </div>
          @else
            <div style="text-align: center; margin:0 0 20px 0"><img src="{{ asset($item->company_thambnail) }}" style="border-radius: 50%; width:80%; height:auto">
            </div>

            <div class="testimonials">{!! $item->long_descp_jp !!}</div>

            <div class="clients_author">
              <a style="font-size:16px">{{ $item->company_jp }}</a><span>{{ $item->manager }}</span>
            </div>
          @endif

        </div>
      @endforeach

      {{-- <div class="item">
        <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member3.png') }}" alt="Image" style="border-radius: 50%"></div>
        <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
        <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
      </div> --}}

    </div>
</div>
