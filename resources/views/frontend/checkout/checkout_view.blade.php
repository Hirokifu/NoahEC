@extends('frontend.main_master')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
My Checkout
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">HOME</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div>
	</div>
</div>


<div class="body-content">
<div class="container">
<div class="checkout-box ">


    <form class="register-form" action="{{ route('checkout.store') }}" method="POST">
        @csrf

        <div class="row">

            <div class="col-md-7">

                <div class="checkout-progress-sidebar ">

                <div class="panel-group checkout-steps" id="accordion">
                <div class="panel panel-default checkout-step-01">
                <div id="collapseOne" class="panel-collapse collapse in">

                    <div class="panel-heading">
                        <h4 class="checkout-subtitle">お届け先</h4>
                    </div>


                        <div class="panel-body">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1"><b>お名前</b> <span>*</span></label>
                                <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}" required="">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1"><b>メールアドレス</b> <span>*</span></label>
                                <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}" required="">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1"><b>お電話</b> <span>*</span></label>
                                <input type="number" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->phone }}" required="">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1"><b>郵便番号</b> <span>*</span></label>
                                <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code" required="">
                            </div>

                        </div>


                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <h5><b>国名</b> <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="division_id" class="form-control" required="" >
                                        <option value="" selected="" disabled="">Select</option>
                                        @foreach($divisions as $item)
                                        <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                                        @endforeach
                                    </select>
                                        @error('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5><b>省・県</b>  <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="district_id" class="form-control" required="" >
                                        <option value="" selected="" disabled="">Select</option>

                                    </select>
                                    @error('district_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5><b>市町村</b> <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="state_id" class="form-control" required="" >
                                        <option value="" selected="" disabled="">Select</option>

                                    </select>
                                    @error('state_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">番地・建物 <span>*</span></label>
                                <textarea class="form-control" cols="30" rows="2" placeholder="例: 東山元町3-34  プレシアスA506" name="notes"></textarea>
                            </div>
                        </div>
                        </div>

                </div>
                </div>
                </div>
                </div>
            </div>


            {{-- お注文の詳細 --}}
            <div class="col-md-5">

                <div class="checkout-progress-sidebar ">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">お買い物明細</h4>
                            </div>

                            <div class="panel-body">

                                @foreach($carts as $item)
                                    <div>
                                        <label style="margin:0 35px 20px 0">
                                            <img src="{{ asset($item->options->image) }}" style="border-radius: 8px; height: 70px; width: 70px;">
                                        </label>

                                        <label style="margin:0 5px 0 30px">単価:</label>
                                        <span>¥ {{ $item->price }}</span>

                                        <label style="margin:0 5px 0 30px">数量:</label>
                                        <span>{{ $item->qty }}</span>
                                    </div>
                                @endforeach

                                @if(Session::has('coupon'))
                                <hr>
                                <div style="text-align: right">
                                <div>
                                    <label style="margin:0 70px 0 0">合計金額:</label>
                                    <span>¥ {{ $cartTotal }}</span>
                                </div>
                                <div>
                                    <label style="margin:0 10px 0 0">クーポン券:</label>
                                    <span>({{ session()->get('coupon')['coupon_discount'] }}%OFF)  ¥ {{ session()->get('coupon')['discount_amount'] }}
                                    </span>
                                </div>
                                <div>
                                    <label style="margin:0 70px 0 0">お支払金額:</label>
                                    <span>¥ {{ session()->get('coupon')['total_amount'] }}</span>
                                </div>
                                </div>
                                @else
                                <hr>
                                <div style="text-align: right">
                                <div>
                                    <label style="margin:0 70px 0 0">合計金額:</label>
                                    <span>¥ {{ $cartTotal }}</span>
                                </div>
                                <div>
                                    <label style="margin:0 70px 0 0">お支払金額:</label>
                                    <span>¥ {{ $cartTotal }}</span>
                                </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        {{-- お支払い方法を選定する --}}
        <div class="row">

            <div class="col-md-5" style="float: right">

                <div class="checkout-progress-sidebar ">
                <div class="panel-group">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="unicase-checkout-title">お支払い方法を選定する</h4>
                    </div>

                    <div class="panel-body">
                        <div class="col-md-4">
                            <label for="">Stripe</label>
                            <input type="radio" name="payment_method" value="stripe">
                            <div><img src="{{ asset('frontend/assets/images/payments/4.png') }}"></div>
                        </div>

                        <div class="col-md-4">
                            <label for="">Card</label>
                            <input type="radio" name="payment_method" value="card">
                            <div><img src="{{ asset('frontend/assets/images/payments/3.png') }}"></div>
                        </div>

                        <div class="col-md-4">
                            <label for="">Cash</label>
                            <input type="radio" name="payment_method" value="cash">
                            <div><img src="{{ asset('frontend/assets/images/payments/6.jpg') }}"></div>
                        </div>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn btn-info">お支払へ</button>

                    </div>
                </div>
                </div>
            </div>

        </div>

    </form>

</div>
</div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{  url('/district-get/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="state_id"]').empty();
                        var d =$('select[name="district_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                            });
                    },
                });
            } else {
                alert('danger');
            }
        });

        $('select[name="district_id"]').on('change', function(){
        var district_id = $(this).val();
        if(district_id) {
            $.ajax({
                url: "{{  url('/state-get/ajax') }}/"+district_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                    var d =$('select[name="state_id"]').empty();
                    $.each(data, function(key, value){
                        $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                    });
                },
            });
        } else {
            alert('danger');
        }
    });

});
</script>



@endsection