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
                                    <h3>Netrunner Base Set (v1.0)</h3>
                                    <p>
                                        <label for="release">Release Date: </label><span id="release" class="info"> April 26, 1996</span><br/>
                                        <label for="card">374 Cards Total:</label> <span id="card" class="info">55 Rares, 66 Uncommons, 44 Commons, 22 Vitals</span><br/>
                                        <label for="corp">187 Corp Cards:</label> <span id="corp" class="info">33 Agenda, 60 ICE, 27 Operations, 41 Nodes, 26 Upgrades</span><br/>
                                        <label for="runner">187 Runner Cards:</label> <span id="runner" class="info">75 Programs, 43 Preps, 40 Resources, 29 Hardware</span>
                                    </p>
                                    <p class="text-right"><a href="/webminster/sets/base" class="btn btn-primary" role="button">View Set</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xs-12">
                            <div class="thumbnail">
                                <img src="/images/onr/logo_netrunner.gif" alt="Netrunner" class="img-responsive">
                                <div class="caption">
                                    <h3>Proteus Set (v2.1)</h3>
                                    <p>
                                        <label for="release">Release Date: </label><span id="release" class="info"> September 1996</span><br/>
                                        <label for="card">154 Cards Total:</label> <span id="card" class="info"> 44 Rares, 44 Uncommons, 66 Commons</span><br/>
                                        <label for="corp">77 Corp Cards:</label> <span id="corp" class="info">10 Agenda, 35 ICE, 8 Operations, 11 Nodes, 13 Upgrades</span><br/>
                                        <label for="runner">77 Runner Cards:</label> <span id="runner" class="info">23 Programs, 26 Prep, 21 Resources, 7 Hardware</span>
                                    </p>
                                    <p class="text-right"><a href="/webminster/sets/proteus" class="btn btn-primary" role="button">View Set</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xs-12">
                            <div class="thumbnail">
                                <img src="/images/onr/logo_netrunner.gif" alt="Netrunner" class="img-responsive">
                                <div class="caption">
                                    <h3>Classic Set (v2.2)</h3>
                                    <p>
                                        <label for="release">Release Date:</label> <span id="release" class="info"> November 1999</span><br/>
                                        <label for="card">52 Cards Total:</label> <span id="card" class="info">26 Rares, 26 Commons from the (unfinished) Silent Impact set</span><br/>
                                        <label for="corp">26 Corp Cards:</label> <span id="corp" class="info">4 Agenda, 11 ICE, 3 Operations, 3 Nodes, 5 Upgrades</span><br/>
                                        <label for="runner">26 Runner Cards:</label> <span id="runner" class="info">7 Programs, 10 Preps, 4 Resources, 5 Hardware</span>
                                    </p>
                                    <p class="text-right"><a href="/webminster/sets/classic" class="btn btn-primary" role="button">View Set</a></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
@endsection
