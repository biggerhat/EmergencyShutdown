@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-primary">
                <div class="panel-heading">Edit Ballot</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::model($ballot, ['method' => 'PATCH','action' => ['HofController@updateBallot', $ballot->id]]) !!}
                    @include('hof.partials.ballot_form', ['submitButtonText' => 'Update Ballot'])
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
