@extends('main')
@section('title')
    - Android: Netrunner Hall of Fame - News and Announcements
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('hof.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            @foreach ($news as $new)
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ $new->title }} by {{ $new->user->username }}</div>
                    <div class="panel-body">
                        {!!  nl2br(e($new->news)) !!}
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="text-right">
        {{ $news->links() }}
    </div>
@endsection
