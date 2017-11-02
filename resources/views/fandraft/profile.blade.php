@extends('main')
@section('title')
    - Fantasy Draft - Player Profile
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('fandraft.partials.nav')
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">Player Profile - {{ $player->name }}</div>
                <div class="panel-body">
                    <div class="hof_profile_header">Player Name</div>
                    <div class="hof_profile_content">{{ $player->name }}</div>
                    @if($player->aka != "")
                        <div class="hof_profile_header">Also Known As</div>
                        <div class="hof_profile_content">{{ $player->aka }}</div>
                    @endif
                    @if(($player->profile != "\r\n") AND ($player->profile != ""))
                        <div class="hof_profile_header">Profile</div>
                        <div class="hof_profile_content">{!!  nl2br(e($player->profile)) !!}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
