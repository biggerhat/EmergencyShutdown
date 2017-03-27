@extends('admin.main')

@section('content')
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-primary">
          <div class="panel-heading">Edit: {{ $article->title }}</div>
          <div class="panel-body">
            @include('errors.list')
          {!! Form::model($article, ['method' => 'PATCH', 'url' => 'articles/' . $article->id]) !!}
          @include('articles.partials.form', ['submitButtonText' => 'Update Article'])
          {!! Form::close() !!}


          </div>

        </div>
      </div>
    </div>
@endsection
