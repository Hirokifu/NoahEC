@extends('frontend.main_master')
@section('content')

@section('title')
    Wish List Page
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">Home</a></li>
				<li class='active'>Wishlist</li>
			</ul>
		</div>
	</div>
</div>

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">

				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th colspan="4" class="heading-title">お気に入りの商品</th>
							</tr>
						</thead>

						{{-- main-master.blade.phpの「#wishlist」を用いてる。 --}}
						<tbody id="wishlist">

							{{-- お気に入りの商品がここに表示される --}}

						</tbody>
					</table>
				</div>

				</div>
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->



	<br>
	{{-- @include('frontend.body.brands') --}}
	</div>
</div>


@endsection