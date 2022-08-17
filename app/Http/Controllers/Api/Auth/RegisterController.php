<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use App\Models\User;
use Image;
use Validator;


class RegisterController extends Controller
{
    

   public function register(Request $request)
   {
   		 $validator = Validator::make($request->all(),[
   		        'name'          =>'required|string',
   		        'phone'         =>'required|unique:users',
   		        'email'         =>'required|unique:users',
   		        'password'      =>'required|min:4|confirmed',
              'placement_hand'=>'nullable',
              'placement_id'  =>'nullable',
              'refer_id'      =>'nullable',
              'gender'        =>'nullable|in:Male,Female,Other',
              'nid'           =>'nullable',
   		        'avatar'        =>'nullable|mimes:jpeg,png,jpg',
   		        'address'       =>'nullable'
   		    ]);

   		  if ($validator->fails()) 
   		  {
            return response()->json([
           'message'       =>$validator->errors()->first(),
           'type'          =>"error",
           'status' =>422
           ],Response::HTTP_UNPROCESSABLE_ENTITY);
   		    }else{
   		        if ($request->isMethod('post')) 
   		       {

                $user                 =new User();
                $user->name           =$request->name;
                $user->email          =$request->email;
                $user->phone          =$request->phone;
                $user->password       =Hash::make($request->password);
                $user->address        =$request->address;
                $user->placement_hand =$request->placement_hand;
                $user->placement_id   =$request->placement_id;
                $user->refer_id       =$request->refer_id;
                $user->nid            =$request->nid;
                $user->gender         =$request->gender;
                $user->user_type      ="premium";


                 if ($request->hasFile('avatar')) {
                        $avatar=$request->avatar;
                        $avatar_name=strtolower(Str::random(10)).time().".".$avatar->getClientOriginalExtension();
                        $location=base_path('/assets/frontend/image/profile/'.$avatar_name);
                        Image::make($avatar)->save($location);
                        $user->avatar=$avatar_name;
                     }
                 $user->save();
                return response()->json([
               'message'=>'Your Registration has been successfully',
               'type'=>"success",
               'status'=>200],Response::HTTP_OK);

   		    }
   		}
   }

   
}
