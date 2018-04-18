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
				<h2 class="em-title">产品列表 </h2>
		
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
					            <th>名称</th>
					            <th>链接</th>
					            <th>额度</th>
					            <th>利率</th>
					            <th>期限</th>
					            <th>标签</th>
					            <th>排序</th>
					            <th>申请</th>
					            <th>添加时间</th>
					            <th>操作</th>
				            </tr>
				        </thead>
		
				        <tbody>
					        @foreach ($lists as $k=>$v)
						        <tr>
						        	<td>{{ $v['id'] }}</td>
						        	<td class="txt-color-red">{{ $v['title'] }}</td>
						        	<td><a class="link" data-link="{{ $v['link'] }}" href="javascript:;">查看</a></td>
						        	<td>{{ $v['quota'] }}</td>
						        	<td>{{ $v['rate'] }}%／@if($v['type']==0) 日 @else 月 @endif</td>
						        	<td>{{ $v['term'] }} @if($v['type']==0) 日 @else 月 @endif</td>
						        	<td>@foreach($v->tags as $c) <code>{{ $c['name'] }}</code> @endforeach</td>
						        	<td>{{ $v['sort'] }}</td>
						        	<td><code>{{ count($v->myApply) }}</code></td>
						        	<td>{{ $v['created_at'] }}</td>
						        	<td>
						        		
						        		<a class="btn btn-default btn-sm txt-color-blue" target="_blank" href="/product/{{ $v['id'] }}"><span class="fa fa-eye"></span> 预览</a>
						        		<a class="btn btn-default btn-sm txt-color-pink" href="{{ url('admin/products',$v['id']) }}/edit"><span class="fa fa-pencil-square-o"></span> 修改</a>
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
		$('.link').on('click',function(){
			var link = $(this).attr('data-link');
			$.smallBox({
				title : link,
				content : "<i class='fa fa-clock-o'></i> <i>请求成功！</i>",
				color : "#C26565",
				iconSmall : "fa fa-check fa-2x fadeInRight animated",
				timeout : 5000
			});
		})
		$('.destroy').click(function(event){
			var id = $(this).attr('data-id');
			$.SmartMessageBox({
				title : "<span class='fa fa-warning'></span> 危险的操作！",
				content : "确定要删除这条数据吗?",
				buttons : "[取消][删除]",
			}, function(ButtonPress, Value) {
				if (ButtonPress == "删除") {
					$.ajax({
						url: '{{ url('admin/products') }}/'+id,
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