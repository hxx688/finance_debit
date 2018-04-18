<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $fillable = ['name','display_name','description','icon','menu','pid','sort'];

    protected function cateMenu($cate = [],$pid = 0){
    	$arr = [];
    	foreach ($cate as $v) {
    		if($v['pid'] == $pid){
    			$v['child'] = self::cateMenu($cate,$v['id']);
    			$arr[] = $v;
    		}
    	}
    	return $arr;
    }

    protected function cateList($cate = [],$pid = 0,$level = 0,$html = '|--'){
        $arr = [];
        foreach ($cate as $v) {
            if($v['pid'] == $pid){
                $v['html'] = str_repeat($html,$level);
                $v['level'] = $level;
                $arr[] = $v;
                $arr = array_merge($arr,self::cateList($cate,$v['id'],$level+1));
            }
        }
        return $arr;
    }
}
