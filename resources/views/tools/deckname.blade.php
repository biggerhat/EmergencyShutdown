@extends('main')

@section('title')
     - Deckname Generator
@endsection

@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-6 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Deckname Generator</div>
                <div class="panel-body">
                    <label for="deckname">Your Deckname is:</label>
                    <p class="text-center"><span id="deckname"></span></p>
                    <br />
                    <p class="text-center">
                    <button type="button" class="btn btn-primary" onClick="getDeckname();">Get New Deckname</button>
                    </p>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('footer')
    <script language="JavaScript">
        function getDeckname()
        {
            $.ajax('/api/deckname').then(function (result) { $("#deckname").text(result) })
        }

        $(document).ready(function () {
            getDeckname()
        })

    </script>
@endsection
