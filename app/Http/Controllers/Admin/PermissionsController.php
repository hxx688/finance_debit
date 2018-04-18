<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Permission;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $lists = Permission::orderBy('sort','desc')->get();
        $lists = Permission::cateList($lists);
        return response()->view('admin.permissions-index',['lists'=>$lists]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $pid = intval($request->input('pid'));
        return view('admin.permissions-create',['pid'=>$pid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Permission::create($request->all())){
            return back()->withInput()->withErrors('添加成功');
            return redirect()->route('admin.permissions.index')->with('msg','添加权限成功');
        }else{
            return back()->withInput()->withErrors('添加权限失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $info = Permission::find($id);
        if(!$info) return response('您查找的资源不存在',404)->view("errors.404");
        return response()->view('admin.permissions-create',['info'=>$info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $info = Permission::findOrFail($id);
        if($info->update($request->all())){
            return redirect()->route('admin.permissions.index')->with('msg','更新成功');
        }else{
            return back()->withInput()->withErrors('修改权限失败！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        if(empty($request->input('id'))) return back()->with('msg','参数为空');
        $status = Permission::destroy($request->input('id')) ? 1 : 0;
        if($request->ajax()){
            return response()->json($status);
        }
        $msg = ($status==1) ? '删除成功' : '删除失败';
        return back()->with('msg',$msg);
    }
}
