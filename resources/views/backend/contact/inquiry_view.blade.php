@extends('admin.admin_master')
@section('admin')

<div class="container-full">

<section class="content">
    <div class="row">

    {{-- ここからお問合せ＆回答になる --}}
    <div class="col-12">

        <div>
            <h4>ユーザのお問い合わせ一覧</h4>
        </div>

        @php($i = 1)
        @foreach($inquiries as $inquiry)

        <div class="panel-group" id="accordion">
            <div class="box">

                {{-- お問合せのタイトル表示 --}}
                <div class="media bb-1 border-fade">
                    <img src="{{ asset('upload/user_images/'.($inquiry->user->profile_photo_path??'user_default.jpg')) }}" class="rounded-circle" style="border-radius:50%; width:40px;height:40px;">

                    <div class="media-body">

                        @if($inquiry->user)
                        <p>{{ $inquiry->user->name }}</p>
                        @else
                        <p style="color:red">削除されたユーザ</p>
                        @endif

                        @if($inquiry->title)
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $i }}"><strong>
                        {{$inquiry->title}}</strong></a>
                        @else
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $i }}"><strong>
                        無題</strong></a>
                        @endif

                        <time class="float-right text-fade">{{ $inquiry->created_at->diffForHumans() }}</time>
                    </div>
                </div>

                <div id="collapse{{ $i }}" class="panel-collapse collapse in" style="padding:0 30px 0 30px">

                {{-- お問合せの内容表示 --}}
                <div class="box-body bb-1 border-fade" style="margin:0 14px 0 5px">

                    @if($inquiry->image)
                    <div style="margin:0 0 10px 0">
                        <a href="{{ asset('upload/inquiry/'.$inquiry->image) }}" data-lightbox="{{ $i }}"><img src="{{ asset('upload/inquiry/'.$inquiry->image) }}" width="300" style="border-radius:8px; width:30%"></a>
                    </div>
                    @endif

                    <p class="lead" style="font-size: 14px">{!! nl2br(e($inquiry->body)) !!}</p>

                    <div style="margin:0 0 30px 0">
                        <a class="text-fade hover-light pull-left"><span class="badge badge-pill badge-success"> {{ $inquiry->replies->count() }} Comment</span></a>
                    </div>
                </div>


                {{-- コメント表示 --}}
                @foreach ($replies as $reply)

                @if( $reply->inquiry_id == $inquiry->id )
                <div class="media-list media-list-divided bg-lighter">

                    @if($reply->user_id)
                        <div class="media">
                            <a class="avatar" href="#">
                                <img src="{{ asset('upload/user_images/'.($reply->user->profile_photo_path??'user_default.jpg')) }}">
                            </a>
                            <div class="media-body">
                            <p>
                                <a href="#">{{ $reply->user->name??'削除されたユーザ' }}</a>

                                {{-- 削除ボダンを追加 --}}
                                <a href="{{ route('admin.repley.delete',$reply->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete" style="margin:0 0 0 20px; float:right"> <i class="fa fa-trash"></i></a>

                                <a><time class="float-right text-fade">{{ $reply->created_at->diffForHumans() }}</time></a>
                            </p>

                            @if($reply->image)
                            <div style="margin:10px 0 10px 0">
                                <a href="{{ asset('upload/inquiry/'.$reply->image) }}" data-lightbox="{{ $i }}"><img src="{{ asset('upload/inquiry/'.$reply->image) }}" width="300" style="border-radius:8px; width:20%"></a>
                            </div>
                            @endif

                            <p style="font-size: 14px">{!! nl2br(e($reply->body)) !!}</p>

                            </div>
                        </div>

                    @elseif($reply->admin_id)
                        <div class="media">
                            <a class="avatar" href="#">
                                <img src="{{ asset('upload/admin_images/'.($reply->admin->profile_photo_path??'admin_default.png')) }}">
                            </a>
                            <div class="media-body">
                            <p>
                                <a href="#">{{ $reply->admin->name??'削除されたユーザ' }}</a>

                                {{-- 削除ボダンを追加 --}}
                                <a href="{{ route('admin.repley.delete',$reply->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete" style="margin:0 0 0 20px; float:right"> <i class="fa fa-trash"></i></a>

                                <a><time class="float-right text-fade">{{ $reply->created_at->diffForHumans() }}</time></a>
                            </p>

                            @if($reply->image)
                            <div style="margin:10px 0 10px 0">
                                <a href="{{ asset('upload/inquiry/'.$reply->image) }}" data-lightbox="{{ $i }}"><img src="{{ asset('upload/inquiry/'.$reply->image) }}" width="300" style="border-radius:8px; width:20%"></a>
                            </div>
                            @endif

                            <p style="font-size: 14px">{!! nl2br(e($reply->body)) !!}</p>

                            </div>
                        </div>

                    @endif

                </div>
                @endif

                @endforeach



                {{-- 管理者がコメントする --}}
                <form class="publisher bt-1 border-fade" method="post" action="{{ route('admin.inquiry.reply') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name='inquiry_id' value="{{$inquiry->id}}">

                    <img class="avatar avatar-sm" src="{{ asset('upload/admin_images/'.($admin->profile_photo_path??'admin_default.png')) }}">

                    <input class="publisher-input" type="text" name="body" id="body" placeholder="Comment here" value="{{ old('body') }}">

                    @error('body')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <span class="publisher-btn file-group">
                        <i class="fa fa-camera file-browser"></i>
                        <input type="file" name="image" class="form-control unicase-form-control text-input">
                    </span>

                    <div class="form-group">
                        <button class="btn btn-sm btn-bold btn-primary">Reply</button>
                    </div>

                </form>

                </div>
            </div>
        </div>

        @php($i++)
        @endforeach


        {{-- 予備用入力フォーム --}}
        {{-- <div class="tab-pane" id="settings">

            <div class="box p-15">
                <form class="form-horizontal form-element col-12">
                    <div class="form-group row">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="inputPhone" placeholder="">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" placeholder=""></textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" placeholder="">
                    </div>
                    </div>
                    <div class="form-group row">
                    <div class="ml-auto col-sm-10">
                        <div class="checkbox">
                        <input type="checkbox" id="basic_checkbox_1" checked="">
                        <label for="basic_checkbox_1"> I agree to the</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Terms and Conditions</a>
                        </div>
                    </div>
                    </div>
                    <div class="form-group row">
                    <div class="ml-auto col-sm-10">
                        <button type="submit" class="btn btn-rounded btn-success">Submit</button>
                    </div>
                    </div>
                </form>
            </div>
        </div> --}}

    </div>
    </div>

</section>

</div>

@endsection
