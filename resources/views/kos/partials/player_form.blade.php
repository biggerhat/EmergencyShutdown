<div class="form-group">
    {!! Form::label('name','Player Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('aka','Alias (Stimhack/Jinteki name):') !!}
    {!! Form::text('aka', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('pref_corp','Preferred Corp:') !!}
    {!! Form::select('pref_corp', [
    'Any' => 'Any',
    'Haas-Bioroid' => 'Haas-Bioroid',
    'Jinteki' => 'Jinteki',
    'NBN' => 'NBN',
    'Weyland' => 'Weyland'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('pref_runn','Preferred Runner:') !!}
    {!! Form::select('pref_runn', [
    'Any' => 'Any',
    'Anarch' => 'Anarch',
    'Criminal' => 'Criminal',
    'Shaper' => 'Shaper',
    'Mini-Faction' => 'Mini-Faction (But Why?)'], null, ['class' => 'form-control']) !!}
</div>


<div class="form-group text-right">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form control']) !!}
</div>