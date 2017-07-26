<div class="form-group">
    {!! Form::label('name','Ballot Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description','Ballot Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('nominee_list', 'Nominees:') !!}
    {!! Form::select('nominee_list[]', $nominees, null, ['id'=> 'nominee_list', 'class'=> 'form-control', 'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::label('closed', 'Ballot Status:') !!}
    {!! Form::select('closed', [
        '0' => 'Open',
        '1' => 'Closed']) !!}
</div>
<div class="form-group text-right">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form control']) !!}
</div>

@section('footer')
    <script>
        $('#nominee_list').select2({
            placeholder: 'Select a Nominee'
        });
    </script>
@endsection