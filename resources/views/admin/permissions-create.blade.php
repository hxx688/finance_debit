@extends('layouts.admin')

@section('content')

<div id="inbox-content" class="inbox-body no-content-padding">

	<div class="table-wrap custom-scroll animated fast fadeInRight">
		<article class="col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>权限操作 </h2>

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

						<form class="smart-form" method="post" action="@if(isset($info)) {{ url('admin/permissions',$info['id']) }} @else {{ url('admin/permissions') }} @endif">
							@if(isset($info))
							{{ method_field('put') }}
							@endif
							<input type="hidden" name="pid" value="@if(isset($info)){{ $info['pid'] }}@else{{ $pid }}@endif">
							<header>
								权限@if (isset($info)) 修改 @else 添加 @endif
							</header>

							<fieldset>
								@if (count($errors) > 0)
								@foreach ($errors->all() as $v)
								<h6 class="alert alert-danger semi-bold">
									<i class="fa fa-times"></i> {{ $v }}
								</h6>
								@endforeach
								@endif
								<section>
									<label class="label">URL</label>
									<label class="input"> <i class="icon-prepend fa fa-question-circle"></i>
										<input type="text" name="name" placeholder="" value="@if(isset($info)){{ $info['name'] }}@else{{ old('name') }}@endif" required="required">
										<b class="tooltip tooltip-top-left">
											<i class="fa fa-warning txt-color-teal"></i> 
											如“admin.create.post”，“admin.edit.post”等 菜单为 # </b> 
									</label>
								</section>

								<section>
									<label class="label">可读的权限名称</label>
									<label class="input"> <i class="icon-prepend fa fa-question-circle"></i>
										<input type="text" name="display_name" placeholder="" value="@if(isset($info)){{ $info['display_name'] }}@else{{ old('display_name') }}@endif" required="required">
										<b class="tooltip tooltip-top-left">
											<i class="fa fa-warning txt-color-teal"></i> 
											如“发布文章”，“编辑文章”等</b> 
									</label>
								</section>
								
								<section>
									<label class="label">详细描述</label>
									<label class="textarea"> <i class="icon-prepend fa fa-question-circle"></i> 										
										<textarea rows="3" name="description">@if(isset($info)){{ $info['description'] }}@else{{ old('description') }}@endif</textarea> 
										<b class="tooltip tooltip-top-left"> <i class="fa fa-warning txt-color-teal"></i> 
											该权限的详细描述</b> 
									</label>
								</section>

								<section>
									<label class="label">图标</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa @if(isset($info)){{ $info['icon'] }}@else{{ old('icon') }}@endif" id="icon"></i></span>
										<input class="form-control" readonly="readonly" type="text" name="icon" value="@if(isset($info)){{ $info['icon'] }}@else{{ old('icon') }}@endif">
										<span data-toggle="modal" style="cursor: pointer" data-target=".bs-example-modal-lg" class="input-group-addon">选择图标</span>
									</div>
								</section>
								
								<section>
									<label class="label">排序</label>
									<label class="input"> <i class="icon-prepend fa fa-question-circle"></i>
										<input type="number" name="sort" placeholder="" value="@if(isset($info)){{ $info['sort'] }}@else{{ empty(old('sort')) ? 0 : old('sort') }}@endif" required="required">
										<b class="tooltip tooltip-top-left">
											<i class="fa fa-warning txt-color-teal"></i> 
											数字格式</b> 
									</label>
								</section>

								<section>
									<label class="label">是否菜单(默认是菜单)</label>
									<div class="inline-group">
										<label class="radio">
										<input type="radio" name="menu" value="1" @if((isset($info))&&($info['menu']==1)) checked="checked" @elseif(old('menu')==1) checked="checked" @else checked="checked" @endif>
										<i></i>是
										</label>
										<label class="radio">
										<input type="radio" name="menu" value="0" @if((isset($info))&&($info['menu']==0)) checked="checked" @elseif(old('menu')===0) checked="checked" @endif>
										<i></i>否
										</label>
									</div>
								</section>
							</fieldset>
							{{ csrf_field() }}
							<footer>
								<button type="submit" class="btn btn-primary">
									@if (isset($info))
										修改
									@else
										提交
									@endif
								</button>
								<button type="button" class="btn btn-default" onclick="window.history.back();">返回</button>
							</footer>
						</form>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>

	</div>

</div>
@include('layouts.icon')
<script type="text/javascript">
	
	$(document).ready(function() {
	
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		pageSetUp();
	
		// PAGE RELATED SCRIPTS
	
		/*
		 * Fixed table height
		 */
		
		tableHeightSize()
		
		$(window).resize(function() {
			tableHeightSize()
		})
		
		function tableHeightSize() {

			if ($('body').hasClass('menu-on-top')) {
				var menuHeight = 68;
				// nav height

				var tableHeight = ($(window).height() - 224) - menuHeight;
				if (tableHeight < (320 - menuHeight)) {
					$('.table-wrap').css('height', (320 - menuHeight) + 'px');
				} else {
					$('.table-wrap').css('height', tableHeight + 'px');
				}

			} else {
				var tableHeight = $(window).height() - 224;
				if (tableHeight < 320) {
					$('.table-wrap').css('height', 320 + 'px');
				} else {
					$('.table-wrap').css('height', tableHeight + 'px');
				}

			}

		}
	
	});
	function loadInbox(path) {
		loadURL(path, $('#inbox-content > .table-wrap'))
	}
</script>
@endsection