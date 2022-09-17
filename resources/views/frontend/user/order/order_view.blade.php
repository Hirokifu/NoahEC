@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
            @include('frontend.common.user_sidebar')

			<br>
			<div class="col-md-10">
			<div class="table-responsive">

			<div style="text-align: center;background-color:DodgerBlue;color:white;padding:5px 0 5px 0">
				<h4>注文一覧</h4>
			</div>
			<br>

			<table class="table-bordered">

				<tbody>
				<tr style="background: #e2e2e2;">
					<td class="col-md-1">
					<label for=""> NO.</label>
					</td>

					<td class="col-md-2">
					<label for=""> Date</label>
					</td>

					<td>
					<label for=""> Total</label>
					</td>

					<td class="col-md-2">
					<label for=""> Payment</label>
					</td>

					<td class="col-md-2">
					<label for=""> Invoice</label>
					</td>

					<td class="col-md-1">
					<label for=""> Order</label>
					</td>

					<td>
					<label for=""> Action </label>
					</td>
				</tr>

				@php($i = 1)
				@foreach($orders as $order)
				<tr>
					<td class="col-md-1">{{ $i }}</td>
					<td class="col-md-2">{{ $order->order_date }}</td>
					<td>￥{{ $order->amount }}</td>
					<td class="col-md-2">{{ $order->payment_method }}</td>
					<td class="col-md-2">{{ $order->invoice_no }}</td>

					<td class="col-md-1">
						{{-- <label for=""> --}}
						@if($order->status == 'pending')
						<span class="badge badge-pill badge-warning" style="background: #800080;"> Pending </span>

						@elseif($order->status == 'confirm')
						<span class="badge badge-pill badge-warning" style="background: #0000FF;"> Confirm </span>

						@elseif($order->status == 'processing')
						<span class="badge badge-pill badge-warning" style="background: #FFA500;"> Processing </span>

						@elseif($order->status == 'picked')
						<span class="badge badge-pill badge-warning" style="background: #808000;"> Picked </span>

						@elseif($order->status == 'shipped')
						<span class="badge badge-pill badge-warning" style="background: #808080;"> Shipped </span>

						@elseif($order->status == 'delivered')
						<span class="badge badge-pill badge-warning" style="background: #008000;"> Delivered </span>

						@if($order->return_order == 1)
						<span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>
						@endif

						@else
						<span class="badge badge-pill badge-warning" style="background: #FF0000;"> Cancel </span>
						@endif
						{{-- </label> --}}
					</td>

					<td>
						<a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>View</a>

						<a href="{{ url('user/invoice_download/'.$order->id ) }}" class="btn btn-sm btn-danger" ><i class="fa fa-download"></i>Invoice</a>
					</td>
				</tr>
				@php($i++)
				@endforeach

				</tbody>

			</table>

			</div>
			</div>
		</div>

	</div>
<br>
<br>
</div>


@endsection