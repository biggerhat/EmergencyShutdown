@extends('main')
@section('title')
    - Webminster - Search the Webminster Database
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('onr.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Search the Webminster Database</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['url' => 'webminster/search']) !!}

                    <div class="form-group">
                        {!! Form::label('title','Card Title:') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('side','Side:') !!}
                        {!! Form::select('side', [
                            '' => 'Either',
                            'corp' => 'Corp',
                            'runner' => 'Runner']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('type','Card Type:') !!}
                        {!! Form::select('type', [
                        '' => 'Any',
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
                        {!! Form::label('keywords','Subtype(s):') !!}
                        {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('text','Card Text Contains:') !!}
                        {!! Form::text('text', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('set','Set:') !!}
                        {!! Form::select('set', [
                        '' => 'Any',
                        'base' => 'Base Set',
                        'proteus' => 'Proteus',
                        'classic' => 'Classic']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('rarity','Rarity:') !!}
                        {!! Form::select('rarity', [
                        '' => 'Any',
                        'vital' => 'Vital',
                        'common' => 'Common',
                        'uncommon' => 'Uncommon',
                        'rare' => 'Rare']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('artist','Artist:') !!}
                        {!! Form::text('artist', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group text-right">
                        {!! Form::submit('Search',['class' => 'btn btn-primary form control']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>


        </div>

    </div>


@endsection
