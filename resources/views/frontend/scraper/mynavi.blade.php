@extends('frontend.main_master')
@section('content')

@section('title')
マイナビ転職
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">HOME</a></li>
				<li class='active'>マイナビ転職</li>
			</ul>
		</div>
	</div>
</div>



<div class="body-content">
    <div class="container">

    <div class="row">
        <div class="col-md-12 offset-md-12 mt-5 wrapper">

            @foreach ($data as $key => $value)
            <div>
                <h5 class="card-header">{{ $key }}</h5>
                <ul>
                    <li>{{ $value['title'] }}</li>
                    <li>{{ $value['company'] }}</li>
                    <li>{{ $value['infomations'] }}</li>
                    <li>{{ $value['openDate'] }}</li>
                </ul>
            </div>
            @endforeach

        </div>
    </div>

    </div>
</div>

@endsection