<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstitutionReport extends Model
{
    protected $table="institution_reports";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function institution(){
        return $this->belongsTo(Institution::class);
    }

}
