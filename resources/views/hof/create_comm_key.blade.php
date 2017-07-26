@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-primary">
                <div class="panel-heading">Create a Committee Key</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['url' => 'hof/create_committee_key']) !!}
                    <div class="form-group">
                        {!! Form::label('name','Committee Member Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group text-right">
                        {!! Form::submit('Create Key',['class' => 'btn btn-primary form control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
