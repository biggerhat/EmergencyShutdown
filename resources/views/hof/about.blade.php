@extends('main')
@section('title')
    - Android: Netrunner Hall of Fame
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('hof.partials.nav')
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">ANRPC Presents - The Android: Netrunner Hall of Fame</div>
                    <div class="panel-body">
                        <p class="pgraph">The idea of an Android: Netrunner (ANR) Hall of Fame (HOF) started as a Slack #general chat folly between Dien Tran and Abram Jopp. It is now becoming a reality. One of the reasons people play the game is to gain the admiration and esteem of one’s peers. Another thing people gain enjoyment from is organizing events, or contributing to the community in a myriad of ways. The ANR HOF is a fan-run idea that will enshrine ANR players past and present, based on votes of their peers, that recognizes them for their contributions to the community (deckbuilding, tournament organizing, streaming, outreach, etc.) and performances (tournament finishes, Worlds performances, overall skill, etc.).
                        Both the public vote and the votes from the committee are counted towards those inducted into the Hall of Fame.</p>
                    </div>
            </div>
        </div>
    </div>
@endsection
