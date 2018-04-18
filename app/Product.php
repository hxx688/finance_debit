<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['title','logo','introduction','quota','rate','term','loan','sort','type','link','content','number'];

    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }
    public function myApply(){
    	return $this->belongsToMany('App\Member','apply');
    }

    public function apply(){
    	return $this->hasMany('App\Apply');
    }
}
