<!DOCTYPE html>
<?php
$url = env('INVITE_URL', 'http://localhost');
$user_id = session('id');

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telphone=no,email=no" />
    <meta http-equiv="Cache-Control" content="no-cache" />
    <link rel="stylesheet" href="/wechat/css/weui.min.css">
    <link rel="stylesheet" href="/wechat/css/jquery-weui.css">
    <link rel="stylesheet" href="/wechat/css/demos.css">
    <title>邀请函</title>
    <style>
       body,html{
			box-sizing: border-box;overflow: hidden;
		}
		.content{
			width: 100%;
			height: 100%;
			position: relative;
		}
		.invite{
			width:100%;height: 70%;background: url(/wechat/images/yaoqing.jpg) center center no-repeat;
			background-size: contain;
		}
		.btn{
			width: 65%;margin:0 auto;height:1.9rem;margin-top: 1rem;background: #dd8178;color: white;border-radius:1rem;font-size: .8rem; text-align: center;line-height: 1.9rem;
		}
		.confirm{
			position: absolute;width: 100%;height: 100%;top:0;left:0;background: #fff;display:none;
		}
		.grey{
			width: 80%;height: 80%;background: #e4e4e3;margin:10% auto;position: relative;
		}
		.confirm p{
			font-size: .12rem;color: #9e9f9f;width: 100%;text-align: center;letter-spacing:.1rem;margin-top: -5%;
		}
		.er{
			width: 1.6rem;height: 1.6rem;padding: 5px;background: #fff;position: absolute;left:50%;bottom: 1rem;margin-left: -.8rem;
		}
		.er div{width: 100%;height: 100%;background: url(/wechat/images/demo1.png) center center no-repeat;background-size: cover}
    </style>
</head>
<!-- JiaThis Button BEGIN -->
<script type="text/javascript">
    var shareUrl = "{{$user_id}}.{{ $url}}" + "?invite={{$user_id}}" ;
    var jiathis_config = {
        url: shareUrl,
        title: "自定义网页标题 #做个测试#",
        summary:"分享的文本摘要测试",
        imageWidth:158,
    }

</script>
<!-- JiaThis Button END -->

<body ontouchstar>
        <div class="content">
            <div class="invite">
            </div>
            <!-- JiaThis Button BEGIN -->
            <div id="ckepop">
                {{--<span class="jtico jtico_weixin" onclick="jiathis_sendto('weixin');return false;">微信</span>--}}
                <a class="jiathis_button_weixin">微信</a>
                <a class="jiathis_button_qzone">QQ空间</a>
                <a class="jiathis_button_cqq">qq</a>
                <a class="jiathis_button_tsina">新浪微博</a>
                <a class="jiathis_button_tqq">腾讯微博</a>
            </div>
            <script type="text/javascript" src="/js/share/jia.js" charset="utf-8"></script>
            <!-- JiaThis Button END -->
            <!-- Trigger -->
            <div>&nbsp;</div>
            <div >
                <input id="foo" readonly="readonly" style="width:70%">
                <button class="btn_share" data-clipboard-target="#foo">
                    复制分享链接
                </button>
            </div>


        </div>
</body>


<script src="/wechat/js/jquery-2.1.4.js"></script>
<script src="/wechat/js/jquery-weui.min.js"></script>
<script src="/wechat/js/fastclick.js"></script>
<script src="/wechat/js/swiper.min.js"></script>
<script src="/js/libs/clipboard.min.js"></script>
<script>

    $(document).ready(function(){
        var clipboard = new ClipboardJS('.btn_share');
        clipboard.on('success', function(e) {
            console.info('Action:', e.action);
            console.info('Text:', e.text);
            console.info('Trigger:', e.trigger);
            $.toptip('复制成功.', 'success');
            e.clearSelection();
        });

        clipboard.on('error', function(e) {
            console.error('Action:', e.action);
            console.error('Trigger:', e.trigger);
        });

        $("#foo").val(shareUrl)
    });

</script>

</html>