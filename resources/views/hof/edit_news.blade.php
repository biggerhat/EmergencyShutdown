@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-primary">
                <div class="panel-heading">Edit News</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::model($news, ['method' => 'PATCH','action' => ['HofController@updateNews', $news->id]]) !!}
                    @include('hof.partials.news_form', ['submitButtonText' => 'Update News'])
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
