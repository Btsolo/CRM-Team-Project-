<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    //

    use HasFactory;
    public const IS_ADMIN = 1;
    public const IS_MANAGER = 2;
    public const IS_USER = 3;
    public function user():HasMany
    {
        return $this->hasMany(User::class);
    }
}
