@extends('main')
@section('title')
    - King of Servers 2017 - Free Agents
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('kos.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">King of Servers Free Agents</div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td style="line-height: 40px">Name (Alias)</td>
                            <td style="line-height: 40px">Preferred Corp</td>
                            <td style="line-height: 40px">Preferred Runner</td>
                            <td style="line-height: 40px"></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($agents as $agent)
                            <tr>
                                <td style="line-height: 40px">{{ $agent['name'] }} ({!! $agent['aka'] !!})</td>
                                <td style="line-height: 40px">{{ $agent['pref_corp'] }}</td>
                                <td style="line-height: 40px">{{ $agent['pref_runn'] }}</td>
                                <td style="line-height: 40px; text-align: center;"><a class="btn btn-primary" href="/kos/free_agents/add/{!! $agent['id'] !!}" role="button">Add To Team</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>


        </div>

    </div>


@endsection
