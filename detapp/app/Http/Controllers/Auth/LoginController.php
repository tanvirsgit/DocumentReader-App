<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

// Importing Models User and SocialProvider
use App\User;
use App\SocialProvider;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */

    // Redirects if fed ID is authorized function
    public function handleProviderCallback()
    {
        // Try if user object is retured from fed ID
        try{
            $userInfo = Socialite::driver('facebook')->user();
        } catch(\Exception $e) {
            return redirect('/');
        } 

        // Assign social provider
        $socialProvider = SocialProvider::where('provider_id', $userInfo->getId())-first();

        // Check if social provider exists
        if(!$socialProvider){

            // If it does not exist, create new instance
            $user = User::firstOrCreate(
                ['email' => $userInfo->getEmail()],
                ['name' => $userInfo-getName()]
            );

            $user->socialProvider()->create([
                'provider_id' => $userInfo->getId(),
                'provider' => 'facebook'
            ]);
        } else{

            // Existing user is logged in and dashboard view is returned
            $user = $socialProvider->user;
            auth()->login($user);
            return redirect('/dashboard');
        }

        

        
    }
}
