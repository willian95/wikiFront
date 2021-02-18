<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectProject extends Model
{
    protected $table = "subject_projects";

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

}
