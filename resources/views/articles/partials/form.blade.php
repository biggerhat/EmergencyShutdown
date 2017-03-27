<div class="form-group">
  {!! Form::label('title','Title:') !!}
  {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('summary','Summary:') !!}
  {!! Form::text('summary', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('body','Body:') !!}
  {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('published_at','Publish On:') !!}
  {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id'=> 'tag_list', 'class'=> 'form-control', 'multiple']) !!}
</div>
<div class="form-group text-right">
  {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form control']) !!}
</div>

@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder: 'Select a Tag'
        });
    </script>
@endsection