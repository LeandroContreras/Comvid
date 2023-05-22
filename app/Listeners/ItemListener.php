<?php

namespace App\Listeners;

use App\User;
use App\Notifications\ItemNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class ItemListener
{
    public $item;
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        User::all()
            ->except($event->item->user_id)
            ->each(function(User $user) use($event){
                    Notification::send($user, new ItemNotification($event->item));
            });
    }
}
