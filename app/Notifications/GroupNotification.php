<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class GroupNotification extends Notification
{
    use Queueable;

       public $message;
    public function __construct()
    {
        //
          $this->message=$message;
    }

public function todatabase($notifiable){

  return ([
          'message' => $this->message

      ]);


}
    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [

        ];
    }
}
