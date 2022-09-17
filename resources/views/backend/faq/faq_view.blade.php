@extends('admin.admin_master')
@section('admin')


<div class="container-full">

    <!-- Main content -->
    <section class="content">
    <div class="row">


        {{-- Add FAQ Page --}}
        <div class="box">
            <div class="box-header with-border">
            <h4 class="box-title">FAQ新規登録</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
            <div class="col">

            <form method="post" action="{{ route('faq.store') }}">
                @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>ご質問（日本語）<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <textarea name="quiz_jp" id="textarea" class="form-control"></textarea>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>問題（中国語）<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <textarea name="quiz_cn" id="textarea" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <h5>ご回答（日本語）<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea id="editor1" name="answer_jp" rows="10" cols="80">
                                </textarea>
                            </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                            <h5>回答（中国語）<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea id="editor2" name="answer_cn" rows="10" cols="80">

                                </textarea>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="新規作成">
                    </div>
            </form>

            </div>
            </div>
            </div>
        </div>



        {{-- FAQ LIST --}}
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">FAQ List <span class="badge badge-pill badge-danger"> {{ count($faqs) }} </span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width=10%>Quiz JP</th>
                            <th width=30%>Answer JP</th>
                            <th width=10%>Quiz CN</th>
                            <th width=30%>Answer JP</th>
                            <th width=12%>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($faqs as $faq)
                        <tr>
                            <td>{{ $faq->quiz_jp }}</td>

                            {{-- {{}}を{!! !!}へ変更すれば、タグ<p></p>が表示しなくなる --}}
                            <td>{!! $faq->answer_jp !!}</td>

                            <td>{{ $faq->quiz_cn }}</td>

                            <td>{!! $faq->answer_cn !!}</td>
                            <td>
                                <a href="{{ route('faq.edit',$faq->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('faq.delete',$faq->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
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
    </section>

</div>



@endsection