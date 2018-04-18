@extends('layouts.admin')
@section('content')
<div id="inbox-content" class="inbox-body no-content-padding">

	<div class="table-wrap custom-scroll animated fast fadeInRight">
		@if(session('msg'))
		<h6 class="alert alert-success semi-bold">
			<i class="fa fa-times"></i> {{ session('msg') }}
		</h6>
		@endif
		@if (count($errors) > 0)
		@foreach ($errors->all() as $v)
		<h6 class="alert alert-danger semi-bold">
		    <i class="fa fa-times"></i> {{ $v }}
		</h6>
		@endforeach
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
				<h2 class="em-title">轮播图列表 </h2>
		
			</header>
		
			<!-- widget div-->
			<div>
		
				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->
				<style>
				table a{
					display:none
				}
				</style>
				</div>
				<!-- end widget edit box -->
				<div class="row">
					@if(count($lists)>0)
						@foreach($lists as $v)
						  <div class="col-sm-12 col-md-12">
						    <div class="thumbnail">
						      <div class="caption">
						        <p><img width="100%" src="{{ $v['img'] }}" alt=""></p>
						        <h2><code>{{ $v['link'] }}</code></h2>
						        <p class="text-right"><a href="{{ url('admin/slides',['id'=>$v['id']]) }}/edit" class="btn btn-default" role="button">修改</a> <a href="javascript:;" data-id="{{ $v['id'] }}" class="btn btn-danger destroy" role="button">删除</a></p>
						      </div>
						    </div>
						  </div>
						@endforeach
					@endif
				</div>
			</div>
			<!-- end widget div -->
		
		</div>
		<!-- end widget -->
		</article>
	</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.destroy').click(function(event){
			var id = $(this).attr('data-id');
			$.SmartMessageBox({
				title : "<span class='fa fa-warning'></span> 危险的操作！",
				content : "确定要删除这条数据吗?",
				buttons : "[取消][删除]",
			}, function(ButtonPress, Value) {
				if (ButtonPress == "删除") {
					$.ajax({
						url: '{{ url('admin/slides') }}/'+id,
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
			
		})
		</script>
@endsection