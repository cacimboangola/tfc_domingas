<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\ShoppingSession;
use Illuminate\Support\Facades\Auth;

class CreateShoppinSessionWhenUserLoggedIn
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        //
        $data['user_id'] = Auth::user()->id;
        $savedShoppingSession = ShoppingSession::updateOrCreate($data, $data);
        if(Auth::user()->shopping_session_id == null){
            Auth::user()->shopping_session_id = $savedShoppingSession->id;
            Auth::user()->save();
        }

    }
}
