<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $table = "institutions";

    public function user(){
        return $this->hasMany(User::class);
    }


}
