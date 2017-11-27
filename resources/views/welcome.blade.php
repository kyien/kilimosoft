@extends('layouts.layout')

@section('contents')
 
<div class="container page-content"  >
  <div class="carousel fixed" data-width="100%" data-role="carousel" data-height="500" data-control-next="<span class='mif-chevron-right'></span>" data-control-prev="<span class='mif-chevron-left'></span>" data-effect="slowdown">

    <div class="slide"><img src="{{asset('dev1/images/pumkin.jpg')}}" data-role="fitImage" data-format="fill"></div>
    <div class="slide"><img src="{{asset('dev1/images/Organic.jpg')}}" data-role="fitImage" data-format="fill"></div>
    <div class="slide"><img src="{{asset('dev1/images/flower.jpg')}}" data-role="fitImage" data-format="fill"></div>
    <div class="slide"><img src="{{asset('dev1/images/Organic.jpg')}}" data-role="fitImage" data-format="fill"></div>
    <div class="slide"><img src="{{asset('dev1/images/dairy.jpg')}}" data-role="fitImage" data-format="fill"></div>

  </div>
  <br>                                <br>
  <br>
  <div class="grid">
    <div class="row cells3">

      <div class="cell">

        <div class="panel success">
          <div class="heading">
            <span class="icon mif-user"></span>

            <span class="title">Join platform</span>
          </div>
          <div class="content padding10" style="height: 220px; width: 100%;">
            Register to our platform and get the oportunity to enjoy the benefits as a cooperative member or a bulk produce buyer.
            <a style="opacity: 1; position: absolute; display: block; top: 130px; left: 100px;" class="actor button success" data-position="130,300" href="{{ url('/register') }}" >Join now</a>
          </div>
        </div>


      </div>
      <div class="cell">
        <div class="panel success">
          <div class="heading">
            <span class="icon mif-users"></span>
            <span class="title">Join farmers group</span>
          </div>
          <div class="content padding10" style="height: 220px; width: 100%;">
            Join our farmers Platform and enjoy maximum benefit for your produce,Market information and the right crop information
            <a style="opacity: 1; position: absolute; display: block; top: 130px; left: 100px;" class="actor button success" data-position="130,300" href="{{ url('/login') }}" >Join now</a>
          </div>

        </div>


      </div>
      <div class="cell">

        <div class="panel success">
          <div class="heading">
            <span class="icon mif-cart"></span>
            <span class="title">Register as Buyer</span>
          </div>
          <div class="content padding10" style="height: 220px; width: 100%;">
            Register to our platform and get the best prices and varieties of farm produce from hundreds of cooperatives registered in our platform
            <a style="opacity: 1; position: absolute; display: block; top: 130px; left: 100px;" class="actor button success" data-position="130,300" href="{{route('buyer.register')}}">Register</a>
          </div>


        </div>


      </div>



    </div>

    <div class="grid">
      <div class="row cells12">
        <div class="cell">  </div>
        <div class="cell colspan10">  <div style="height: 220px; width: 100%;" class="presenter" data-role="presenter" data-height="220" data-easing="swing" data-timeout="3000">
          <div class="scene">
            <div style="display: none;" class="act bg-green fg-white">
              <img src="{{asset('dev1/images/kilimologo.png')}}" class="actor" data-position="10,10" style="height: 200px; opacity: 1; position: absolute; display: block; top: 10px; left: 10px;">
              <h1 style="opacity: 1; position: absolute; display: block; top: 10px; left: 250px;" class="actor" data-position="10,250">Why Join us</h1>
              <p style="opacity: 1; position: absolute; display: block; left: 250px; top: 70px;" class="actor" data-position="70,250">Metro UI CSS developed with the advice of Microsoft to build the user interface and include: general styles, grid, layouts, typography, 20+ components, 300+ built-in icons.</p>
              <p style="opacity: 1; position: absolute; display: block; top: 130px; left: 250px;" class="actor" data-position="130,250">Metro UI CSS build with {LESS}. Metro UI CSS is open source and has MIT licensing model.</p>
            </div>
            <div style="display: none;" class="act bg-steel fg-white">
              <img src="{{asset('dev1/images/kilimologo.png')}}" class="actor" data-position="10,10" style="height: 200px; opacity: 1; position: absolute; display: block; top: 10px; left: 10px;">
              <h1 style="opacity: 1; position: absolute; display: block; top: 10px; left: 270px;" class="actor" data-position="10,270">Our products</h1>
              <p style="opacity: 1; position: absolute; display: block; left: 270px; top: 60px;" class="actor" data-position="60,270">Metro UI CSS is a BizSpark Startup. Microsoft BizSpark is a global program that helps software startups succeed by giving them access to software development tools, connecting them with key industry players, and providing marketing visibility.</p>
              <p style="opacity: 1; position: absolute; display: block; left: 270px; top: 120px;" class="actor" data-position="120,270">BizSpark provides free software, support, and visibility to help startups succeed. Join BizSpark and become part of a global community that has over 50,000 members in 100+ countries.</p>
              <a style="opacity: 1; position: absolute; display: block; left: 270px; top: 170px;" class="actor button primary" data-position="170,270" href="{{url('/register')}}">Join Kilimosoft</a>
            </div>
            <div style="display: none;" class="act bg-darkCyan fg-white">
              <img src="{{asset('dev1/images/kilimologo.png')}}" class="actor" data-position="10,10" style="height: 200px; opacity: 1; position: absolute; display: block; top: 10px; left: 10px;">
              <h1 style="opacity: 1; position: absolute; display: block; top: 10px; left: 300px;" class="actor" data-position="10,300">Outstanding benefits</h1>
              <p style="opacity: 1; position: absolute; display: block; left: 300px; top: 60px;" class="actor" data-position="60,300">Thanks to the company JetBrains for supporting the project in the form of a license for a great product PhpStorm.</p>
              <a style="opacity: 1; position: absolute; display: block; top: 130px; left: 300px;" class="actor button success" data-position="130,300" href="{{url('/login')}}">Register as Buyer!</a>
            </div>
          </div>
        </div></div>
        <div class="cell">  </div>

      </div>
    </div>

  </div>
</div>

@endsection
