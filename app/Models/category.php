<?php

namespace App\Models;
use App\Models\product;
use App\Models\sub_category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    public function sub_category()
    {
        return $this->hasMany(sub_category::class,'id','id');
    }
    public function product()
    {
        return $this->hasMany(product::class,'Category_Id');
    }
}

