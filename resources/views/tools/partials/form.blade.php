<div class="form-group">
    {!! Form::label('name','Tool Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description','Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('url','URL:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('external', 'External Link?') !!}
    {!! Form::select('external', [
        '0' => 'No',
        '1' => 'Yes']) !!}
</div>
<div class="form-group text-right">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form control']) !!}
</div>

@section('footer')
@endsection