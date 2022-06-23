<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(category::class, 'category_id','id');
    }

    public function Subcategory(){
        return $this->belongsTo(subcategory::class, 'subcategory_id','id');
    }

    public function country(){
        return $this->belongsTo(country::class, 'country_id','id');
    }
}
