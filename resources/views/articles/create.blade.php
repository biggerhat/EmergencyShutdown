@extends('admin.main')

@section('content')
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-primary">
          <div class="panel-heading">Create an Article</div>
          <div class="panel-body">
            @include('errors.list')
            {!! Form::open(['url' => 'articles']) !!}
            @include('articles.partials.form', ['submitButtonText' => 'Add Article'])
            {!! Form::close() !!}
          </div>

        </div>
      </div>
    </div>
@endsection
