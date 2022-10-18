@extends('frontend.main_master')
@section('content')

@php
    $user = DB::table('users')->where('id', Auth::user()->id)->first();
@endphp

<div class="body-content">
	<div class="container">
		<div class="row">

            @include('frontend.common.user_sidebar')

            <div class="col-md-1">

            </div>

            <div class="col-md-9">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">パスワード変更</span><strong></strong></h3>
                    <div class="card-body">

                        <form method="post" action="{{ route('user.password.update') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">現行パスワード <span>*</span></label>
                                <input type="password" id="current_password" name="oldpassword" class="form-control unicase-form-control text-input">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">新しいパスワード<span>*</span></label>
                                <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">再度パスワード入力<span>*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-circle">更新する</button>
                            </div>
                        </form>

                </div>
            </div>

        </div>
    </div>
</div>



@endsection