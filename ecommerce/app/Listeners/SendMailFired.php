<?php

namespace App\Listeners;
use App\Models\User;
use App\Events\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
 //Extra Second Method.... working on Simple Mail Method
class SendMailFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)   //Extra Second Method ...working on Simple Mail Method
    {
        $user=User::find($event->userId)->toArray();
        //  dd($user);
        Mail::send('eventMail',$user,function($message) use ($user){
            $message->to($user['email']);
            $message->subject('event testing');
        });
         //Extra Second Method.... working on Simple Mail Method
    }
}
