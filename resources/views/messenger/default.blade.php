@extends('layouts.message_layout')


@section('content')
    @if (Session::has('error_message'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error_message') }}
        </div>
    @endif
    @if($threads->count() > 0)
        @foreach($threads as $thread)
        <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
        <div class="media alert {{ $class }}">
            <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
            <p>{{ $thread->latestMessage->body}}</p>
            <p><small><strong>Creator:</strong> {{ $thread->creator()->username }}</small></p>
            <p><small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id(),['username']) }}</small></p>
        </div>
        @endforeach
    @else
        <p><h2>Sorry, no new Messages!</h2></p>
    @endif
@stop
