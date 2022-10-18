<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="">

<title>User Register </title>

<!-- Vendors Style-->
<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

<!-- Style-->
<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">

</head>
<body>

<div class="container h-p90">
<div class="row align-items-center justify-content-md-center h-p100">

    <div class="col-12">
        <div class="row justify-content-center no-gutters">
            <div class="col-lg-5 col-md-6 col-12">

                <div class="p-50 rounded15 b-2 b-dashed">

                <div class="content-top-agile p-10">
                    <h2 class="text-white">ノアショップ<span style="font-size:15px">©</span> 新規登録</h2>
                    <p class="text-white" style="margin:20px 0 30px 0">バイヤー様向け</p>
                </div>

                <div class="col-md-12 col-sm-12 create-new-account">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label class="text-white">お名前<span style="color:red">*</span></label>
                        <input id="text" type="name" name="name" class="form-control unicase-form-control text-input">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="text-white">メールアドレス<span style="color:red">*</span></label>
                        <input id="email" type="email" name="email" class="form-control unicase-form-control text-input">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="text-white">電話番号<span style="color:red">*</span></label>
                        <input type="text" id="phone" name="phone" class="form-control unicase-form-control text-input">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="text-white">パスワード<span style="color:red">* (8桁以上にしてください)</span></label>
                        <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="text-white">パスワード確認<span style="color:red">*</span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">

                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-info btn-rounded">登録する</button>
                </form>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Vendor JS -->
<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>

</body>
</html>
