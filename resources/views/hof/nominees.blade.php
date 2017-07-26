@extends('main')
@section('title')
    - Android: Netrunner Hall of Fame - Current Nominees
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('hof.partials.nav')
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ $ballot->name }}</div>
                <div class="panel-body">
                    <p class="pgraph">{{ $ballot->description }}</p>
                    <table class="table table-striped">
                        <tbody>
                        @foreach ($ballot->nominees as $nominee)
                            <tr>
                                <td style="line-height: 40px">{{ $nominee->name }}</td>
                                <td style="line-height: 40px">{{ $nominee->alias }}</td>
                                <td style="line-height: 40px; text-align: center;"><a class="btn btn-primary" href="{{ action('HofController@getProfile', [ $nominee->id ]) }}" role="button">View Profile</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
