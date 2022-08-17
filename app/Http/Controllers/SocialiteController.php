<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    


    public function googleLogin()
    {

    	return Socialite::driver('google')->redirect();
    }



    public function callback()
    {
        try {
        $google_user = Socialite::driver('google')->stateless()->user();
        //dd($google_user);
        $user=User::whereEmail($google_user->email)->first();

        if (is_null($user)) {
            $user=User::create([
                'name'=>$google_user->name,
                'email'=>$google_user->email,
                'password'=>bcrypt('123'),
                'google_token'=>$google_user->token,
                'google_id'=>$google_user->id,
            ]);

        }else
        {
             $user->update([
                 'google_token'=>$google_user->token,
                 'google_id'=>$google_user->id,
             ]);
        }

        Auth::login($user);
        $notification=array(
            'message'=>'Successfully Login !!',
            'alert-type'=>'success'
            );
           return redirect()->intended(route('customer.dashboard'))->with($notification);
        } catch (\Exception $exception) {
            abort(404);
        }

    }



    public function facebookLogin()
    {
      return Socialite::driver('facebook')->redirect();
    }



    public function facebook_callback()
    {
       try {
       $facebook_user = Socialite::driver('facebook')->user();
       //dd($facebook_user);
       $user=User::whereEmail($facebook_user->email)->first();

       if (is_null($user)) {
           $user=User::create([
               'name'=>$facebook_user->name,
               'email'=>$facebook_user->email,
               'password'=>bcrypt('123'),
               'google_token'=>$facebook_user->token,
               'google_id'=>$facebook_user->id,
           ]);

       }else
       {
            $user->update([
                'google_token'=>$facebook_user->token,
                'google_id'=>$facebook_user->id,
            ]);
       }

       Auth::login($user);
       $notification=array(
           'message'=>'Successfully Login !!',
           'alert-type'=>'success'
           );
          return redirect()->intended(route('customer.dashboard'))->with($notification);
       } catch (\Exception $exception) {
           abort(404);
       }

    }
}
