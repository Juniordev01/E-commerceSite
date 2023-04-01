<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\profile;
use App\Models\cart;
use Laravel\Cashier\Billable;
use Spatie\Permission\Models\Role;
class User extends Authenticatable
{
    use  HasApiTokens, HasFactory, Notifiable,HasRoles,Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function profile()
    {
        return $this->hasOne(profile::class);
    }

    public function Role()
    {
        return $this->belongsToMany(Role::class,'model_has_roles');
    }

    public function cart()
    {
        return $this->hasMany(cart::class,'user_id');
    }

    public function product()
    {
        return $this->hasMany(product::class,'product_id');
    }

}
