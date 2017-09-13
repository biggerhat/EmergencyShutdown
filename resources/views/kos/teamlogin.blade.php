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
                <div class="panel-heading">Team Login for {!! $team['name'] !!}</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['url' => 'kos/teams/' . $team['id'] . '/login']) !!}

                    <div class="form-group">
                        {!! Form::label('team_password','Team Password:') !!}
                        {!! Form::password('team_password', ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group text-right">
                        {!! Form::submit('Login',['class' => 'btn btn-primary form control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>


        </div>

    </div>


@endsection
