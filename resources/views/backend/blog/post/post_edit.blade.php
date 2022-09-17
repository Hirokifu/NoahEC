@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-full">

<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">ブログ編集 </h4>
        </div>

    <div class="box-body">
    <div class="row">
        <div class="col">

        <form method="post" action="{{ route('post.update') }}" enctype="multipart/form-data" >
            @csrf

            <input type="hidden" name="id" value="{{ $blogpost->id }}">

            {{-- 写真削除に必要なコード --}}
            <input type="hidden" name="old_image" value="{{ $blogpost->post_image }}">

            <div class="row">
            <div class="col-12">

            <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <h5>Post Title JP <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="post_title_jp" class="form-control" value="{{ $blogpost->post_title_jp }}">
                        </div>
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        <h5>Post Title CN <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="post_title_cn" class="form-control" value="{{ $blogpost->post_title_cn }}">
                        </div>
                    </div>
                    </div>

            </div>


            <div class="row">
                <div class="col-md-6">

                <div class="form-group">
                    <h5>BlogCategory Select <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="category_id" class="form-control">
                            <option value="" selected="" disabled="">Select BlogCategory</option>
                            @foreach($blogcategory as $category)
                            <option value="{{ $category->id }}">{{ $category->blog_category_name_jp }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <h5>Post Main Image  <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="file" name="post_image" class="form-control" id="image">
                    </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <img id="showImage" src="{{ asset($blogpost->post_image) }}" style="width:100px; height:auto">
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">

                <div class="form-group">
                    <h5>Post Details JP <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <textarea id="editor1" name="post_details_jp" rows="10" cols="80">
                            {{ $blogpost->post_details_jp }}
                        </textarea>
                    </div>
                </div>

                </div> <!-- end col md 6 -->

                <div class="col-md-6">
                <div class="form-group">
                    <h5>Post Details CN <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <textarea id="editor2" name="post_details_cn" rows="10" cols="80">
                            {{ $blogpost->post_details_cn }}
                        </textarea>
                    </div>
                </div>


                </div> <!-- end col md 6 -->

            </div>

            <hr>

            <div class="text-xs-right">
                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Post">
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


<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection