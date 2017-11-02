@extends('main')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('fandraft.partials.admin')
        </div>
        <div class="col-md-9">

            <div class="panel panel-primary">
                <div class="panel-heading">Create a Fantasy Draft Player</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['url' => 'fantasy/create_player']) !!}
                    @include('fandraft.partials.player_form', ['submitButtonText' => 'Create Player'])
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
