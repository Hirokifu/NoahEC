@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
    <div class="row">


        {{-- Add Brand Page --}}
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Add Brand</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">

                    <form method="post" action="{{ route('category.update',$category->id) }}" >
                        @csrf

                        <div class="form-group">
                            <h5>Category Japanese <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_name_jp" class="form-control" value="{{ $category->category_name_jp }}">
                                @error('category_name_jp')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Category Chinese <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_name_cn" class="form-control" value="{{ $category->category_name_cn }}">
                                @error('category_name_cn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Category Icon <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_icon" class="form-control" value="{{ $category->category_icon }}">
                                @error('category_icon')
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