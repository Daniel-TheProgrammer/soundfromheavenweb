<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionaireSequence extends Model
{
    protected $fillable = ['questionaireid','optionid','nextquestionaireid'];
}
