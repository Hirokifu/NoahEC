@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
    <div class="row">

        {{-- Add brand page --}}
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Brand </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">

                    <form method="post" action="{{ route('brand.update',$brand->id) }}" enctype="multipart/form-data">
                        @csrf
                    <input type="hidden" name="id" value="{{ $brand->id }}">
                    <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">

                    <div class="form-group">
                        <h5>Brand Name Japanese  <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text"  name="brand_name_jp" class="form-control" value="{{ $brand->brand_name_jp }}" >
                            @error('brand_name_jp')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <h5>Brand Name Chinese <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="brand_name_cn" class="form-control" value="{{ $brand->brand_name_cn }}" >
                            @error('brand_name_cn')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group">
                        <h5>Brand Image <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="file" name="brand_image" class="form-control" >
                            @error('brand_image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                    </div>
                    </form>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>


    </div>
    </section>

</div>


@endsection