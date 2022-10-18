@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <section class="content">
    <div class="row">

        {{-- Add meeting appointment --}}
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">会議予定作成</h3>
                </div>

                <div class="box-body">
                    <div class="table-responsive">

                    <form method="post" action="{{ route('store.meeting') }}" autocomplete="off">
                        @csrf

                        <div class="form-group">
                            <h5>会議主題 <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="topic" class="form-control">
                                @error('topic')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>開始時刻<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="datetime-local" name="start_time" class="form-control">
                                @error('start_time')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>予定時間（分）<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="duration" class="form-control">
                                @error('duration')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="作成する">
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