<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::post('/uploads','OtherController@uploads');
Route::post('/send','OtherController@sendCode');
Route::group(['middleware' => ['web']], function () {
	Route::get('/','WechatController@index');
	Route::get('/product','WechatController@lists');
	Route::get('/product/{id}','WechatController@show')->where('id', '[0-9]+');
	Route::get('/my','WechatController@my');
	Route::get('/log','WechatController@logs');
	Route::get('/invite',function(){
		return view('invite');
	});
	Route::get('/info',function(){
		$info = \App\Member::where('id',session('id'))->first(['realname','sex','area','profession','zhifubao','wechat']);
		return view('info',['info'=>$info]);
	});
    Route::get('/share',function(){
        return view('share');
    });
    Route::get('/my_slaves','WechatController@my_slaves');
	Route::post('/ajaxSetInfo','WechatController@ajaxSetInfo');
	Route::get('/redirect','WechatController@redirect');
	Route::get('/check','WechatController@check');
	Route::post('/bind','WechatController@bind');
    Route::post('/userlogin','WechatController@login');
	Route::post('/apply','WechatController@apply');
    Route::any('/applyNewWin','WechatController@applyNewWin');

});

Route::group(['middleware'=>['auth'],'prefix'=>'admin','namespace'=>'Admin'], function(){
	Route::get('/', ['as'=>'admin','uses'=>'IndexController@index']);
	Route::resource('/slides','SlidesController');
	Route::resource('/tags','TagsController');
	Route::get('/members',['as'=>'admin.members.index','uses'=>'MembersController@index']);
	Route::post('/members/{id}',['as'=>'admin.members.handle','uses'=>'MembersController@handle']);
	Route::resource('/products','ProductsController');
	Route::resource('/applys','ProductsController');
    Route::resource('/applysOpt','ApplysController');
	Route::get('/applys',['as'=>'admin.applys.index','uses'=>'ApplysController@index']);
	Route::resource('/permissions','PermissionsController');
	Route::resource('/user','UserController');
});
