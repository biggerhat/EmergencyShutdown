@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-primary">
                <div class="panel-heading">Edit Card</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::model($onrcard, ['method' => 'PATCH','action' => ['ONRController@updateCard', $onrcard->id]]) !!}
                    @include('onr.partials.card_form', ['submitButtonText' => 'Update Card'])
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
