@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <section class="content">
    <div class="row">
        <div class="col-12">

        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Company List <span class="badge badge-pill badge-danger"> {{ count($companies) }} </span></h3>
            </div>

            <div class="box-body">
                <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width=8%>Image </th>
                            <th width=15%>会社名</th>
                            <th>業種</th>
                            <th>主な製品</th>
                            <th width=30%>サマリー</th>
                            <th>Status </th>
                            <th width=10%>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($companies as $item)
                        <tr>
                            <td> <img src="{{ url('upload/company/thambnail/'.$item->company_thambnail) }}" style="border-radius: 5px; width: 50px; height: 50px;"> </td>
                            <td>{{ $item->company_jp }}</td>
                            <td>{{ $item->business_jp }}</td>
                            <td>{{ $item->product_jp }}</td>
                            <td>{{ $item->short_descp_jp }}</td>

                            <td>
                                @if($item->status == 1)
                                <span class="badge badge-pill badge-success"> Active </span>
                                @else
                                <span class="badge badge-pill badge-danger"> InActive </span>
                                @endif

                            </td>


                            <td>
                                {{-- <a href="{{ route('company.edit',$item->id) }}" class="btn btn-primary btn-sm" title="Product Details Data"><i class="fa fa-eye"></i> </a> --}}

                                <a href="{{ route('company.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>

                                {{-- <a href="{{ route('company.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
                                <i class="fa fa-trash"></i></a> --}}

                                {{-- @if($item->status == 1)
                                    <a href="{{ route('company.inactive',$item->id) }}" class="btn btn-danger btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                                @else
                                    <a href="{{ route('company.active',$item->id) }}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
                                @endif --}}

                                <a href="{{ route('company.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>

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