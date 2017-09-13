@extends('main')
@section('title')
    - King of Servers 2017 - Team Changing
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('kos.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{!! $team['name'] !!}</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::model($team, ['method' => 'PATCH', 'url' => 'kos/teams/' . $team['id']]) !!}

                    <div class="form-group">
                        {!! Form::label('name','Team Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="row">
                    @foreach ($team['players'] as $player)
                            <div class="col-md-3">
                                {!! $player['name'] !!} ({!! $player['aka'] !!})
                                <br/><span style="font-size: .75em">{!! $player['pref_corp'] !!} / {!! $player['pref_runn'] !!}</span>
                                <br/><a class="btn btn-primary" href="/kos/teams/{!! $team['id'] !!}/remove_player/{!! $player['id'] !!}" role="button">Remove Player</a>
                            </div>
                    @endforeach
                    </div>

                </div>
                <div class="panel-footer text-right">
                    {!! Form::submit('Update Team Name',['class' => 'btn btn-primary form control']) !!} <a class="btn btn-primary" href="/kos/teams/{!! $team['id'] !!}/add_player" role="button">Add A Player</a>
                </div>
                {!! Form::close() !!}

            </div>


        </div>

    </div>


@endsection
