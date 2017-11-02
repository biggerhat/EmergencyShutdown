<div class="form-group">
    {!! Form::label('name','Draft Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description','Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('scoring','Scoring:') !!}
    {!! Form::textarea('scoring', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('creds','Total Creds To Spend:') !!}
    {!! Form::text('creds', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('all_creds', 'Must Use All Creds?') !!}
    {!! Form::select('all_creds', [
        '0' => 'No',
        '1' => 'Yes']) !!}
</div>
<div class="form-group">
    {!! Form::label('team_lim','Number of Players Per Team:') !!}
    {!! Form::text('team_lim', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('all_team', 'Must Use Every Team Slot?') !!}
    {!! Form::select('all_team', [
        '0' => 'No',
        '1' => 'Yes']) !!}
</div>
<div class="form-group">
    {!! Form::label('writeins', 'Allow Write-ins?') !!}
    {!! Form::select('writeins', [
        '0' => 'No',
        '1' => 'Yes']) !!}
</div>
<div class="form-group">
    {!! Form::label('writein_value','Write-in Value:') !!}
    {!! Form::text('writein_value', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('elite', 'Allow Elite?') !!}
    {!! Form::select('elite', [
        '0' => 'No',
        '1' => 'Yes']) !!}
</div>
<div class="form-group">
    {!! Form::label('open', 'Close Draft') !!}
    {!! Form::select('open', [
        '0' => 'No',
        '1' => 'Yes']) !!}
</div>
<div class="form-group text-right">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form control']) !!}
</div>