@extends('main')
@section('title')
    - Android: Netrunner Hall of Fame - Current Members
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('hof.partials.nav')
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">Android: Netrunner Hall of Fame Members</div>
                <div class="panel-body">
                        <table class="table table-striped">
                            <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td style="line-height: 40px">{{ $member->name }}</td>
                                    <td style="line-height: 40px; text-align: center;"><a class="btn btn-primary" href="{{ action('HofController@getProfile', [ $member->id ]) }}" role="button">View Profile</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection
