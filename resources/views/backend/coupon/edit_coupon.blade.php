@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->

    <div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">


<!--   ------------ Add Coupon Page -------- -->
<div class="col-12">

    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Coupon </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <div class="table-responsive">

    <form method="post" action="{{ route('coupon.update',$coupons->id) }}" >
        @csrf

        <div class="form-group">
            <h5>Coupon Name  <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text"  name="coupon_name" class="form-control" value="{{ $coupons->coupon_name }}">

                @error('coupon_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <h5>Coupon-Code: {{ $coupons->coupon_code }}</h5>
            <span class="text-danger">（クーポンコードが変更ありません）</span>
        </div>

        <div class="form-group">
            <h5>Coupon Discount(%) <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="coupon_discount" class="form-control" value="{{ $coupons->coupon_discount }}">

                @error('coupon_discount')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <h5>Coupon Start-Day <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="date" name="coupon_start" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $coupons->coupon_start }}">

                @error('coupon_start')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <h5>Coupon Validity-Day  <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="date" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $coupons->coupon_validity }}">

                @error('coupon_validity')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
        </div>

    </form>

    </div>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </div>

    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

</div>

@endsection