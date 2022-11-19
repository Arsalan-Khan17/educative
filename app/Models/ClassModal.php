<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModal extends Model
{
    protected $table = 'classes';
    protected $primaryKey = 'class_id';
    public $timestamps = false;


    public function group(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Group::class,'group_id','group_id');
    }
    public function subject(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Subject::class,'subject_id','subject_id');
    }
    public function session(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Session::class,'session_id','session_id');
    }
    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class,'user_id','teacher_id');
    }

}
