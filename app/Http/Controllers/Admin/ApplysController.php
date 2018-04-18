<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Apply;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApplysController extends Controller
{
    //
    public function index(){
    	$lists = Apply::with(['member'=>function($query){
    		$query->select('mobile','id', 'realname', 'zhima');
    	},'product'=>function($query){
    		$query->select('title','rate','term','id');
    	}])->get();
    	return response()->view('admin.apply-index',['lists'=>$lists]);
    }
}
