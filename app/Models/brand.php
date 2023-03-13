<?php

namespace App\Models;
use App\Models\product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->hasMany(product::class,'brand_id','id');
    }
}
