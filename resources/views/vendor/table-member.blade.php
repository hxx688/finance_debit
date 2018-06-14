			/* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
			*/	
	
			/* BASIC ;*/
				var responsiveHelper_datatable_fixed_column = undefined;
				var responsiveHelper_datatable_col_reorder = undefined;
				var responsiveHelper_datatable_tabletools = undefined;
				var title = $('.em-title').text();
				var breakpointDefinition = {
					tablet : 1024,
					phone : 480
				};

			/* COLUMN FILTER  */
		    var otable = $('#datatable_fixed_column').DataTable({
				"order": [[ 0, "desc" ]],
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
		        "oTableTools": {
		        	 "aButtons": [
		             "copy",
			            {
			                "sExtends": "csv",
			                "sTitle": title,
			            },		             
			            {
			                "sExtends": "xls",
			                "sTitle": title,
			            },
		                {
		                    "sExtends": "pdf",
		                    "sTitle": title,
		                    "sPdfMessage": title,
		                    "sPdfSize": "letter"
		                },
		             	{
	                    	"sExtends": "print",
	                    	"sMessage": "Generated by "+title+" <i>(press Esc to close)</i>"
	                	}
		             ],
		            "sSwfPath": "/js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
		        },
				"autoWidth" : true,
				"paginate": true,
			"processing": false,
			"serverSide": true,
			ajax: {
				url: '{!! route('pagemembers.data') !!}',

				type: 'post'
			},
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'prealname', name: 'prealname', searchable: false, defaultContent:'' },
			{ data: 'nickname', render: function (data, type, row) {
				if(data && data != ''){
					return data;
				}
				return '默认昵称';
				}, defaultContent:'' },
			{ data: 'realname', name: 'realname', defaultContent:'' },
			{ data: 'sex', render: function (data, type, row) {
				if(data != null  && data == 0){
					return '男';
				}else {
					return '女';
				}
				}, defaultContent:'' },
			{ data: 'mobile', name: 'mobile', defaultContent:'' },
			{ data: 'avatar', render: function (data, type, row) {
				if(data && data != ''){
					return data;
				}
				return '/img/avatars/sunny.png';
				}, defaultContent:'' },

			{ data: 'profession', name: 'profession', defaultContent:'' },
			{ data: 'zhifubao', name: 'zhifubao' },
			{ data: 'wechat', name: 'wechat', defaultContent:'' },
			{ data: 'area', name: 'area' },
			{ data: 'userage', name: 'userage' },
			{ data: 'status', render: function (data, type, row) {
				if(data && data == 1){
				return '已启用';
				}else {
				return '已禁用';
				}
			    }, defaultContent:'' },
			{ data: 'created_at', name: 'created_at' },
			{ data: 'id', render: function(data, type, row) {
					var msg = "启用";
					if(row.status == 1){
						msg = "禁用";
					}
					return  '<a class="btn btn-default btn-sm destroy txt-color-red" data-id="'+ data + '" href="javascript:void(0);" onclick="doUpate(this)"> ' + msg + '</a>';
			}}

			],

				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_fixed_column) {
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_fixed_column.respond();
				}
			
		    });
		    
		    // custom toolbar
		    
		    // Apply the filter
		    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {

				alert(11);
		        {{--otable--}}
		            {{--.column(5 )--}}
		            {{--.search(this.value )--}}
		            {{--.draw();--}}

			otable.api().search(this.value).draw();


			});
		    /* END COLUMN FILTER */   