<div class="list-group table-of-contents">
    <a class="list-group-item" href="/webminster">Webminster Home</a>
    <a class="list-group-item" href="/webminster/search">Search Card Database</a>
    <a class="list-group-item" href="/webminster/sets">Cards by Set</a>
    <a class="list-group-item" href="/webminster/rules">Netrunner Rules</a>
    <a class="list-group-item" href="/webminster/decklists">Netrunner Decklists</a>
</div>
{!! Form::open(['url' => 'webminster/quicksearch']) !!}
    <div class="form-group">
        {!! Form::text('title', null, ['placeholder' => 'Quick Search','class' => 'form-control']) !!}
    </div>
{!! Form::close() !!}