//== Class definition

var DatatableLocalSortDemo = function () {
	//== Private functions

	// basic demo
	var demo = function () {

		var datatable = $('.m_datatable').mDatatable({
			// datasource definition
			data: {
				type: 'local',
				source: {
					read: {
						url: '/all-patients-admin'
					}
				},
				pageSize: 10,
				serverPaging: false,
				serverFiltering: true,
				serverSorting: false
			},

			// layout definition
			layout: {
				theme: 'default', // datatable theme
				class: '', // custom wrapper class
				scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
				footer: false // display/hide footer
			},

			// column sorting
			sortable: true,

			pagination: true,

			search: {
				input: $('#generalSearch')
			},

			Date: {
				input: $('#daterangepicker')
			},

			// columns definition
			columns: [{
				field: "id",
				title: "File No",
				width: 50,
				sortable: false, // disable sort for this column
				selector: false,
				textAlign: 'center'
			}, {
				field: "firstname",
				title: "Patient Name",
				// sortable: 'asc', // default sort
				filterable: false, // disable or enable filtering
				// basic templating support for column rendering,
				// template: '{{OrderID}} - {{ShipCountry}}'
			},{
				field: "insurance_provider",
				title: "Insurance Provider",
				type: "date",
				width: 100,
				format: "MM/DD/YYYY"
			}, {
				field: "amount_allocated",
				title: "Amount Allocated",
				width: 150,
				type: "date",
				format: "YYYY-MM-DD HH:mm:ss"
			},{
				field: "Actions",
				title: "Actions",
				sortable: false,
				overflow: 'visible',
				template: function (row, index, datatable) {
					var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';
					return '\
						<div class="dropdown ' + dropup + '">\
							<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">\
                                <i class="la la-ellipsis-h"></i>\
                            </a>\
						  	<div class="dropdown-menu dropdown-menu-right">\
						    	<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>\
						    	<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>\
						    	<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>\
						  	</div>\
						</div>\
						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">\
							<i class="la la-edit"></i>\
						</a>\
						<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">\
							<i class="la la-trash"></i>\
						</a>\
					';
				}
			}]
		});


	};

	return {
		// public functions
		init: function () {
			demo();
		}
	};
}();

jQuery(document).ready(function () {
	DatatableLocalSortDemo.init();
});