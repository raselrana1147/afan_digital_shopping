<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;


class RegisterController extends Controller
{
   

    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    

    public function register(Request $request)
    {


       $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|unique:users',
            'password' => 'required|confirmed|string|min:4',
        ]);

       if ($request->isMethod("POST")) {
                DB::beginTransaction();
           try {
                $user=new User();
                $user->name=$request->name;
                $user->email=$request->email;
                $user->phone=$request->phone;
                $user->password=Hash::make($request->password);
                $user->save();
                DB::commit();
                $notification=['status'=>'200', 'type'=>'success','message'=>'Successfully registration','route'=>route('login')];
                
           } catch (QueryException $e) {
                DB::rollBack();
                $e=$e->getMessage();
                $notification=['status'=>'422', 'type'=>'error','message'=>$e];
           }
       }
        echo json_encode($notification);


    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
            'address' => ['nullable', 'string'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
