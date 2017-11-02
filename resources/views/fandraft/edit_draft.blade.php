@extends('main')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('fandraft.partials.admin')
        </div>
        <div class="col-md-9">

            <div class="panel panel-primary">
                <div class="panel-heading">Edit Draft</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::model($draft, ['method' => 'PATCH','action' => ['FanDraftController@updateDraft', $draft->id]]) !!}
                    @include('fandraft.partials.draft_form', ['submitButtonText' => 'Update Draft'])
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
