@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->

<div class="container-full">
<!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">

			<div class="col-12">

            <div class="box">
				<div class="box-header with-border">
                    <h3 class="box-title">ブログ一覧 <span class="badge badge-pill badge-danger"> {{ count($blogpost) }} </span></h3>
                    <a href="{{ route('add.post') }}" class="btn btn-success" style="float: right;">新規作成</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>

								<th width=15%>Category </th>
								<th width=10%>Image </th>
								<th width=30%>Title Japanese </th>
								<th width=30%>Title Chinese </th>
								<th width=10%>Action</th>

							</tr>
						</thead>
						<tbody>
            @foreach($blogpost as $item)
            <tr>
                <td>{{ $item->category->blog_category_name_jp }}</td>

                @if($item->post_image)
                <td> <img src="{{ asset($item->post_image) }}" style="border-radius: 5px; width: 60px; height: 40px;"> </td>
                @else
                <td>No Image</td>
                @endif

                <td>{{ $item->post_title_jp }}</td>
                <td>{{ $item->post_title_cn }}</td>
                <td>
                    <a href="{{ route('post.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>

                    <a href="{{ route('post.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                </td>

            </tr>
            @endforeach
                    </tbody>

                    </table>
                </div>
            </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
        <!-- /.col -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    </div>




@endsection