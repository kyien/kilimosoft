@extends('layouts.layout')

@section('contents')

<div class="container page-content">





      <div class="grid">




        <div class="row cells12">


                          <div class="cell"></div>
                          <div class="cell colspan10">

                                <div class="register-form padding20 block-shadow">

<form  method="post">
              {{csrf_field()}}
            <h1 class="text-light">Search Groups by crops</h1>
            <hr class="thin">
            <br>


    <div class="input-control select">
        <select>
          <option value="" disabled selected></option>
          @foreach($grouproduces->produces as $produce)
         <option value="{{$produce->id}}">{{$produce->name}}</option>
          @endforeach
        </select>
    </div>



        </form>
      </div>
    </div>
</div>
</div>
</div>

@stop
