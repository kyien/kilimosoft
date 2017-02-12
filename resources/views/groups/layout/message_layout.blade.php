<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Packages</title>
    <link rel="shortcut icon" href="{{asset('dev1/images/my_favicon_1.png')}}">
    <!-- Bootstrap -->
       <link rel="stylesheet" href="{{asset('css/bootstrap_3_3_3_4.min.css')}}">
         <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    body {
      padding-top: 55px;
    }
    </style>


  </head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{URL::to('/home')}}">Home</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{route('messages')}}">Messages @include('messenger.unread-count')</a></li>
                <li><a href="{{route('messages.create')}}">New Message</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
    <div class="container">
        @yield('content')
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="{{asset('js/jquery_2_2_4.min.js')}}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{asset('js/boostrap_3_3_4.min.js')}}"></script>

  </body>
</html>
