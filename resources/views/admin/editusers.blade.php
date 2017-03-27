@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-primary">
                <div class="panel-heading">Edit: {{ $user->username }}</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminController@updateUser', $user->id]]) !!}
                        <div class="form-group">
                            {!! Form::label('username','Username:') !!}
                            {!! Form::text('username', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('role_list', 'Roles:') !!}
                            {!! Form::select('role_list[]', $roles, null, ['id'=> 'role_list', 'style' => 'color: black;', 'class'=> 'form-control', 'multiple']) !!}
                        </div>
                        <div class="form-group text-right">
                            {!! Form::submit('Update User',['class' => 'btn btn-primary form control']) !!}
                        </div>
                    {!! Form::close() !!}


                </div>

            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $('#role_list').select2({
            placeholder: 'Select a Role'
        });
    </script>
@endsection