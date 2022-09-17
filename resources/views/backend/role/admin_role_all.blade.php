@extends('admin.admin_master')
@section('admin')

<div class="container-full">

<section class="content">
    <div class="row">

    <div class="col-12">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>管理者一覧</strong> <span class="badge badge-pill badge-danger"> {{ count($adminuser) }} </span></h3>
            <a href="{{ route('add.admin') }}" class="btn btn-info" style="float: right; margin:0 18px 0 0">新規追加</a>
        </div>

        <div class="box-body">
            <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Image  </th>
                    <th>Name  </th>
                    <th>Email </th>
                    <th width=60%>Access </th>
                    <th width=15%>Action</th>

                </tr>
            </thead>
            <tbody>
            @foreach($adminuser as $item)
            <tr>
                <td> <img src="{{ asset('upload/admin_images/'.$item->profile_photo_path) }}" style="width: 40px; height: 40px;">  </td>
                <td> {{ $item->name }}  </td>
                <td> {{ $item->email }}  </td>

                <td>
                    @if($item->brand == 1)
                    <span class="badge btn-primary">Brand</span>
                    @else
                    @endif

                    @if($item->category == 1)
                    <span class="badge btn-secondary">Category</span>
                    @else
                    @endif

                    @if($item->product == 1)
                    <span class="badge btn-success">Product</span>
                    @else
                    @endif

                    @if($item->slider == 1)
                    <span class="badge btn-danger">Slider</span>
                    @else
                    @endif

                    @if($item->coupons == 1)
                    <span class="badge btn-warning">Coupons</span>
                    @else
                    @endif

                    @if($item->shipping == 1)
                    <span class="badge btn-info">Shipping</span>
                    @else
                    @endif

                    @if($item->blog == 1)
                    <span class="badge btn-light">Blog</span>
                    @else
                    @endif

                    @if($item->setting == 1)
                    <span class="badge btn-dark">Setting</span>
                    @else
                    @endif

                    @if($item->returnorder == 1)
                    <span class="badge btn-primary">Return Order</span>
                    @else
                    @endif

                    @if($item->review == 1)
                    <span class="badge btn-secondary">Review</span>
                    @else
                    @endif

                    @if($item->orders == 1)
                    <span class="badge btn-success">Orders</span>
                    @else
                    @endif

                    @if($item->stock == 1)
                    <span class="badge btn-danger">Stock</span>
                    @else
                    @endif

                    @if($item->reports == 1)
                    <span class="badge btn-warning">Reports</span>
                    @else
                    @endif

                    @if($item->alluser == 1)
                    <span class="badge btn-info">Alluser</span>
                    @else
                    @endif

                    @if($item->adminuserrole == 1)
                    <span class="badge btn-dark">Adminuserrole</span>
                    @else
                    @endif

                    @if($item->contact == 1)
                    <span class="badge btn-info">Contact</span>
                    @else
                    @endif

                    @if($item->inquiry == 1)
                    <span class="badge btn-info">Inquiry</span>
                    @else
                    @endif

                    @if($item->news == 1)
                    <span class="badge btn-info">News</span>
                    @else
                    @endif

                    @if($item->faq == 1)
                    <span class="badge btn-info">FAQ</span>
                    @else
                    @endif

                </td>

                <td>
                    <a href="{{ route('edit.admin.user',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>

                    <a href="{{ route('delete.admin.user',$item->id) }}" class="btn btn-danger btn-sm" title="Delete" id="delete">
                        <i class="fa fa-trash"></i></a>
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
</section>

</div>


@endsection