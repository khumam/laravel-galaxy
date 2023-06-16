<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthenticationController extends Controller
{
    /**
     * Redirect to google oAuth
     *
     * @return void
     */
    function google(): RedirectResponse {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Get the data from Google callback
     *
     * @return RedirectResponse
     */
    function googleCallback(): RedirectResponse {
        $response = Socialite::driver('google')->stateless()->user();
        $user = User::updateOrCreate([
            'provider' => 'google',
            'provider_id' => $response->id
        ], [
            'name' => $response->name,
            'email' => $response->email,
            'avatar' => $response->avatar,
            'provider_token' => $response->token,
            'provider_refresh_token' => $response->refreshToken,
            'provider_expired' => $response->expiresIn,
            'password' => Hash::make($response->id . now())
        ]);
        Auth::login($user);
        return redirect('/dashboard');
    }
}
