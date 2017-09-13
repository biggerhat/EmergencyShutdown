@extends('main')
@section('title')
    - King of Servers 2017 - Player Registration
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('kos.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">King of Servers 2017 - Player Registration for {!! $team['name'] !!}</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['url' => 'kos/teams/' . $team['id'] . '/add_player']) !!}
                    @include('kos.partials.player_form', ['submitButtonText' => 'Add Player'])
                    {!! Form::close() !!}
                </div>

            </div>


        </div>

    </div>


@endsection
