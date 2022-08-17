<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    

    use AuthenticatesUsers;

   
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {

     
        return view('auth.login');
    }


    public function login(Request $request)
    {

      
         $this->validate($request, [
            'email' => 'required',
            'password' => 'required', 
        ]);
      
            if (Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password])) 
            {
               $carts=Cart::where('ip_address',$request->ip())->get();
               if (!is_null($carts)) 
               {
                  foreach ($carts as $cart) 
                  {
                    $cart->user_id=Auth::user()->id;
                    $cart->save();
                  }
               }
              $notification=array(
                  'message'=>'Successfully Login !!',
                  'alert-type'=>'success'
                  );
                return redirect()->intended(url()->previous())->with($notification);
            }else{
                $notification=array(
                    'message'=>'Credentians not match !!',
                    'alert-type'=>'error'
                    );
              return redirect()->back()->with($notification);
            }
}

}
