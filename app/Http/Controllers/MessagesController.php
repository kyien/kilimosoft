<?php

namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Flashy;
use Validator;
use App\Group;
class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($group_id)
    {
        //
        $userAvatar= Auth::user()->avatar;
        $currentUserId = Auth::user()->id;
        // All threads, ignore deleted/archived participants
        $threads = Thread::getAllLatest()->get();
        //dd($threads);
        // All threads that user is participating in
        $group=Group::findOrFail($group_id);
        // $threads = Thread::forUserWithNewMessages($currentUserId)->latest('updated_at')->get();
        return view('groups.messenger.default', compact('threads', 'currentUserId','group'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($group_id)
    {
        //
        $group=Group::findOrFail($group_id);
        // $users = User::where('id', '!=', Auth::id())->get();
        $users=$group->users()->get();
//dd($users);
        return view('groups.messenger.create', compact('users','group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //  dd($request->all());
        $this->validate($request,[
          'subject'=>'required',
          'message' =>'required',
          'recipients'=>'required'
        ]);

      //  dd($request->subject);
        $input = Input::all();
        $thread = Thread::create(
            [
                'subject' => $input['subject'],
            ]
        );
        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $input['message'],
            ]
        );
        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant($input['recipients']);
        }

        Flashy::success('Message sent successfully!');
        return redirect()->back();
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$group_id)
    {
        //
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('messages');
    }
    // show current user in list if not a current participant
            // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();
            // don't show the current user in list
            $group=Group::findOrFail($group_id);
            $userId = Auth::user()->id;
            $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
            $thread->markAsRead($userId);
            return view('messenger.show', compact('thread', 'users','group'));
          }
    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
           $thread = Thread::findOrFail($id);
       } catch (ModelNotFoundException $e) {
           Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
           return redirect('messages');
       }
       $thread->activateAllParticipants();
       // Message
       Message::create(
           [
               'thread_id' => $thread->id,
               'user_id'   => Auth::id(),
               'body'      => Input::get('message'),
           ]
       );
       // Add replier as a participant
       $participant = Participant::firstOrCreate(
           [
               'thread_id' => $thread->id,
               'user_id'   => Auth::user()->id,
           ]
       );
       $participant->last_read = new Carbon;
       $participant->save();
       // Recipients
       if (Input::has('recipients')) {
           $thread->addParticipant(Input::get('recipients'));
       }
       return redirect()->back();

    }


    public function destroy($id)
    {
        //
    }
}
