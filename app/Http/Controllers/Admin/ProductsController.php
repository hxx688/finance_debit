<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Tag;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lists = Product::with(['tags'=>function($query){
            $query->select('name');
        },'myApply'=>function($query){
            $query->select('members.id');
        }])->orderBy('sort','desc')->get();
        return response()->view('admin.products-index',['lists'=>$lists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('admin.products-create',['tags'=>Tag::get()]);
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
        DB::beginTransaction();
        if($info = Product::create($request->all())){
            foreach ($request->input('tags_id') as $v) {
                DB::table('product_tag')->insert(['product_id'=>$info->id,'tag_id'=>$v]);
            }
            DB::commit();
            return redirect()->route('admin.products.index')->with('msg','添加成功');
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
        return response()->view('admin.products-create',['info'=>Product::findOrFail($id),'tags'=>Tag::get(),'old'=>DB::table('product_tag')->where('product_id',$id)->lists('tag_id')]);
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
        $info = Product::findOrFail($id);
        DB::beginTransaction();
        if($info->update($request->all())){
            DB::table('product_tag')->where('product_id',$id)->delete();
            foreach ($request->input('tags_id') as $v) {
                DB::table('product_tag')->insert(['product_id'=>$id,'tag_id'=>$v]);
            }
            DB::commit();
            return redirect()->route('admin.products.index')->with('msg','修改成功');
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
        $status = Product::destroy($request->input('id')) ? 1 : 0;
        return response()->json($status);
    }
}
