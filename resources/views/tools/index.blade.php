@extends('main')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="list-group table-of-contents">
                @foreach ($tools as $tool)
                    <a class="list-group-item" href="#{{ $tool->id }}">{{ $tool->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="col-md-9">

            @foreach ($tools as $tool)
                <a name="{{ $tool->id }}"> </a>
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ $tool->name }}</div>
                    <div class="panel-body">
                        {!!  nl2br(e($tool->description)) !!}

                        @if ($tool->url == "")
                            <p class="text-right"><a class="btn btn-primary" role="button">Coming Soon!</a></p>
                        @else
                            <p class="text-right"><a class="btn btn-primary" href="{{ $tool->url }}" @if ($tool->external == '1') target="_new" @endif role="button">Visit {{ $tool->name }} &raquo;</a></p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
@endsection
