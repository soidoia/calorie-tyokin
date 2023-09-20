<?php

namespace App\Http\Controllers;

use Socialite;

class LineLoginController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('line')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('line')->user();
        
    }
}
