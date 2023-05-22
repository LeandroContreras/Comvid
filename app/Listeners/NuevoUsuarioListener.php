<?php

namespace App\Listeners;

use App\User;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\UsuarioNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NuevoUsuarioListener
{
    public $user;
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
        // //User::all()
        // ->except($user->id)
        // ->each(function(User $usuario) use ($user){
        //     $usuario->notify(New UsuarioNotification($user));
        // });
        User::all()
            ->except($event->user->id)
            ->each(function(User $usuario) use ($event){
                if ($event->user instanceof User) {
                    Notification::send($usuario, new UsuarioNotification($event->user));
                }
            //sNotification::send($users, new InvoicePaid($invoice))
        });
    }
}
