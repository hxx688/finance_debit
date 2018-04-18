@extends('layouts.admin')

@section('content')

<div id="inbox-content" class="inbox-body no-content-padding">

	<div class="table-wrap custom-scroll animated fast fadeInRight">
		<article class="col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>轮播图 </h2>

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

						<form class="smart-form" method="post" action="@if(isset($info)) {{ url('admin/slides',$info['id']) }} @else {{ url('admin/slides') }} @endif">
							@if (isset($info))
							{{ method_field('put') }}
							@endif
							<header>
								轮播图@if (isset($info)) 修改 @else 提交 @endif
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
									<label class="label">链接</label>
									<label class="input"> <i class="icon-prepend fa fa-question-circle"></i>
										<input type="text" name="link" placeholder="" value="@if(isset($info)){{ $info['link']}}@else{{ old('link')}}@endif" required="required">
										<b class="tooltip tooltip-top-left">
											<i class="fa fa-warning txt-color-teal"></i> 
											如“”</b>
									</label>
								</section>
								<input type="hidden" class="img" name="img" value="@if(isset($info)){{ $info['img'] }}@else{{ old('img') }}@endif">
								<section class="title">
									<label class="label">排序</label>
									<label class="input"> <i class="icon-prepend fa fa-question-circle"></i>
										<input type="number" name="sort" placeholder="" value="@if(isset($info)){{ $info['sort']}}@else{{ old('sort')}}@endif">
										<b class="tooltip tooltip-top-left">
											<i class="fa fa-warning txt-color-teal"></i> 
											如“0”等</b>
									</label>
								</section>
								@if(isset($info))
								<section class="con upload" style="min-height:300px">
									<img style="width:100%" onerror="javascript:this.src='https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1508240481768&di=a7e560acc4efa1dfa8152b530434d09b&imgtype=0&src=http%3A%2F%2Fpic.58pic.com%2F58pic%2F17%2F06%2F54%2F61t58PICKVb_1024.jpg';" class="center-block" title="点击更换图片" src="{{ $info['img'] }}" alt="">
								</section>
								@else
								<section class="con upload" style="min-height:300px">
									@if(!empty(old('img')))
										<img style="width:100%" onerror="javascript:this.src='https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1508240481768&di=a7e560acc4efa1dfa8152b530434d09b&imgtype=0&src=http%3A%2F%2Fpic.58pic.com%2F58pic%2F17%2F06%2F54%2F61t58PICKVb_1024.jpg';" class="center-block" title="点击更换图片" src="{{ old('img') }}" alt="">
									@else
										<h2 class="text-center" style="line-height:300px;border:1px solid #ccc">点击上传封面图片</h2>
									@endif
								</section>
								@endif
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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">上传图片</h4>
      </div>
      <div class="modal-body">
      		<section style="padding:10px">
      		    <form action="{{ url('uploads') }}" enctype="multipart/form-data" class="dropzone" id="mydropzone"></form>
      		</section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
      		</form>
    </div>
  </div>
</div>
<script type="text/javascript">

	$(document).ready(function() {
		$('body').on('click','.upload',function(){
			$('.modal').modal('toggle')
		})
	Dropzone.autoDiscover = false;
	$("#mydropzone").dropzone({
		        addRemoveLinks : true,
		        maxFilesize: 100,
		        maxFiles:5,
		        acceptedFiles:"image/*",
		        dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> 拖动图片到这里 <span class="font-xs"></span></span><span>&nbsp&nbsp<h4 class="display-inline"> (或者 点击此处)将自动生成缩略图文件</h4></span>',
		        dictResponseError: '上传错误',
		        init: function (){
		            this.on('success', function(file,data){
		                if(data.errno==0){
		                    $('.img').val(data.data);
		                    $('.modal').modal('hide');
		                    $('.con').remove();
		                    $('fieldset').append('<section class="con upload" style="min-height:300px"><img style="width:100%" class="center-block" title="点击更换图片" src="'+data.data+'" alt=""></section>')
		                    $.smallBox({
		                        title : "操作提示",
		                        content : "<i class='fa fa-clock-o'></i> <i>上传成功</i>",
		                        color : "#659265",
		                        iconSmall : "fa fa-check fa-2x fadeInRight animated",
		                        timeout : 3000
		                    });
		                }else{
		                    $.smallBox({
		                        title : "操作提示",
		                        content : "<i class='fa fa-clock-o'></i> <i>上传失败</i>",
		                        color : "#C26565",
		                        iconSmall : "fa fa-times fa-2x fadeInRight animated",
		                        timeout : 3000
		                    });
		                }
		            });
		        }
		});
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