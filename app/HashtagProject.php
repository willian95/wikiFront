<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HashtagProject extends Model
{
    protected $table = "hashtag_projects";

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function hashtag(){
        return $this->belongsTo(Hashtag::class);
    }

}
