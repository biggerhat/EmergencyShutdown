
          @extends('main')
          @section('content')
            <div class="content">
                <div class="title">About {{ $data['fullname'] }}<br />{{$data['email']}}</div>
                <a href="/">Back to Home!</a>
            </div>
          @endsection
