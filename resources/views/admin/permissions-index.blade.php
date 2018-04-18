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
				<h2 class="em-title">权限列表 </h2>
		
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
				            	<th>序号</th>
				            	<th>ID</th>
					            <th>URL</th>
					            <th>可读名称</th>
					            <th>权限说明</th>
					            <th>图标</th>
					            <th>是否菜单</th>
					            <th>排序</th>	
					            <th>添加时间</th>
					            <th>更新时间</th>
					            <th>操作</th>
				            </tr>
				        </thead>
		
				        <tbody>
					        @foreach ($lists as $k=>$v)
						        <tr @if($v['level'] == 0)class="danger" @endif>
						        	<td>{{ $k }}</td>
						        	<td>{{ $v['id'] }}</td>
						        	<td class="txt-color-red">{{ $v['name'] }}</td>
						        	<td>{{ $v['html'] }}{{ $v['display_name'] }}</td>
						        	<td>{{ str_limit($v['description'],50,'...') }}</td>
						        	<td><span class="fa {{ $v['icon'] }}"></span></td>
						        	<td><a href="javascript:void(0);" class="btn btn-default btn-circle @if($v['menu'] == 1) txt-color-blue @else txt-color-red @endif"><i class="fa @if($v['menu'] == 1) fa-check @else fa-times @endif"></i></a></td>
						        	<td>{{ $v['sort'] }}</td>
						        	<td>{{ $v['created_at'] }}</td>
						        	<td>{{ $v['updated_at'] }}</td>
						        	<td>
						        		@if ($v['level'] == 0)
						        			<a class="btn btn-default btn-sm txt-color-blue" href="{{ url('admin/permissions/create') }}?pid={{ $v['id'] }}"><span class="fa fa-plus"></span> 添加</a>
						        		@else
						        			<a class="btn btn-default btn-sm txt-color-blue notedit" href="javascript:;"><span class="fa fa-plus"></span> 添加</a>
						        		@endif
						        		<a class="btn btn-default btn-sm txt-color-pink" href="{{ url('admin/permissions',$v['id']) }}/edit"><span class="fa fa-pencil-square-o"></span> 修改</a>
						        		<a class="btn btn-default btn-sm destroy txt-color-red" data-id="{{ $v['id'] }}" href="javascript:;"><span class="fa fa-trash-o"></span> 删除</a>
						        	</td>
						        </tr>
					        @endforeach
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
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
	$(document).ready(function() {
		$('.notedit').click(function(){
			$.smallBox({
				title : "操作提示",
				content : "<i class='fa fa-clock-o'></i> <i>当前节点不可添加下级菜单</i>",
				color : "#C26565",
				iconSmall : "fa fa-times fa-2x fadeInRight animated",
				timeout : 3000
			});
		})
		$('.destroy').click(function(event){
			var id = $(this).attr('data-id');
			$.SmartMessageBox({
				title : "<span class='fa fa-warning'></span> 危险的操作！",
				content : "确定要删除这条数据吗?如果为父节点其子节点也将被删除！",
				buttons : "[取消][删除]",
			}, function(ButtonPress, Value) {
				if (ButtonPress == "删除") {
					$.ajax({
						url: '{{ url('admin/permissions') }}/'+id,
						type: 'POST',
						dataType: 'json',
						data: {'_method': 'delete','id':id},
						success: function(data){
							if(data == 1){
								$.smallBox({
									title : "操作提示",
									content : "<i class='fa fa-clock-o'></i> <i>删除成功！</i>",
									color : "#659265",
									iconSmall : "fa fa-check fa-2x fadeInRight animated",
									timeout : 3000
								});
								window.location.reload();
							}else{
								$.smallBox({
									title : "操作提示",
									content : "<i class='fa fa-clock-o'></i> <i>删除失败！</i>",
									color : "#C26565",
									iconSmall : "fa fa-times fa-2x fadeInRight animated",
									timeout : 3000
								});
							}
						},
						error: function(){

						}
					});
				}
			});
			
			e.preventDefault();
		})
			pageSetUp();
			
		@include('vendor.tablejs');
		
		})
		</script>
@endsection