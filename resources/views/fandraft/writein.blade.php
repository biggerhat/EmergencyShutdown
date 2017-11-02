@extends('main')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('fandraft.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Add a Write-in Player</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['url' => 'fantasy/writein']) !!}
                    <div class="form-group">
                        {!! Form::label('name','Player Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group text-right">
                        {!! Form::submit('Submit Write-in',['class' => 'btn btn-primary form control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
