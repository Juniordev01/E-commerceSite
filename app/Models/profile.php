<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;
class profile extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
