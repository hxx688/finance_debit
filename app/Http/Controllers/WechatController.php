<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wechat;
use App\Slide;
use App\Apply;
use App\Member;
use App\Product;
use App\Http\Requests;

class WechatController extends Controller
{
    //
    public function index(Request $request){
    	$slides = Slide::orderBy('sort','desc')->get();
    	$products = Product::with(['tags'=>function($query){
    	    $query->select('name');
    	},'myApply'=>function($query){
    	    $query->select('members.id');
    	}])->orderBy('sort','desc')->get(['id','title','logo','number','quota','type','term','rate', 'link']);
        $apply = Apply::with(['product'=>function($query){
            $query->select('id','title');
        },'member'=>function($query){
            $query->select('mobile','id');
        }])->get();
        $invite = $request->input('invite');
        if(strlen($invite)>0) {
            session(['invite'=>$invite]);
        }

    	return response()->view('index',['slides'=>$slides,'products'=>$products,'apply'=>$apply]);
    }

    public function show($id){
    	$info =  Product::with(['myApply'=>function($query)use($id){
    		$query->where('product_id',$id)->select('members.id');
    	},'tags'=>function($query)use($id){
            $query->where('product_id',$id)->select('name');
        }])->findOrFail($id);
    	return response()->view('show',['info'=>$info]);
    }

    public function lists(){
    	$products = Product::with(['tags'=>function($query){
    	    $query->select('name');
    	},'myApply'=>function($query){
    	    $query->select('members.id');
    	}])->orderBy('sort','desc')->get(['id','title','logo','number','quota','type','term','rate']);
    	return response()->view('lists',['products'=>$products]);
    }

    public function my_slaves(){
        $uid = session('id');
//        $users = Member::with(['this'=>function($query)use($uid){
//            $query->where('pid',$uid);
//        }])->orderBy('id','desc')->get();
        $users =  Member::where(['pid'=>$uid])->get();
        return response()->view('my_slaves',['users'=>$users]);
    }

    public function my(){
    	if(empty(session('id'))) return response()->view('bind');
    	return response()->view('my');
    }

    public function bind(Request $request){
    	$mobile = $request->input('mobile');
    	if(strlen($mobile)!=11) return response()->json(['status'=>0,'msg'=>'手机号长度错误']);
        if(!preg_match('/^1(3|5|7|8)\d{9}/',$mobile)){
            return response()->json(['status'=>0,'msg'=>'手机号验证失败']);
        }

        $username = $request->input('username');
        if(strlen($username)<=1) return response()->json(['status'=>0,'msg'=>'清输入完整姓名']);

    	$code = $request->input('code');

    	$invite_id = 0;
        if(!empty(session('invite'))) {
            $invite_id = session('invite');
        }

    	if(empty(session('wechat.oauth_user'))){
            if($info = Member::where('mobile',$mobile)->first(['id'])){
                session(['id'=>$info->id,'mobile'=>$mobile]);
                return response()->json(['status'=>1,'msg'=>'ok','data'=>null]);
            }
    		$info = Member::create(['mobile'=>$mobile, 'pid'=>$invite_id, 'zhima'=>$code, 'realname'=>$username]);

    		if($info){
    			session(['id'=>$info->id,'mobile'=>$mobile]);
    			return response()->json(['status'=>1,'msg'=>'ok','data'=>null]);
    		}else{
    			return response()->json(['status'=>0,'msg'=>'[create]发生未知错误，请稍后再试！','data'=>null]);
    		}
    	}
    	$info = Member::find(session('id'));
    	if($info->update(['mobile'=>$mobile])){
    		session(['id'=>$info->id,'mobile'=>$mobile]);
    		return response()->json(['status'=>1,'msg'=>'ok','data'=>null]);
    	}
    	return response()->json(['status'=>0,'msg'=>'[update]发生未知错误，请稍后再试！','data'=>null]);
    }

    public function logs(){
        $lists = Apply::with(['product'=>function($query){
            $query->select('id','title');
        }])->where('member_id',session('id'))->orderBy('id','desc')->get();
    	return response()->view('logs',['lists'=>$lists]);
    }
    public function redirect(Request $request){
        return redirect($request->get('link'));
    }
    public function check(){
        if(!empty(session('mobile'))){
            return response()->json(1);
        }
        return response()->json(0);
    }
    public function apply(Request $request){
    	$id = $request->input('id');
    	$info = Product::find($id);
    	if(!$info) return response()->json(['status'=>0,'msg'=>'产品未找到,或已经停止合作！','data'=>null]);
    	if(empty(session('mobile'))){
    		return response()->json(['status'=>-1,'msg'=>'ok','data'=>null]);
    	}
    	if(Apply::create(['member_id'=>session('id'),'product_id'=>$id,'money'=>$request->input('money'),'long'=>$request->input('long')])){
    		return response()->json(['status'=>1,'msg'=>'ok','data'=>$info->link]);
    	}
    	return response()->json(['status'=>0,'msg'=>'发生错误，请稍后再试！','data'=>null]);
    }

    public function ajaxSetInfo(Request $request){
        $info = Member::findOrFail(session('id'));
        if($info->update([
            'realname'=>$request->input('realname'),
            'sex'=>$request->input('sex'),
            'area'=>$request->input('area'),
            'profession'=>$request->input('profession'),
            'zhifubao'=>$request->input('zhifubao'),
            'wechat'=>$request->input('wechat'),
        ])){
            return response()->json(['status'=>1,'msg'=>'ok']);
        }
        return response()->json(['status'=>0,'msg'=>'数据更新失败']);
    }
}
