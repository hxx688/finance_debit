<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Member;
use App\Http\Requests;

class OtherController extends Controller
{
    //
    public function uploads(Request $request){
        if(!$request->hasFile('file')){
                return response()->json(['errno'=>1,'文件不存在']);
            }
            $file = $request->file('file');
            if(!$file->isValid()){
                return response()->json(['errno'=>1,'msg'=>'文件检测失败']);
            }
            $destPath = realpath(public_path('upload'));
            $destPath .= '/'.date('Ymd');
            if(!file_exists($destPath)){
                mkdir($destPath,0777,true);
            }
            $filename = md5(time().str_random(10)).'.'.$file->getClientOriginalExtension();
            if($file->move($destPath,$filename)){
                return response()->json(['errno'=>0,'data'=>'/upload/'.date('Ymd').'/'.$filename]);
            }
            return response()->json(['errno'=>1,'msg'=>'上传失败']);
    }

    public function sendCode(Request $request){

        if(!$this->checkMobile($request->input('mobile'))){
            return response()->json(['status'=>0,'msg'=>'手机号验证失败','data'=>null]);
        }
        $text = '【每天花】您的验证码是#code#。如非本人操作，请忽略本短信';
        $res  = $this->send($request->input('mobile'),$text);
        if($res !== false){
            return response()->json(['status'=>1,'msg'=>'ok','data'=>null]);
        }
        return response()->json(['status'=>0,'msg'=>'发送失败,请稍后再试！','data'=>null]);
    }

    protected function curlPost($url,$data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:text/plain;charset=utf-8', 'Content-Type:application/x-www-form-urlencoded','charset=utf-8'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //不验证证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //不验证证书

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    protected function checkMobile($mobile){
        if(strlen($mobile)!=11) return false;
        if(preg_match('/^1(3|5|7|8)\d{9}/',$mobile)){
            return true;
        }
        return false;
    }

    protected function send($mobile,$text){
        $code = rand(1000,9999);
        $text = str_replace('#code#', $code, $text);
        $res = json_decode($this->curlPost(env('MOBILE_URL'),http_build_query(['text'=>$text,'apikey'=>env('MOBILE_KEY'),'mobile'=>$mobile])),true);
//        Log::info("sms result: ". $res);
        if($res != null ) {
            Log::info(implode('-', $res));
            if ($res['code'] == 0) {
                session(['code' => $code, 'mobile_bind' => $mobile]);
                return true;
            }
        }
        return false;
    }
}
