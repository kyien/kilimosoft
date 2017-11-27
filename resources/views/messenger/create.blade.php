@extends('layouts.message_layout')

@section('content')
<h1>Create a new message</h1>
{!! Form::open(['route' => 'messages.store']) !!}
<div class="col-md-6">
    <!-- Subject Form Input -->
    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
        {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
        {!! Form::text('subject', null, ['class' => 'form-control']) !!}
        @if ($errors->has('subject'))
        <span class="help-block">
          <strong>{{ $errors->first('subject') }}</strong>
        </span>
        @endif
    </div>

    <!-- Message Form Input -->
    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
        {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
        {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
        @if ($errors->has('message'))
        <span class="help-block">
          <strong>{{ $errors->first('message') }}</strong>
        </span>
        @endif
    </div>

    @if($users->count() > 0)
      <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
    <div class="checkbox">
        @foreach($users as $user)
            <label title="{{ $user->username }}"><input type="checkbox" name="recipients[]" value="{{ $user->id }}">{!!$user->username!!}</label>
        @endforeach

    </div>
    @if ($errors->has('recipients'))
    <span class="help-block">
      <strong>{{ $errors->first('recipients') }}</strong>
    </span>
    @endif
  </div>
    @endif

    <!-- Submit Form Input -->
    <div class="form-group">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>
{!! Form::close() !!}
@stop
