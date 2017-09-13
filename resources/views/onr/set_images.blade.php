@extends('main')
@section('title')
    - Webminster - Netrunner Sets
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('onr.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            @foreach ($cards as $card)
                <div class="col-md-6 col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">{!! $card['title'] !!}</div>
                    <div class="panel-body img-responsive text-center">
                        <a href="/webminster/cards/{!! $card['id'] !!}" alt="{!! $card['title'] !!}"><img src="http://www.emergencyshutdown.net{!! $card['image'] !!}" alt="{!! $card['title'] !!}" class="onr_img"></a>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
