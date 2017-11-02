<div class="form-group">
    {!! Form::label('name','Team Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
@for ($i = 0; $i < $draft['team_lim']; $i++)
    <div class="form-group">

        {!! Form::label('players', 'Player:') !!}
        <select id="players" class="form-control" name="players[]" @if($draft['all_team'] == '1') required="required" @endif>
            <option value=""></option>
            @foreach($players as $player)
                <option value="{{ $player['id'] }}">{{ $player['name'] }} ({{ $player['cost'] }} Credits)</option>
        @endforeach
        </select>
    </div>
@endfor
<div class="form-group text-right">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form control']) !!}
</div>