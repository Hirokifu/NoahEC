@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">

    <div class="row">

        @include('frontend.common.user_sidebar')

        <div class="col-md-10">
            <div class="table-responsive">

            <br>
            <br>

            @php($i = 1)
            @foreach($news as $item)

            <div class="panel-group" id="accordion">
                <div class="panel panel-default">

                    <div class="panel-heading">
                        <span class="panel-title" style="font-size:20px; margin: 0 0 0 5px">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $i }}"><strong>{{$item->title}}</strong></a>
                        </span>

                        <span class="badge badge-success" style="font-size:13px; float:right; background-color:tomato">
                            {{-- <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>View</a> --}}
                            管理番号: {{ $item->created_at->format('Ymd').$item->id }}
                        </span>
                    </div>

                    <div id="collapse{{ $i }}" style="margin:0 0 0 5px">
                        <div style="margin:20px 15px 10px 15px">
                            {!! nl2br(e($item->body)) !!}
                        </div>

                        @if($item->image)
                        <div style="margin:0 15px 20px 15px">
                            <a href="{{ asset('upload/news/'.$item->image) }}" data-lightbox="gourp"><img src="{{ asset('upload/news/'.$item->image) }}" width="600" style="border-radius:8px; width:50%"></a>
                        </div>
                        @endif
                    </div>

                <div class="panel-footer"><i class="fa fa-clock-o"></i>{{ $item->created_at->diffForHumans() }}</div>

                </div>
            </div>

            @php($i++)
            @endforeach

            </div>
            </div>

    </div>
    </div>
</div>

@endsection