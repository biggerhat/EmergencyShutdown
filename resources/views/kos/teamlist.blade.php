@extends('main')
@section('title')
    - King of Servers 2017 - Team List
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('kos.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">King of Servers Team List (Total Teams: {!! $teams['count'] !!})</div>
                <div class="panel-body">
                    @foreach($teams['teams'] as $team)
                        <div class="row">
                        <div class="hof_profile_header">{!! $team['name'] !!} <span class="text-right"><a class="btn btn-primary" href="/kos/teams/{!! $team['id'] !!}/login" role="button">Edit Team</a></span></div>
                        @foreach($team['players'] as $player)
                            <div class="col-md-3">
                                {!! $player['name'] !!} ({!! $player['aka'] !!})
                                <br/><span style="font-size: .75em">{!! $player['pref_corp'] !!} / {!! $player['pref_runn'] !!}</span>
                            </div>
                        @endforeach
                        </div>
                    @endforeach

                </div>

            </div>


        </div>

    </div>


@endsection
