@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">

    <div class="row">

        @include('frontend.common.user_sidebar')

        <div class="col-md-0">
        </div>

        <div class="col-md-10">
        <div class="card">
            <div style="text-left; margin:30px 0 15px 5px;"><strong>ご質問に対しては、2つの営業日以内に返信させて頂きます。</strong></div>
            <div class="card-body">

                    <form method="post" action="{{ route('inquiry.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="件名">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="9" cols="100" placeholder="内容"></textarea>
                            @error('body')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">追加情報（任意）<span></span></label>
                            <input type="file" name="image" class="form-control unicase-form-control text-input">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-circle">送信する</button>
                        </div>
                    </form>

            </div>
        </div>
        </div>
    </div>


    </div>
</div>



@endsection