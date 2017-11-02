@extends('main')
@section('title')
    - Android: Netrunner Hall of Fame - Submit Your Committee Vote
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('hof.partials.nav')
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ $ballot->name }} - Committee Vote</div>
                <div class="panel-body">
                    @include('errors.list')
                    <div class="hof_profile_header">Please choose up to 6 nominees to vote for and submit your vote!</div>
                    {!! Form::open(['url' => 'hof/comm_vote']) !!}
                    <div class="row">
                        @foreach ($ballot->nominees as $nominee)
                            <div class="col-sm-6 col-md-4">
                                <div class="checkbox"><label>{!! Form::checkbox('nominees[]', $nominee->id) !!} {{ $nominee->name }}</label></div>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        {!! Form::label('committee_id','Committee Key:') !!}
                        {!! Form::text('committee_id', null, ['class' => 'form-control']) !!}
                    </div>
                    <p class="text-right">{!! Form::submit('Submit My Vote',['class' => 'btn btn-primary form control']) !!}</p>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
