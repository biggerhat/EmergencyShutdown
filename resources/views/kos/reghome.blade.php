@extends('main')
@section('title')
    - King of Servers 2017 - Registration
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('kos.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">King of Servers 2017 - Registration</div>
                <div class="panel-body">
                    <p>If you would like to participate in KoS but do not have a team yet, then you may register as a Free Agent and incomplete teams can add you.</p>
                    <p class="text-center"><a class="btn btn-primary" href="/kos/register/free_agent" role="button">Register as a Free Agent</a></p>
                    <p class="text-center"><h1 class="text-center">- OR -</h1></p>
                    <p>If you have a team of at least two people you'd like to register, you can create a team and add the names of your team members. You can also pick up Free Agents if your team is not full.</p>
                    <p class="text-center"><a class="btn btn-primary" href="/kos/register/team" role="button">Register a Team</a></p>


                </div>
            </div>

        </div>

    </div>
@endsection
