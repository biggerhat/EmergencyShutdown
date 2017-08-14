@extends('main')
@section('title')
    - Webminster - Database Search Results
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('onr.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-body">Your search returned {!! $count !!} results.</div>
            </div>
            @foreach ($cards as $card)
                <div class="panel panel-primary">
                    <div class="panel-heading">{!! $card['title'] !!}</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 img-responsive text-center">
                                <img src="http://www.emergencyshutdown.net{!! $card['image'] !!}" alt="{!! $card['title'] !!}" class="onr_img">
                            </div>
                            <div class="col-md-offset-1 col-md-7">
                                <h3 style="color: #0ce3ac; font-style: italic;"><a href="/webminster/cards/{!! $card['id'] !!}" alt="{!! $card['title'] !!}">{!! $card['title'] !!}</a></h3>
                                <label for="title">Side: </label>
                                <span id="title" style="color: #0ce3ac">{{ ucfirst($card['side']) }}</span>
                                <br/>
                                <label for="title">Type: </label>
                                <span id="title" style="color: #0ce3ac">{{ ucfirst($card['type']) }}</span>
                                <br/>
                                @if($card['keywords'] != '')
                                    <label for="title">Subtypes: </label>
                                    <span id="title" style="color: #0ce3ac">{!! $card['keywords'] !!}</span><br/>
                                @endif
                                <label for="title">Set: </label>
                                <span id="title" style="color: #0ce3ac">{{  ucfirst($card['set']) }}</span>
                                <br/>
                                <label for="title">Rarity: </label>
                                <span id="title" style="color: #0ce3ac">{{  ucfirst($card['rarity']) }}</span>
                                <br/>
                                @if($card['cost'] != '')
                                    <label for="title">Cost: </label>
                                    <span id="title" style="color: #0ce3ac">{!! $card['cost'] !!}</span>
                                @endif
                                @if($card['strength'] != '')
                                    <label for="title">Strength: </label>
                                    <span id="title" style="color: #0ce3ac">{!! $card['strength'] !!}</span>
                                @endif
                                @if($card['diff'] != '')
                                    <label for="title">Difficulty: </label>
                                    <span id="title" style="color: #0ce3ac">{!! $card['diff'] !!}</span>
                                @endif
                                @if($card['agenda'] != '')
                                    <label for="title">Agenda Points: </label>
                                    <span id="title" style="color: #0ce3ac">{!! $card['agenda'] !!}</span>
                                @endif
                                @if($card['trash'] != '')
                                    <label for="title">Trash Cost: </label>
                                    <span id="title" style="color: #0ce3ac">{!! $card['trash'] !!}</span>
                                @endif
                                @if($card['memory'] != '')
                                    <label for="title">Memory: </label>
                                    <span id="title" style="color: #0ce3ac">{!! $card['memory'] !!}</span>
                                @endif
                                <br/>

                                <label for="title">Text: </label><br/>
                                <span id="title" style="color: #0ce3ac; display: block; border-radius: 4px; border: 1px solid #0ce3ac; padding: 5px;">{!!  nl2br(e($card['text'])) !!}</span>
                                <br/>
                                <label for="title">Artist: </label>
                                <span id="title" style="color: #0ce3ac">{!! $card['artist'] !!}</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-center" style="font-style: italic;">For rulings, errata, and more about this card click <a href="/webminster/cards/{!! $card['id'] !!}" alt="{!! $card['title'] !!}">here</a>.</div>
                </div>
            @endforeach


        </div>

    </div>


@endsection
