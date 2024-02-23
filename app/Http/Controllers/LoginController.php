<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Google_Service_Oauth2;
use Google\Client;


class LoginController extends Controller
{
    // Redirect the user to the Google authentication page
    public function redirectToGoogle()
    {
        $client = new Client([
            'client_id' => env('18614758338-0mv306p0kubt0k9odsjsu9pe2jl77m0h.apps.googleusercontent.com'),
            'client_secret' => env('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'),
            'redirect' => env('http://127.0.0.1:8000/login/google'),
        ]);
        $auth_url = $client->createAuthUrl([
            'scope' => implode(' ', [
                'https://www.googleapis.com/auth/userinfo.email',
                'https://www.googleapis.com/auth/userinfo.profile',
            ]),
        ]);

        return redirect($auth_url);
    }

    // Handle the Google callback and authenticate the user
    public function handleGoogleCallback(Request $request)
    {
        $client = new Client([
            'client_id' => env('18614758338-0mv306p0kubt0k9odsjsu9pe2jl77m0h.apps.googleusercontent.com'),
            'client_secret' => env('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'),
            'redirect' => env('http://127.0.0.1:8000/login/google'),
        ]);

        $client->fetchAccessTokenWithAuthCode($request->get('code'));

        $service = new Google_Service_Oauth2($client);
        $user = $service->userinfo->get();

        // Authenticate the user with Laravel's authentication system
        $auth_user = User::where('email', $user->email)->first();
        if (!$auth_user) {
            // Create a new user if they don't exist in the database
            $auth_user = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => '',
            ]);
        }
        Auth::login($auth_user);

        return redirect('/home');
    }
}