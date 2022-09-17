@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">

      @include('frontend.common.user_sidebar')
      <br>

      <div class="col-md-0">
      </div>

      {{-- <div class="row"> --}}
      <div class="col-md-10">
          <div class="col-md-6">
            <div class="table-responsive">

              <h4><strong>【お届け先】</strong></h4>

            <div class="card" style="background-color: #DCDCDC; border-radius:10px; padding:15px">
              <table class="table-bordered" style="width:100%;">

                <tbody>
                <tr height="40px">
                  <th>
                    お名前
                  </th>
                  <th> {{ $order->name }} </th>
                </tr>

                <tr height="40px">
                  <th> お電話: </th>
                  <th> {{ $order->phone }} </th>
                </tr>

                <tr height="40px">
                  <th> メールアドレス: </th>
                  <th> {{ $order->email }} </th>
                </tr>

                <tr height="40px">
                  <th> お国: </th>
                  <th> {{ $order->division->division_name }} </th>
                </tr>

                <tr height="40px">
                  <th> 省・県: </th>
                  <th> {{ $order->district->district_name }} </th>
                </tr>

                <tr height="40px">
                  <th> 市町村: </th>
                  <th>{{ $order->state->state_name }} </th>
                </tr>

                <tr height="40px">
                  <th> 郵便番号: </th>
                  <th> {{ $order->post_code }} </th>
                </tr>

                <tr height="40px">
                  <th> 発注日: </th>
                  <th> {{ $order->order_date }} </th>
                </tr>
                </tbody>

              </table>

            </div>
            </div>
          </div>

          <div class="col-md-6">
              <div class="table-responsive">
                  <h4><strong>【ご注文の処理状況】</strong></h4>

                  <div class="card" style="background-color: #DCDCDC; border-radius:10px; padding:15px">
                  <table class="table-bordered" style="width:100%">
                      <tr height="40px">
                        <th>  お名前: </th>
                        <th> {{ $order->user->name }} </t>
                      </tr>

                      <tr height="40px">
                        <th>  お電話: </th>
                        <th> {{ $order->user->phone }} </th>
                      </tr>

                      <tr height="40px">
                        <th> お支払方法: </th>
                        <th> {{ $order->payment_method }} </th>
                      </tr>

                      <tr height="40px">
                        <th> Tranx ID : </th>
                        <th> {{ $order->transaction_id }} </th>
                      </tr>

                      <tr height="40px">
                        <th> インボイス番号: </th>
                        <th class="text-danger"> {{ $order->invoice_no }} </th>
                      </tr>

                      <tr height="40px">
                        <th> お支払金額: </th>
                        <th>{{ $order->amount }} </th>
                      </tr>

                      <tr height="40px">
                        <th> 対応状況: </th>
                        <th>
                          <span class="badge badge-pill badge-warning" style="background: #047721;">{{ $order->status }} </span>
                        </th>
                      </tr>

                  </table>

              </div>

          </div>

      </div>


      <div class="col-md-12" style="margin:30px 0 30px 0">
      <div class="table-responsive">

        <h4><strong>【ご注文詳細】</strong></h4>
        <div class="card" style="background-color: #DCDCDC; border-radius:10px; padding:15px">
        <table class="table-bordered" style="width:100%">

          <tr height="50px">
              <th class="col-md-1">Image</th>
              <th class="col-md-2">商品名</th>
              <th class="col-md-2">商品コード</th>
              <th class="col-md-1">色</th>
              <th class="col-md-2">サイズ</th>
              <th class="col-md-1">数量</th>
              <th class="col-md-2">参考単価</th>
              <th class="col-md-2">説明文書</th>
            </tr>

            @foreach($orderItem as $item)
            <tr height="40px">
              <th class="col-md-1">
                <img src="{{ asset($item->product->product_thambnail) }}" style="border-radius: 8px" height="60px;" width="70px;">
              </th>
              <th class="col-md-2">{{ $item->product->product_name_jp }}</th>
              <th class="col-md-2">{{ $item->product->product_code }}</th>
              <th class="col-md-1">{{ $item->color }}</th>
              <th class="col-md-2">{{ $item->size }}</th>
              <th class="col-md-1">{{ $item->qty }}</th>
              <th class="col-md-2">￥{{$item->price}}</th>

              @php
              $file = App\Models\Product::where('id',$item->product_id)->first();
              @endphp

              <th class="col-md-2">
                @if($order->status == 'pending')
                <strong><span class="badge badge-pill badge-success" style="background: #418DB9;"> No File</span>  </strong>

                {{-- オーダ処理時にpickedされると、デジタル商品がダウンロードできるようになる--}}

                @elseif($order->status == 'confirm' || 'processing' || 'delivered' || 'picked' || 'shipped')
                <a target="_blank" href="{{ asset('upload/pdf/'.$file->digital_file) }}">
                  <strong><span class="badge badge-pill badge-success" style="background: #FF0000;">{{ $file->digital_file }}</span></strong>
                </a>
                @endif
              </th>

            </tr>
            @endforeach

        </table>

      </div>
      </div>
      </div>

      @if($order->status !== "delivered")
      @else

          @php
          $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
          @endphp


          @if($order)
          <form action="{{ route('return.order',$order->id) }}" method="post">
            @csrf

            <div class="form-group">
              <label for="label"> Order Return Reason:</label>
              <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">Return Reason</textarea>
            </div>

            <button type="submit" class="btn btn-danger">Order Return</button>

          </form>
          @else
            <span class="badge badge-pill badge-warning" style="background: red">You Have send return request for this product</span>
          @endif

      @endif
      <br>
      <br>

    </div>

</div>


@endsection