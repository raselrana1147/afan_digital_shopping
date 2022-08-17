<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use App\Models\Admin\SocialLink;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Image;

class SocialController extends Controller
{
    
    public function __construct()
	{
	    $this->middleware('auth:admin');
	    
	}

   public function datatable()
     {
        $datas=SocialLink::orderBy('id','DESC')->get();
       
         return DataTables::of($datas)

          ->editColumn('image',function(SocialLink $data){

                   $url=$data->image ? asset("assets/backend/image/social/".$data->image) 
                   :asset("assets/backend/image/".default_image());
                   return '<img src='.$url.' border="0" width="120" height="50" class="img-rounded" />';         
           })


         ->editColumn('action',function(SocialLink $data){
                  return '<a href="'.route('admin.social_edit',$data->id).'" class="btn btn-success btn-sm">
                   <i class="fa fa-edit"></i>
                   </a>
                    <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('admin.social_delete').'"  item_id="'.$data->id.'">
                    <i class="fa fa-trash"></i>
                   </a>';
         })
        ->rawColumns(['image','action'])
         ->make(true);
     }


     public function index()
     {
     	return view('admin.social.index');
     }
     
     public function edit($id)
     {
       $data=SocialLink::findOrFail($id);
        return view('admin.social.edit',compact('data'));
     }

    public function create()
    {
      
    	 return view('admin.social.create');
    }

    public function store(Request $request)
    {

     

       if ($request->isMethod('post'))
         {
             DB::beginTransaction();

             try{

                 //create Social

                 $social = new SocialLink();
                 $social->title = $request->title;
                 $social->link = $request->link;
                 $social->icon = $request->icon;

                 if($request->hasFile('image')){

                         $image=$request->image;
               
                         $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
                         $image_path = base_path().'/assets/backend/image/social/'.$image_name;
                         //Resize Image
                   
                         Image::make($image)->resize(40,40)->save($image_path);
                         $social->image = $image_name;
                     
                 }

                 $social->save();

                 DB::commit();

                 return \response()->json([
                     'message' => "Social link added successfully",
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


    public function update(Request $request)
    {
     
     

       if ($request->isMethod('post'))
         {
             DB::beginTransaction();

             try{

                 //update Slider
                 $social=SocialLink::findOrFail($request->id);
                 $social->title = $request->title;
                 
                 $social->link = $request->link;
                 $social->icon = $request->icon;
         
                 if($request->hasFile('image')){

                         // delete current image

                       if (File::exists(base_path('/assets/backend/image/social/'.$social->image))) 
                         {
                           File::delete(base_path('/assets/backend/image/social/'.$social->image));
                         }
                        
                         // upload new image
                         $image=$request->image;
                         $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
                       
                         $image_path = base_path().'/assets/backend/image/social/'.$image_name;

                         //Resize Image
                         Image::make($image)->resize(40,40)->save($image_path);
                      
                         $social->image = $image_name;
                     
                 }

                 $social->save();

                 DB::commit();

                 return \response()->json([
                     'message' => 'Successfully updated',
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

     $data=SocialLink::findOrFail($request->item_id);

     if (File::exists(base_path('/assets/backend/image/social/'.$data->image))) 
       {
         File::delete(base_path('/assets/backend/image/social/'.$data->image));
       }
       
     $data->delete();
     $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];

     return \response()->json([
         'message' => 'Successfully deleted',
         'status_code' => 200
     ], Response::HTTP_OK);

    }
}
