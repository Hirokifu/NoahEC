<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="">

<title>Admin Login </title>

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
                        <h1 class="text-white">ノアタイムシステム<span style="font-size:15px">©</span></h1>
                        <p class="text-white" style="margin:20px 0 30px 0">サプライヤー企業様向け</p>
                    </div>

                        <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                            @csrf

                            <div class="form-group">
                                <div class="input-group mb-15">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
                                    </div>

                                    {{-- メールアドレス --}}
                                    <input type="email" id="email" name="email" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-15">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
                                    </div>

                                    {{-- パスワード --}}
                                    <input type="password"  id="password" name="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password">
                                </div>
                            </div>
                                <div class="row">
                                {{-- <div class="col-6">
                                    <div class="checkbox text-white">
                                    <input type="checkbox" id="basic_checkbox_1" >
                                    <label for="basic_checkbox_1">Remember Me</label>
                                    </div>
                                </div> --}}

                                <div class="col-12">
                                    <div class="fog-pwd text-left" style="margin:0 0 0 14px">
                                    <a href="{{ route('password.request') }}" class="text-white hover-info"><i class="ion ion-locked"> </i>パスワードを忘れた場合</a><br>
                                    </div>
                                </div>

                                <div class="col-12 text-center" style="margin:35px 0 20px 0">
                                    <button type="submit" class="btn btn-info btn-rounded">ログイン</button>
                                </div>

                                </div>
                        </form>

                        {{-- <div class="text-center text-white">
                            <p class="mt-20">- Sign With -</p>
                            <p class="gap-items-2 mb-20">
                                <a class="btn btn-social-icon btn-round btn-outline btn-blue" href="#"><i class="fa fa-facebook"></i></a>
                                <a class="btn btn-social-icon btn-round btn-outline btn-blue" href="#"><i class="fa fa-twitter"></i></a>
                                <a class="btn btn-social-icon btn-round btn-outline btn-blue" href="#"><i class="fa fa-google"></i></a>
                                <a class="btn btn-social-icon btn-round btn-outline btn-blue" href="#"><i class="fa fa-instagram"></i></a>
                            </p>
                        </div> --}}

                        <div class="text-center" style="margin:10px 0 15px 0">
                            <p class="mt-15 mb-0 text-white">アカウントを作成する　 <a href="#" class="text-info ml-5">登録</a></p>
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
