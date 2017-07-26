@extends('main')
@section('title')
    - Android: Netrunner Hall of Fame - Current Members
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('hof.partials.nav')
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">Android: Netrunner Hall of Fame Members</div>
                <div class="panel-body">
                    The inaugural class has not yet been elected! Check back soon.
                </div>
            </div>
        </div>
    </div>
@endsection
