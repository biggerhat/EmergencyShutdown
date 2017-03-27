@extends('main')

@section('content')
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

    <div class="panel panel-primary">
      <div class="panel-heading">{{ $article->title }}</div>
      <div class="panel-body">
        {{ $article->body }}
      </div>
        <div class="panel-footer">
            <ul>
                @foreach ($article->tags as $tag)
                    <li>{{ $tag->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>

      </div>
    </div>
@endsection
