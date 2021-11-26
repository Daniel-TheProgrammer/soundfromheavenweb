<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdentityCard extends Model
{
    protected $guarded = [];
    
    public function image(){
    	
    	return $this->hasOne('App\Models\IdentityImage','typeint')->where('isdeleted',0);
    }
}
