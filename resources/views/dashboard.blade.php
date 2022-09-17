@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
            @include('frontend.common.user_sidebar')

            <div class="col-md-10">
                <br>
                <div class="card">
                    <h4 class="text-center"><span class="text-danger"></span><strong>{{ Auth::user()->name }}さん、 </strong>ノアショップへようこそ！</h4>
                </div>
                <br>

                <div class="col-md-4">
                    <img src="{{ asset('upload/user_images/'.($user->profile_photo_path)) }}" style="border-radius:8px" width="100%" height="180">

                    <div class="card-body">
                        <h5 class="card-title">{Card title}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

                {{-- <div class="col-md-4">
                    <img src="" class="bd-placeholder-img card-img-top" width="100%" height="180">

                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <img src="" class="bd-placeholder-img card-img-top" width="100%" height="180">

                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
</div>



@endsection