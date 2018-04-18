<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Slide;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return response()->view('admin.slides-index',['lists'=>Slide::orderBy('sort','desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('admin.slides-create');
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
        if(Slide::create($request->all())){
            return redirect()->route('admin.slides.index')->with('msg','添加成功');
        }
        return back()->withInput()->withErrors('添加失败');
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
        return response()->view('admin.slides-create',['info'=>Slide::findOrFail($id)]);
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
        $info = Slide::findOrFail($id);
        if($info->update($request->all())){
            return redirect()->route('admin.slides.index')->with('msg','修改成功');
        }
        return back()->withInput()->withErrors('修改失败');
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
        $status = Slide::destroy($request->input('id')) ? 1 : 0;
        return response()->json($status);
    }
}