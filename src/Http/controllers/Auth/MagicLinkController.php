<?php

namespace Airranged\LaravelMagicLink\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

// Used to support Magic Link
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

use Airranged\LaravelMagicLink\Notifications\MagicLink;
use App\User;

class MagicLinkController extends Controller
{
    public function show()
    {
        // Show magic link request form
        return view('auth.magic_link');
    }

    public function post(Request $request)
    {
        // Capture the post and if the user exists we send them the email to login
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            // use the link create below in the email we send if that user exists
            $url_to_auth = URL::temporarySignedRoute(
              'autologin',
              now()->addMinutes(20),
              [
                  'user_id'       => $user->id,
                  'url_redirect'  => config('magic.redirect'),
              ]
          );
            $user->notify(new MagicLink($user, $url_to_auth));
        }
        return Redirect::back()->with('status', 'If you have an account we have sent you a magic link to sign in! Check your email.');
    }

    public function autologin(Request $request)
    {
        // Autologin the user
        if (! $request->hasValidSignature()) {
            abort(403);
        }
        Auth::loginUsingId($request->input('user_id'));
        return redirect($request->input('url_redirect', '/'));
    }
}
