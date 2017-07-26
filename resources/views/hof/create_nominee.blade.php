@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-primary">
                <div class="panel-heading">Create a Nominee</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['url' => 'hof/create_nominee']) !!}
                    @include('hof.partials.nominee_form', ['submitButtonText' => 'Create Nominee'])
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
