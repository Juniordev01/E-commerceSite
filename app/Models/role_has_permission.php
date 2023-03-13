<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class role_has_permission extends Model
{
    use HasFactory;
    public function role()
    {
        return $this->belongsTo(role::class,'role_id');
    }
}
