@extends('main')
@section('title')
    - King of Servers 2017 - Team Password Reset
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('kos.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Password Reset</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['method' => 'PATCH','url' => 'kos/password']) !!}
                    <div class="form-group">
                        {!! Form::label('team','Select Team:') !!}
                        {!! Form::select('team', $teamlist, null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('team_password','Team Password:') !!}
                        {!! Form::text('team_password',null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group text-right">
                        {!! Form::submit('Reset Password',['class' => 'btn btn-primary form control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>


        </div>

    </div>


@endsection
