<?php

namespace App\Listeners;

use App\Events\CacheBuild;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;


class CacheBuildEmailNotificationToAdmin
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
     * @param  CacheBuild  $event
     * @return void
     */
    public function handle(CacheBuild $event)
    {
        //

        $details = $event->data;
        Mail::send('cache_email', ['details' => $details], function($message){
            $message->to('engineerhiteshahuja@gmail.com')->subject('Cache Build Process Finished Successfully');
            $message->from('abhinavsbbgi@gmail.com');
        });
    }
}
