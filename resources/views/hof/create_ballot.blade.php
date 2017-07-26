@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-primary">
                <div class="panel-heading">Create a Ballot</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['url' => 'hof/create_ballot']) !!}
                    @include('hof.partials.ballot_form', ['submitButtonText' => 'Create Ballot'])
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
