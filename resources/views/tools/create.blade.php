@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-primary">
                <div class="panel-heading">Add a Tool</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['url' => 'tools']) !!}
                    @include('tools.partials.form', ['submitButtonText' => 'Add Tool'])
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
