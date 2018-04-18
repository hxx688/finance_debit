@extends('layouts.admin')

@section('content')
            <div id="content">

                <!-- row -->
                <div class="row">
                
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-center error-box">
                                    <h1 class="error-text tada animated"><i class="fa fa-times-circle text-danger error-icon-shadow"></i> Error 403</h1>
                                    <h2 class="font-xl"><strong>您没有访问的权限!</strong></h2>
                                    <br />
                                    <p class="lead semi-bold">
                                        <strong>看起来您没有获得访问此项目的权限，联系一下管理员吧！</strong><br><br>
                                        <small>
                                            管理员分配新的权限之后您需要重新登录. <br> 在此期间您可以访问下面的项目
                                        </small>
                                    </p>
                                    <ul class="error-search text-left font-md">
                                        <li><a href="{{ route('admin') }}"><small>回到首页 <i class="fa fa-arrow-right"></i></small></a></li>
                                        <li><a href="javascript:window.location.reload();"><small>刷新 <i class="fa fa-mail-forward"></i></small></a></li>
                                        <li><a href="javascript:alert('功能正在开发中。。。');"><small>报告错误!</small></a></li>
                                        <li><a href="javascript:history.go(-1);"><small>返回</small></a></li>
                                    </ul>
                                </div>
                
                            </div>
                
                        </div>
                
                    </div>
                    
                </div>
                <!-- end row -->

            </div>
            <!-- END MAIN CONTENT -->
@endsection