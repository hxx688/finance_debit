<!DOCTYPE html>
<html class="smart-style-1" lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> 后台管理系统 </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-production-plugins.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-production.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-skins.min.css') }}">

		<!-- SmartAdmin RTL Support  -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-rtl.min.css') }}">

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" type="image/x-icon">
		<link rel="icon" href="{{ asset('img/favicon/favicon.ico') }}" type="image/x-icon">

		<!-- GOOGLE FONT -->
		{{-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700"> --}}

		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">
		<script>
			if (!window.jQuery) {
				document.write('<script src="{{ asset('js/libs/jquery-2.1.1.min.js') }}"><\/script>');
			}
		</script>
		<style>
			.table-wrap{margin-left:0px !important}
		</style>
	</head>

	<body class="fixed-header fixed-navigation fixed-ribbon">

		<!-- HEADER -->
		<header id="header">
			<div id="logo-group">
				<span id="logo"> <img src="/img/logo.png" alt="SmartAdmin"></span>
				<span id="activity" style="display:none" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>
				<div class="ajax-dropdown">

					<!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
					<div class="btn-group btn-group-justified" data-toggle="buttons">
						<label class="btn btn-default">
							<input type="radio" name="activity" id="/ajax/notify/mail.html">
							Msgs (14) </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="/ajax/notify/notifications.html">
							notify (3) </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="/ajax/notify/tasks.html">
							Tasks (4) </label>
					</div>

					<!-- notification content -->
					<div class="ajax-notifications custom-scroll">

						<div class="alert alert-transparent">
							<h4>Click a button to show messages here</h4>
							This blank page message helps protect your privacy, or you can show the first message here automatically.
						</div>

						<i class="fa fa-lock fa-4x fa-border"></i>

					</div>
					<!-- end notification content -->

					<!-- footer: refresh area -->
					<span> Last updated on: 12/12/2013 9:43AM
						<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
							<i class="fa fa-refresh"></i>
						</button> 
					</span>
					<!-- end footer -->

				</div>
				<!-- END AJAX-DROPDOWN -->
			</div>

			<!-- projects dropdown -->
			<div class="project-context hidden-xs" style="display:none">

				<span class="label">记录:</span>
				<span class="project-selector dropdown-toggle" data-toggle="dropdown">浏览记录 <i class="fa fa-angle-down"></i></span>

				
				<ul class="dropdown-menu">
					<li>
						<a href="javascript:void(0);">测试</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="javascript:void(0);"><i class="fa fa-power-off"></i> 清除</a>
					</li>
				</ul>
				

			</div>
			<!-- end projects dropdown -->

			<!-- pulled right: nav area -->
			<div class="pull-right">
				
				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->
				
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
							<img src="/img/avatars/sunny.png" alt="John Doe" class="online" />  
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="login.html" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
							</li>
						</ul>
					</li>
				</ul>

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="{{ url('logout') }}" title="Sign Out" data-action="userLogout" data-logout-msg="确定要退出当前用用户吗？"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->

				<!-- search mobile button (this is hidden till mobile view port) -->
				<div id="search-mobile" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
				</div>
				<!-- end search mobile button -->

				<!-- input: search field -->
				<form action="search.html" class="header-search pull-right">
					<input id="search-fld"  type="text" name="param" placeholder="搜索" data-autocomplete='[
					"ActionScript",
					"AppleScript",
					"Asp",
					"BASIC",
					"C",
					"C++",
					"Clojure",
					"COBOL",
					"ColdFusion",
					"Erlang",
					"Fortran",
					"Groovy",
					"Haskell",
					"Java",
					"JavaScript",
					"Lisp",
					"Perl",
					"PHP",
					"Python",
					"Ruby",
					"Scala",
					"Scheme"]'>
					<button type="submit">
						<i class="fa fa-search"></i>
					</button>
					<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
				</form>
				<!-- end input: search field -->

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->
			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel" style="z-index:1">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="{{ asset('img/avatars/sunny.png') }}" alt="me" class="online" /> 
						<span>
							{{ auth()->guard()->user()->name }}
						</span>
					</a> 
					
				</span>
			</div>
			<?php
				if(!$menu = Cache::get('menu')){
				    $lists = \App\Permission::orderBy('sort','desc')->get();
				    $menu = \App\Permission::cateMenu($lists);
				    //Cache::forever('menu',$menu);
				}
			?>
			<!-- end user info -->
			<!-- NAVIGATION : This navigation is also responsive-->
			<!-- 导航 -->
			<nav>
				<ul>
					@foreach ($menu as $v)
					@if($v['menu'])
					<li class="@if(in_array(session('route'),array_flatten($v['child']),true) || session('route') == $v['name'])active open @endif" style="@if( ((Auth::user()->name == 'yunying') && ($v['name']=="#member")) || ((Auth::user()->name == 'yunying') && ($v['name']=="#perminssions"))) display:none @endif">
						<a href="@if(starts_with($v['name'],'#'))#@else{{ route($v['name']) }}@endif"><i class="fa fa-lg fa-fw {{ $v['icon'] }}"></i> <span class="menu-item-parent">{{ $v['display_name'] }}</span></a>
						@if(count($v['child'])>0)
						<ul style="@if(in_array(session('route'),array_flatten($v['child']),true)) display:block @endif">
						@foreach ($v['child'] as $c)
						@if($c['menu']==1)
						<li @if($c['name']==session('route'))class="active"@endif>
							<a href="{{ route($c['name']) }}"><i class="fa fa-lg fa-fw {{ $c['icon'] }}"></i> {{ $c['display_name'] }}</a>
						</li>
						@else
						<li @if($c['name']==session('route'))class="active"@endif style="display:none">
							<a href="#"><i class="fa fa-lg fa-fw {{ $c['icon'] }}"></i> {{ $c['display_name'] }}</a>
						</li>
						@endif
						@endforeach
						</ul>
						@endif
					</li>
					@endif
					@endforeach
				</ul>
			</nav>
			<!-- 导航结束 -->
			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> 警告! 会丢失未保存的操作。" data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li>
				</ol>
				<!-- end breadcrumb -->
				<script>
				$(function() {
					if($('nav').find('.active').hasClass('open')){
						var text1 = $('nav').find('.active').find('.menu-item-parent').text();
						var text2 = $('nav').find('.active').children('ul').children('.active').children('a').text();
						var pagetitle = '<span>'+text1+'</span><span>&nbsp;&gt; '+text2+'</span>';
						var breadcrumb = '<li>'+text1+'</li><li>'+text2+'</li>';
					}else{
						var text1 = $('nav').find('.active').find('.menu-item-parent').text();
						var pagetitle = '<span>'+text1+'</span>';
						var breadcrumb = '<li>'+text1+'</li>';
					}
					$('.page-title').append(pagetitle);
					$('.breadcrumb').append(breadcrumb);
				});
				</script>
				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Dashboard </h1>
					</div>
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
						<ul id="sparks" class="">
							
						</ul>
					</div>
				</div>
				<!-- widget grid -->
				<section id="widget-grid" class="">

					@yield('content')

				</section>
				<!-- end widget grid -->

			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<span class="txt-color-white">每天花 <span class="hidden-xs"> 后台管理系统 </span> &copy; 2017-2018</span>
				</div>

<!-- 				<div class="col-xs-6 col-sm-6 text-right hidden-xs">
					<div class="txt-color-white inline-block">
						<i class="txt-color-blueLight hidden-mobile">Last account activity <i class="fa fa-clock-o"></i> <strong>52 mins ago &nbsp;</strong> </i>
						<div class="btn-group dropup">
							<button class="btn btn-xs dropdown-toggle bg-color-blue txt-color-white" data-toggle="dropdown">
								<i class="fa fa-link"></i> <span class="caret"></span>
							</button>
							<ul class="dropdown-menu pull-right text-left">
								<li>
									<div class="padding-5">
										<p class="txt-color-darken font-sm no-margin">Download Progress</p>
										<div class="progress progress-micro no-margin">
											<div class="progress-bar progress-bar-success" style="width: 50%;"></div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="padding-5">
										<p class="txt-color-darken font-sm no-margin">Server Load</p>
										<div class="progress progress-micro no-margin">
											<div class="progress-bar progress-bar-success" style="width: 20%;"></div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="padding-5">
										<p class="txt-color-darken font-sm no-margin">Memory Load <span class="text-danger">*critical*</span></p>
										<div class="progress progress-micro no-margin">
											<div class="progress-bar progress-bar-danger" style="width: 70%;"></div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="padding-5">
										<button class="btn btn-block btn-default">refresh</button>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
 -->			</div>
		</div>
		<!-- END PAGE FOOTER -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="{{ asset('js/plugin/pace/pace.min.js') }}"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script>
			if (!window.jQuery) {
				document.write('<script src="{{ asset('js/libs/jquery-2.1.1.min.js') }}"><\/script>');
			}
		</script>
		<script>
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
		</script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="{{ asset('js/libs/jquery-ui-1.10.3.min.js') }}"><\/script>');
			}
		</script>
	
		<!-- IMPORTANT: APP CONFIG -->
		<script src="{{ asset('js/app.config.js') }}"></script>
		
		<script src="{{ asset('js/plugin/dropzone/dropzone.min.js') }}"></script>
		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="{{ asset('js/plugin/jquery-touch/jquery.ui.touch-punch.min.js') }}"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="{{ asset('js/notification/SmartNotification.min.js') }}"></script>

		<!-- JARVIS WIDGETS -->
		<script src="{{ asset('js/smartwidgets/jarvis.widget.min.js') }}"></script>

		<!-- EASY PIE CHARTS -->
		<script src="{{ asset('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>

		<!-- SPARKLINES -->
		<script src="{{ asset('js/plugin/sparkline/jquery.sparkline.min.js') }}"></script>

		<!-- JQUERY VALIDATE -->
		<script src="{{ asset('js/plugin/jquery-validate/jquery.validate.min.js') }}"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="{{ asset('js/plugin/masked-input/jquery.maskedinput.min.js') }}"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="{{ asset('js/plugin/select2/select2.min.js') }}"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="{{ asset('js/plugin/bootstrap-slider/bootstrap-slider.min.js') }}"></script>

		<!-- browser msie issue fix -->
		<script src="{{ asset('js/plugin/msie-fix/jquery.mb.browser.min.js') }}"></script>

		<!-- FastClick: For mobile devices -->
		<script src="{{ asset('js/plugin/fastclick/fastclick.min.js') }}"></script>
		
		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only -->

		<!-- MAIN APP JS FILE -->
		<script src="{{ asset('js/app.min.js') }}"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="{{ asset('js/speech/voicecommand.min.js') }}"></script>

		<!-- SmartChat UI : plugin -->
		<script src="{{ asset('js/smart-chat-ui/smart.chat.ui.min.js') }}"></script>
		<script src="{{ asset('js/smart-chat-ui/smart.chat.manager.min.js') }}"></script>
		<script src="{{ asset('js/plugin/clockpicker/clockpicker.min.js') }}"></script>
		<!-- PAGE RELATED PLUGIN(S) -->
		
		<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
		<script src="{{ asset('js/plugin/flot/jquery.flot.cust.min.js') }}"></script>
		<script src="{{ asset('js/plugin/flot/jquery.flot.resize.min.js') }}"></script>
		<script src="{{ asset('js/plugin/flot/jquery.flot.time.min.js') }}"></script>
		<script src="{{ asset('js/plugin/flot/jquery.flot.tooltip.min.js') }}"></script>
		
		<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
		<script src="{{ asset('js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
		<script src="{{ asset('js/plugin/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
		
		<!-- Full Calendar -->
		<script src="{{ asset('js/plugin/moment/moment.min.js') }}"></script>
		<script src="{{ asset('js/plugin/fullcalendar/jquery.fullcalendar.min.js') }}"></script>
	</body>

</html>