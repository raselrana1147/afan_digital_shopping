<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\SubCategory;
use App\Models\Admin\Product;
class Category extends Model
{
    use HasFactory;


    public function sub_categories()
    {
    	return $this->hasMany(SubCategory::class);
    }

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
