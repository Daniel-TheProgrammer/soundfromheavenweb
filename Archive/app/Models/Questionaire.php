<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionaire extends Model
{
    protected $fillable = ['question','nextquestionaireid','hint','type','servervalidation','groupid'];

    public function options()
    {
        return $this->hasMany('App\Models\QuestionaireOptions','questionaireid','id')->orderby('sequence');
    }
}
