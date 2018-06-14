@extends('layouts.admin')
@section('content')
<div id="inbox-content" class="inbox-body no-content-padding">

	<div class="table-wrap custom-scroll animated fast fadeInRight">
		@if(session('msg'))
		<h6 class="alert alert-success semi-bold">
			<i class="fa fa-times"></i> {{ session('msg') }}
		</h6>
		@endif
		<article class="col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false">
			<!-- widget options:
			usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
		
			data-widget-colorbutton="false"
			data-widget-editbutton="false"
			data-widget-togglebutton="false"
			data-widget-deletebutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-custombutton="false"
			data-widget-collapsed="true"
			data-widget-sortable="false"
		
			-->
			<header>
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2 class="em-title">用户列表 </h2>
		
			</header>
		
			<!-- widget div-->
			<div>
		
				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->
		
				</div>
				<!-- end widget edit box -->
		
				<!-- widget content -->
				<div class="widget-body no-padding">
		
					<table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
		
				        <thead>
				            <tr>
				            	<th>ID</th>
				            	<th>邀请人</th>	
					            <th>昵称</th>
					            <th>姓名</th>
					            <th>性别</th>
								<th>手机号</th>
								<th>头像</th>
								<th>职业</th>
								<th>支付宝</th>
								<th>微信</th>
								<th>地区</th>
								<th>年龄</th>
								<th>状态</th>
					            <th>添加时间</th>
					            <th>操作</th>
				            </tr>
				        </thead>
				        <tbody>
				        </tbody>
					</table>
		
				</div>
				<!-- end widget content -->
		
			</div>
			<!-- end widget div -->
		
		</div>
		<!-- end widget -->


		</article>

	</div>
<script src="/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="/js/plugin/datatables/dataTables.colVis.min.js"></script>
<script src="/js/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
		<script type="text/javascript">

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
		// DO NOT REMOVE : GLOBAL FUNCTIONS!

			function doUpate(obj) {
                var id = $(obj).attr('data-id');
                $.SmartMessageBox({
                    title: "<span class='fa fa-warning'></span> 危险的操作！",
                    content: "确定要执行此操作吗",
                    buttons: "[取消][确定]",
                }, function (ButtonPress, Value) {
                    if (ButtonPress == "确定") {
                        $.ajax({
                            url: '{{ url('admin/members') }}/' + id,
                            type: 'POST',
                            dataType: 'json',
                            data: {'id': id},
                            success: function (data) {
                                if (data == 1) {
                                    $.smallBox({
                                        title: "操作提示",
                                        content: "<i class='fa fa-clock-o'></i> <i>操作成功！</i>",
                                        color: "#659265",
                                        iconSmall: "fa fa-check fa-2x fadeInRight animated",
                                        timeout: 3000
                                    });
                                    window.location.reload();
                                } else {
                                    $.smallBox({
                                        title: "操作提示",
                                        content: "<i class='fa fa-clock-o'></i> <i>操作失败！</i>",
                                        color: "#C26565",
                                        iconSmall: "fa fa-times fa-2x fadeInRight animated",
                                        timeout: 3000
                                    });
                                }
                            },
                            error: function () {

                            }
                        });
                    }
                });
            }

	$(document).ready(function() {

			pageSetUp();


		@include('vendor.table-member')

    })

		</script>
@endsection