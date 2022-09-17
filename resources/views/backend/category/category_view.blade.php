@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Category List <span class="badge badge-pill badge-danger"> {{ count($category) }} </span></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width=10%>Icon</th>
                                <th width=35%>Category Name JP</th>
                                <th width=35%>Category Name CN</th>
                                <th width=20%>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($category as $item)
                            <tr>
                                <td><span><i class="{{ $item->category_icon }}"</i></span></td>
                                <td>{{ $item->category_name_jp }}</td>
                                <td>{{ $item->category_name_cn }}</td>
                                <td>
                                    <a href="{{ route('category.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Date">
                                        <i class="fa fa-pencil"></i></a>

                                    <a href="{{ route('category.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Date" id="delete">
                                        <i class="fa fa-trash"></i></a>
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
                <h3 class="box-title">Add Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">

                    <form method="post" action="{{ route('category.store') }}" >
                        @csrf
                        <div class="form-group">
                            <h5>Category Japanese <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_name_jp" class="form-control">
                                @error('category_name_jp')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Category Chinese <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_name_cn" class="form-control">
                                @error('category_name_cn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Category Icon <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_icon" class="form-control">
                                @error('category_icon')
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