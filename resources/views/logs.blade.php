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
    <title>申请记录</title>
<body ontouchstar>
    <div class="weui-panel">
            <div class="weui-panel__bd">
            @foreach($lists as $v)
              <div class="weui-media-box weui-media-box_text">
                <h4 class="weui-media-box__title">申请产品</h4>
                <p class="weui-media-box__desc">{!! empty($v['product']['title']) ? '<code style="color:#ff3b30">已停止合作</code>' : $v['product']['title'] !!}</p>
                <ul class="weui-media-box__info">
                  <li class="weui-media-box__info__meta">{{ $v['created_at'] }}</li>
                </ul>
              </div>
            @endforeach
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