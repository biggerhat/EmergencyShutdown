@extends('main')
@section('title')
    - Android: Netrunner Hall of Fame - Submit Your Vote
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('hof.partials.nav')
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ $ballot->name }}</div>
                <div class="panel-body">
                    @include('errors.list')
                    <div class="hof_profile_header">Please choose up to 12 nominees to vote for and submit your vote!</div>
                    {!! Form::open(['url' => 'hof/vote']) !!}
                    <div class="row">
                        @foreach ($ballot->nominees as $nominee)
                            <div class="col-sm-6 col-md-4">
                                <div class="checkbox"><label>{!! Form::checkbox('nominees[]', $nominee->id) !!} {{ $nominee->name }}</label></div>
                            </div>
                        @endforeach
                    </div>
                    <p class="text-right">{!! Form::submit('Submit My Vote',['class' => 'btn btn-primary form control']) !!}</p>
                    {!! Form::close() !!}
                    <div class="hof_profile_header">
                        If you are a voting committee member, please go <a href="/hof/comm_vote">here</a> to submit your official vote.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
