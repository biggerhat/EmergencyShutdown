@extends('main')
@section('title')
    - Fantasy Draft
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('fandraft.partials.admin')
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ $draft->name }}</div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td class="text-center">Name</td>
                            <td class="text-center">Owner</td>
                            <td class="text-center">Elite</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($teams as $team)
                            <tr @if($team['elite']=='1') style="background-color: red" @endif>
                                <td style="line-height: 40px">{{ $team->name }}</td>
                                @if($team['user'])
                                    <td style="line-height: 40px">{{ $team->user->username }}</td>
                                @else
                                    <td></td>
                                @endif
                                @if($team['elite'] == '0')
                                    <td style="line-height: 40px; text-align: center;"><a class="btn btn-primary" href="{{ action('FanDraftController@makeElite', [ $team->id ]) }}" role="button">Make Elite</a></td>
                                @else
                                    <td style="line-height: 40px; text-align: center;"><a class="btn btn-primary" href="{{ action('FanDraftController@undoElite', [ $team->id ]) }}" role="button">Undo Elite</a></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
