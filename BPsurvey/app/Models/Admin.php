<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\softDeletes;

class Admin extends Authenticatable
{
    use HasFactory, softDeletes;

    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'admin_flg',
        'admin_number',
        'admin_password',
        'admin_name',
    ];

    protected $hidden = [
        'admin_password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
