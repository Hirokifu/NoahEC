@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
    <div class="row">

    <!-------------- Add Slider -------- -->
    <div class="col-md-12">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Add Slider </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

        <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
            @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <h5>Slider Title  <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text"  name="title" class="form-control" >
                    </div>
                </div>

                <div class="form-group">
                    <h5>Slider Decription <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="description" class="form-control" >
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <h5>Sales_point <span class="text-danger">(ex:感謝キャンペーン)</span></h5>
                        <div class="controls">
                            <input type="text"  name="sales_point" class="form-control" >
                        </div>
                </div>

                <div class="form-group">
                    <h5>User_merit <span class="text-danger">(ex:100万円以上5%OFF)</span></h5>
                    <div class="controls">
                        <input type="text"  name="user_merit" class="form-control" >
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <h5>Slider Image <span class="text-danger"></span></h5>
                <div class="controls">
                    <input type="file" name="slider_img" class="form-control" >
                    @error('slider_img')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            </div>
        </div>

        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
        </div>
        </form>

        </div>
        </div>
        </div>
    </div>


    <div class="row">
    <div class="col-md-12">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Slider List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width=8%>Slider_Img </th>
                            <th>Title</th>
                            <th>Decription</th>
                            <th>Sales_point</th>
                            <th>User_merit</th>
                            <th>Status</th>
                            <th width=15%>Action</th>
                        </tr>
                    </thead>
				<tbody>
                    @foreach($sliders as $item)
                    <tr>

                    <td><img src="{{ asset($item->slider_img) }}" style="border-radius: 5px; width: 60px; height: 40px;"> </td>
                    <td>
                        @if($item->title == NULL)
                        <span class="badge badge-pill badge-danger"> No Title </span>
                        @else
                            {{ $item->title }}
                        @endif
                        </td>

                    <td>{{ $item->description }}</td>

                    <td>{{ $item->sales_point }}</td>

                    <td>{{ $item->user_merit }}</td>

                    <td>
                        @if($item->status == 1)
                        <span class="badge badge-pill badge-success"> Active </span>
                        @else
                        <span class="badge badge-pill badge-danger"> InActive </span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('slider.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>

                        <a href="{{ route('slider.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
                        <i class="fa fa-trash"></i></a>

                        @if($item->status == 1)
                            <a href="{{ route('slider.inactive',$item->id) }}" class="btn btn-danger btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                        @else
                            <a href="{{ route('slider.active',$item->id) }}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
                        @endif

                    </td>
                    </tr>
                    @endforeach
                </tbody>

                </table>
                </div>
        </div>
        </div>

    </div>
    </div>



</div>
    <!-- /.row -->
</section>
<!-- /.content -->

</div>

@endsection