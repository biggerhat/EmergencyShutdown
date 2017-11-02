@extends('main')
@section('title')
    - Fantasy Draft
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('fandraft.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{!! $draft->name !!}</div>
                <div class="panel-body">
                    <p>{!! nl2br(e($draft->description)) !!}</p>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Final Scoring</div>
                <div class="panel-body">
                    <p>{!!  nl2br(e($draft->scoring)) !!}</p>
                </div>
            </div>

        </div>

    </div>
@endsection
