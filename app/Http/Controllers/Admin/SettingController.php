<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\Admin\GeneralSetting;
use Illuminate\Support\Facades\File;
use Str;
use Image;



class SettingController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function general_setting()
    {
    	$data=DB::table('general_settings')->first();
    	return view('admin.setting.general_setting',compact('data'));
    }


    public function update_setting(Request $request)
    {
    	$data=GeneralSetting::find($request->id);

    	if ($request->has('shipping_charge')) 
    	{
    		$data->shipping_charge=$request->shipping_charge;
    	}


    	if ($request->has('tax')) 
    	{
    		$data->tax=$request->tax;
    	}

    	if ($request->has('currency')) 
    	{
    		$data->currency=$request->currency;
    	}

    	 if($request->hasFile('logo'))
    	 {

    	 	if (File::exists(base_path('/assets/backend/image/'.$data->logo))) 
    	 	  {
    	 	    File::delete(base_path('/assets/backend/image/'.$data->logo));
    	 	  }
    	 	  
            $logo=$request->logo;
            $image_name=strtolower(Str::random(10)).time().".".$logo->getClientOriginalExtension();
            $logo_path = base_path().'/assets/backend/image/'.$image_name;
            Image::make($logo)->save($logo_path);
            $data->logo = $image_name;
                        
        }

        $data->save();

        return \response()->json([
            'message' => 'Successfuly Updated',
            'status_code' => 200
        ], Response::HTTP_OK);

    }
}
