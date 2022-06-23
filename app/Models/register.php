<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class register extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function achistory_point(){
        return $this->belongsTo(product_history::class, 'email','email');
    }
    public function points_added(){
        return $this->belongsTo(point::class, 'email','email');
    }
    public function b_point(){
        return $this->belongsTo(bonus_point::class, 'email','user_email');
    }

    public function getemail(){
        return $this->belongsTo(point::class, 'email','email');
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
   
}
