@extends('admin.main')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">Edit Users</div>
        <div class="panel-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Username</td>
                            <td>E-mail</td>
                            <td>Name</td>
                            <td>Roles</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <ul>
                                        @foreach ($user->roles as $role)
                                            <li>{{ $role->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td><a class="btn btn-primary" href="/admin/users/edit/{{ $user->id }}" role="button">Edit User</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
            <div class="text-right">
                {{ $users->links() }}
            </div>
@endsection