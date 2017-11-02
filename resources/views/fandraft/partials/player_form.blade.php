<div class="form-group">
    {!! Form::label('name','Player Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('aka','Player Aliases:') !!}
    {!! Form::text('aka', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('profile','Profile:') !!}
    {!! Form::textarea('profile', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('cost','Player Cost:') !!}
    {!! Form::text('cost', null, ['class' => 'form-control']) !!}
</div><div class="form-group">
    {!! Form::label('score','Final Score:') !!}
    {!! Form::text('score', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group text-right">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form control']) !!}
</div>