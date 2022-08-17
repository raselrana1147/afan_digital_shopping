<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use App\Models\Admin\Admin;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Image;

class StaffController extends Controller
{
    
    public function __construct()
	{
	    $this->middleware('auth:admin');
        $this->middleware('superadmin');
	    
	}

   public function datatable()
     {
        $datas=Admin::where('role','staff')->orderBy('id','desc')->get();
       
         return DataTables::of($datas)

          ->editColumn('avatar',function(Admin $data){

                   $url=$data->avatar ? asset("assets/backend/image/profile/".$data->avatar) 
                   :asset("assets/backend/image/".default_image());
                   return '<img src='.$url.' border="0" width="120" height="50" class="img-rounded" />';         
           })
         ->editColumn('action',function(Admin $data){
                  return '
                    <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('admin.staff_delete').'"  item_id="'.$data->id.'">
                    <i class="fa fa-trash"></i>
                   </a>';
         })
        ->rawColumns(['avatar','action'])
         ->make(true);
     }


     public function index()
     {
     	return view('admin.staff.index');
     }
     
    

    public function create()
    {
      
    	 return view('admin.staff.create');
    }

    public function store(Request $request)
    {

     $this->validate($request,[
            'email'=>'unique:admins'
        ]);

       if ($request->isMethod('post'))
         {
             DB::beginTransaction();

             try{
                 //create staff
                 $staff = new Admin();
                 $staff->name = $request->name;
                 $staff->email = $request->email;
                 $staff->password =bcrypt($request->password);
                 $staff->save();

                 DB::commit();

                 return \response()->json([
                     'message' => "Staff added successfully",
                     'status_code' => 200
                 ], Response::HTTP_OK);

             }catch (QueryException $e){
                 DB::rollBack();

                 $error = $e->getMessage();

                 return \response()->json([
                     'error' => $error,
                     'status_code' => 500
                 ], Response::HTTP_INTERNAL_SERVER_ERROR);
             }
         }

    }


    

    public function delete(Request $request){

     $data=Admin::findOrFail($request->item_id);

     if (File::exists(base_path('/assets/backend/image/profle/'.$data->avatar))) 
       {
         File::delete(base_path('/assets/backend/image/profle/'.$data->avatar));
       }
       
     $data->delete();
     $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];

     return \response()->json([
         'message' => 'Successfully deleted',
         'status_code' => 200
     ], Response::HTTP_OK);

    }
}
