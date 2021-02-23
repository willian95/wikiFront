<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondaryField extends Model
{
    protected $table = "secondary_fields";

    public function project(){

        return $this->belongsTo(Project::class);

    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
