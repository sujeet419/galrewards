<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bonus_point extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function bonus(){
    return $this->belongsTo(register::class, 'user_id','id');
    }
}
