<?php

namespace Magnetic\Planner\Listeners;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Magnetic\Planner\Mail\CsvNotification;
use Illuminate\Support\Facades\Auth;
use Mail;

class EmailAuthenticatedUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {
       
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($email->email)
               ->send(new CsvNotification());
    
    }
}
