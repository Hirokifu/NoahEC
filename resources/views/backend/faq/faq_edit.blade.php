@extends('admin.admin_master')
@section('admin')



<div class="container-full">

    <!-- Main content -->
    <section class="content">

    {{-- Add FAQ Page --}}
    <div class="row">
        <div class="box">
            <div class="box-header with-border">
            <h4 class="box-title">FAQ新規登録</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
            <div class="col">

            <form method="post" action="{{ route('faq.update') }}">
                @csrf

                <input type="hidden" name="id" value="{{ $quiz->id }}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>ご質問（日本語）<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <textarea name="quiz_jp" id="textarea" class="form-control">{!! $quiz->quiz_jp !!}</textarea>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>問題（中国語）<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <textarea name="quiz_cn" id="textarea" class="form-control">{!! $quiz->quiz_cn !!}</textarea>
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
                                    {!! $quiz->answer_jp !!}
                                </textarea>
                            </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                            <h5>回答（中国語）<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea id="editor2" name="answer_cn" rows="10" cols="80">
                                    {!! $quiz->answer_cn !!}
                                </textarea>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="更新">
                    </div>
            </form>

            </div>
            </div>
            </div>
        </div>

    </div>

    </section>

</div>


@endsection