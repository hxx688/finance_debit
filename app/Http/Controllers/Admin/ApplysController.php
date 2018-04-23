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
