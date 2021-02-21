<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherReport extends Model
{
    protected $table="teacher_reports";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function teacher(){
        return $this->belongsTo(User::class, "teacher_id");
    }

}
