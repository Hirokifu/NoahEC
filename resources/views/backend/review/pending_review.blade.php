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
            <h3 class="box-title">Pending All Reviews</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width=10%>Product </th>
                        <th width=15%>Summary </th>
                        <th width=45%>Comment </th>
                        <th width=10%>User </th>
                        <th width=10%>Status </th>
                        <th width=10%>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($review as $item)
                    <tr>
                    <td> {{ $item->product->product_name_jp }}  </td>
                    <td> {{ $item->summary }}  </td>
                    <td> {{ $item->comment }}  </td>
                    <td> {{ $item->user->name }}  </td>

                    <td>
                        @if($item->status == 0)
                        <span class="badge badge-pill badge-primary">Pending </span>
                        @elseif($item->status == 1)
                        <span class="badge badge-pill badge-success">Publish </span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('review.approve',$item->id) }}" class="btn btn-danger btn-sm">Approve </a>
                        {{-- <a href="{{ route('review.approve',$item->id) }}" class="btn btn-danger" title="Approve Data" id="approve"> <i class="fa fa-trash"></i></a> --}}
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