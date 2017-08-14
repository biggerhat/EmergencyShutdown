@extends('admin.main')
@section('title')
    - Android: Netrunner Hall of Fame - News List
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">News</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td style="line-height: 40px">Title</td>
                            <td style="line-height: 40px"></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($news as $new)
                            <tr>
                                <td style="line-height: 40px">{{ $new->title }}</td>
                                <td style="line-height: 40px; text-align: center;"><a class="btn btn-primary" href="{{ action('HofController@editNews', [ $new->id ]) }}" role="button">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">
        {{ $news->links() }}
    </div>
@endsection
