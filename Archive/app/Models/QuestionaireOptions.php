<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionaireOptions extends Model
{
    protected $fillable = ['option','sequence','questionaireid'];
}
