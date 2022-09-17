@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">SubCategory List <span class="badge badge-pill badge-danger"> {{ count($subcategory) }} </span> </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width=10%>Category</th>
                                <th width=35%>SubCategory JP</th>
                                <th width=35%>SubCategory CN</th>
                                <th width=20%>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($subcategory as $item)
                            <tr>
                                <td>{{ $item['category']['category_name_jp'] }}</td>
                                <td>{{ $item->subcategory_name_jp }}</td>
                                <td>{{ $item->subcategory_name_cn }}</td>
                                <td>
                                    <a href="{{ route('subcategory.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Date">
                                        <i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('subcategory.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Date" id="delete">
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


        {{-- Add Category Page --}}
        <div class="col-4">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Add SubCategory</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">

                    <form method="post" action="{{ route('subcategory.store') }}" >
                        @csrf

                        <div class="form-group">
                            <h5>Category Select <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="category_id" class="form-control" >
                                    <option value="" selected="" disabled="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name_jp }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>SubCategory Japanese <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subcategory_name_jp" class="form-control">
                                @error('subcategory_name_jp')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>SubCategory Chinese <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subcategory_name_cn" class="form-control">
                                @error('subcategory_name_cn')
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