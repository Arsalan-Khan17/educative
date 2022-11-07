<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'student_id';
    const CREATED_AT = 'added_on';
    const UPDATED_AT = 'modified_on';

}
