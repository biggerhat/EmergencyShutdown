@extends('admin.main')
@section('title')
    - Android: Netrunner Hall of Fame - Nominees List
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Nominees List</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td style="line-height: 40px">Name</td>
                            <td style="line-height: 40px">Edit?</td>
                        </tr>
                        </thead>
                            <tbody>
                            @foreach ($nominees as $nominee)
                                <tr>
                                    <td style="line-height: 40px">{{ $nominee->name }}</td>
                                    <td style="line-height: 40px; text-align: center;"><a class="btn btn-primary" href="{{ action('HofController@editNominee', [ $nominee->id ]) }}" role="button">Edit Profile</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">
        {{ $nominees->links() }}
    </div>
@endsection
