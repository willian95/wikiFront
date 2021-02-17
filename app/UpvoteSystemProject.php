<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpvoteSystemProject extends Model
{
    
    protected $table= "upvote_system_projects";

    public function assestmentPointType(){

        return $this->belongsTo(AssestmentPointType::class);

    }

    public function project(){

        return $this->belongsTo(Project::class);

    }

}
