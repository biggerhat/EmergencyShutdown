@extends('main')
@section('title')
    - King of Servers 2017 - Team Login
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('kos.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Turn On/Off King of Servers Registration</div>
                <div class="panel-body">
                    @include('errors.list')
                    {!! Form::open(['url' => 'kos/spags']) !!}
                    <div class="form-group">
                        {!! Form::label('toggle','Change Status:') !!}
                        {!! Form::select('toggle', [
                        '1' => 'Open Registration',
                        '0' => 'Close Registration'], null, ['class' => 'form-control']) !!}
                    </div>


                    <div class="form-group text-right">
                        {!! Form::submit('Change Status',['class' => 'btn btn-primary form control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>


        </div>

    </div>


@endsection
