<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable = ['id','pid', 'openid','mobile','avatar','area','sex','profession','zhifubao','wechat','nickname','realname','zhima', 'status'];

    public function myApply(){
    	return $this->belongsToMany('App\Product','applys')->withPivot('money','long','created_at');
    }

    public function apply(){
    	return $this->hasMany('App\Apply');
    }
}
