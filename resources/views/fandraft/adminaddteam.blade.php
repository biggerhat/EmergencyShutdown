@extends('main')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('fandraft.partials.admin')
        </div>
        <div class="col-md-9 col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Manually Add a Team</div>
                    <div class="panel-body">
                        @include('errors.list')
                            {!! Form::open(['url' => 'fantasy/admin_add_team']) !!}
                            @include('fandraft.partials.team_form', ['submitButtonText' => 'Create Team'])
                            {!! Form::close() !!}
                    </div>

                </div>
        </div>
    </div>
@endsection

@section('footer')
    <script language="javascript">
        $('select').on('change', function() {
            HandleDropdowns($(this));
        });

        function HandleDropdowns(element) {
            var $element = element;
            var value = $element.val();

            $.each($('select').not($element), function() { //loop all remaining select elements
                var subValue = $(this).val();
                if (subValue === value) { // if value is same reset
                    $(this).val('');
                    console.log('resetting ' + $(this).attr('id')); // demo purpose
                }
            });
        }
    </script>
@endsection