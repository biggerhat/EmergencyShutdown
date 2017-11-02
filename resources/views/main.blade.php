<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>EmergencyShutdown.Net @yield('title')</title>

    <!-- Bootstrap -->
    <link href="/css/select2.min.css" rel="stylesheet" />
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-custom.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('header')
  </head>
  <body>
      @include('partials.nav')
    <div class="container main-contain">
      @include('flash::message')

      @yield('content')
    </div>

  </div>

      <footer class="footer">
        <div class="container navbar-default">
          <p class="foot foot-nav"><a href="/about">About</a><a href="http://www.patreon.com/emergencyshutdown" target="neww">Donate</a><a href="https://twitter.com/emrgncyshutdown" target="_twitter">Twitter</a></p>
        </div>
      </footer>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    <script>
        $('#flash-overlay-modal').modal();
    </script>
    <script src="/js/select2.min.js"></script>

    @yield('footer')
  </body>
</html>
