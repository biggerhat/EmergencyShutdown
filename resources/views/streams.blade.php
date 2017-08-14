@extends('main')
@section('title')
    - Current Live Streams
@endsection

@section('content')
    <div class="col-md-12 col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Current Live Streams</div>
            <div class="panel-body">
                @if ($streams['_total'] == '0')
                    There are currently no live streams on twitch.
                @else
                    @foreach ($streams['streams'] as $stream)
                        <div class="col-sm-6 col-md-4 col-xs-12">
                            <div class="thumbnail">
                                <img src="{{ $stream['preview']['medium'] }}" alt="{{ $stream['channel']['display_name'] }}" class="img-responsive">
                                <div class="caption">
                                    <h3>{{ $stream['channel']['display_name'] }}</h3>
                                    <p>{{ $stream['channel']['status'] }}</p>
                                    <p class="text-right"><a href="{{ $stream['channel']['url'] }}" class="btn btn-primary" role="button" target="_new">View Stream</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
