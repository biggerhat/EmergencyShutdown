<div class="form-group">
    {!! Form::label('name','Player Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('alias','AKA:') !!}
    {!! Form::text('alias', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('standings','Standings Info:') !!}
    {!! Form::textarea('standings', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description','Nomination/Reason:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group text-right">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form control']) !!}
</div>