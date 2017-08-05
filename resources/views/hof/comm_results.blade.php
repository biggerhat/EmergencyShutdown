@extends('admin.main')
@section('title')
    - Android: Netrunner Hall of Fame - Committee Voting Results
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">Committee Voting Results</div>
                <div class="panel-body">
                    @include('errors.list')
                    <div class="hof_profile_header">Total Votes: {!! $counts['total'] !!}
                        <br>Total Voters: {!! $counts['voters'] !!}</div>
                    <div class="span6">
                        @foreach ($counts['nominees'] as $nominee)
                            <strong>{!! $nominee['name'] !!}</strong><span class="pull-right">{!! $nominee['percent'] !!}%</span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{!! $nominee['percent'] !!}" aria-valuemin="0" aria-valuemax="100" style="width: {!! $nominee['percent'] !!}%;">
                                    <span class="sr-only">{!! $nominee['percent'] !!}%</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
