@extends('main')
@section('title')
    - Fantasy Draft
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('fandraft.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ $draft->name }}</div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Aliases</td>
                                <td>Cost</td>
                                <td>Profile</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($players as $player)
                            <tr>
                                <td style="line-height: 40px">{{ $player->name }}</td>
                                <td style="line-height: 40px">{{ $player->aka }}</td>
                                <td style="line-height: 40px">{{ $player->cost }}</td>
                                <td style="line-height: 40px; text-align: center;"><a class="btn btn-primary" href="{{ action('FanDraftController@getProfile', [ $player->id ]) }}" role="button">View Profile</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @if($draft['open'] == '0')
                    <div class="panel-footer text-right">
                        <a class="btn btn-primary" href="/fantasy/writein" role="button">Add Write-in</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
