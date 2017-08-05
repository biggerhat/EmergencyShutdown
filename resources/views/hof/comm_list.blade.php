@extends('admin.main')
@section('title')
    - Android: Netrunner Hall of Fame - Committee Key List
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Committee Members Keys</div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td style="line-height: 40px">Name</td>
                                <td style="line-height: 40px">Key</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($commMembers as $member)
                            <tr>
                                <td style="line-height: 40px">{{ $member->name }}</td>
                                <td style="line-height: 40px">{{ $member->key }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
