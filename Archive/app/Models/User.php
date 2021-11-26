<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
        'name', 'email', 'password','appid','fbid','phoneno','userprofileurl','phoneverified','currentquestionaireid','firebaseuuid'
    ];*/
	
	protected $guarded = [];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function tasks(){
    	return $this->hasMany('App\Models\UserTask','userid');
    }
    
    public function identity(){
    	
    	return $this->hasMany('App\Models\IdentityCard','userid');
    }
    
    public function profileimage(){
    	
    	return $this->hasOne('App\Models\UserImage','typeid')->where('type',1);
    }
    public function image(){
        return $this->hasOne('App\Models\Image','id','image_id');
    }
    public function team(){
        return $this->hasOne('App\Models\Team','id','team_id');
    }
    public function group(){
        return $this->hasOne('App\Models\Group','id','group_id');
    }
}
