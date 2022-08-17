<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\Admin\Coupon;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;

class CouponController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('superadmin');
    }


    public function datatable()
    {
       $datas=Coupon::orderBy('id','DESC')->get();
      
        return DataTables::of($datas)
        ->addIndexColumn()
         
        ->editColumn('action',function(Coupon $data){
                 return '<a href="'.route('admin.coupon_edit',$data->id).'" class="btn btn-success btn-sm">
                  <i class="fa fa-edit"></i>
                  </a>
                   <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('admin.coupon_delete').'"  item_id="'.$data->id.'">
                   <i class="fa fa-trash"></i>
                  ';
        })
       ->rawColumns(['action'])
        ->make(true);
    }


    public function create()
    {
    	return view('admin.coupon.create');
    }



    public function store(Request $request)
    {
        
    	if ($request->isMethod("POST")) 
    	{
    		DB::beginTransaction();
    		try {

    			$coupon                 =new Coupon();
    			$coupon->title          =$request->title;
    			$coupon->coupon_code    =$request->coupon_code;
    			$coupon->shopping_amount=$request->shopping_amount;
    			$coupon->discount       =$request->discount;
    			$coupon->type           =$request->type;
    			$coupon->start_date     =date("Y-m-d",strtotime($request->start_date));
    			$coupon->end_date       =date("Y-m-d",strtotime($request->end_date));
    			$coupon->description    =$request->description;
    			$coupon->save();

             $body="Hello our honorable customers, your are getting a big discount on shopping. If you purchase minimum ".currency().$request->shopping_amount." you will get ".$request->discount." ".$request->type." discount by using ".$request->coupon_code." coupon code. So, please start your shopping and enjoy this mega offer. This coupon is valid till ".date("d-m-Y",strtotime($request->end_date));

                push_notification($request->title,$body);
                        
                    

    			DB::commit();
    			return \response()->json([
    			    'message' => 'Coupon Added Successfuly',
    			    'status_code' => 200
    			], Response::HTTP_OK);
    			
    		} catch (QueryException $e) {
    			DB::rollBack();
    			$error = $e->getMessage();

    			return \response()->json([
    			    'error' => $error,
    			    'status_code' => 500
    			], Response::HTTP_INTERNAL_SERVER_ERROR);
    		}
    	}

    }


    public function index()
    {
         return view('admin.coupon.index');
    }

    public function edit($id)
    {
        $coupon=Coupon::findOrFail($id);
         return view('admin.coupon.edit',compact('coupon'));
    }

    public function update(Request $request)
    {

        if ($request->isMethod("POST")) 
        {
            DB::beginTransaction();
            try {

                $coupon                 =Coupon::findOrFail($request->id);
                $coupon->title          =$request->title;
                $coupon->coupon_code    =$request->coupon_code;
                $coupon->shopping_amount=$request->shopping_amount;
                $coupon->discount       =$request->discount;
                $coupon->type           =$request->type;
                $coupon->start_date     =date("Y-m-d",strtotime($request->start_date));
                $coupon->end_date       =date("Y-m-d",strtotime($request->end_date));
                $coupon->description    =$request->description;
                $coupon->save();

                DB::commit();
                return \response()->json([
                    'message' => 'Category updated Successfuly',
                    'status_code' => 200
                ], Response::HTTP_OK);
                
            } catch (QueryException $e) {
                DB::rollBack();
                $error = $e->getMessage();

                return \response()->json([
                    'error' => $error,
                    'status_code' => 500
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

    }

    public function delete(Request $request)
    {
         $coupon=Coupon::findOrFail($request->item_id);
         $coupon->delete();
         $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];

         return \response()->json([
             'message' => 'Successfully Deleted',
             'status_code' => 200
         ], Response::HTTP_OK);
    }
}
