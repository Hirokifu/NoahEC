@extends('admin.admin_master')
@section('admin')

<div class="container-full">

<section class="content">
    <div class="row">

    {{-- ここからお問合せ＆回答になる --}}
    <div class="col-12">

        <div class="nav-tabs-custom box-profile">
            <ul class="nav nav-tabs">
                <li><a href="#news" data-toggle="tab" class="active">ニュース</a></li>
                <li><a href="#post" data-toggle="tab" class="">作成</a></li>
            </ul>

            <div class="tab-content">

            <div class="tab-pane" id="post">
                <div class="box p-15">

                {{-- お知らせの投稿フォーム --}}
                <form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="publisher publisher-multi bg-white b-1 mb-30">
                        <div>
                            <input type="text" class="publisher-input auto-expand" style="width:100%; border-bottom:1px groove" name="title" placeholder="Title:">

                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <textarea class="publisher-input auto-expand" rows="3" type="text" name="body" id="body" placeholder="News:"></textarea>

                        @error('body')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="flexbox">
                        <div class="gap-items">
                            <span class="publisher-btn file-group">
                                <i class="fa fa-image file-browser"></i>
                                <input type="file" name="image" class="form-control unicase-form-control text-input">
                            </span>
                        </div>

                        <button class="btn btn-sm btn-bold btn-primary">Post</button>
                        </div>

                    </div>
                </form>

                </div>
            </div>

            <div class="tab-pane active" id="news">
                <div class="box p-15">

                {{-- お知らせの投稿ビュー --}}
                @foreach($news as $item)
                <div class="post">
                    <div class="user-block">
                        <img class="img-bordered-sm rounded-circle" src="{{ (!empty($admin->profile_photo_path))? url('upload/admin_images/'.$admin->profile_photo_path):url('upload/no_image.jpg') }}">

                        <span>
                            <a style="font-size:16px; margin:0 0 0 10px">{{ $item->title }}</a>
                            <a style="color:red; margin:0 0 0 20px">No.{{ $item->created_at->format('Ymd').$item->id }}</a>
                            <a href="{{ route('news.edit', $item->id) }}" class="pull-right btn btn-success btn-sm" title="Edit Data">編集</a>
                        </span>

                        <span class="description"><i class="fa fa-clock-o"></i>{{ $item->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="activitytimeline">
                        <div class="card-text">
                            {!! nl2br(e($item->body)) !!}
                        </div>

                        <div class="row mb-5">
                        @if($item->image)
                        <div class="col-sm-12">
                            <a href="{{ asset('upload/news/'.$item->image) }}" data-lightbox="group"><img src="{{ url('upload/news/'.$item->image) }}" width="300" style="border-radius:8px; width:30%">
                        </div>
                        @endif
                        </div>

                    </div>
                </div>
                @endforeach

                </div>
            </div>

            </div>

        </div>

    </div>
    </div>

</section>

</div>

@endsection
