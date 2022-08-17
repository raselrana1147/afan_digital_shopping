<?php

namespace App\Models\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    
    protected $guarded = [];
    
     public function IsAdmin()
    {
    	return $this->role=='admin' ? true : false;
        
    }

    public function IsStaff()
    {
    	return $this->role=='staff' ? true : false;
        
    }

   
    
}