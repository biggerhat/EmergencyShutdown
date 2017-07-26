@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-primary">
                <div class="panel-heading">Edit Tool: {{ $tool->name }}</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::model($tool, ['method' => 'PATCH', 'url' => 'tools/' . $tool->id]) !!}
                    @include('tools.partials.form', ['submitButtonText' => 'Update Tool'])
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
