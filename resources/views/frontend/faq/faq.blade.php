@extends('frontend.main_master')
@section('content')

@section('title')
FAQ
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">HOME</a></li>
				<li class='active'>FAQ</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
<div class="container">

    <div class="checkout-box faq-page">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading-title">お問い合わせ・よくあるご質問</h2>
                <div class="panel-group checkout-steps" id="accordion">

                @php($i = 1)
                @foreach($faqs as $faq)

                <div class="panel panel-default checkout-step">
                    <div class="panel-heading">
                        <h3 class="unicase-checkout-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseOne{{ $i }}">
                                <span>{{ $i }}</span> @if(session()->get('language') == 'cn') {{ $faq->quiz_cn }} @else {{ $faq->quiz_jp }} @endif
                            </a>
                        </h3>
                    </div>

                    <div id="collapseOne{{ $i }}" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                            {{-- {{}}を{!! !!}へ変更すれば、タグ<p></p>が表示しなくなる --}}
                            @if(session()->get('language') == 'cn') {!! $faq->answer_cn !!} @else {!! $faq->answer_jp !!} @endif
                        </div>
                    </div>
                </div>
                @php($i++)
                @endforeach

                </div><!-- /.checkout-steps -->

            </div>
        </div><!-- /.row -->
    </div><!-- /.checkout-box -->

    <!-- ====================== BRANDS CAROUSEL ========================= -->
    {{-- @include('frontend.body.brands') --}}
    <!-- ====================== BRANDS CAROUSEL ========================= -->

</div>
</div>
<br>
<br>



@endsection