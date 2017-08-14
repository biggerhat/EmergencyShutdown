@extends('main')
@section('title')
    - Webminster - Netrunner Sets
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('onr.partials.nav')
        </div>
        <div class="col-md-9 col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Netrunner Sets</div>
                    <div class="panel-body">
                        <div class="col-sm-12 col-md-6 col-xs-12">
                            <div class="thumbnail">
                                <img src="/images/onr/logo_netrunner.gif" alt="Netrunner" class="img-responsive">
                                <div class="caption">
                                    <h3>Netrunner Base Set</h3>
                                    <p>
                                        374 Cards Total (55 Rares, 66 Uncommons, 44 Commons, 22 Vitals)<br/>
                                        187 Corp Cards (33 Agenda, 60 ICE, 27 Operations, 41 Nodes, 26 Upgrades)<br/>
                                        187 Runner Cards (75 Programs, 43 Preps, 40 Resources, 29 Hardware)
                                    </p>
                                    <p class="text-right"><a href="/webminster/sets/base" class="btn btn-primary" role="button">View Set</a></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
@endsection
