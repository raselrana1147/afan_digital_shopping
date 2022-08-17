<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use App\Models\Admin\Banner;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Image;

class BannerController extends Controller
{
   

	public function __construct()
	{
	    $this->middleware('auth:admin');
	    
	}

   public function datatable()
     {
        $datas=Banner::orderBy('id','DESC')->get();
       
         return DataTables::of($datas)

          ->editColumn('image',function(Banner $data){

                   $url=$data->image ? asset("assets/backend/image/banner/small/".$data->image) 
                   :asset("assets/backend/image/".default_image());
                   return '<img src='.$url.' border="0" width="120" height="50" class="img-rounded" />';         
           })


         ->editColumn('action',function(Banner $data){
                  return '<a href="'.route('admin.banner_edit',$data->id).'" class="btn btn-success btn-sm">
                   <i class="fa fa-edit"></i>
                   </a>
                    <a href="javascript:;" class="btn btn-danger btn-sm delete_item" data-action="'.route('admin.banner_delete').'"  item_id="'.$data->id.'">
                    <i class="fa fa-trash"></i>
                   </a>';
         })
        ->rawColumns(['image','action'])
         ->make(true);
     }


     public function index()
     {
     	return view('admin.banner.index');
     }
     
     public function edit($id)
     {
       $data=Banner::findOrFail($id);
        return view('admin.banner.edit',compact('data'));
     }

    public function create()
    {
      
    	 return view('admin.banner.create');
    }

    public function store(Request $request)
    {
       if ($request->isMethod('post'))
         {
             DB::beginTransaction();

             try{

                 //create Slider

                 $banner = new Banner();
                 $banner->url = $request->url;
                 $banner->type = $request->type;
              
                 if($request->hasFile('image')){

                         $image=$request->image;
                   
                         $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
                         $original_image_path = base_path().'/assets/backend/image/banner/original/'.$image_name;
                         $large_image_path = base_path().'/assets/backend/image/banner/large/'.$image_name;
                         $medium_image_path = base_path().'/assets/backend/image/banner/medium/'.$image_name;
                         $small_image_path = base_path().'/assets/backend/image/banner/small/'.$image_name;

                         //Resize Image
                         Image::make($image)->save($original_image_path);
                         Image::make($image)->resize(1920,680)->save($large_image_path);
                         Image::make($image)->resize(848,380)->save($medium_image_path);
                         Image::make($image)->resize(390,400)->save($small_image_path);
                          
                        
                         $banner->image = $image_name;
                     
                 }

                 $banner->save();

                 DB::commit();

                 return \response()->json([
                     'message' => "Banner added successfully",
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
                 $banner=Banner::findOrFail($request->id);
                 $banner->url = $request->url;
                 $banner->type = $request->type;
                 
         
                 if($request->hasFile('image')){

                         // delete current image

                       if (File::exists(base_path('/assets/backend/image/banner/small/'.$banner->image))) 
                         {
                           File::delete(base_path('/assets/backend/image/banner/small/'.$banner->image));
                         }
                         if (File::exists(base_path('/assets/backend/image/banner/medium/'.$banner->image))) 
                         {
                           File::delete(base_path('/assets/backend/image/banner/medium/'.$banner->image));
                         }

                         if (File::exists(base_path('/assets/backend/image/banner/large/'.$banner->image)))
                          {
                            File::delete(base_path('/assets/backend/image/banner/large/'.$banner->image));
                          }

                          if (File::exists(base_path('/assets/backend/image/banner/original/'.$banner->image)))
                          {
                             File::delete(base_path('/assets/backend/image/banner/original/'.$banner->image));
                          }
                         // upload new image
                         $image=$request->image;
                         $image_name=strtolower(Str::random(10)).time().".".$image->getClientOriginalExtension();
                         $original_image_path = base_path().'/assets/backend/image/banner/original/'.$image_name;
                         $large_image_path = base_path().'/assets/backend/image/banner/large/'.$image_name;
                         $medium_image_path = base_path().'/assets/backend/image/banner/medium/'.$image_name;
                         $small_image_path = base_path().'/assets/backend/image/banner/small/'.$image_name;

                         //Resize Image
                         Image::make($image)->save($original_image_path);
                         Image::make($image)->resize(1920,680)->save($large_image_path);
                         Image::make($image)->resize(1000,529)->save($medium_image_path);

                         Image::make($image)->resize(390,400)->save($small_image_path);

                         $banner->image = $image_name;
                     
                 }

                 $banner->save();

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

     $data=Banner::findOrFail($request->item_id);

     if (File::exists(base_path('/assets/backend/image/banner/small/'.$data->image))) 
       {
         File::delete(base_path('/assets/backend/image/banner/small/'.$data->image));
       }
       if (File::exists(base_path('/assets/backend/image/banner/medium/'.$data->image))) 
       {
         File::delete(base_path('/assets/backend/image/banner/medium/'.$data->image));
       }

       if (File::exists(base_path('/assets/backend/image/banner/large/'.$data->image)))
        {
          File::delete(base_path('/assets/backend/image/banner/large/'.$data->image));
        }

        if (File::exists(base_path('/assets/backend/image/banner/original/'.$data->image)))
        {
           File::delete(base_path('/assets/backend/image/banner/original/'.$data->image));
        }
     $data->delete();
     $notification=['alert'=>'success','message'=>'Successfully Delete','status'=>200];

     return \response()->json([
         'message' => 'Successfully deleted',
         'status_code' => 200
     ], Response::HTTP_OK);

    }
}
