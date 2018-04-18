<!DOCTYPE html>
<html lang="en-us" id="extr-page">
    <head>
        <meta charset="utf-8">
        <title> 后台登录 </title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        
        <!-- #CSS Links -->
        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" media="screen" href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.css">

        <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
        <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('/') }}css/smartadmin-production-plugins.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('/') }}css/smartadmin-production.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('/') }}css/smartadmin-skins.min.css">

        <!-- SmartAdmin RTL Support -->
        <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('/') }}css/smartadmin-rtl.min.css"> 

        <!-- We recommend you use "your_style.css" to override SmartAdmin
             specific styles this will also ensure you retrain your customization with each SmartAdmin update.
        <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

        <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
        <link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('/') }}css/demo.min.css">

        <!-- #FAVICONS -->
        <link rel="shortcut icon" href="{{ URL::asset('/') }}img/favicon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="{{ URL::asset('/') }}img/favicon/favicon.ico" type="image/x-icon">

        <!-- #GOOGLE FONT -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

        <!-- #APP SCREEN / ICONS -->
        <!-- Specifying a Webpage Icon for Web Clip 
             Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
        <link rel="apple-touch-icon" href="{{ URL::asset('/') }}img/splash/sptouch-icon-iphone.png">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('/') }}img/splash/touch-icon-ipad.png">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('/') }}img/splash/touch-icon-iphone-retina.png">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('/') }}img/splash/touch-icon-ipad-retina.png">
        
        <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        
        <!-- Startup image for web apps -->
        <link rel="apple-touch-startup-image" href="{{ URL::asset('/') }}img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
        <link rel="apple-touch-startup-image" href="{{ URL::asset('/') }}img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
        <link rel="apple-touch-startup-image" href="{{ URL::asset('/') }}img/splash/iphone.png" media="screen and (max-device-width: 320px)">

    </head>
    
    <body class="animated fadeInDown">
        <header id="header">

            <div id="logo-group">
                <span id="logo"> <img src="{{ asset('img/logo.png') }}" alt=""> </span>
            </div>

            <!-- <span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">Need an account?</span> <a href="register.html" class="btn btn-danger">Create account</a> </span> -->

        </header>

        <div id="main" role="main">

            <!-- MAIN CONTENT -->
            <div id="content" class="container">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                        <h1 class="txt-color-red login-header-big">后台管理系统</h1>
                        <div class="hero">

                            <!-- <div class="pull-left login-desc-box-l">
                                <h4 class="paragraph-header">It's Okay to be Smart. Experience the simplicity of SmartAdmin, everywhere you go!</h4>
                                <div class="login-app-icons">
                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm">Frontend Template</a>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-sm">Find out more</a>
                                </div>
                            </div>
                            
                            <img src="img/demo/iphoneview.png" class="pull-right display-image" alt="" style="width:210px"> -->

                        </div>

                        

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                        <div class="well no-padding">
                            <form action="#" id="login-form" method="post" class="smart-form client-form">
                                <header>
                                    登录
                                </header>

                                <fieldset>
                                    {{ csrf_field() }}
                                    <section>
                                        <label class="label {{ $errors->has('name') ? 'state-error' : '' }}">用户名</label>
                                        <label class="input {{ $errors->has('name') ? 'state-error' : '' }}"> <i class="icon-append fa fa-user"></i>
                                            <input type="text" name="name" required value="{{ old('name') }}" class="{{ $errors->has('name') ? 'invalid' : 'valid' }}">
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> 请输入用户名</b></label>
                                            {!! $errors->has('name') ? '<em class="invalid" for="password">'.$errors->first('name').'</em>' : '' !!}
                                    </section>

                                    <section>
                                        <label class="label {{ $errors->has('password') ? 'state-error' : '' }}">密码</label>
                                        <label class="input {{ $errors->has('password') ? 'state-error' : '' }}"> <i class="icon-append fa fa-lock"></i>
                                            <input type="password" required name="password" class="{{ $errors->has('password') ? 'invalid' : 'valid' }}">
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> 请输入你的密码</b> </label>
                                            {!! $errors->has('password') ? '<em class="invalid" for="password">'.$errors->first('password').'</em>' : '' !!}
                                        <div class="note">
                                            <!-- <a href="#">忘记密码?</a> -->
                                        </div>
                                    </section>

                                    <section>
                                        <label class="checkbox">
                                            <input type="checkbox" name="remember" @if (old('remember') == 'on') checked="checked" @endif>
                                            <i></i>记住我?</label>
                                    </section>
                                </fieldset>
                                <footer>
                                    <button type="submit" class="btn btn-primary">
                                        登录
                                    </button>
                                </footer>
                            </form>

                        </div>
                        
                        <!-- <h5 class="text-center"> - Or 合作帐号登录 -</h5>
                                                            
                            <ul class="list-inline text-center">
                                <li>
                                    <a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-qq"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-weixin"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-circle"><i class="fa fa-weibo"></i></a>
                                </li>
                            </ul> -->
                    </div>
                </div>
            </div>
            <p class="text-center">Copyright &copy; 2017 每天花 All Rights Reserved | 沪ICP备 15588702号-1</p>
        </div>
        <!--================================================== -->  

        <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
        <script src="{{ URL::asset('/') }}js/plugin/pace/pace.min.js"></script>

        <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
        <script> if (!window.jQuery) { document.write('<script src="{{ URL::asset('/') }}js/libs/jquery-2.1.1.min.js"><\/script>');} </script>

        <script> if (!window.jQuery.ui) { document.write('<script src="{{ URL::asset('/') }}js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>

        <!-- IMPORTANT: APP CONFIG -->
        <script src="{{ URL::asset('/') }}js/app.config.js"></script>

        <!-- JS TOUCH : include this plugin for mobile drag / drop touch events         
        <script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

        <!-- BOOTSTRAP JS -->       
        <script src="{{ URL::asset('/') }}js/bootstrap/bootstrap.min.js"></script>

        <!-- JQUERY VALIDATE -->
        <script src="{{ URL::asset('/') }}js/plugin/jquery-validate/jquery.validate.min.js"></script>
        
        <!-- JQUERY MASKED INPUT -->
        <script src="{{ URL::asset('/') }}js/plugin/masked-input/jquery.maskedinput.min.js"></script>
        
        <!--[if IE 8]>
            
            <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
            
        <![endif]-->

        <!-- MAIN APP JS FILE -->
        <script src="{{ URL::asset('/') }}js/app.min.js"></script>

        <script type="text/javascript">
            runAllForms();

            $(function() {
                // Validation
                $("#login-form").validate({
                    // Rules for form validation
                    rules : {
                        email : {
                            required : true,
                            email : true
                        },
                        password : {
                            required : true,
                            minlength : 6,
                            maxlength : 20
                        }
                    },

                    // Messages for form validation
                    messages : {
                        email : {
                            required : '请输入邮箱帐号',
                            email : '请输入正确的邮箱帐号'
                        },
                        password : {
                            required : '请输入你的密码',
                            minlength : '密码长度不能小于六位',
                            maxlength : '密码长度不能大于二十位'
                        }
                    },

                    // Do not change code below
                    errorPlacement : function(error, element) {
                        error.insertAfter(element.parent());
                    }
                });
            });
        </script>

    </body>
</html>