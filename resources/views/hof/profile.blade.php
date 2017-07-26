@extends('main')
@section('title')
    - Android: Netrunner Hall of Fame - Player Profile
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('hof.partials.nav')
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">Player Profile - {{ $nominee->name }}</div>
                <div class="panel-body">
                    <div class="hof_profile_header">Player Name</div>
                    <div class="hof_profile_content">{{ $nominee->name }}</div>
                    @if($nominee->alias != "")
                        <div class="hof_profile_header">Also Known As</div>
                        <div class="hof_profile_content">{{ $nominee->alias }}</div>
                    @endif
                    @if(($nominee->standings != "\r\n") AND ($nominee->standings != ""))
                        <div class="hof_profile_header">Notable Finishes</div>
                        <div class="hof_profile_content">{!!  nl2br(e($nominee->standings)) !!}</div>
                    @endif
                    <div class="hof_profile_header">Nomination</div>
                    <div class="hof_profile_content">{!! html_entity_decode(nl2br(e($nominee->description))) !!}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
