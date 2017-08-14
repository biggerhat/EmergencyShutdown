<div class="form-group">
    {!! Form::label('title','Card Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('side','Side:') !!}
    {!! Form::select('side', [
        'corp' => 'Corp',
        'runner' => 'Runner']) !!}
</div>
<div class="form-group">
    {!! Form::label('type','Card Type:') !!}
    {!! Form::select('type', [
    'agenda' => 'Agenda',
    'ice' => 'Ice',
    'node' => 'Node',
    'operation' => 'Operation',
    'upgrade' => 'Upgrade',
    'hardware' => 'Hardware',
    'prep' => 'Prep',
    'program' => 'Program',
    'resource' => 'Resource']) !!}
</div>
<div class="form-group">
    {!! Form::label('keywords','Keywords/Subtypes:') !!}
    {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('set','Set:') !!}
    {!! Form::select('set', [
    'base' => 'Base Set',
    'proteus' => 'Proteus',
    'classic' => 'Classic']) !!}
</div>
<div class="form-group">
    {!! Form::label('rarity','Rarity:') !!}
    {!! Form::select('rarity', [
    'vital' => 'Vital',
    'common' => 'Common',
    'uncommon' => 'Uncommon',
    'rare' => 'Rare']) !!}
</div>
<div class="form-group">
    {!! Form::label('artist','Artist:') !!}
    {!! Form::text('artist', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('text','Card Text:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('cost','Cost:') !!}
    {!! Form::text('cost', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('memory','Memory:') !!}
    {!! Form::text('memory', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('diff','Difficulty:') !!}
    {!! Form::text('diff', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('agenda','Agenda Points:') !!}
    {!! Form::text('agenda', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('strength','Strength:') !!}
    {!! Form::text('strength', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('trash','Trash Cost:') !!}
    {!! Form::text('trash', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('rulings','Rulings:') !!}
    {!! Form::textarea('rulings', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('errata','Errata:') !!}
    {!! Form::textarea('errata', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('image_upload','Image:') !!}
    {!! Form::file('image_upload', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group text-right">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-primary form control']) !!}
</div>