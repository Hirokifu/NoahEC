@extends('admin.admin_master')
@section('admin')

<div class="container-full">

<section class="content">
    <div class="row">

    <div class="col-12">
        <div class="box box-widget widget-user">

            <div class="widget-user-header bg-black">
                <h3 class="widget-user-username">{{ $adminData->name }}</h3>

                {{-- ボダンを追加 --}}
                <a href="{{ route('admin.profile.edit') }}" style="float:right;" class="btn btn-rounded btn-success  mb-5">Edit Profile</a>

                <h6 class="widget-user-desc">{{ $adminData->email }}</h6>
            </div>

            <div class="widget-user-image">
                <img class="rounded-circle" src="{{ (!empty($adminData->profile_photo_path))? url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg') }}" alt="Admin Avatar">
            </div>

            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="description-block">
                        <h5 class="description-header">12K</h5>
                        <span style="font-size:10px">FOLLOWERS</span>
                        </div>
                    </div>
                    <div class="col-sm-4 br-1 bl-1">
                        <div class="description-block">
                        <h5 class="description-header">550</h5>
                        <span style="font-size:10px">FOLLOWERS</span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="description-block">
                        <h5 class="description-header">158</h5>
                        <span style="font-size:10px">TWEETS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-body">
                <div class="flexbox align-items-baseline mb-20">
                    <h6 class="text-uppercase ls-2">オンライン・ユーザ</h6>
                    <small>{{ (count($users) + 128) }}</small>
                </div>

                <div class="gap-items-2 gap-y">
                    @foreach($users as $user)
                    <a class="avatar" href="#"><img src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}"></a>
                    @endforeach

                    <a class="avatar avatar-more" href="#">+{{ (count($users) + 82)}}</a>
                </div>

            </div>
            <div class="box-footer">
                <a class="text-uppercase d-blockls-1 text-fade" href="#">Invite People</a>
            </div>
        </div>
    </div>


</section>

</div>

@endsection
