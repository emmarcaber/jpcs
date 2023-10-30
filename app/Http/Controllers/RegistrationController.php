<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class RegistrationController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        // TODO: Get the registration link id so we can register it to that registration
        $user = Socialite::driver('google')->stateless()->user();
        Registration::updateOrCreate(['google_id' => $user->id], [
            'google_id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
            'avatar' => $user->avatar,
            'token' => $user->token,
        ]);

        return route('index');
    }
}
