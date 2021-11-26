<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuestionaireGroups extends Model
{
    protected $fillable = ['groupid','parentgroupid','name','userquestionansid','userid'];
}
