@extends('main')
@section('title')
    - Android: Netrunner Hall of Fame - Nominees
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('hof.partials.nav')
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">Android: Netrunner Hall of Fame Nominees</div>
                <div class="panel-body">
                    There is no open vote currently. Check back for announcements when voting begins.
                </div>
            </div>
        </div>
    </div>
@endsection
