<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telphone=no,email=no" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="/wechat/css/weui.min.css">
	<link rel="stylesheet" href="/wechat/css/jquery-weui.css">
	<link rel="stylesheet" href="/wechat/css/demos.css">
	<link rel="stylesheet" type="text/css" href="/wechat/css/iconfont.css">
	<link rel="stylesheet" type="text/css" href="/wechat/css/index.css">
	<title>首页</title>
	<style>
		code{
			color: #a90329
		}
		.weui-cells{ height:40px;overflow:hidden;}
		.weui-cell_access{ height:26px;  color:#fff; padding-left:10px; margin:8px 0; overflow:hidden; position:relative;}
		.news_li,.swap{width:100%; line-height:19px; display:inline-block; position:absolute; top:0; left:62px;}
		.swap{top:19px;}
		.advertisingBy-div p{height:26px !important;line-height:26px;margin-top:.3px}

		.label_detail_text {
			background: #fff9f0;
			display: inline-block;
			color: #ffac36;
			height: 1rem;
			line-height: 1rem;
			font-size: small;
			font-weight: 200;
			margin-top: .4rem;
		}
	</style>

</head>

<body ontouchstar>
<div class="swiper-container" style="height:20%";>
	<!-- Additional required wrapper -->
	<div class="swiper-wrapper" >
		<!-- Slides -->
		@foreach($slides as $v)
			<div class="swiper-slide">
				<a href="{{ $v['link'] }}"><img src="{{ $v['img'] }}" /></a>
			</div>
		@endforeach
	</div>
	<!-- If we need pagination -->
	<div class="swiper-pagination"></div>
</div>
<div class="weui-cells">
	<div class="weui-cell weui-cell_access" href="javascript:;" style="padding:0">
		<div class="weui-cell__hd displaymsg">
			<span>贷款消息</span>
		</div>
		<div class="weui-cell__bd advertisingBy-div news_li">
			@foreach($apply as $v)
				<p class="advertisingBy">{{ substr($v['member']['mobile'],0,3) }}****{{ substr($v['member']['mobile'],7) }}在{{ substr($v['created_at'],11,5) }}成功申请了{{ $v['product']['title'] }}并下款了<code>{{ floatval($v['money']) }}元</code></p>
			@endforeach
		</div>
		<div class="weui-cell__bd advertisingBy-div swap">
		</div>
		<div class="weui-cell__ft"></div>
	</div>
</div>
<div class="loansRecommend">
	<p style="height:1px"></p>
	<ul class="loansRecommend">
		@foreach($products as $key=>$v)
			@if ($key%2 == 0)
				<li style=" @if (($key + 1) == count($products) ) width:100%;  @else width: 50%; @endif   border-bottom: 1px #D3D3D3 ;    float: left; ">
					<a  @if( Session::get('id') > 0 ) href="/applyNewWin?id={{$v['id']}}" target="_blank" @else class="apply_action" href="javascript:void(0);" @endif data-id="{{ $v['id'] }}">
						<div class="credit-main">
							<div class="credit-main-f0 none-left-right" style="padding: 0.2em;">
								<div class="credit-title">
									<div class="logo-icon" style="padding: 1px 1px; ">
										<img src="{{ $v['logo'] }}" alt="" style="width: 50px; height: 50px; padding-right: 10px; border-right: 1px solid #f0f0f0;">
									</div>
									<div class="logo-icon" style="" style="padding: 1px 1px;">
										<h4 class="ui-nowrap" style="font-size: 0.6em; line-height: 1.2em; height: 1.2em; color: #3399FF; margin-bottom: 0.3em;">{{ $v['title'] }} </h4>
										<p style="height: 1.0em;font-size: 0.5em; line-height: 1.0em; color: #ff9600;margin-bottom: 0.3em;">{{ $v['quota'] }}元</p>
										<p style=" height: 1.0em;font-size: 0.5em; line-height: 1.0em; color: #ff9600;"><font style="color: red; font-weight: normal;">{{ $v['number']+count($v->myApply) }}</font> 人申请 </p>
									</div>


								</div>
							</div>
						</div>
					</a>
				</li>
			@else
				<li style=" width: 50%; border-bottom: 1px #D3D3D3 ;    float: left;  ">
					<a  @if( Session::get('id') > 0 ) href="/applyNewWin?id={{$v['id']}}" target="_blank" @else class="apply_action" href="javascript:void(0);" @endif data-id="{{ $v['id'] }}">
						<div class="credit-main">
							<div class="credit-main-f0 none-left-right" style="padding: 0.2em;">
								<div class="credit-title">
									<div class="logo-icon" style="padding: 1px 1px;">
										<img src="{{ $v['logo'] }}" alt="" style="width: 50px; height: 50px; padding-right: 10px; border-right: 1px solid #f0f0f0;">
									</div>
									<div class="logo-icon" style="" style="padding: 1px 1px;">
										<h4 class="ui-nowrap" style="font-size: 0.6em; line-height: 1.2em; height: 1.2em; color: #3399FF; margin-bottom: 0.3em;">{{ $v['title'] }}</h4>
										<p style="height: 1.0em;font-size: 0.5em; line-height: 1.0em; color: #ff9600;margin-bottom: 0.3em;">{{ $v['quota'] }}元</p>
										<p style="height: 1.0em;font-size: 0.5em; line-height: 1.0em; color: #ff9600;"><font style="color: red; font-weight: normal;">{{ $v['number']+count($v->myApply) }}</font> 人申请 </p>
									</div>
								</div>
							</div>
						</div>
					</a>
				</li>
			@endif
		@endforeach
	</ul>

	<div id="half" class="weui-popup__container popup-bottom">
		<div class="weui-popup__overlay" onclick="$('.weui-tabbar').show();" ></div>
		<div class="weui-popup__modal">
			<div class="panter0">
				<div class="dialog-title">前 往</div>
				<span class="new-close">
                        <img src="/wechat/images/close.png" alt="">
                    </span>
			</div>
			<div class="weui-cell weui-cell_vcode ">
				<div class="weui-cell__bd">
					<input class="weui-input"  placeholder="请输入真实姓名" id="username">
				</div>
			</div>
			<div class="weui-cell weui-cell_vcode ">
				<div class="weui-cell__bd">
					<input class="weui-input" type="tel" placeholder="请输入手机号" id="tel">
				</div>
			</div>
			<div class="weui-cell weui-cell_vcode ">
				<div class="weui-cell__bd">
					<input class="weui-input"  placeholder="请输入密码" id="pwd">
				</div>
			</div>
			<div class="weui-cell weui-cell_vcode">
				<div class="weui-cell__bd">
					<input class="weui-input" type="tel" placeholder="芝麻信用分" id="code" >
				</div>
			</div>

			<div class="weui-cell weui-cell_vcode">
				<div class="weui-cell__bd">
					<input class="weui-input" type="tel" placeholder="年龄" id="userage" >
				</div>
			</div>

			<a class="weui-btn bind" >前往</a>
		</div>
	</div>


	<div class="weui-loadmore weui-loadmore_line ">
		<span class="weui-loadmore__tips">没有更多了</span>
	</div>
	<div class="weui-footer">
		<p class="weui-footer__text"></p>
		<p class="weui-footer__text">客服手机（微信）：13197170198</p>
	</div>
</div>
<div style="height:2.5rem;width:100%;"></div>
<div class="weui-tabbar">
	<a href="/" class="weui-tabbar__item weui-bar__item--on">
		<div class="weui-tabbar__icon">
			<i class="iconfont icon-dkw_bangdingyunyingshang"></i>
		</div>
		<p class="weui-tabbar__label">首页</p>
	</a>
	<a href="/my" class="weui-tabbar__item">
		<div class="weui-tabbar__icon">
			<i class="iconfont icon-dkw_geren"></i>
		</div>
		<p class="weui-tabbar__label">个人中心</p>
	</a>
</div>
</div>
<a href="#" id="forward_product" style="display: none" target="_blank"></a>
</body>
<script src="/wechat/js/jquery-2.1.4.js"></script>
<script src="/wechat/js/jquery-weui.min.js"></script>
<script src="/wechat/js/fastclick.js"></script>
<script src="/wechat/js/swiper.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>

    /** jump begin **/
    $('.new-close').click(function(){
        $.closePopup();
        $('.weui-tabbar').show();
        $('body').css({'position':'relative'})
    });

    $('.apply_action').click(function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/apply',
            type: 'post',
            data: {id: id,money:$('.loanMoneySelect').val(),long:$('.loanTimeSelect').val()},
            success: function(s){
                if(s.status == -1){
                    $("#half").popup();
                    $('.weui-tabbar').hide();
                }else if(s.status == 0){
                    $.toptip(s.msg, 'error')
                }else if(s.status == 1){
                    $.toptip('正在为您跳转...', 'success');
                    var _url = "/redirect?link="+s.data;
                    window.location.href = _url;

                }
            },
            error: function(e){
                $.toptip(e.status+"-错误信息:"+e.statusText, 'error');
            }
        })
    });

    $('.bind').on('click',function(){
        var username = $("#username").val();
        if(username == "" || username.length <= 1) {
            $.toptip('请输入正确的姓名', 'error');
            $("#username").focus();
            return false;
        }

        var mobile = $('#tel').val();
        if(!(/^1[34578]\d{9}$/.test(mobile))){
            $.toptip('手机号码格式错误', 'error');
            $('#tel').focus();
            return false;
        }

        var pwd = $("#pwd").val();
        if(pwd == "" || pwd.length < 6) {
            $.toptip('密码的长度不能小于6位', 'error');
            $("#pwd").focus();
            return false;
        }
        var code = $('#code').val();
        if(!(/^\d{2,4}$/.test(code))){
            $.toptip('芝麻信用分错误', 'error');
            $('#code').focus();
            return false;
        }

        var userage = $('#userage').val();
        if(!(/^\d{1,4}$/.test(userage)) || userage > 120 || userage < 1){
            $.toptip('年龄输入错误', 'error');
            $('#userage').focus();
            return false;
        }

        $.ajax({
            url: '/bind',
            type: 'post',
            data: {username:username, mobile: mobile,code:code, userage: userage, pwd: pwd},
            success: function(s){
                (s.status == 1) ? window.location.reload() : $.toptip(s.msg, 'error');
            },
            error: function(e){
                $.toptip(e.status+"-错误信息:"+e.statusText, 'error');
            }
        })
    });




    /** jump end **/


    function b(){
        t = parseInt(x.css('top'));
        y.css('top','26px');
        x.animate({top: t - 26 + 'px'},'slow');	//19为每个li的高度
        if(Math.abs(t) == h-26){ //19为每个li的高度
            y.animate({top:'0px'},'slow');
            z=x;
            x=y;
            y=z;
        }
        setTimeout(b,3000);//滚动间隔时间 现在是3秒
    }
    $(document).ready(function(){
        $('.swap').html($('.news_li').html());
        x = $('.news_li');
        y = $('.swap');
        h = $('.news_li p').length * 26; //19为每个li的高度
        setTimeout(b,3000);//滚动间隔时间 现在是3秒

    });
    $(function () {
        FastClick.attach(document.body);
    });
    $(".swiper-container").swiper({
        loop: true,
        autoplay: 3000
    });
</script>
</html>