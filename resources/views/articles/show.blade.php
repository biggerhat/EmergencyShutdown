@extends('main')

@section('content')
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

    <div class="panel panel-primary">
      <div class="panel-heading">{{ $article->title }}</div>
      <div class="panel-body">
        {{ $article->body }}
      </div>
    </div>

      </div>
    </div>
@endsection
