@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

<section class="content">

	<div class="box">
	<div class="box-header with-border">
		<h4 class="box-title">会社情報編集 </h4>
	</div>

	<div class="box-body">
	<div class="row">
	<div class="col">

	<form method="post" action="{{ route('company.update') }}" enctype="multipart/form-data" >
		@csrf

		<input type="hidden" name="id" value="{{ $company->id }}">
		<input type="hidden" name="old_image" value="{{ $company->company_thambnail }}">

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<a>会社名称（日） <span class="text-danger">（必須）</span></a>
				<div class="controls">
					<input type="text" name="company_jp" class="form-control" value="{{ $company->company_jp }}" required="">
				</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
				<a>会社名称（中）</a>
				<div class="controls">
					<input type="text" name="company_cn" class="form-control" value="{{ $company->company_cn }}">
				</div>
				</div>
			</div>

		</div>


		<div class="row">
			<div class="col-md-6">
			<div class="form-group">
				<a>業種（日）<span class="text-danger">（必須）</span></a>
				<div class="controls">
					<input type="text" name="business_jp" class="form-control" value="{{ $company->business_jp }}" required="">
				</div>
			</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
				<a>業種（中）</a>
				<div class="controls">
					<input type="text" name="business_cn" class="form-control" value="{{ $company->business_cn }}">
				</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				<a>タグ（日）</a>
				<div class="controls">
					<input type="text" name="tags_jp" class="form-control" value="{{ $company->tags_jp }}" data-role="tagsinput">
				</div>
				</div>
			</div>

			<div class="col-md-6">
			<div class="form-group">
				<a>タグ（中）</a>
				<div class="controls">
				<input type="text" name="tags_cn" class="form-control" value="{{ $company->tags_cn }}" data-role="tagsinput">
				</div>
			</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">

				<div class="form-group">
				<a>主要製品（日）<span class="text-danger">（必須）</span></a>
				<div class="controls">
					<input type="text" name="product_jp" class="form-control" value="{{ $company->product_jp }}" required="">
				</div>
				</div>
			</div>

			<div class="col-md-6">

			<div class="form-group">
				<a>主要製品（中）</a>
				<div class="controls">
					<input type="text" name="product_cn" class="form-control" value="{{ $company->product_cn }}">
				</div>
			</div>

			</div>
		</div>


		<div class="row">
			<div class="col-md-6">

				<div class="form-group">
				<a>担当者<span class="text-danger">（必須）</span></a>
				<div class="controls">
					<input type="text" name="manager" class="form-control" value="{{ $company->manager }}" required="">
				</div>
				</div>
			</div>

			<div class="col-md-6">

			<div class="form-group">
				<a>郵便番号<span class="text-danger">（必須）</span></a>
				<div class="controls">
					<input type="text" name="post_code" class="form-control" value="{{ $company->post_code }}" required="">
				</div>
			</div>

			</div>
		</div>


		<div class="row">
			<div class="col-md-6">

				<div class="form-group">
				<a>住所（日）<span class="text-danger">（必須）</span></a>
				<div class="controls">
					<input type="text" name="address_jp" class="form-control" value="{{ $company->address_jp }}" required="">
				</div>
				</div>
			</div>

			<div class="col-md-6">

			<div class="form-group">
				<a>住所（英文）</a>
				<div class="controls">
					<input type="text" name="address_en" class="form-control" value="{{ $company->address_en }}">
				</div>
			</div>

			</div>
		</div>


		<div class="row">
			<div class="col-md-6">

				<div class="form-group">
				<a>電話番号<span class="text-danger">（必須）</span></a>
				<div class="controls">
					<input type="text" name="tel" class="form-control" value="{{ $company->tel }}" required="">
				</div>
				</div>
			</div>

			<div class="col-md-6">

			<div class="form-group">
				<a>携帯電話<span class="text-danger">（必須）</span></a>
				<div class="controls">
					<input type="text" name="phone" class="form-control" value="{{ $company->phone }}" required="">
				</div>
			</div>

			</div>
		</div>



		<div class="row">
			<div class="col-md-6">

				<div class="form-group">
				<a>メールアドレス<span class="text-danger">（必須）</span></a>
				<div class="controls">
					<input type="text" name="email" class="form-control" value="{{ $company->email }}" required="">
				</div>
				</div>
			</div>

			<div class="col-md-6">

			<div class="form-group">
				<a>ホームページ</a>
				<div class="controls">
					<input type="text" name="homepage" class="form-control" value="{{ $company->homepage }}">
				</div>
			</div>

			</div>
		</div>


		<div class="row">
			<div class="col-md-6">

			<div class="form-group">
				<a>イメージ図<span class="text-danger">（必須）</span></a>
				<div class="controls">
					<input type="file" name="company_thambnail" class="form-control" onChange="mainThamUrl(this)">
					<img src="" id="mainThmb">
				</div>
			</div>
			</div>

			<div class="col-md-6">
			<div class="form-group">
				<img src="{{ url('upload/company/thambnail/'.$company->company_thambnail) }}" style="border-radius: 8px; height: 80px; width: 80px">
			</div>

			{{-- <div class="form-group">
				<a>説明図（複数可） <span class="text-danger">（任意）</span></a>
				<div class="controls">
					<input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">
					@error('multi_img')
					<span class="text-danger">{{ $message }}</span>
					@enderror
					<div class="row" id="preview_img"></div>
				</div>
			</div> --}}

			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
			<div class="form-group">
				<a>一言の説明（日） <span class="text-danger">（必須）</span></a>
				<div class="controls">
				<textarea name="short_descp_jp" id="textarea" class="form-control" required="" placeholder="Textarea text">{!! $company->short_descp_jp !!}</textarea>
			</div>
			</div>

			</div>

			<div class="col-md-6">
			<div class="form-group">
				<a>一言の説明（中）</a>
				<div class="controls">
				<textarea name="short_descp_cn" id="textarea" class="form-control" placeholder="Textarea text">{!! $company->short_descp_cn !!}</textarea>
			</div>
			</div>

			</div>

		</div>


		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<a>会社紹介文（日）<span class="text-danger">（必須）</span></a>
					<div class="controls">
						<textarea id="editor1" name="long_descp_jp" rows="10" cols="80">{!! $company->long_descp_jp !!}</textarea>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<a>会社紹介文（中）</a>
					<div class="controls">
						<textarea id="editor2" name="long_descp_cn" rows="10" cols="80">{!! $company->long_descp_cn !!}</textarea>
					</div>
				</div>
			</div>
		</div>

		<br>
		{{-- <div class="row">
			<div class="col-md-6">

				<div class="form-group">
					<a>デジタルプロダクト【PDF,xlx,csv,xlsx,docx,zip,jpeg,png,jpg】 <span class="text-danger">（任意）</span></a>
					<div class="controls">
					<input type="file" name="file" class="form-control" >
					</div>
				</div>

			</div>

			<div class="col-md-6">
			</div>

		</div> --}}

		<div class="text-xs-right">
			<input type="submit" class="btn btn-rounded btn-primary mb-5" value="更新する">
		</div>

	</form>

	</div>
	</div>
</div>
</div>

</section>
</div>



<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>


{{-- <script>

	$(document).ready(function(){
	$('#multiImg').on('change', function(){ //on file input change
		if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
		{
			var data = $(this)[0].files; //this file data

			$.each(data, function(index, file){ //loop though each file
				if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
					var fRead = new FileReader(); //new filereader
					fRead.onload = (function(file){ //trigger function on successful read
					return function(e) {
						var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
					.height(80); //create image element
						$('#preview_img').append(img); //append image to output element
					};
					})(file);
					fRead.readAsDataURL(file); //URL representing the file's data.
				}
			});

		}else{
			alert("Your browser doesn't support File API!"); //if File API is absent
		}
	});
	});

</script> --}}


@endsection