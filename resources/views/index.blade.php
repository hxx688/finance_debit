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
<div class="swiper-container">
	<!-- Additional required wrapper -->
	<div class="swiper-wrapper">
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
				<p class="advertisingBy">{{ substr($v['member']['mobile'],0,3) }}****{{ substr($v['member']['mobile'],7) }}在{{ substr($v['created_at'],11,5) }}申请了<code>{{ $v['product']['title'] }}</code></p>
			@endforeach
		</div>
		<div class="weui-cell__bd advertisingBy-div swap">
		</div>
		<div class="weui-cell__ft"></div>
	</div>
</div>
<div class="loansRecommend">
	<div class="tit">
		<p></p>
		<p>信贷超市</p>
	</div>
	<ul class="loansRecommend">
		@foreach($products as $v)
			<li>
				<a href="javascript:void(0);" class="apply_action" data-id="{{ $v['id'] }}">
					<div class="credit-main">
						<div class="credit-main-f0 none-left-right">
							<div class="credit-title">
								<div class="logo-icon">
									<img src="{{ $v['logo'] }}" alt="" style="width: 50px; height: 50px; padding-right: 10px; border-right: 1px solid #f0f0f0;">
								</div>
								<div class="logo-icon" style="width: 150px;">
									<h4 class="ui-nowrap" style="font-size:23px; color: #3399FF; ">{{ $v['title'] }} </h4>
								</div>
								<button type="button" class="credit-btn" data-id="{{ $v['id'] }}">立即前往</button>

							</div>
							<div class="credit-amount-info" style="padding-left:1px; margin-top: -10px; padding-top: 0px;  float: left; ">
								<div class="credit-amount" style="border-right: 0px;">
									<span>{{ $v['quota'] }}</span>元
								</div>
								@foreach($v->tags as $t)
									<span class="label_detail_text">{{ $t['name'] }}</span>&nbsp;
								@endforeach
							</div>
							<div class="credit-condition">
								<p>申请人数：<span> {{ $v['number']+count($v->myApply) }}</span> </p>
								<p>@if($v['type']==1) 月利率： @else 日利率：@endif<span>{{ $v['rate'] }}%</span> </p>
							</div>
						</div>
					</div>

				</a>

			</li>

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
					<input class="weui-input" type="tel" placeholder="请输入真实姓名" id="username">
				</div>
			</div>
			<div class="weui-cell weui-cell_vcode ">
				<div class="weui-cell__bd">
					<input class="weui-input" type="tel" placeholder="请输入手机号" id="tel">
				</div>
			</div>
			<div class="weui-cell weui-cell_vcode">
				<div class="weui-cell__bd">
					<input class="weui-input" type="tel" placeholder="芝麻信用分" id="code" >
				</div>
			</div>

			<a href="javascript:;" class="weui-btn bind">前往</a>
		</div>
	</div>


	<div class="weui-loadmore weui-loadmore_line">
		<span class="weui-loadmore__tips">没有更多了</span>
	</div>
	<div class="weui-footer">
		<p class="weui-footer__text"></p>
		<p class="weui-footer__text">客服邮箱：1603012601@qq.com</p>
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
	<a href="/product" class="weui-tabbar__item">
		<div class="weui-tabbar__icon">
			<i class="iconfont icon-dkw_daikuan"></i>
		</div>
		<p class="weui-tabbar__label">信贷超市</p>
	</a>
	<a href="/my" class="weui-tabbar__item">
		<div class="weui-tabbar__icon">
			<i class="iconfont icon-dkw_geren"></i>
		</div>
		<p class="weui-tabbar__label">我的</p>
	</a>
</div>
</div>
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
    })

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
                    window.location.href="/redirect?link="+s.data;
                }
            },
            error: function(e){
                $.toptip(e.status+"-错误信息:"+e.statusText, 'error');
            }
        })
    })

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
        var code = $('#code').val();
        if(!(/^\d{2,4}$/.test(code))){
            $.toptip('芝麻信用分错误', 'error');
            $('#code').focus();
            return false;
        }

        $.ajax({
            url: '/bind',
            type: 'post',
            data: {username:username, mobile: mobile,code:code},
            success: function(s){
                (s.status == 1) ? $('.apply_action').click() : $.toptip(s.msg, 'error');
            },
            error: function(e){
                $.toptip(e.status+"-错误信息:"+e.statusText, 'error');
            }
        })
    })






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

    })
    $(function () {
        FastClick.attach(document.body);
    });
    $(".swiper-container").swiper({
        loop: true,
        autoplay: 3000
    });
</script>
</html>