<!DOCTYPE html>
<html lang="en">

<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BootZard - Bootstrap Wizard Template</title>

  <!-- CSS -->
  <link rel="stylesheet" href="dev2/css/font-family-roboto.css">
  <link rel="stylesheet" href="dev2/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="dev2/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="dev2/css/form-elements.css">
  <link rel="stylesheet" href="dev2/css/style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Favicon and touch icons -->
  <link rel="shortcut icon" href="dev1/images/my_favicon_1.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="dev2/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="dev2/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="dev2/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="dev2/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>

  <!-- Top menu -->
  <nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!--<a class="navbar-brand" href="index.html"> Bootstrap Wizard Template</a>-->
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="top-navbar-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <span class="li-text">
            Follow us @:
            </span>
            <span class="li-social">
              <a href="https://www.facebook.com/pages/Azmindcom/196582707093191" target="_blank"><i class="fa fa-facebook"></i></a>
              <a href="https://twitter.com/anli_zaimi" target="_blank"><i class="fa fa-twitter"></i></a>
              <a href="https://plus.google.com/+AnliZaimi_azmind" target="_blank"><i class="fa fa-google-plus"></i></a>
              <a href="https://github.com/AZMIND" target="_blank"><i class="fa fa-github"></i></a>
            </span>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Top content -->
  <div class="top-content">
    <div class="container">

      <div class="row">
        <div class="col-sm-8 col-sm-offset-2 text">
          <h1>Login </h1>
          <div class="description">
            <!-- <p>
            This is a free responsive Bootstrap form wizard.
            Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!
          </p>-->
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
        <form role="form" action="{{ url('/login') }}" method="post" class="f1">
      {{ csrf_field() }}
          <h3>Login To Our Platform</h3>
          <p>Sign in to start your session</p>

          <fieldset>


            <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
              <label class="sr-only" for="login">Email or Phone</label>
              <input type="text" name="login" value="{{ old('login') }}" placeholder="Email or phone.." class="f1-phone-no form-control" id="f1-phone-no">
              @if ($errors->has('login'))
              <span class="help-block">
                <strong>{{ $errors->first('login') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label class="sr-only" for="password">password</label>
              <input type="password" name="password"  placeholder="password..." class="f1-password form-control" id="f1-password">
              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" name="remember"> Remember Me
              </label>
            </div>
            <div class="f1-buttons">
              <button type="submit" class="btn btn-submit">Login</button>
              <a href="{{ url('/register') }}" class="btn btn-info" role="button">Register</a><br><br>
              <p>Forgot password?<p>
                <a href="{{ url('/password/reset') }}" >click here</a><br>
              </div>
            </fieldset>



          </form>
        </div>
      </div>

    </div>
  </div>


  <!-- Javascript -->
  <script src="dev2/js/jquery-1.11.1.min.js"></script>
  <script src="dev2/bootstrap/js/bootstrap.min.js"></script>
  <script src="dev2/js/jquery.backstretch.min.js"></script>
  <script src="dev2/js/retina-1.1.0.min.js"></script>
  <script src="dev2/js/scripts.js"></script>
  <script>
      window.Laravel = <?php echo json_encode([
          'csrfToken' => csrf_token(),
      ]); ?>
  </script>


  <!--[if lt IE 10]>
  <script src="dev2/js/placeholder.js"></script>
  <![endif]-->

</body>

</html>
