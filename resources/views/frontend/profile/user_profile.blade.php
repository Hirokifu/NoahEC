@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">

            @include('frontend.common.user_sidebar')

            <br>
            <div class="col-md-10" style="padding:0 0 0 40px">

                <h3 class="text-center"><span class="text-danger"></span><strong>{{ Auth::user()->name }}</strong>のプロファイル更新</h3>

                <table class="table-bordered" style="background: #e2e2e2">

                    <tbody>
                    <tr>
                        <td class="col-md-3">
                            <label>お名前</label>
                        </td>

                        <td class="col-md-9">
                            <input type="name" name="name" value="{{ $user->name }}" class="form-control unicase-form-control text-input">
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td class="col-md-3">
                            <label>メールアドレス</label>
                        </td>
                        <td class="col-md-9">
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control unicase-form-control text-input">
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-3">
                            <label>携帯番号</label>
                        </td>

                        <td class="col-md-9">
                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control unicase-form-control text-input">
                        </td>
                    </tr>

                    <tr>
                        <td class="col-md-3">
                            <label>アバター</label>
                        </td>

                        <td class="col-md-9">
                            <input type="file" name="profile_photo_path" value="{{ $user->profile_photo_path }}" class="form-control unicase-form-control text-input">
                        </td>
                    </tr>
                    </tbody>

                </table>

                <br>
                <div>
                    <button type="submit" class="btn btn-info btn-circle">更新する</button>
                </div>

            </div>

        </div>
    </div>
</div>



@endsection