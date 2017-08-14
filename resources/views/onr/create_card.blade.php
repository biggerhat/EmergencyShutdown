@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-primary">
                <div class="panel-heading">Add a Card</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['url' => 'onr/create_card','files' => true]) !!}
                    @include('onr.partials.card_form', ['submitButtonText' => 'Add Card'])
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
