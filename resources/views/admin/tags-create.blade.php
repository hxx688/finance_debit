@extends('layouts.admin')

@section('content')

<div id="inbox-content" class="inbox-body no-content-padding">

	<div class="table-wrap custom-scroll animated fast fadeInRight">
		<article class="col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>标签操作 </h2>

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

						<form class="smart-form" method="post" action="@if(isset($info)) {{ url('admin/tags',$info['id']) }} @else {{ url('admin/tags') }} @endif">
							@if(isset($info))
							{{ method_field('put') }}
							@endif
							<header>
								标签@if (isset($info)) 修改 @else 添加 @endif
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
									<label class="label">名称</label>
									<label class="input"> <i class="icon-prepend fa fa-question-circle"></i>
										<input type="text" name="name" placeholder="" value="@if(isset($info)){{ $info['name'] }}@else{{ old('name') }}@endif" required="required">
										<b class="tooltip tooltip-top-left">
											<i class="fa fa-warning txt-color-teal"></i>
											请尽量简化 不要超过四个字 </b>
									</label>
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