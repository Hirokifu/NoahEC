@extends('frontend.main_master')
@section('content')

@section('title')
My Cart Page
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">Home</a></li>
				<li class='active'>MyCart</li>
			</ul>
		</div>
	</div>
</div>

<div class="body-content">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th class="cart-romove item">Image</th>
									<th class="cart-description item">Name</th>
									<th class="cart-product-name item">Color</th>
									<th class="cart-edit item">Size</th>
									<th class="cart-qty item">Quantity</th>
									<th class="cart-sub-total item">Subtotal</th>
									<th class="cart-total last-item">Remove</th>
								</tr>
							</thead>

							{{-- main-master.blade.phpの「#cartPage」を用いてる。 --}}
							<tbody id="cartPage">

								{{-- ここ、カードに入れた商品リストを表示する --}}

							</tbody>
						</table>
					</div>
				</div>


			<div class="col-md-4 col-sm-12 estimate-ship-tax">
				{{-- 税率をここに追加する --}}
			</div>

			<div class="col-md-4 col-sm-12 estimate-ship-tax">
				@if(Session::has('coupon'))

				@else

				<table class="table borderless" id="couponField">
					<thead>
						<tr>
							<th>
								<span class="estimate-title">優待券のご利用</span>
								<p>クーポンコードをお持ちの場合、ご入力ください。</p>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="form-group">
									<input type="text" class="form-control unicase-form-control text-input" placeholder="coupon code" id="coupon_code">
								</div>
								<div class="clearfix pull-right">
									<button type="submit" class="btn-upper btn btn-info" onclick="applyCoupon()">利用する</button>
								</div>
							</td>
						</tr>
					</tbody>
				</table>

				@endif

			</div>

			<div class="col-md-4 col-sm-12 cart-shopping-total">
				<table class="table">
					<thead id="couponCalField">
					</thead>

					<tbody>
							<tr>
								<td>
									<div class="cart-checkout-btn pull-right">
										<a href="{{ route('checkout') }}" type="submit" class="btn btn-primary checkout-btn">お支払いへ</a>
									</div>
								</td>
							</tr>
					</tbody>
				</table>
			</div>

			</div>
		</div>


	<br>
	{{-- @include('frontend.body.brands') --}}
</div>


@endsection