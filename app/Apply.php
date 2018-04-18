<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    //
    protected $table = 'apply';
    protected $fillable = ['member_id','product_id'];

    public function member(){
    	return $this->belongsTo('App\Member');
    }

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
