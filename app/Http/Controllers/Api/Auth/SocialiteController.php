<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class SocialiteController extends Controller
{
    


     public function social_google_login(Request $request)
    {

        $user=User::whereEmail($request->email)->first();
        

        if (is_null($user)) {
        	        	
        		$user=User::create([
        		    'name'=>$request->name,
        		    'email'=>$request->email,
        		    'password'=>bcrypt('123'),
        		    'google_token'=>$request->google_token,
        		    'google_id'=>$request->google_id,
               
        		]);
        	
        }else
        {
        	
        		$user->update([
        		    'google_token'=>$request->google_token,
        		    'google_id'=>$request->google_id,
        		]);
     
        }
        	
          if ($token=$this->guard()->login($user))
          {
          
          	$user=auth('api')->user();
          	$user->firebase_token=$request->firebase_token;
          	$user->save();
          	 return response()->json([
          	   "message"=>"Successfully Login",
          	   "status" =>200,
          	   "type"   =>"success",
          	   "user_id"=>$user->id,
          	   "access_token"=>$token,
          	   "token_type"=>"bearer"
          	 ],Response::HTTP_OK);
          }else{
          	return response()->json([
          	  "message"=>"Something went wrong",
          	  "status" =>400,
          	  "type"   =>"success",
          	  "user_id"=>null,
          	  "access_token"=>null,
          	  "token_type"=>"bearer"
          	],400);
          }
      

    }



     public function social_facebook_login(Request $request)
    {

        $user=User::where('facebook_id',$request->facebook_id)->first();
        
        if (is_null($user)) {
                    
            $user=User::create([
                'name'=>$request->name,
                'password'=>bcrypt('123'),
                'facebook_token'=>$request->facebook_token,
                'facebook_id'=>$request->facebook_id,
                
            ]);
          
        }else
        {
          
            $user->update([
                'facebook_token'=>$request->facebook_token,  
            ]);
        
        }
          
          if ($token=$this->guard()->login($user))
          {
          
            $user=auth('api')->user();
            $user->firebase_token=$request->firebase_token;
            $user->save();
             return response()->json([
               "message"=>"Successfully Login",
               "status" =>200,
               "type"   =>"success",
               "user_id"=>$user->id,
               "access_token"=>$token,
               "token_type"=>"bearer"
             ],Response::HTTP_OK);
          }else{
            return response()->json([
              "message"=>"Something went wrong",
              "status" =>400,
              "type"   =>"success",
              "user_id"=>null,
              "access_token"=>null,
              "token_type"=>"bearer"
            ],400);
          }
      

    }


    public function guard()
    {
        return Auth::guard('api');
    }
}
