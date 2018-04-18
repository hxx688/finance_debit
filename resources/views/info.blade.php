<!DOCTYPE html>
<html>

<head>
    <title>个人资料</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/wechat/css/weui.min.css">
    <link rel="stylesheet" href="/wechat/css/jquery-weui.css">
    <link rel="stylesheet" href="/wechat/css/demos.css">
    <style>
        * {
            font-size: .6rem;
            color: #212121
        }

        .weui-cells {
            margin-top: 0
        }

        .tou {
            display: inline-block;
            height: .24rem;
            width: .24rem;
            border-width: 2px 2px 0 0;
            border-color: #c8c8cd;
            border-style: solid;
            -webkit-transform: matrix(.71, .71, -.71, .71, 0, 0);
            transform: matrix(.71, .71, -.71, .71, 0, 0);
            position: absolute;
            top: -2px;
            top: 50%;
            margin-top: -4px;
            right: 15px;
        }

        input {
            text-align: right
        }

        .weui-cells:before {
            border: none
        }

        .g {
            height: 2.4rem;
        }

        .g .weui-cell {
            height: 100%;
            box-sizing: border-box
        }

        .weui-grid {
            width: 25%;
            padding: 5px
        }

        .weui-grid__icon {
            width: 3.2rem;
            height: 3.2rem;
        }

        .weui-popup__modal {
            background: #fff
        }

        .close-popup {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .toolbar .picker-button {
            color: #18F
        }

        #showTooltips {
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0
        }
        #city-picker-c .weui-cell__bd, #city-picker{
            width: 100%;height:100%
        }
    </style>
</head>

<body ontouchstart>
    <div class="weui-cells weui-cells_radio">
        <label class="weui-cell weui-check__label" for="x12">
            <div class="weui-cell__bd">
                <p>头像</p>
            </div>
            <div class="weui-cell__ft">
                <img src="{{ empty(session('wechat.oauth_user.avatar')) ? '/img/getheadimg.jpg' : session('wechat.oauth_user.avatar') }}" alt="" class="weui-vcode-img " style="border-radius:50%;min-height:2rem;width:2rem;margin-right:.4rem;text-align:center">
            </div>
        </label>
    </div>
    <div class="weui-cells weui-cells_form g">
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">姓名</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="realname" value="{{ $info['realname'] }}" type="text" placeholder="" style="width:95%;" id="username">
            </div>
        </div>
    </div>
    <div class="weui-cells g">
        <div class="weui-cell ">
            <div class="weui-cell__hd">
                <label class="weui-label">性别</label>
            </div>
            <div class="weui-cell__bd">
                <select class="weui-select" name="sex" style="direction:rtl;width:95%">
                    <option @if($info['sex']==0) selected="selected" @endif value="0">保密</option>
                    <option @if($info['sex']==1) selected="selected" @endif value="1">男</option>
                    <option @if($info['sex']==2) selected="selected" @endif value="2">女</option>
                </select>
                <span class="tou"></span>
            </div>
        </div>
    </div>
    <div class="weui-cells weui-cells_form g" id="phonechange">
        <div class="weui-cell weui-cell_warn">
            <div class="weui-cell__hd">
                <label class="weui-label">手机号</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" value="{{ session('mobile') }}" type="number" pattern="[0-9]*" disabled="disabled" placeholder="" style="width:95%;" id="tel">
                <div class="weui-cell__ft warn" style="position:absolute;top:.4rem;right:0px;display:none">
                    <i class="weui-icon-warn" style="font-size:.4rem"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="weui-cells weui-cells_form g" id='city-picker-c'>
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">地区</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" readonly="readonly" name="area" value="{{ $info['area'] }}" type="text" placeholder="" style="width:95%;" id='city-picker'>
            </div>
        </div>
    </div>

    <div class="weui-cells weui-cells_form g">
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">职业</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" value="{{ $info['profession'] }}" name="profession" placeholder="" style="width:95%;">
            </div>
        </div>
    </div>
    <div class="weui-cells weui-cells_form g">
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">支付宝</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" value="{{ $info['zhifubao'] }}" name="zhifubao" placeholder="" style="width:95%;">
            </div>
        </div>
    </div>
    <div class="weui-cells weui-cells_form g">
        <div class="weui-cell">
            <div class="weui-cell__hd">
                <label class="weui-label">微信号</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" value="{{ $info['wechat'] }}" name="wechat" placeholder="" style="width:95%;">
            </div>
        </div>
    </div>
    <div class="weui-btn-area">
        <a class="weui-btn weui-btn_primary" href="javascript:;" id="showTooltips">保存提交</a>
    </div>
    <script src="/wechat/js/jquery-2.1.4.js"></script>
    <script src="/wechat/js/fastclick.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(function () {
            FastClick.attach(document.body);
        });
    </script>
    <script src="/wechat/js/jquery-weui.js"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <script type="text/javascript" src="/wechat/js/city-picker.js" charset="utf-8"></script>
    <script>
        $(document).ready(function () {
    　　      $('body').height($('body')[0].clientHeight);
             $('body').css({
                 'position':'relative'
             })
        });
        var data = {}
        $('#showTooltips').on('click', function () {
            $('input').each(function (i, val) {
                if ($(this).val() != "") {
                    var keyname = $(this).attr('name')
                    var key = $(this).val()
                    data[keyname] = key
                }
            })
            data['sex'] = $('.weui-select').val();
            console.log(data);
            $.ajax({
                url: '/ajaxSetInfo',
                type: 'post',
                data: data,
                success: function (s){
                    (s.status==1) ? ($.toptip("更新成功,即将刷新！", "error"),setTimeout('window.location.reload()',2000)) :  $.toptip(s.msg, 'error');
                },
                error: function (e){
                    $.toptip(e.status+"-错误信息:"+e.statusText, 'error');
                }
            })
        })
        $('.weui-cells').on('click', function () {
            $(this).find('input').focus();
        });

        $("#city-picker").cityPicker({
            title: "选择地区"
        });
    </script>
</body>

</html>