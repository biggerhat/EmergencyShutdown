@extends('main')
@section('title')
    - King of Servers 2017 - Team Login
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('kos.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Add {!! $agent['name'] !!} ({!! $agent['aka'] !!})</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['url' => 'kos/free_agents/add/' . $agent['id']]) !!}
                    <div class="form-group">
                        {!! Form::label('team','Select Your Team:') !!}
                        {!! Form::select('team', $teams, null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('team_password','Team Password:') !!}
                        {!! Form::password('team_password', ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group text-right">
                        {!! Form::submit('Add Player',['class' => 'btn btn-primary form control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>


        </div>

    </div>


@endsection
