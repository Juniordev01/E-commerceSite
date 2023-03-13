<?php

namespace App\Models;
use App\Models\product;
use App\Models\category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(category::class,'category_id','id');
    }

    public function product()
    {
        return $this->hasMany(product::class,'subCatory_Id');
    }
}
