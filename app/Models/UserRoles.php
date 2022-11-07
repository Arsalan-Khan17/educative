<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    protected $primaryKey = 'role_id';
    protected $table = 'user_roles';

    public function user()
    {
        return $this->belongsTo(User::class, 'role_id');
    }
}
