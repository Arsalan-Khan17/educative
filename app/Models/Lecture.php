<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table = 'lectures';
    protected $primaryKey = 'lecture_id';
    const CREATED_AT = 'added_on';
    const UPDATED_AT = 'modified_on';

    public function lectureClass(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ClassModal::class,'class_id','class_id');
    }

}
