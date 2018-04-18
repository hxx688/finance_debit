
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
    <link rel="stylesheet" type="text/css" href="/wechat/css/shop-detail.css">
    <title>{{ $info['title'] }}</title>
    <style>
        .applyR h2{
            display:block;
             color: #000;
             margin:0 .48rem;
             padding: .35rem 0rem;
             border-bottom: 1px solid #ddd;
             font-weight: 400;
        }
        .applyR h4{
            color: #000;
            padding: .2rem .48rem 0rem;
            font-weight: 400

        }
    </style>
</head>

<body ontouchstar>
    <div class="container">
        <div class="brochure">
            <span>{{ $info['title'] }}</span>
            <p>简介：{{ $info['introduction'] }}</p>
        </div>
        <table class="loanDetails">
            <tbody>
                <tr>
                    <td>额度</td>
                    <td>利率</td>
                    <td>期限</td>
                    <td>最快放款</td>
                </tr>
                <tr>
                    <td>{{ $info['quota'] }}</td>
                    <td>{{ $info['rate'] }}%/{{ ($info['type']==1) ? '月' : '天' }}</td>
                    <td>{{ $info['term'] }}{{ ($info['type']==1) ? '月' : '天' }}</td>
                    <td>{{ $info['loan'] }}</td>
                </tr>
            </tbody>
        </table>
        <form action="javascript:;" class="select">
            <label>贷款金额 </label>
            <input type="number" min="{{ head(explode('-',$info['quota'])) }}" max="{{ last(explode('-',$info['quota'])) }}" step="1" value="{{ head(explode('-',$info['quota'])) }}" class="loanMoneySelect">元
            <span>{{ ($info['type']==1) ? '月' : '天' }}</span>
            <input type="number" min="{{ head(explode('-',$info['term'])) }}" max="{{ last(explode('-',$info['term'])) }}" step="1" value="{{ head(explode('-',$info['term'])) }}" class="loanTimeSelect">
            <label class="loanRanTime">贷款期限 </label>
        </form>
        <table class="loanRate">
            <tbody>
                <tr>
                    <td>{{ ($info['type']==1) ? '月' : '天' }}利率</td>
                    <td>{{ ($info['type']==1) ? '月' : '天' }}还款（元）</td>
                    <td>总利息（元）</td>
                </tr>
                <tr>
                    <td>{{ $info['rate'] }}%</td>
                    <td class="still">{{ (head(explode('-',$info['quota']))*$info['rate']/100*head(explode('-',$info['term']))+head(explode('-',$info['quota'])))/head(explode('-',$info['term'])) }}</td>
                    <td class="interest">{{ head(explode('-',$info['quota']))*$info['rate']/100*head(explode('-',$info['term'])) }}</td>
                </tr>
            </tbody>
        </table>
        <div class="applyR">
            {!! $info['content'] !!}
        </div>
        <div style="height:2rem;width:100%;"></div>
        <div class="reserve">
            <div class="surplus">
               申请人数&nbsp;&nbsp; {{ $info['number']+count($info->myApply) }}
            </div>
            <div class="instantly apply" data-id="{{ $info['id'] }}">
                立即申请
            </div>
        </div>
  </div>
  <div id="half" class="weui-popup__container popup-bottom">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <div class="panter0">
            <div class="dialog-title">登 录</div>
            <span class="new-close">
                <img src="/wechat/images/close.png" alt="">
            </span>
        </div>
        <div style="height:3rem"></div>
        <div class="weui-cell weui-cell_vcode ">
            <div class="weui-cell__bd">
                <input class="weui-input" type="number" placeholder="请输入手机号" id="tel">
            </div>
            <div class="weui-cell__ft">
                <button class="weui-vcode-btn" onclick="sendemail()">获取验证码</button>
            </div>
        </div>
        <div class="weui-cell weui-cell_vcode">
            <div class="weui-cell__bd">
                <input class="weui-input" type="number" placeholder="请输入验证码" id="code" oninput="if(value.length>4)value=value.slice(0,4)">
            </div>
        </div>
        <a href="javascript:;" class="weui-btn bind">绑定</a>
    </div>
  </div>
</body>
<script src="/wechat/js/jquery-2.1.4.js"></script>
<script src="/wechat/js/jquery-weui.min.js"></script>
<script src="/wechat/js/fastclick.js"></script>
<script src="/wechat/js/swiper.min.js"></script>
<script src="/wechat/js/yunsuan.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    var rate = {{ $info['rate']/100 }}
    $('.loanMoneySelect,.loanTimeSelect').on('keyup',function(){
        var Money = $('.loanMoneySelect').val();
        var Time = $('.loanTimeSelect').val();
        var def = floatAdd(floatMul(floatMul(Money,rate),Time),Money).toFixed(2);
        $('.still').text(floatDiv(def,Time).toFixed(2));
        $('.interest').text(floatSub(def,Money));
    })
    $('.new-close').click(function(){
        $.closePopup()
    })
    $('.apply').click(function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/apply',
            type: 'post',
            data: {id: id,money:$('.loanMoneySelect').val(),long:$('.loanTimeSelect').val()},
            success: function(s){
                if(s.status == -1){
                    $("#half").popup()
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
        var mobile = $('#tel').val();
        if(!(/^1[34578]\d{9}$/.test(mobile))){ 
            $.toptip('手机号码格式错误', 'error');
            $('#tel').focus();
            return false;
        }
        var code = $('#code').val();
        if(!(/^\d{4}$/.test(code))){
            $.toptip('验证码格式错误', 'error');
            $('#code').focus();
            return false;
        }

        $.ajax({
            url: '/bind',
            type: 'post',
            data: {mobile: mobile,code:code},
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