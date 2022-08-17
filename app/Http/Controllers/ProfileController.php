<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Image;
use Str;

class ProfileController extends Controller
{
   

   public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboard()
    {
    	$orders=Order::where('user_id',Auth::user()->id)->get();
      $user=Auth::user();
    	return view('front.profile.dashboard',compact('orders','user'));
    }

    public function order_list()
    {
      $orders=Order::where('user_id',Auth::user()->id)->get();
    	return view('front.profile.order_list',compact('orders'));
    }

    public function order_track()
    {
        return view('front.profile.order_track');                              
    }

    public function password()
    {
         return view('front.profile.change_password');      
    }


    public function change_password(Request $request)
    {
           $this->validate($request,[
                'old_password'=>'required',
                'password'=>'required|confirmed|string|min:4',
            ]);

              $user=Auth::user();
      
               if (Hash::check($request->old_password,$user->password))
                {
                     $user->update(['password'=>Hash::make($request->password)]);
                     $notification=['status'=>'200', 'type'=>'success','message'=>'Update sucessfully'];
                }else{
                      $notification=['status'=>'401', 'type'=>'error','message'=>'Old password not match'];
                }
                                     
        return json_encode($notification);
    }

    public function profile(){
        $user=Auth::user();
        return view('front.profile.profile',compact('user'));
    }

    public function profile_update(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg',
            'address'=>'nullable',
        ]);

     
            $user=User::findOrFail($request->id);

            $user->name=$request->name;
            
           if ($request->has('address')) 
           {
              $user->address=$request->address;
           }
           if($request->hasFile('avatar')){

                    if (File::exists(base_path('/assets/frontend/image/profile/'.$user->avatar))) 
                    {
                      File::delete(base_path('/assets/frontend/image/profile/'.$user->avatar));
                    }

                   $image=$request->avatar;
                   $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
                   $image_path = base_path().'/assets/frontend/image/profile/'.$image_name;
                   //Resize Image
                   Image::make($image)->resize(500,480)->save($image_path);
                   $user->avatar = $image_name;  
           }

            $user->save();
            $notification=['alert'=>'success','message'=>'Updated successfully','status'=>200];
           
         

         return json_encode($notification);
    }
}
