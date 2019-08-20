<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

        // --------------facebook-----------------------------------------------

                                public function f_redirectToProvider()
                                {
                                    return Socialite::driver('facebook')->redirect();
                                }

                                public function f_handleProviderCallback()
                                {
                                    $userSocial = Socialite::driver('facebook')->user();

                                    $findUser = User::where('email',$userSocial->email)->first();

                                    if($findUser){

                                        Auth::login($findUser);
                                        return redirect()->route('trangchu');


                                    }else{

                                        $user = new User();

                                        $user->name = $userSocial->name;
                                        $user->email = $userSocial->email;
                                        $user->password = bcrypt('123456');
                                        $user->save();

                                        Auth::login($user);
                                        return redirect()->route('trangchu');

                                    }
                                }

        // --------------google-----------------------------------------------

                                public function g_redirectToProvider()
                                {
                                    return Socialite::driver('google')->redirect();
                                }

                                public function g_handleProviderCallback()
                                {
                                    $userSocial =  Socialite::driver('google')->stateless()->user();

                                    // echo $user->name; echo '<br>';
                                    // echo $user->email; echo '<br>';
                                    // echo $user->getName(); echo '<br>';
                                    // // dd($user);
                                    $findUser = User::where('email',$userSocial->email)->first();

                                    if($findUser){

                                        Auth::login($findUser);
                                        return redirect()->route('trangchu');

                                    }else{

                                        $user = new User();

                                        $user->name = $userSocial->name;
                                        $user->email = $userSocial->email;
                                        $user->password = bcrypt('123456');
                                        $user->save();

                                        Auth::login($user);
                                        return redirect()->route('trangchu');
                                    }

                                }
};
