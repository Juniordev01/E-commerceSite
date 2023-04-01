<?php

namespace App\Models;
use App\Models\brand;
use App\Models\category;
use App\Models\cart;
use App\Models\sub_category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    public function brand()
    {
        return $this->belongsTo(brand::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class,'Category_Id');
    }


    public function sub_category()
    {
        return $this->belongsTo(sub_category::class,'subCatory_Id');
    }
}
