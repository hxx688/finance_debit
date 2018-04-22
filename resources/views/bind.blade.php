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
    <title>登录</title>
    <style>
        .middle {
            width: 100%;
            height: 4rem;
            line-height: 4.3rem;
            text-align: center;
        }

        .logo {
            width: 2rem;
        }

        .weui-vcode-btn {
            font-size: 0.6rem;
            color: #212121
        }

        .weui-cell_vcode {
            height: 2.2rem;
            width: 80%;
            margin: auto;
            font-size: 0.7rem
        }

        .weui-cell:before {
            border-top: none;
        }

        .weui-btn {
            width: 60%;
            height: 1.8rem;
            line-height: 1.8rem;
            text-align: center;
            border-radius: 25px;
            margin: auto;
            margin-top: 1rem;
            background: #55cac2;
            color: #fff;
            border: 0;
        }
        .container {
            width: 100%;
            height: 100%;
            display: -webkit-box;
            -webkit-box-orient: block-axis;
            background-color: #edf3f3;
        }

        .main {
            width: 100%;
            height: 100%;
            overflow: hidden;
            position: relative;
            -webkit-box-flex: 1;
            font: 0.48rem "微软雅黑";
            color: #736969;
            box-sizing: border-box
        }

        .contains {
            width: 100%;
            height: 100%;
            background-color: #fff;
            padding: 0.7rem 0.48rem;
            box-sizing: border-box;
            overflow: scroll;
        }

         .contains p {
            text-indent: 2em;
            margin: 0.5rem auto;
        }
        .close{position: absolute;z-index: 10000;bottom: 0px;width: 100%;height: 2.5rem;line-height: 2.5rem;text-align: center;color: #fff;background: #55cac2;font-size: .8rem;}
        .notice {
            font-size: 10px;
            position: absolute;
            margin-left: 0.6rem;
            bottom: 1rem;
            color: #888;
        }
        .contain{
            position: relative;
            top:50%;
            height: 10rem;
            margin-top: -5rem;
        }
        .weui-cell_vcode {
            border-bottom: 1px solid #d9d9d9;
        }
        .nod{
            text-align: center;
            color: #666;
            padding-top: 1rem;
            box-sizing: border-box
        }
        .nod a{
            color: #55cac2
        }
    </style>
</head>

<body ontouchstar>
<div  class="contain">
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
            <input class="weui-input" id="code" type="number" placeholder="请输入验证码" id="code" oninput="if(value.length>4)value=value.slice(0,4)">
        </div>
    </div>
    <a href="javascript:" class="weui-btn bind">登录</a>
    <p class="nod">登录即代表同意 (<a href="javascript:" class="about">每天花用户协议</a>)</p>
</div>
<div id="full" class="weui-popup__container">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <div class="container">
            <div class="main">
                <div class="contains">
                    <b>1、每天花服务条款的确认和接纳</b>
                    <p>每天花的各项电子服务的所有权和运作权归杭州协力信息科技有限公司，以下简称协力科技。协力科技按照其发布的章程、服务条款和操作规则提供服务。用户使用或接受服务，即视为其已了解并完全同意本服务条款的各项内容，包括协力科技就服务条款随时作出的任何增加、删减或修改。</p>
                    <b>2、服务条款的修改和服务修订</b>
                    <p>
                        协力科技有权在必要时修改服务条款，协力科技服务条款一旦发生变动，将会在网站上同步提示修改内容。如果用户继续享用网络服务，则视为同意并接受服务条款的变动；如果用户不同意所改动的内容，可以主动取消获得的网络服务。协力科技保留随时修改或中断服务而不需知会用户的权利。协力科技行使修改或中断服务的权利，不需对用户或第三方负责。
                    </p>
                    <b>3、用户信息使用</b>
                    <p>
                        用户所提供的个人资料将会被协力科技进行适当的处理汇总，并根据实际业务需要为协力科技的合作方提供依据。用户同意协力科技不定期地通过注册会员留下的电子邮件、手机短信或通讯地址同该用户保持联系。为完成协力科技为用户所提供的服务，用户同意协力科技利用计算机及其它方式搜集，保存，处理个人资料（包括但不限于姓名、出生年月日、身份证号码、电话及通信地址等信息）和其它信息（包括但不限于个人信用、投资及保险等信息），授权协力科技及其关联公司向征信机构或其他第三方核实其本人资信情况；同时，用户也授权协力科技可以将其本人的信用资料、个人信息及其他记录提供给征信机构或经协力科技许可并授权的其他第三方使用。
                    </p>
                    <b>4、用户隐私制度</b>
                    <p>
                        尊重用户个人隐私是协力科技义不容辞的责任，协力科技不会在未经合法用户授权时公开其提交或存储在协力科技的非公开资料，但以下情况除外：根据法机关、政府部门、行业主管部门或其他管理机关之要求；根据法律法规、规范性文件或相关政策要求；为社会公共目的向相关单位提供个人资料；因用户密码告知他人或与他人共享注册帐户，由此导致的任何个人资料泄露；由于黑客攻击、计算机病毒侵入或发作、因政府管制而造成的暂时性关闭等影响网络正常经营之不可抗力而造成的个人资料泄露、丢失、被盗用或被窜改等在紧急情况下为维护用户个人和社会公众的安全之目的。
                    </p>
                    <b>5、拒绝提供担保</b>
                    <p>
                        用户个人对网络服务的使用承担风险，协力科技对此不承担任何责任，也不作任何类型的担保，但是不排除商业性的隐含担保、特定目的和不违反规定的适当担保。对每天花外部链接的真实性、准确性和完整性，以及非协力科技控制的任何网页的内容的真实性、准确性和完整性，协力科技不作任何担保，也不承担任何责任。协力科技不担保服务一定能满足用户的要求，也不担保服务不会受中断，对服务的及时性，安全性，出错发生都不作担保。协力科技对用户在每天花上得到的任何商品购物服务或交易进程，不作担保。
                    </p>
                    <b>6、对用户信息的存储和限制</b>
                    <p>
                        用户在访问、使用协力科技或申请使用协力科技服务时，必须提供本人真实有效的个人信息，且用户应该根据实际变动情况及时更新个人信息。保护用户隐私是我们的重点原则，我们通过各种技术手段和强化内部管理等办法提供隐私保护服务功能，充分保护用户的个人信息安全，协力科技不负责审核用户提供的个人信息的真实性、准确性或完整性，因信息不真实、不准确或不完整而引起的任何问题及其后果，由用户自行承担，且用户应保证协力科技免受由此而产生的任何损害或责任。若我们发现用户提供的个人信息是虚假、不准确或不完整的，协力科技有权随时中断对其提供网络服务，并无需事先通知。
                    </p>
                    <b>7、保障</b>
                    <p>
                        用户不得利用协力科技的服务从事任何违法、不正当或可能侵害协力科技或任何第三方合法权益的活动。用户完全理解并同意，因其不当行为导致第三方索赔的，用户应承担协力科技及其所属公司或子公司、分公司、董事职员、代理人因此发生的所有费用和遭受的一切损失（包括其向第三方进行的赔付费用以及其为处理该赔付要求而花费的所有费用，包括但不限于律师费、诉讼费、差旅费等）。
                    </p>
                    <b>8、结束服务</b>
                    <p>用户理解并完全同意，协力科技可随时自行决定中断或终止一项或多项网络服务而无需事先通知，也无需对用户或任何第三方承担任何责任。用户对后来的条款修改有异议，或对每天花的服务不满，可以行使如下权利：停止使用每天花的网络服务。通告每天花停止对该用户的服务。用户结束服务后，用户使用网络服务的权利立即中止。自结束服务之时起，用户无权要求，协力科技也没有义务向用户或任何第三方提供任何未处理的信息或未完成的服务。</p>
                    <b>9、法律</b>
                    <p>本服务条款的订立、执行和解释及争议的解决均应适用中华人民共和国法律。如发生任何争议，任何一方均应向杭州协力信息科技有限公司所在地有管辖权的人民法院提起诉讼。如服务条款与中华人民共和国法律法规相抵触，则发生抵触的条款应按相关法律规定重新解释，而其它条款则仍然有效。</p>
                <div style="height:1.8rem;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="close" style="display:none">关闭</div>
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
    $(function () {
        FastClick.attach(document.body);
    });
</script>
<script>
    $('.about').on('click', function () {
        $('.close').show();
        $("#full").popup();
    });
    $('.close').on('click', function () {
        $('.close').hide();
        $.closePopup()
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
            url: '/login',
            type: 'post',
            data: {mobile: mobile,code:code},
            success: function(s){
                (s.status == 1) ? window.location.reload() : $.toptip(s.msg, 'error');
            },
            error: function(e){
                $.toptip(e.status+"-错误信息:"+e.statusText, 'error');
            }
        })
    });
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