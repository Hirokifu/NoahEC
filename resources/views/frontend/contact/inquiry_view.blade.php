@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
    <div class="row">

        @include('frontend.common.user_sidebar')

        <div class="col-md-10">
        <div class="table-responsive">

        <br>
        <br>

        @php($i = 1)
        @foreach($inquiries as $inquiry)
        @if( $user->id == $inquiry->user_id )  {{-- ifを使って本人の投稿のみを表示させる --}}

        <div class="panel-group" id="accordion">
            <div class="panel panel-default">

                {{-- ヘッド --}}
                <div class="panel-heading">
                    <img src="{{ asset('upload/user_images/'.($inquiry->user->profile_photo_path??'user_default.jpg')) }}" class="rounded-circle" style="border-radius:50%; width:40px;height:40px;">

                    @if($inquiry->title)
                    <span class="panel-title" style="font-size:20px; margin: 0 0 0 15px">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $i }}"><strong>{{$inquiry->title}}</strong></a>
                    </span>
                    @else
                    <span class="panel-title" style="font-size:20px; margin: 0 0 0 15px">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $i }}"><strong>無題</strong></a>
                    </span>
                    @endif

                    {{-- 削除ボダン --}}
                    <span style="float:right; margin:0 10px 0 0">
                        <a href="{{ route('inquiry.delete', $inquiry->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('本当に削除しますか？')" title="Delete Data" id="delete"> <i class="fa fa-trash"></i></a>
                    </span>

                    <span style="float:right; margin:5px 20px 0 0">
                        {{-- 投稿日時： {{$inquiry->created_at->diffForHumans()}} --}}
                        <i class="fa fa-clock-o"></i>{{ $inquiry->created_at->diffForHumans() }}
                    </span>
                </div>


                <div id="collapse{{ $i }}" class="panel-collapse collapse in" style="padding:0 40px 0 40px">

                <ul>

                    {{-- 投稿内容 --}}
                    <li>
                        @if($inquiry->image)
                        <div class="panel-body">
                            <a href="{{ asset('upload/inquiry/'.$inquiry->image) }}" data-lightbox="{{ $i }}"><img src="{{ asset('upload/inquiry/'.$inquiry->image) }}" width="300" style="border-radius:8px; width:50%"></a>
                        </div>
                        @endif

                        <div class="panel-body">
                            {!! nl2br(e($inquiry->body)) !!}
                        </div>

                        <div class="panel-body">
                            {{-- 回答数をカウントする --}}
                            @if ($inquiry->replies->count())
                                <div class="badge badge-success" style="background-color:tomato">
                                    {{ $inquiry->replies->count() }} Comment
                                </div>
                            @else
                                <div class="badge badge-success" style="background-color:tomato">
                                    0 Comment
                                </div>
                            @endif
                        </div>
                    </li>


                    {{-- コメント表示 --}}
                    <li>

                        @foreach ($replies as $reply)
                        @if( $reply->inquiry_id == $inquiry->id )

                        {{-- ユーザコメント --}}
                        @if($reply->user_id)

                        <div class="panel-body">
                            <div class="card-header">
                                <img src="{{ asset('upload/user_images/'.($reply->user->profile_photo_path??'user_default.jpg')) }}" class="rounded-circle" style="border-radius:50%; width:40px;height:40px;">

                                <span style="margin:0 0 0 5px">
                                    {{$reply->user->name??'削除されたユーザ'}}
                                </span>

                                {{-- 削除ボダン --}}
                                <span style="float:right; margin:0 0 0 0">
                                    <a href="{{ route('admin.repley.delete',$reply->id) }}" class="btn btn-info btn-sm" onClick="return confirm('本当に削除しますか？')" title="Delete Data" id="delete"> <i class="fa fa-trash"></i></a>
                                </span>

                                <span style="float:right; margin:5px 20px 0 0">
                                    <i class="fa fa-clock-o"></i>{{ $inquiry->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <div style="margin:5px 0 5px 49px">

                                @if($reply->image)
                                <div>
                                    <a href="{{ asset('upload/inquiry/'.$reply->image) }}" data-lightbox="{{ $i }}"><img src="{{ asset('upload/inquiry/'.$reply->image) }}" width="300" style="border-radius:8px; width:30%; margin:5px 0 5px 0"></a>
                                </div>
                                @endif

                                <div class="card-text">
                                    {!! nl2br(e($reply->body)) !!}
                                </div>
                            </div>
                        </div>

                        {{-- Adminコメント --}}
                        @elseif($reply->admin_id)

                        <div class="panel-body">
                            <div class="card-header">
                                <img src="{{ asset('upload/admin_images/'.($reply->admin->profile_photo_path??'admin_default.jpg')) }}" class="rounded-circle" style="border-radius:50%; width:40px;height:40px;">
                                <span style="margin:0 0 0 5px">
                                    {{$reply->admin->name??'削除されたユーザ'}}
                                </span>

                                <span style="float:right; margin:5px 0 0 0">
                                    <i class="fa fa-clock-o"></i>{{ $inquiry->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <div style="margin:5px 0 5px 49px">

                                @if($reply->image)
                                <div>
                                    <a href="{{ asset('upload/inquiry/'.$reply->image) }}" data-lightbox="{{ $i }}"><img src="{{ asset('upload/inquiry/'.$reply->image) }}" width="300" style="border-radius:8px; width:30%; margin:5px 0 5px 0"></a>
                                </div>
                                @endif

                                <div class="card-text">
                                    {!! nl2br(e($reply->body)) !!}
                                </div>
                            </div>

                        </div>

                        @endif

                        @endif
                        @endforeach
                    </li>


                    <!-- コメント投稿フォーム -->
                    <li style="padding:10px 0 0 0">
                        <div class="panel-body">

                            <form method="post" action="{{route('inquiry.reply')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name='inquiry_id' value="{{$inquiry->id}}">

                                <div class="form-group">
                                    <textarea name="body" class="form-control" id="body" cols="30" rows="3" placeholder="Comment">{{old('body')}}</textarea>

                                    @error('body')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">追加情報（任意）<span></span></label>
                                    <input type="file" name="image" class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                <button class="btn btn-info float-right mb-3 mr-3">送信する</button>
                                </div>
                            </form>

                        </div>
                    </li>
                </ul>

                </div>

                {{-- <div class="panel-footer">Thanks for your inquries very much, we will be happy to provide you with better service.</div> --}}

            </div>
        </div>

        @endif
        @php($i++)
        @endforeach

        </div>
        </div>
    </div>
    </div>
</div>



@endsection