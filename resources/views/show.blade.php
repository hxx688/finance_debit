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
    <link rel="stylesheet" type="text/css" href="/wechat/css/shop2.css">
    <title>{{ $info['title'] }}</title>

</head>

<body ontouchstar>
    <div class="container">
        <div class="brochure">
            <img src="{{ $info['logo'] }}" alt="">
            <div>
                <span>{{ $info['title'] }}</span>
                <p>借款成功率
                    <span>{{ rand(95,99) }}%</span>
                </p>
            </div>
            <i class="top-line"></i>
            <ul>
                @foreach($info->tags as $v)
                <li>{{ $v['name'] }}</li>
                @endforeach
            </ul>
        </div>
        <table class="loanDetails">
            <tbody>
                <tr>
                    <td>额度</td>
                    <td>{{ $info['quota'] }}</td>

                </tr>
                <tr>
                    <td>借款期限</td>
                    <td>{{ $info['term'] }}{{ ($info['type']==1) ? '月' : '天' }}</td>
                </tr>
                <tr>
                    <td>参考费率</td>
                    <td>{{ $info['rate'] }}%/{{ ($info['type']==1) ? '月' : '天' }}</td>
                </tr>
                <tr>
                    <td>最快放款</td>
                    <td>{{ $info['loan'] }}</td>
                </tr>
            </tbody>
        </table>
        <div class="applyR">
        <div style=" border-bottom: 1px solid #ddd;padding: .35rem .35rem;font-size:.8rem;margin: 0 .48rem;">申请条件</div>
            {!! $info['content'] !!}
        </div>
        <div class="js-auth-list-container">
            <div>认证资料</div>
            <div>
                <p>
                    <img src="/wechat/images/icon_auth_REAL_NAME_AUTH.png" alt="">
                </p>
                <p>
                    <span>身份认证</span>
                    <span>认证您的身份信息，确保本人信息</span>
                </p>

            </div>
            <div>
                <p>
                    <img src="/wechat/images/icon_auth_BASE_INFO_AUTH.png" alt="">
                </p>
                <p>
                    <span>基本信息</span>
                    <span>认证您的基本信息，以便提供更好的服务</span>
                </p>

            </div>
            <div>
                <p>
                    <img src="/wechat/images/icon_auth_MOBILE_OPERATOR_AUTH.png" alt="">
                </p>
                <p>
                        <span>手机认证</span>
                        <span>认证您的所有运营商信息，可以加快放款速度</span>
                    </p>
            </div>
            <div>
                <p>
                    <img src="/wechat/images/icon_auth_SESAME_AUTH.png" alt="">
                </p>
                <p>
                        <span>芝麻信用</span>
                        <span>认证您的芝麻积分，可以提高你的借款额度</span>
                    </p>
            </div>
        </div>
        <div style="height:2.8rem;width:100%;"></div>
        <div class="reserve">
            <div class="apply"  data-id="{{ $info['id'] }}">
                立即借款
            </div>  
           
        </div>
    </div>
    <div id="half" class="weui-popup__container popup-bottom">
            <div class="weui-popup__overlay"></div>
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
    $('.new-close').click(function(){
        $.closePopup();
        $('body').css({'position':'relative'})
    })
    $('.apply').click(function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/apply',
            type: 'post',
            data: {id: id,money:$('.loanMoneySelect').val(),long:$('.loanTimeSelect').val()},
            success: function(s){
                if(s.status == -1){
                    $("#half").popup();
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
</script>
<script>
    $(function () {
        FastClick.attach(document.body);
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
                (s.status == 1) ? $('.apply').click() : $.toptip(s.msg, 'error');
            },
            error: function(e){
                $.toptip(e.status+"-错误信息:"+e.statusText, 'error');
            }
        })
    })
    var countdown=60;
    function sendemail(){
        var mobile = $('#tel').val();
        if(!(/^1[34578]\d{9}$/.test(mobile))){ 
            $.toptip('手机号码格式错误', 'error');
            $('#tel').focus();
            return false;
        }
        $.ajax({
            url: '/send',
            type: 'post',
            data: {mobile: mobile},
            success: function(s){
                (s.status == 1) ? settime($('.weui-vcode-btn')) : $.toptip(s.msg, 'error');
            },
            error: function(e){
                $.toptip(e.status+"-错误信息:"+e.statusText, 'error');
            }
        })
    }
    function settime(obj) {
    if (countdown == 0) { 
        obj.attr('disabled',false);
        obj.text("验证码");
        countdown = 60; 
        return;
    } else { 
        obj.attr('disabled',true);
        obj.text("(" + countdown + ")s后");
        countdown--; 
    } 
    setTimeout(function() { 
        settime(obj) }
      ,1000) 
    }
</script>

</html>