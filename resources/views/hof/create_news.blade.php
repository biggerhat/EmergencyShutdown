@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-primary">
                <div class="panel-heading">Create Hall of Fame News</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['url' => 'hof/create_news']) !!}
                    @include('hof.partials.news_form', ['submitButtonText' => 'Post News'])
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
