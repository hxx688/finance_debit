<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telphone=no,email=no" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<link rel="stylesheet" href="/wechat/css/weui.min.css">
	<link rel="stylesheet" href="/wechat/css/jquery-weui.css">
	<link rel="stylesheet" href="/wechat/css/demos.css">
	<link rel="stylesheet" type="text/css" href="/wechat/css/iconfont.css">
	<link rel="stylesheet" type="text/css" href="/wechat/css/index.css">
    <title>信贷超市</title>
    <style>
    .home-header{
        height: 2rem;
        width:100%;
        text-align: center;
        color: #fff;
        background: #448aca;
        line-height: 2rem;
        font-size: 1rem;
    }

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
    <div class="home-header">信贷超市</div>
	<div class="loansRecommend">
		<ul class="loansRecommend">
			@foreach($products as $v)
			<a href="/product/{{ $v['id'] }}">
				<li>
					<div class="credit-main">
						<div class="credit-main-f0 none-left-right">
							<div class="credit-title">
								<div class="logo-icon">
									<img src="{{ $v['logo'] }}" alt="" style="width: 50px; height: 50px; padding-right: 10px; border-right: 1px solid #f0f0f0;">
								</div>
								<div class="logo-icon" style="width: 150px;">
									<h4 class="ui-nowrap" style="font-size:23px; color: #3399FF; ">{{ $v['title'] }} </h4>
								</div>

								<button type="button" onclick="window.location.href='/product/{{ $v['id'] }}'" class="credit-btn apply" data-id="{{ $v['id'] }}">查看详情</button>

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
				</li>
			</a>
			@endforeach
		</ul>
	</div>
	<div class="weui-loadmore weui-loadmore_line">
	  <span class="weui-loadmore__tips">没有更多了</span>
	</div>
	<div class="weui-footer">
	  <p class="weui-footer__text"></p>
	  <p class="weui-footer__text">客服手机（微信）：13105029078</p>
	</div>
	<div style="height:2.5rem;width:100%;"></div>
	<div class="weui-tabbar">
		<a href="/" class="weui-tabbar__item">
		  <div class="weui-tabbar__icon">
			<i class="iconfont icon-dkw_bangdingyunyingshang"></i>
		  </div>
		  <p class="weui-tabbar__label">首页</p>
		</a>
		<a href="/product" class="weui-tabbar__item weui-bar__item--on">
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
	$(function () {
		FastClick.attach(document.body);
	});
</script>
<script>
</script>

</html>