@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Brand List <span class="badge badge-pill badge-danger"> {{ count($brands) }} </span></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width=30%>Brand Name JP</th>
                                <th width=30%>Brand Name CN</th>
                                <th width=20%>Image</th>
                                <th width=20%>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($brands as $item)
                            <tr>
                                <td>{{ $item->brand_name_jp }}</td>
                                <td>{{ $item->brand_name_cn }}</td>
                                <td>
                                    <img src="{{ asset($item->brand_image) }}" style="border-radius: 5px; width:80px; height:40px;">
                                </td>
                                <td>
                                    <a href="{{ route('brand.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i></a>

                                    <a href="{{ route('brand.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>


        {{-- Add Brand Page --}}
        <div class="col-4">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Add Brand</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">

                    <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <h5>Brand Name Japanese <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="brand_name_jp" class="form-control">
                                @error('brand_name_jp')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Brand Name Chinese <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="brand_name_cn" class="form-control">
                                @error('brand_name_cn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Brand Image <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="brand_image" class="form-control">
                                @error('brand_image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
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