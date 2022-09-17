@extends('frontend.main_master')
@section('content')

@section('title')
Car
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">HOME</a></li>
				<li class='active'>CAR</li>
			</ul>
		</div>
	</div>
</div>


{{-- Scraping sample --}}
{{-- <div class="container">
    <div class="row">
        <div class="col-md-12 offset-md-12 mt-5 wrapper">

            @foreach ($data as $key => $value)
            <div class="card text-center mt-4">
                <h5 class="card-header">{{ $key }}</h5>
                <div class="card-body">
                    <p class="card-text">{{ $value }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div> --}}


{{-- 赤ワイン＠AEON-WINE ONLINE SHOP --}}
{{-- <div class="container">
    <div class="row">
        <div class="col-md-12 offset-md-12 mt-5 wrapper">

            @foreach ($data as $key => $value)
            <div class="card text-center mt-4">
                <h5 class="card-header">{{ $key }}</h5>
                <div class="card-body">
                    <p class="card-text">{{ $value }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div> --}}



{{-- スクラッピング事例 --}}

<div class="body-content">
    <div class="container">

    <div class="row">
        <div class="col-md-12 offset-md-12 mt-5 wrapper">

            @foreach ($data as $key => $value)
            <div>
                <h5 class="card-header">{{ $key }}</h5>
                <ul>
                    <li><div class="image"> <a href="#"><img src="{{ url($value['img']) }}" alt="" style="border-radius: 5px"></a></div></li>
                    <li>{{ $value['infomations'] }}</li>
                </ul>
            </div>
            @endforeach

        </div>
    </div>

    </div>
</div>

@endsection