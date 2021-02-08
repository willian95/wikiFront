<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingInstitution extends Model
{
    protected $table = "pending_institutions";

    public function users(){
        return $this->hasMany(User::class);
    }

}
