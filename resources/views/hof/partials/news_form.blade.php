<div class="form-group">
    {!! Form::label('title','News Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('news','News:') !!}
    {!! Form::textarea('news', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group text-right">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form control']) !!}
</div>