<!DOCTYPE html>
<html lang="en">

<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register::Soft farm</title>

  <!-- CSS -->
  <link rel="stylesheet" href="{{asset('dev2/css/font-family-roboto.css')}}">
  <link rel="stylesheet" href="{{asset('dev2/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('dev2/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('dev2/css/form-elements.css')}}">
  <link rel="stylesheet" href="{{asset('dev2/css/style.css')}}">

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
          <h1>Register at KilimoSoft </h1>
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
        <form role="form" action="{{ url('/register') }}" method="post" class="f1">
        {{ csrf_field()}}
          <h3>Register To Our Platform</h3>
          <p>Fill in the form to get instant access</p>
          <div class="f1-steps">
            <div class="f1-progress">
              <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
            </div>
            <div class="f1-step active">
              <div class="f1-step-icon"><i class="fa fa-user"></i></div>
              <p>about</p>
            </div>

             <div class="f1-step">
              <div class="f1-step-icon"><i class="fa fa-globe"></i></div>
              <p>location</p>
            </div>
            <div class="f1-step">
              <div class="f1-step-icon"><i class="fa fa-lock"></i></div>
              <p>account</p>
            </div>
          </div>

          <fieldset>
            <h4>Tell us who you are:</h4>
            <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
              <label class="sr-only" for="firstName">First name</label>
              <input type="text" name="firstName" value="{{ old('firstName') }}" placeholder="First name..." class="f1-first-name form-control" id="f1-first-name">
              @if ($errors->has('firstName'))
              <span class="help-block">
                <strong>{{ $errors->first('firstName') }}</strong>
              </span>

              @endif
            </div>
            <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
              <label class="sr-only" for="lastName">Last name</label>
              <input type="text" name="lastName" value="{{ old('lastName') }}" placeholder="Last Name..." class="f1-last-name form-control" id="f1-last-name">
              @if ($errors->has('lastName'))
              <span class="help-block">
                <strong>{{ $errors->first('lastName') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('phoneNo') ? ' has-error' : '' }}">
              <label class="sr-only" for="phoneNo">Phone No</label>
              <input type="text" name="phoneNo" value="{{ old('phoneNo') }}" placeholder="phone (+254 7xx xxx xxx)..." class="f1-phone-no form-control" id="f1-phone-no">
              @if ($errors->has('phoneNo'))
              <span class="help-block">
                <strong>{{ $errors->first('phoneNo') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
              <label class="sr-only" for="username">Username</label>
              <input type="text" name="username" value="{{ old('username') }}" placeholder="Username..." class="f1-username form-control" id="f1-username">
              @if ($errors->has('username'))
              <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
              </span>
              @endif
            </div>
            <div class="f1-buttons">
            <!--  <a href="{{ url('/login') }}" class="btn btn-info" role="button">Login</a>-->
              <button type="button" class="btn btn-next">Next</button>
            </div>
          </fieldset>

          <fieldset>
            <h4>Your location:</h4>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label class="sr-only" for="email">E-Mail</label>
              <input type="text" name="email" value="{{ old('email') }}" placeholder="Email..." class="f1-email form-control" id="f1-email">
              @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
            <!--  <label class="sr-only" for="location">Location</label>-->

              <label for="location">Location by county (select one):</label>
              <!--<input type="text" name="location" value="{{ old('location') }}" placeholder="location..." class="f1-facebook form-control" id="f1-location">-->

     <select class="form-control" id="location" value="{{ old('location') }}" name="location">

        <option>Nairobi</option>
        <option>Mombasa</option>
        <option>Lamu</option>
        <option>Kilifi</option>
        <option>Kwale</option>
        <option>Tana River</option>
        <option>Taita Taveta</option>
        <option>Garissa</option>
        <option>Mandera</option>
        <option>Wajir</option>
        <option>Marsabit</option>
        <option>Isiolo</option><option>Kitui</option><option>Makueni</option><option>Machakos</option><option>Meru</option>
        <option>Tharaka Nithi</option><option>Embu</option><option>Nyeri</option><option>Nyandarua</option><option>Murang'a</option>
        <option>Kiambu</option><option>Nakuru</option><option>Laikipia</option><option>Samburu</option><option>Kajiado</option>
        <option>Narok</option><option>Bomet</option><option>Kericho</option><option>Baringo</option><option>Uasin Gishu</option>
        <option>Nandi</option><option>Elgeyo Marakwet</option><option>West Pokot</option><option>Turkana</option><option>Trans Nzoia</option>
        <option>Bungoma</option><option>Busia</option><option>Vihiga</option><option>Kakamega</option><option>Kisumu</option><option>Siaya</option>
        <option>Homa Bay</option><option>Kisii</option><option>Nyamira</option><option>Migori</option>
      </select>
              @if ($errors->has('location'))
         <span class="help-block">
           <strong>{{ $errors->first('location') }}</strong>
         </span>
         @endif
            </div>

            <div class="f1-buttons">
              <button type="button" class="btn btn-previous">Previous</button>
              <button type="button" class="btn btn-next">Next</button>
            </div>
          </fieldset>

          <fieldset>
            <h4>Set up your password:</h4>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label class="sr-only" for="password">password</label>
              <input type="password" name="password"  placeholder="password..." class="f1-password form-control" id="f1-password">
              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <label class="sr-only" for="password_confirmation">Confirm Password</label>
              <input type="password" name="password_confirmation"  placeholder="Confirm password..." class="f1-password-confirm form-control" id="f1-password-confirm">
              @if ($errors->has('password_confirmation'))
              <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
              </span>
              @endif
            </div>

        <div class="f1-buttons">
          <button type="button" class="btn btn-previous">Previous</button>
          <button type="submit" class="btn btn-submit">Register</button>
        </div>
      </fieldset>

    </form>
  </div>
</div>

</div>
</div>


<!-- Javascript -->
<script src="{{asset('dev2/js/jquery-1.11.1.min.js')}}"></script>
`<script src="{{asset('dev2/bootstrap/js/bootstrap.min.js')}}"></script>`
<script src="{{asset('dev2/js/jquery.backstretch.min.js')}}"></script>
<script src="{{asset('dev2/js/retina-1.1.0.min.js')}}"></script>
<script src="{{asset('dev2/js/scripts.js')}}"></script>


<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
</body>

</html>
