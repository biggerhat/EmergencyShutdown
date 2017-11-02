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
                            <td class="text-center">Rank</td>
                            <td class="text-center">Name</td>
                            <td class="text-center">Owner</td>
                            <td class="text-center">Total Cost</td>
                            <td class="text-center">Final Score</td>
                        </tr>
                        </thead>
                        <tbody>
                        {{--*/ $i = 0 /*--}}
                        @foreach ($teams as $team)
                            {{--*/ $i++ /*--}}
                            <tr style="@if($team['user']) @if($user['id']==$team['user']['id']) background-color: red; @endif @endif">
                                <td style="line-height: 40px" class="text-center">{{ $i }}</td>
                                <td style="line-height: 40px">{{ $team->name }}</td>
                                <td style="line-height: 40px">@if($team['user']) {{ $team->user->username }} @endif</td>
                                <td style="line-height: 40px" class="text-center">{{ $team->cost }}</td>
                                <td style="line-height: 40px" class="text-center">{{ $team->score }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
