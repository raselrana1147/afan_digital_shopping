<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\OrderDetail;
use App\Models\Admin\Payment;
use App\Models\Admin\BillingDetail;
use App\Models\Admin\Coupon;

class Order extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function order_detail()
    {
    	return $this->hasMany(OrderDetail::class);
    }

    public function billing()
    {
        return $this->hasOne(BillingDetail::class);
    }
     public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }


    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
