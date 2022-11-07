<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupStudent extends Model
{
    protected $table = 'group_students';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function students(){
        return $this->hasMany(Student::class,'user_id','student_id');
    }
    public function groups(){
        return $this->belongsTo(Group::class,'group_id','group_id');
    }

}
