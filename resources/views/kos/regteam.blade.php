@extends('main')
@section('title')
    - King of Servers 2017 - Team Registration
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('kos.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Register a Team for King of Servers</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['url' => 'kos/register/team']) !!}

                    <div class="form-group">
                        {!! Form::label('name','Team Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('team_pass1','Team Password:') !!}
                        {!! Form::password('team_pass1', ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('team_pass2','Repeat Password:') !!}
                        {!! Form::password('team_pass2', ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group text-right">
                        {!! Form::submit('Create Team',['class' => 'btn btn-primary form control']) !!}
                    </div>
                    {!! Form::close() !!}
                    Please do not forget your team password. It is needed to make changes to your team.
                </div>

            </div>


        </div>

    </div>


@endsection
