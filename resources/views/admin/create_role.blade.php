@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-primary">
                <div class="panel-heading">Create a Role</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['url' => 'admin/role']) !!}
                    <div class="form-group">
                        {!! Form::label('name','Role Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group text-right">
                        {!! Form::submit('Create Role',['class' => 'btn btn-primary form control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
