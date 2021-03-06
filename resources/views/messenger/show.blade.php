@extends('layouts.message_layout')

@section('content')
    <div class="col-md-6">
        <h1>{{ $thread->subject }}</h1>

        @foreach($thread->messages as $message)
            <div class="media">
                <a class="pull-left" href="#">
        <img src="{{Storage::url('/users_avatars/'.$user->avatar)}}" alt="{{ $message->user->name }}" class="img-circle" style="height:50px;width:50px">
                </a>
                <div class="media-body">
                    <h5 class="media-heading">{{ $message->user->name }}</h5>
                    <p>{{ $message->body }}</p>
                    <div class="text-muted"><small>Posted {{ $message->created_at->diffForHumans() }}</small></div>
                </div>
            </div>
        @endforeach

        <h2>Add a new message</h2>
        {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
        <!-- Message Form Input -->
        <div class="form-group">
            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
        </div>

        @if($users->count() > 0)
        <div class="checkbox">
            @foreach($users as $user)
                <label title="{{ $user->username }}"><input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->username }}</label>
            @endforeach
        </div>
        @endif

        <!-- Submit Form Input -->
        <div class="form-group">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop
