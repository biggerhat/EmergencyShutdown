@extends('main')

@section('content')
        <div class="row">
            <div class="col-md-3">
                @include('fandraft.partials.nav')
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ $team['name'] }}</div>
                    <div class="panel-body">
                        @foreach($team['players'] as $player)
                            <label for="player">{{ $player['name'] }}</label><span id="player" class="info"> ( {!! $player['cost'] !!} Credits )</span><br />
                        @endforeach
                            <br/>
                            <label for="total_cost">Total Cost: </label><span id="player" class="info"> {!! $team['cost'] !!} Credits</span><br/>
                            <label for="total_cost">Final Score: </label><span id="player" class="info"> {!! $team['score'] !!} </span>
                    </div>

                </div>
                @if($team['elite'] == '1')
                    <div class="panel panel-primary">
                        <div class="panel-heading">Elite Draft</div>
                        <div class="panel-body">
                            <a class="btn btn-primary" href="/fantasy/elite" role="button">View Elite Standings</a>
                        </div>
                    </div>
                @endif

                <div class="panel panel-primary">
                <div class="panel-heading">Draft Rules</div>
                <div class="panel-body">
                    <label for="total_cost">Total Cost:</label><span id="total_cost" class="info"> {!! $draft['creds'] !!} Credits</span><br />
                    <label for="must_spend">Must Spend All Credits:</label><span id="must_spend" class="info">
                        @if($draft['all_creds'] == '0')
                            No
                        @else
                            Yes
                        @endif
                    </span><br />
                    <label for="total_cost">Team Limit:</label><span id="total_cost" class="info"> {!! $draft['team_lim'] !!} Players</span><br />
                    <label for="must_team">Must Use Whole Team:</label><span id="must_team" class="info">
                        @if($draft['all_team'] == '0')
                            No
                        @else
                            Yes
                        @endif
                    </span><br />
                    <label for="must_team">Write-ins Allowed:</label><span id="must_team" class="info">
                        @if($draft['writeins'] == '0')
                            No
                        @else
                            Yes <br />
                            @if($draft['open'] == '0')
                                <a class="btn btn-primary" href="/fantasy/writein" role="button">Add Write-in</a>
                            @endif
                        @endif
                    </span><br />
                </div>

            </div>
                @if($draft['open'] == '0')
                    <div class="panel panel-primary">
                        <div class="panel-heading">My Draft</div>
                        <div class="panel-body">
                            @include('errors.list')
                                {!! Form::model($team,['method' => 'PATCH','action' => ['FanDraftController@updateTeam']]) !!}
                            <div class="form-group">
                                {!! Form::label('name','Team Name:') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>

                            @for($i = 0; $i < $draft['team_lim']; $i++)
                                    <div class="form-group">
                                        {!! Form::label('players', 'Player:') !!}
                                        <select id="players" class="form-control" name="players[]" @if($draft['all_team'] == '1') required="required" @endif>
                                            @foreach($players as $player)
                                                <option value="{{ $player['id'] }}" @if($team['players'][$i]['id'] == $player['id']) selected @endif >{{ $player['name'] }} ({{ $player['cost'] }} Credits)</option>
                                            @endforeach
                                        </select>
                                    </div>
                            @endfor
                            <div class="form-group text-right">
                                {!! Form::submit('Update Draft',['class' => 'btn btn-primary form control']) !!}
                            </div>
                                {!! Form::close() !!}
                        </div>
                    </div>
                @else
                    <div class="panel panel-primary">
                        <div class="panel-heading">Draft Closed</div>
                        <div class="panel-body">
                            This draft is currently closed.
                        </div>
                    </div>
                @endif
            </div>
    </div>
@endsection

@section('footer')
    <script language="javascript">
        $('select').on('change', function() {
            HandleDropdowns($(this));
        });

        function HandleDropdowns(element) {
            var $element = element;
            var value = $element.val();

            $.each($('select').not($element), function() { //loop all remaining select elements
                var subValue = $(this).val();
                if (subValue === value) { // if value is same reset
                    $(this).val('');
                    console.log('resetting ' + $(this).attr('id')); // demo purpose
                }
            });
        }
    </script>
@endsection