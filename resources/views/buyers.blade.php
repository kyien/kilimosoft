@extends('layouts.layout')

@section('contents')

<div class="container page-content">





      <div class="grid">




        <div class="row cells12">


                          <div class="cell"></div>
                          <div class="cell colspan10">

                                <div class="register-form padding20 block-shadow">

<form action="{{route('buyer.create')}}" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
            <h1 class="text-light">Register to our service</h1>
            <hr class="thin">
            <br>
            <div class="input-control text full-size{{ $errors->has('firstname') ? ' has-error' : '' }}" data-role="input">
                <label for="name">Firstname:</label>
                <input style="padding-right: 37px;" name="firstname" id="firstname" type="text" value="{{ old('firstname') }}">
                @if($errors->has('firstname'))
                <span class="informer fg-red">
                  <strong>{{ $errors->first('firstname') }}</strong>
                </span>
                @endif
            </div>

  <br><br><br>
            <div class="input-control text full-size{{ $errors->has('lastname') ? ' has-error' : '' }}" data-role="input">
                <label for="">LastName:</label>
                <input style="padding-right: 37px;" name="lastname" id="lastname" type="text" value="{{ old('lastname') }}">
                @if ($errors->has('lastname'))
                <span class="informer fg-red">
                  <strong>{{ $errors->first('lastname') }}</strong>
                </span>
                @endif
            </div>
                <br>  <br><br>
                <div class="input-control text full-size{{ $errors->has('phone') ? ' has-error' : '' }}" data-role="input">
                    <label for="">Phone No:</label>
                    <input style="padding-right: 37px;" name="phone" id="phone" type="text" value="{{ old('phone') }}">
                    @if ($errors->has('phone'))
                    <span class="informer fg-red">
                      <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif
                </div>
                    <br>  <br><br>
                    <div class="input-control text full-size{{ $errors->has('email') ? ' has-error' : '' }}" data-role="input">
                        <label for="">Email:</label>
                        <input style="padding-right: 37px;" name="email" id="email" type="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <span class="informer fg-red">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                        <br>  <br><br>
            <div class="input-control text full-size{{ $errors->has('location') ? ' has-error' : '' }}" data-role="input">
                <label for="">Location:</label>
                <input style="padding-right: 37px;" name="location" id="location" type="text" value="{{ old('location') }}">
                @if ($errors->has('location'))
                <span class="informer fg-red">
                  <strong>{{ $errors->first('location') }}</strong>
                </span>
                @endif
            </div>
                <br>  <br><br>
            <div class="input-control text full-size {{ $errors->has('cropsofinterest') ? ' has-error' : '' }}" data-role="input">
                <label for="">Crop of Interest:</label>
                <select multiple="multiple" name="produce_id[]">
                         @foreach($produces as $produce)
                         <option value="{{$produce->id}}">{{$produce->name}}</option>
                         @endforeach
                </select>                @if ($errors->has('cropsofinterest'))
                <span class="informer fg-red">
                  <strong>{{ $errors->first('cropsofinterest') }}</strong>
                </span>
                @endif
            </div>
                <br><br><br>
                <br>
            <br>
            <br>
            <div class="form-actions">
                <button type="submit" class="button primary">Register</button>

            </div>
        </form>
      </div>
    </div>
</div>
</div>
</div>

@stop
