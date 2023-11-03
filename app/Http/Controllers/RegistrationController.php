<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Position;
use App\Models\Registration;
use App\Models\User;
use App\Types\PositionType;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

class RegistrationController extends Controller
{
    public function redirect(Event $event)
    {
        $state = encrypt(['event' => $event->id]);
        return Socialite::driver('google')->with(['state' => $state])->redirect();

    }

    public function callback(Request $request)
    {

        $state = decrypt($request->input('state'));
        $event = Event::find($state['event']);

        // TODO: throw error if event doens't allow registration
        if (!$event->allow_registration) {
            return redirect()->route('index');
        }

        //TODO: check if user is already registered, throw error if true
        $user = Socialite::driver('google')->stateless()->user();

        $user = User::updateOrCreate(
            [
                'google_id' => $user->id,
                'email' => $user->email,
            ],
            [
                'google_id' => $user->id,
                'email' => $user->email,
                'name' => $user->name,
                'avatar' => $user->avatar,
                'token' => $user->token,
                'position_id' => Position::where('name', PositionType::STUDENT->value())->first()->id,
            ]
        );

        Registration::updateOrCreate(
            [
                'event_id' => $event->id,
                'user_id' => $user->id,
            ],
            [
                'event_id' => $event->id,
                'user_id' => $user->id,
            ]
        );

        // TODO: This should redirect to the event details. with the registration id.
        // Or redirect to form if other information is needed.
        return redirect()->route('index');
    }

    public function view()
    {
        return Inertia::render('Registration/RegistrationComponent');
    }
}
