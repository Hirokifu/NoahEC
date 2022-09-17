@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-full">
<section class="content">
    <div class="row">

        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit News </h3>
                </div>

                <div class="box-body">

                {{-- お知らせの投稿フォーム --}}
                <form method="post" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $news->id }}">
                    <input type="hidden" name="old_image" value="{{ $news->image }}">

                    <div class="form-group">
                            <h5>Title <span class="text-danger">*</span></h5>

                            <div class="controls">
                                <input type="text" class="form-control" name="title" value="{{ $news->title }}" >

                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    </div>

                    <div class="form-group">
                        <h5>Contents <span class="text-danger">*</span></h5>

                        <div class="controls">
                        <textarea class="form-control" rows="10" type="text" name="body">{{ $news->body }} </textarea>

                        @error('body')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <h5>Image <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                                <img id="showImage" src="{{ url('upload/news/'.$news->image) }}" style="border-radius:8px; width:20%; height:auto">
                        </div>
                    </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                    </div>

                </form>

                </div>
            </div>
        </div>

    </div>

</section>
</div>


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
