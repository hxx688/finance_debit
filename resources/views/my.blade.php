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
    <title>个人中心</title>
    <style>
        .background-img {
            width: 100%;
            height: 7.5rem;
            background: url(/wechat/images/Sale.jpg) no-repeat;
            background-size: 100%;
            font-size: .3rem;
            color: #fff;
            text-align: center;
            padding-top: 1rem;
            box-sizing: border-box
        }

        .head {
            margin-left: -1.9rem;
            width: 3.8rem;
            height: 3.8rem;
            position: relative;
            left: 50%;
        }

        .head img {
            width: 100%;
            max-height: 100%;
            border-radius: 50%;
        }

        .head-inner {
            text-align:center;
            font-size: 1rem;
            margin-top:3px;
            line-height: 1;
            color: #fff;
            font-family: STXinwei, Helvetica, 'Hiragino Sans GB', 'Microsoft Yahei', '微软雅黑', Arial, sans-serif;
        }

        .background-img p {
            position: relative;
            top: .1rem
        }

        .weui-grid__icon {
            width: 2rem;
            height: 2rem;
        }
        .container {
            width: 100%;
            height: 100%;
            display: -webkit-box;
            -webkit-box-orient: block-axis;
            background-color: #edf3f3;
        }
    </style>
</head>

<body ontouchstar>
    <div class="background-img">
        <div class="head">
            <img src="{{ empty(session('wechat.oauth_user.avatar')) ? '/img/getheadimg.jpg' : session('wechat.oauth_user.avatar') }}" alt="">
        </div>
        <p class="head-inner">{{ empty(session('wechat.oauth_user.nickname')) ? '任性花' : session('wechat.oauth_user.nickname') }}</p>
    </div>
    <div class="weui-grids">
        <a href="/log" class="weui-grid js_grid apply">
            <div class="weui-grid__icon">
                <img src="/wechat/images/icon_nav_new.png" alt="">
            </div>
            <p class="weui-grid__label ">
                申请记录
            </p>
        </a>
        <a href="/invite" class="weui-grid js_grid">
            <div class="weui-grid__icon">
                <img src="/wechat/images/serviceHotline.png" alt="">
            </div>
            <p class="weui-grid__label">
                立即推广
            </p>
        </a>
        <a href="/info" class="weui-grid js_grid Business">
            <div class="weui-grid__icon">
                <img src="/wechat/images/businessCooperation.png" alt="">
            </div>
            <p class="weui-grid__label">
                个人信息
            </p>
        </a>
        <a href="/my_slaves" class="weui-grid js_grid about">
            <div class="weui-grid__icon">
                <img src="/wechat/images/aboutUs.png" alt="">
            </div>
            <p class="weui-grid__label">
                我的下线
            </p>
        </a>
        <a href="javascript:;" class="weui-grid js_grid pause">
            <div class="weui-grid__icon">
                <img src="/wechat/images/font-Dk-Active.png" alt="">
            </div>
            <p class="weui-grid__label">
                我的佣金
            </p>
        </a>
        <a href="javascript:;" class="weui-grid js_grid message">
            <div class="weui-grid__icon">
                <img src="/wechat/images/myMsg.png" alt="">
            </div>
            <p class="weui-grid__label">
                客服热线
            </p>
        </a>
    </div>
    <div style="height:2.5rem;width:100%;"></div>
    <div class="weui-tabbar">
        <a href="/" class="weui-tabbar__item">
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
        <a href="/my" class="weui-tabbar__item weui-bar__item--on">
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
    $('.message').on('click', function () {
        $.alert("1603012601@qq.com", "客服邮箱");
    })

    $('.pause').on('click', function () {
        $.alert("稍后开放", "提示");
    })
</script>

</html>