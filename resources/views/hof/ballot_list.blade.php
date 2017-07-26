@extends('admin.main')
@section('title')
    - Android: Netrunner Hall of Fame - Ballot List
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Edit Ballots</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td style="line-height: 40px">Name</td>
                            <td style="line-height: 40px">Edit?</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($ballots as $ballot)
                            <tr>
                                <td style="line-height: 40px">{{ $ballot->name }}</td>
                                <td style="line-height: 40px; text-align: center;"><a class="btn btn-primary" href="{{ action('HofController@editBallot', [ $ballot->id ]) }}" role="button">Edit Ballot</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
