@extends('frontend.main_master')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
Cash On Delivery
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">HOME</a></li>
				<li class='active'>Cash On Delivery</li>
			</ul>
		</div>
	</div>
</div>


<div class="body-content">
<div class="container">
    <div class="checkout-box ">
        <div class="row">

        <div class="col-md-6">
            <div class="checkout-progress-sidebar ">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="unicase-checkout-title">お買い物金額 </h4>
                        </div>
                        <div class="panel-body">

                            <table class="table-condensed">
                                <tbody>

                                    @if(Session::has('coupon'))
                                    <tr>
                                        <th>合計金額:</th>
                                        <td>¥{{ $cartTotal }}</td>
                                    </tr>
                                    <tr>
                                        <th>クーポン:</th>
                                        <td>{{ session()->get('coupon')['coupon_code'] }}
                                            ( {{ session()->get('coupon')['coupon_discount'] }}% OFF)</td>
                                    </tr>
                                    <tr>
                                        <th>割引金額:</th>
                                        <td>¥{{ session()->get('coupon')['discount_amount'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>お支払金額:</th>
                                        <td>¥{{ session()->get('coupon')['total_amount'] }}</td>
                                    </tr>

                                    @else
                                    <tr>
                                        <th>合計金額:</th>
                                        <td>¥{{ $cartTotal }}</td>
                                    </tr>
                                    <tr>
                                        <th>お支払金額:</th>
                                        <td>¥{{ $cartTotal }}</td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="checkout-progress-sidebar ">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="unicase-checkout-title">代金引換（COD）</h4>
                        </div>

                    <form action="{{ route('cash.order') }}" method="post" id="payment-form">
                        @csrf

                        <div class="form-row">
                        <img src="{{ asset('frontend/assets/images/payments/cash.jpg') }}">

                        <label for="card-element">
                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                            <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                            <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                        </label>

                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">お支払い</button>
                    </form>

                    </div>
                </div>
            </div>

        </div>

        </div>
    </div>

</div>
</div>

@endsection