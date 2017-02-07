@extends('main')

@section('content')
    <div class="row">
        <div class="col-md-8">
            @foreach ($articles as $article)
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ $article->title }} by {{ $article->user->username }}</div>
                    <div class="panel-body">
                        {{ $article->summary }}
                        <p class="text-right"><a class="btn btn-primary" href="{{ action('ArticlesController@show', [ $article->id ]) }}" role="button">View Article &raquo;</a></p>
                    </div>
                </div>
            @endforeach
        </div>
        @include('partials.cardoftheday')
    </div>
@endsection
