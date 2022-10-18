{{-- ユーザのマイページに配置するサイドメニュー --}}

@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
@endphp

<div class="col-md-2" style="border-radius:8px; text-align: center"><br>

    <img class="card-img-top" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" height="50%" width="50%"><br><br>

    <ul class="list-group list-group-flush">

        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">ホーム</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">プロファイル更新</a>
        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">パスワード更新 </a>
        <br>
        <a href="{{ route('my.orders') }}" class="btn btn-success btn-sm btn-block">マイオーダ</a>
        <a href="{{ route('cancel.orders') }}" class="btn btn-success btn-sm btn-block">取消中のオーダ</a>
        <a href="{{ route('return.order.list') }}" class="btn btn-success btn-sm btn-block">取消済のオーダ</a>
        <br>
        <a href="{{ route('news') }}" class="btn btn-warning btn-sm btn-block">お知らせ</a>
        <a href="{{ route('inquiry') }}" class="btn btn-warning btn-sm btn-block">私の質問履歴</a>
        <a href="{{ route('inquiry.add') }}" class="btn btn-warning btn-sm btn-block">新規質問</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">ログアウト</a>

    </ul>
</div>