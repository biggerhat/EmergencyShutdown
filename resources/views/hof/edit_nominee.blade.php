@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-primary">
                <div class="panel-heading">Edit Nominee</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::model($nominee, ['method' => 'PATCH','action' => ['HofController@updateNominee', $nominee->id]]) !!}
                    @include('hof.partials.nominee_form', ['submitButtonText' => 'Update Nominee'])
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
