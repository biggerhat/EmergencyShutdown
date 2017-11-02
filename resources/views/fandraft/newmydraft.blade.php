@extends('main')

@section('content')
        <div class="row">
            <div class="col-md-3">
                @include('fandraft.partials.nav')
            </div>
            <div class="col-md-9 col-sm-12">
                @if($draft['open'] == '0')
                    <div class="panel panel-primary">
                        <div class="panel-heading">Draft Rules</div>
                        <div class="panel-body">
                            <label for="total_cost">Total Cost:</label><span id="total_cost" class="info"> {!! $draft['creds'] !!} Credits</span><br />
                            <label for="must_spend">Must Spend All Credits:</label><span id="must_spend" class="info">
                                @if($draft['all_creds'] == '0')
                                    No
                                @else
                                    Yes
                                @endif
                            </span><br />
                            <label for="total_cost">Team Limit:</label><span id="total_cost" class="info"> {!! $draft['team_lim'] !!} Players</span><br />
                            <label for="must_team">Must Use Whole Team:</label><span id="must_team" class="info">
                                @if($draft['all_team'] == '0')
                                    No
                                @else
                                    Yes
                                @endif
                            </span><br />
                            <label for="must_team">Write-ins Allowed:</label><span id="must_team" class="info">
                                @if($draft['writeins'] == '0')
                                    No
                                @else
                                    Yes <br />
                                    <a class="btn btn-primary" href="/fantasy/writein" role="button">Add Write-in</a>
                                @endif
                            </span><br />
                        </div>

                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">My Draft</div>
                        <div class="panel-body">
                            @include('errors.list')
                            @if($team)

                            @else
                                {!! Form::open(['url' => 'fantasy/my_draft']) !!}
                                @include('fandraft.partials.team_form', ['submitButtonText' => 'Create Team'])
                                {!! Form::close() !!}
                            @endif
                        </div>

                    </div>
                @else
                    <div class="panel panel-primary">
                        <div class="panel-heading">Draft Closed</div>
                        <div class="panel-body">
                            This draft is currently closed.
                        </div>
                    </div>
                @endif
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