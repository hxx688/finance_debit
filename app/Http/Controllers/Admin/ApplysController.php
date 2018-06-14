<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Apply;
use Log;
use Yajra\Datatables\Datatables;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApplysController extends Controller
{
    //
    public function index(){

//    	$lists = Apply::with(['member'=>function($query){
//    		$query->select('members.mobile','members.id', 'members.realname', 'members.zhima', 'members.userage',  'm.realname as prealname')->leftJoin('members AS m', 'm.id', '=', 'members.pid');
//    	},'product'=>function($query){
//    		$query->select('title','rate','term','id');
//    	}])->get();

//        Log::info(bcrypt("654321"));
//    	return response()->view('admin.apply-index',['lists'=>$lists]);

        return view('admin.apply-index');
    }

    public function getIndex()
    {
        return view('admin.apply-index');
    }


    public function anyData()
    {
//        return Datatables::of(Apply::with(['member'=>function($query){
//            $query->select('members.mobile','members.id', 'members.realname', 'members.zhima', 'members.userage',  'm.realname as prealname')->leftJoin('members AS m', 'm.id', '=', 'members.pid');
//        },'product'=>function($query){
//            $query->select('title','rate','term','id');
//        }]))->make(true);


//        return Datatables::of(Apply::all());
//
        $lists = Apply::with(['member'=>function($query){
            $query->select('members.mobile','members.id', 'members.realname', 'members.zhima', 'members.userage',  'm.realname as prealname')->leftJoin('members AS m', 'm.id', '=', 'members.pid');
        },'product'=>function($query){
            $query->select('title','rate','term','id', 'type');
        }]);

        return Datatables::of($lists)->make(true);

//        return Datatables::of(Apply::query())->make(true);
    }

    public function edit($id)
    {
        $info = Apply::find($id);
        if(!$info) return response('您查找的资源不存在',404)->view("errors.404");
        return response()->view('admin.apply-money',['info'=>$info]);
    }

    public function update(Request $request, $id)
    {
        $info = Apply::findOrFail($id);
        if($info->update($request->all())){
            return redirect()->route('admin.applys.index')->with('msg','修改成功');
        }
        return back()->withInput()->withErrors('修改失败');
    }

}
