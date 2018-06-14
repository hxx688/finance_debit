<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Member;
use Log;
use Yajra\Datatables\Datatables;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MembersController extends Controller
{
    //
    public function index(){
//    	$lists = Member::select('members.*', 'm.realname as prealname')->leftJoin('members AS m', 'm.id', '=', 'members.pid')->get();
//    	return response()->view('admin.members-index',['lists'=>$lists]);
        return view('admin.members-index');
    }


    public function getIndex()
    {
        return view('admin.members-index');
    }


    public function anyData()
    {
        $lists = Member::select('members.id', 'm.realname as prealname','members.nickname','members.realname','members.sex','members.mobile','members.avatar',
        'members.profession','members.zhifubao','members.wechat','members.area','members.userage','members.status','members.created_at')->leftJoin('members AS m', 'm.id', '=', 'members.pid');

        return Datatables::of($lists)->make(true);

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
