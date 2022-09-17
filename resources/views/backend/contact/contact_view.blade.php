@extends('admin.admin_master')
@section('admin')


<div class="container-full">

<!-- Main content -->
<section class="content">
<div class="row">

    {{-- FAQ LIST --}}
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">お問合せ <span class="badge badge-pill badge-danger"> {{ count($contacts) }} </span></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width=12%>User Name</th>
                        <th width=10%>Email</th>
                        <th width=13%>Title</th>
                        <th width=28%>Message</th>
                        <th width=12%>Date</th>
                        <th width=10%>Status</th>
                        <th width=15%>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->title }}</td>
                        <td>{{ $contact->body }}</td>
                        <td>{{ $contact->created_at }}</td>

                        <td>
                            @if($contact->status == 1)
                            <span class="badge badge-pill badge-info"> 未回答 </span>
                            @else
                            <span class="badge badge-pill badge-success"> 回答済 </span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('contact.delete',$contact->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"> <i class="fa fa-trash"></i></a>

                            @if($contact->status == 1)
                            <a href="{{ route('contact.inactive',$contact->id) }}" class="btn btn-info btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                            @else
                                <a href="{{ route('contact.active',$contact->id) }}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
                            @endif

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
</section>

</div>


@endsection