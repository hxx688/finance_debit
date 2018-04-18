@extends('layouts.admin')


@section('content')
<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false">
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
			<span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
			<h2>近七日注册人数（如果当日注册用户数为0 则不显示在图表中）</h2>

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

				<div id="saleschart" class="chart"></div>

			</div>
			<!-- end widget content -->

		</div>
		<!-- end widget div -->

	</div>
	<!-- end widget -->

</article>
<script>
				var $chrt_border_color = "#efefef";
				var $chrt_grid_color = "#DDD"
				var $chrt_main = "#E24913";
				/* red       */
				var $chrt_second = "#6595b4";
				/* blue      */
				var $chrt_third = "#FF9F01";
				/* orange    */
				var $chrt_fourth = "#7e9d3a";
				/* green     */
				var $chrt_fifth = "#BD362F";
				/* dark red  */
				var $chrt_mono = "#000";		
	$(function() {
				
if ($("#saleschart").length) {
					var d = {!! isset($list) ? $list : '' !!};

					//console.log(d);

					var options = {
						xaxis : {
							ticks: {!! isset($x) ? $x : '' !!}, min: 1, max: 12
						},
						yaxis: { ticks: 5, min: 0 },
						series : {
							lines : {
								show : true,
								lineWidth : 1,
								fill : true,
								fillColor : {
									colors : [{
										opacity : 0.1
									}, {
										opacity : 0.15
									}]
								}
							},
							points: { show: true },
							shadowSize : 0
						},
						selection : {
							mode : "x"
						},
						grid : {
							hoverable : true,
							clickable : true,
							tickColor : $chrt_border_color,
							borderWidth : 0,
							borderColor : $chrt_border_color,
						},
						tooltip : true,
						tooltipOpts : {
							content : "共有 <span>%y</span> 人注册",
							dateFormat : "%y-%0m-%0d",
							defaultTheme : false
						},
						colors : [$chrt_second],

					};

					var plot = $.plot($("#saleschart"), [d], options);
				};

	});
</script>
@endsection