@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">会議予定表<span class="badge badge-pill badge-danger">  {{ count($meetings) }}  </span></h3>

                    <label style="float:right; margin:0 20px 0 0"><a href="{{ route('add.meeting') }}" class="btn btn-rounded btn-primary mb-5">新規予約</a></label>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>開催者 </th>
								<th>ミーティングID </th>
                                <th>PW</th>
								<th>主題</th>
								<th>開始時刻</th>
                                {{-- <th>TimeZone</th> --}}
                                <th>予定時間</th>
                                <th>進行役</th>
                                <th>会議室</th>
								<th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($meetings as $meeting)
                            <tr>
                                <td><img src="{{ (!empty($meeting->admin->profile_photo_path))? url('upload/admin_images/'.$meeting->admin->profile_photo_path):url('upload/admin_images/admin_default.png') }}" style="border-radius: 50%; width: 30px; height: 30px;">{{ $meeting->admin->name }}</td>

                                <td>{{ $meeting->meeting_id }}</td>
                                <td>{{ $meeting->password }}</td>
                                <td>{{ $meeting->topic }}</td>
                                <td>{{ $meeting->start_at }}</td>
                                {{-- <td>{{ $meeting->timezone }}</td> --}}
                                <td>{{ $meeting->duration }}分</td>
                                <td><a href="{{ $meeting->start_url }}" target="_blank" rel="noopener noreferrer" style="color: tomato; font-weight:700">進行</a></td>
                                <td><a href="{{ $meeting->join_url }}" target="_blank" rel="noopener noreferrer" style="color: blue; font-weight:700">参加</a></td>

                                <td>
                                    {{-- <a href="{{ route('edit.meeting', $meeting->id) }}" class="btn btn-success btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a> --}}

                                    <a href="{{ route('delete.meeting', $meeting->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i> </a>
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