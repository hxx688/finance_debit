<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Member;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MembersController extends Controller
{
    //
    public function index(){
    	$lists = Member::get();
    	return response()->view('admin.members-index',['lists'=>$lists]);
    }

    public function handle($id){
    	$info = Member::findOrFail($id);
    	$data = ($info->status) == 1 ? ['status'=>0] : ['status'=>1];
    	if($info->update($data)){
    		return response()->json(1);
    	}
    	return response()->json(0);
    }
}
