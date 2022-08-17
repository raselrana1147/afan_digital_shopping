<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    
    public function __construct()
    {
       $this->middleware('auth:api',['except'=>'login']);
    }

    
    public function login(Request $request)
    {
       // return $request->ip();
         $data=User::where('email',$request->username)->orWhere('phone',$request->username)->first();
         if (!is_null($data)) {

                $field = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
                request()->merge([$field => $request->username]);

               $credentials = $request->only([$field, 'password']);
               if ($token = $this->guard()->attempt($credentials)) {
                $user=auth('api')->user();
                
                 return response()->json([
                   "message"=>"Successfully Login",
                   "status" =>200,
                   "type"   =>"success",
                   "user_id"=>$user->id,
                   "access_token"=>$token,
                   "token_type"=>"bearer"
                 ],Response::HTTP_OK);
               }

               return response()->json([
                  "message"=>"Password did not match",
                   "status" =>200,
                   "type"   =>"success",
                   "user_id"=>null,
                   "access_token"=>null,
                   "token_type"=>"bearer"
                 ],401);
         
         }else{

             return response()->json([
                  "message"=>"No account is found",
                   "status" =>200,
                   "type"   =>"success",
                   "user_id"=>null,
                   "access_token"=>null,
                   "token_type"=>"bearer"
             ],Response::HTTP_FORBIDDEN);
         } 
    }

    
     public function profile()
    {
        //return response()->json(auth()->user());
        $user=DB::table('users')
        ->select('name','email','phone','avatar','address','gender','created_at')
        ->whereId(auth()->user()->id)->first();
        return response()
        ->json([
             'user' => $user,
             'status' => 200,
            ],Response::HTTP_OK);
    }

    
    public function logout()
    {
        $user=auth('api')->user();
        $user->firebase_token=null;
        $user->save();
        auth('api')->logout();

        return response()
        ->json([
             'message' => 'Successfully logged out',
             'status' => 200,
            ],Response::HTTP_OK);
    }

    
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            
        ]);
    }

    public function guard()
    {
        return Auth::guard('api');
    }
}
