<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Product;

class Brand extends Model
{
    use HasFactory;

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
