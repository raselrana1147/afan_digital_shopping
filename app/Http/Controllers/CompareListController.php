<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CompareList;

class CompareListController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth',['except' => ['add_to_comparelist']]);
    }

    public function add_to_comparelist(Request $request)
    {
    	if (Auth::check()) 
    	{
    		$check=CompareList::where(['user_id'=>Auth::user()->id,'product_id'=>$request->product_id])->first();
    		if (is_null($check)) {
    			$comparelist=new CompareList();
    			$comparelist->user_id=Auth::user()->id;
    			$comparelist->product_id=$request->product_id;
    			$comparelist->save();
    			$notification=['status'=>'200', 'type'=>'success','message'=>"Successfully added to comparelist",'total_comparelist'=>total_comparelist()];
    		}else{
    			$notification=['status'=>'201', 'type'=>'success','message'=>"Already added to camparelist",'total_comparelist'=>total_comparelist()];
    		}
    	}else{
    		 
    		  $notification=['status'=>'401', 'type'=>'error','route'=>route('login')];
    	}
    	echo json_encode($notification);
    }

    public function view_comparelist()
    {
    	if (Auth::check()) {
    		$comparelists=CompareList::where('user_id',Auth::user()->id)->get();
    		 return view('front.comparelist',compact('comparelists'));
    	}else{
    		$notification=array(
    		 'message'=>'Please Login first !!',
    		 'alert-type'=>'info'
    		 );
    		return redirect()->back()->with($notification);
    	}
       
    }

    public function delete_comparelist($id)
    {
      
        $comparelist=CompareList::findOrFail($id);
        $comparelist->delete();
         $notification=array(
             'message'=>'Successfully Deleted !!',
             'alert-type'=>'success'
             );

       return redirect()->back()->with($notification);
    }
}
