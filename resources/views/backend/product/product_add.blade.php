@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">

	<!-- Basic Forms -->
	<div class="box">
	<div class="box-header with-border">
		<h4 class="box-title">商品登録 </h4>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	<div class="row">
	<div class="col">

	<form method="post" action="{{ route('product-store') }}" enctype="multipart/form-data" >
		@csrf

		<div class="row">
			<div class="col-md-6">

			<div class="form-group">
				<a>ブランド <span class="text-danger">*</span></a>
			<div class="controls">
				<select name="brand_id" class="form-control" required="" >
					<option value="" selected="" disabled=""></option>
					@foreach($brands as $brand)
					<option value="{{ $brand->id }}">{{ $brand->brand_name_jp }}</option>
					@endforeach
				</select>
					@error('brand_id')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
			</div>

			</div>

			<div class="col-md-6">
			<div class="form-group">
				<a>カテゴリ <span class="text-danger">*</span></a>
			<div class="controls">
				<select name="category_id" class="form-control" required="" >
					<option value="" selected="" disabled=""></option>
					@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->category_name_jp }}</option>
					@endforeach
				</select>
					@error('category_id')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
			</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
			<div class="form-group">
				<a>サブカテゴリ<span class="text-danger">*</span></a>
			<div class="controls">
				<select name="subcategory_id" class="form-control" required="" >
					<option value="" selected="" disabled=""></option>
				</select>
					@error('subcategory_id')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
			</div>
			</div>

			<div class="col-md-6">
			<div class="form-group">
				<a>SUBサブカテゴリ <span class="text-danger">*</span></a>
			<div class="controls">
				<select name="subsubcategory_id" class="form-control" required="" >
					<option value="" selected="" disabled=""></option>
				</select>
					@error('subsubcategory_id')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
			</div>
			</div>

		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<a>商品名（日） <span class="text-danger">*</span></a>
				<div class="controls">
					<input type="text" name="product_name_jp" class="form-control" required="">
					@error('product_name_jp')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
				<a>商品名（中）<span class="text-danger">*</span></a>
				<div class="controls">
					<input type="text" name="product_name_cn" class="form-control" required="">
					@error('product_name_cn')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				</div>
			</div>

		</div>


		<div class="row">
			<div class="col-md-6">
			<div class="form-group">
				<a>商品コード <span class="text-danger">*</span></a>
				<div class="controls">
					<input type="text" name="product_code" class="form-control" required="">
					@error('product_code')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
			</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
				<a>在庫数量 <span class="text-danger">*</span></a>
				<div class="controls">
					<input type="text" name="product_qty" class="form-control" required="">
					@error('product_qty')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				<a>ラベル（日） <span class="text-danger">(任意)</span></a>
				<div class="controls">
					<input type="text" name="product_tags_jp" class="form-control" value="ラベル" data-role="tagsinput">
					@error('product_tags_jp')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				</div>
			</div>

			<div class="col-md-6">
			<div class="form-group">
				<a>ラベル（中）<span class="text-danger">(任意)</span></a>
				<div class="controls">
				<input type="text" name="product_tags_cn" class="form-control" value="标签" data-role="tagsinput">
				@error('product_tags_cn')
				<span class="text-danger">{{ $message }}</span>
				@enderror
				</div>
			</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				<a>サイズ（日） <span class="text-danger">(任意)</span></a>
				<div class="controls">
					<input type="text" name="product_size_jp" class="form-control" value="サイズ" data-role="tagsinput">
					@error('product_size_jp')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
				<a>サイズ（中）<span class="text-danger">(任意)</span></a>
				<div class="controls">
					<input type="text" name="product_size_cn" class="form-control" value="尺寸" data-role="tagsinput">
					@error('product_size_cn')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				</div>
			</div>

		</div>


		<div class="row">
			<div class="col-md-6">
			<div class="form-group">
				<a>色（日）<span class="text-danger">(任意)</span></a>
				<div class="controls">
					<input type="text" name="product_color_jp" class="form-control" value="色" data-role="tagsinput">
					@error('product_color_jp')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
			</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
				<a>色（中）<span class="text-danger">(任意)</span></a>
				<div class="controls">
					<input type="text" name="product_color_cn" class="form-control" value="颜色" data-role="tagsinput">
					@error('product_color_cn')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">

				<div class="form-group">
				<a>参考価格<span class="text-danger">*</span></a>
				<div class="controls">
					<input type="text" name="selling_price" class="form-control" required="">
					@error('selling_price')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				</div>
			</div>

			<div class="col-md-6">

			<div class="form-group">
				<a>セール価格<span class="text-danger">(任意)</span></a>
				<div class="controls">
					<input type="text" name="discount_price" class="form-control">
					@error('discount_price')
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
			</div>

			</div>
		</div>


		<div class="row">
			<div class="col-md-6">

			<div class="form-group">
				<a>イメージ図<span class="text-danger">*</span></a>
				<div class="controls">
					<input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)" required="" >
					@error('product_thambnail')
					<span class="text-danger">{{ $message }}</span>
					@enderror
					<img src="" id="mainThmb">
				</div>
			</div>
			</div>

			<div class="col-md-6">

			<div class="form-group">
				<a>説明図（複数可） <span class="text-danger">*</span></a>
				<div class="controls">
					<input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" required="" >
					@error('multi_img')
					<span class="text-danger">{{ $message }}</span>
					@enderror
					<div class="row" id="preview_img"></div>
				</div>
			</div>

			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
			<div class="form-group">
				<a>一言の説明（日） <span class="text-danger">*</span></a>
				<div class="controls">
				<textarea name="short_descp_jp" id="textarea" class="form-control" required="" placeholder="Textarea text"></textarea>
			</div>
			</div>

			</div>

			<div class="col-md-6">
			<div class="form-group">
				<a>一言の説明（中）<span class="text-danger">*</span></a>
				<div class="controls">
				<textarea name="short_descp_cn" id="textarea" class="form-control" required="" placeholder="Textarea text"></textarea>
			</div>
			</div>

			</div>

		</div>


		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<a>商品紹介文（日）<span class="text-danger">*</span></a>
					<div class="controls">
						<textarea id="editor1" name="long_descp_jp" rows="10" cols="80"></textarea>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<a>商品紹介文（中）<span class="text-danger">*</span></a>
					<div class="controls">
						<textarea id="editor2" name="long_descp_cn" rows="10" cols="80"></textarea>
					</div>
				</div>
			</div>
		</div>

		<hr>
		<div class="row">
			<div class="col-md-6">
					<div class="form-group">

					<div class="controls">
						<fieldset>
							<input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
							<label for="checkbox_2">割引商品（割引付の場合、お得商品として表示）</label>
						</fieldset>
						<fieldset>
							<input type="checkbox" id="checkbox_3" name="featured" value="1">
							<label for="checkbox_3">おすすめ商品（超人気商品）</label>
						</fieldset>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<div class="controls">
						<fieldset>
							<input type="checkbox" id="checkbox_4" name="special_offer" value="1">
							<label for="checkbox_4">感謝ｾｰﾙｽ（ﾘﾋﾟｰﾀ様向け還元）</label>
						</fieldset>
						<fieldset>
							<input type="checkbox" id="checkbox_5" name="special_deals" value="1">
							<label for="checkbox_5">特売商品（売れ筋商品）</label>
						</fieldset>
					</div>
				</div>
			</div>

		</div>

		<br>
		<div class="row">
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

		</div>

		<div class="text-xs-right">
			<input type="submit" class="btn btn-rounded btn-primary mb-5" value="新規登録">
		</div>

	</form>

	</div>
	</div>
</div>
</div>

</section>
</div>

	<script type="text/javascript">
	$(document).ready(function() {
		$('select[name="category_id"]').on('change', function(){
			var category_id = $(this).val();
			if(category_id) {
				$.ajax({
					url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
					type:"GET",
					dataType:"json",
					success:function(data) {
					$('select[name="subsubcategory_id"]').html('');
					var d =$('select[name="subcategory_id"]').empty();
						$.each(data, function(key, value){
							$('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_jp + '</option>');
						});
					},
				});
			} else {
				alert('danger');
			}
		});
	$('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
					var d =$('select[name="subsubcategory_id"]').empty();
						$.each(data, function(key, value){
							$('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_jp + '</option>');
						});
                    },
                });
            } else {
                alert('danger');
            }
        });

    });
    </script>


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


<script>

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

</script>




@endsection