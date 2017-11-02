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
                            <td class="text-center">Rank</td>
                            <td>Name</td>
                            <td class="text-center">Cost</td>
                            <td class="text-center">Final Score</td>
                            <td class="text-center">Picks</td>
                        </tr>
                        </thead>
                        <tbody>
                        {{--*/ $i = 0 /*--}}
                        @foreach ($counts['players'] as $player)
                            @if($player['count'] != '0')
                                {{--*/ $i++ /*--}}
                                <tr>
                                    <td style="line-height: 40px" class="text-center">{{ $i }}</td>
                                    <td style="line-height: 40px">{{ $player['name'] }}</td>
                                    <td style="line-height: 40px" class="text-center">{{ $player['cost'] }}</td>
                                    <td style="line-height: 40px" class="text-center">{{ $player['score'] }}</td>
                                    <td style="line-height: 40px" class="text-center">{{ $player['count'] }}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
