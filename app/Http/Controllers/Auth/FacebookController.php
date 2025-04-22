<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->stateless()->user();

        $user = User::updateOrCreate([
            'email' => $facebookUser->getEmail(),
        ], [
            'name' => $facebookUser->getName(),
            'password' => bcrypt('password'), // default password if not using
        ]);

        Auth::login($user, true);

        return redirect('/dashboard');
    }
}

