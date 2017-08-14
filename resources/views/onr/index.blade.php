@extends('main')
@section('title')
     - Welcome to Webminster
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('onr.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Welcome to Webminster</div>
                    <div class="panel-body">
                    </div>

                </div>

        </div>

    </div>


@endsection
