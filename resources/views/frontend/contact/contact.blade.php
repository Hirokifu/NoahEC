@extends('frontend.main_master')
@section('content')

@section('title')
Contact Us
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="/">HOME</a></li>
				<li class='active'>Contact</li>
			</ul>
		</div>
	</div>
</div>


@php
    $setting = App\Models\SiteSetting::find(1);
@endphp



<div class="body-content">
	<div class="container">
    <div class="contact-page">
		<div class="row">

            <div class="col-md-12 contact-map outer-bottom-vs">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.0080692193424!2d80.29172299999996!3d13.098675000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526f446a1c3187%3A0x298011b0b0d14d47!2sTransvelo!5e0!3m2!1sen!2sin!4v1412844527190" width="600" height="450" style="border:0"></iframe>
            </div>

            <div class="col-md-9 contact-form">
                <div class="col-md-12 contact-title">
                    <h3>お問い合わせ</h3>
                </div>

                <form method="post" action="{{ route('contact.store') }}">
                    @csrf

                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- <label class="info-title" for="name">お名前 <span>*</span></label> --}}
                            <input type="text" class="form-control unicase-form-control text-input" name="name" placeholder="お名前">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- <label class="info-title" for="email">Email <span>*</span></label> --}}
                            <input type="email" class="form-control unicase-form-control text-input" name="email" placeholder="Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{-- <label class="info-title" for="title">件名 <span>*</span></label> --}}
                            <input type="text" class="form-control unicase-form-control text-input" name="title" placeholder="件名">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{-- <label class="info-title" for="body">内容 <span>*</span></label> --}}
                            <textarea class="form-control unicase-form-control" name="body" rows="6" cols="100" placeholder="内容"></textarea>
                            @error('body')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 outer-bottom-small m-t-15">
                        <button type="submit" class="btn btn-primary">送信する</button>
                    </div>

                </form>
            </div>


            <div class="col-md-3 contact-info">
                <div class="contact-title">
                    <h4>{{ $setting->company_name }} Information</h4>
                </div>
                <div class="clearfix address">
                    <span class="contact-i"><i class="fa fa-map-marker"></i></span>
                    <span class="contact-span">{{ $setting->company_address }}</span>
                </div>
                <div class="clearfix phone-no">
                    <span class="contact-i"><i class="fa fa-mobile"></i></span>
                    <span class="contact-span">{{ $setting->phone_one }}<br>{{ $setting->phone_two }}</span>
                </div>
                <div class="clearfix email">
                    <span class="contact-i"><i class="fa fa-envelope"></i></span>
                    <span class="contact-span"><a href="#">{{ $setting->email }}</a></span>
                </div>
            </div>



        </div><!-- /.contact-page -->
    </div><!-- /.row -->

    <br>
    <br>
	<!-- ====================== BRANDS CAROUSEL ======================== -->

    {{-- @include('frontend.body.brands') --}}

    <!-- ==================== BRANDS CAROUSEL : END ============================= -->
    </div><!-- /.container -->



	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery-1.11.1.min.js"></script>

	<script src="assets/js/bootstrap.min.js"></script>

	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>

	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<script src="switchstylesheet/switchstylesheet.js"></script>

	<script>
		$(document).ready(function(){
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
            $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>

</div>


@endsection