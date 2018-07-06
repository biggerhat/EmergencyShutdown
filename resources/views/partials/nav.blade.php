<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="/images/logosmall.png" class="img-responsive"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!-- <li><a href="/articles">Articles</a></li> -->
                <li><a href="/tools">Tools</a></li>
                <li><a href="/hof">Hall of Fame</a></li>
                <li><a href="/kos">King of Servers</a></li>
                <!-- <li><a href="/fantasy">Fantasy Draft</a></li> -->
                @if ($stream_live != 0)
                    <li><a href="/streams">Streams <span class="badge">{{ $stream_live }}</span></a></li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('auth/login') }}">Login</a></li>
                    <li><a href="{{ url('auth/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('auth/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>