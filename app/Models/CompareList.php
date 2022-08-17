<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CompareList;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Product;

class CompareList extends Model
{
    use HasFactory;

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

     public static function total_comparelist()
     {
        $item=0;
       if (Auth::check()) 
       {
         $item=CompareList::where('user_id',Auth::user()->id)->count();
       }
       return $item;
    }
}
