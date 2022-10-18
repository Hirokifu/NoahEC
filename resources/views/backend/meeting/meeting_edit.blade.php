@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <section class="content">
    <div class="row">

        {{-- Add meeting appointment --}}
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">予定変更</h3>
                </div>

                <div class="box-body">
                    <div class="table-responsive">

                    <form method="post" action="{{ route('update.meeting', $meeting->id) }}" autocomplete="off">
                        @csrf

                        <input type="hidden" name="id" value="{{ $meeting->id }}">

                        <div class="form-group">
                            <h5>会議主題 <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="topic" class="form-control" value="{{ $meeting->topic }}">
                                @error('topic')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>開始時刻<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <label style="color: red; font-weight:700">{{ $meeting->start_at }}  ---></label>
                                <label><input type="datetime-local" name="start_time" class="form-control"></label>
                                @error('start_time')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>予定時間（分）<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="duration" class="form-control" value="{{ $meeting->duration }}">
                                @error('duration')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="変更する">
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