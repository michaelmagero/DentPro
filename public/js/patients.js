//== Class definition

var DatatableRemoteAjaxDemo = function () {
  //== Private functions

  // basic demo
  var demo = function () {

    var datatable = $('.m-datatable').mDatatable({
      // datasource definition
      data: {
        type: 'local',
        source: {
          read: {
            // sample GET method
            method: 'GET',
            url: 'all-patient-admin',
            map: function (raw) {
              // sample data mapping
              var dataSet = raw;
              if (typeof raw.data !== 'undefined') {
                dataSet = raw.data;
              }
              return dataSet;
            },
          },
        },
        pageSize: 10,
        serverPaging: true,
        serverFiltering: true,
        serverSorting: true,
      },

      // layout definition
      layout: {
        scroll: false,
        footer: false
      },

      // column sorting
      sortable: true,

      pagination: true,

      toolbar: {
        // toolbar items
        items: {
          // pagination
          pagination: {
            // page size select
            pageSizeSelect: [10, 20, 30, 50, 100],
          },
        },
      },

      search: {
        input: $('#generalSearch'),
      },

      // columns definition
      columns: [
        {
          field: 'id',
          title: 'File No',
          sortable: false, // disable sort for this column
          width: 150,
          selector: false,
          filterable: true, 
          textAlign: 'center',
        }, {
          field: 'firstname',
          title: 'Patients Name',
          // sortable: 'asc', // default sort
          filterable: true, // disable or enable filtering
          width: 150,
          // // basic templating support for column rendering,
          // template: '{{OrderID}} - {{ShipCountry}}',
        }, {
          field: 'payment_mode',
          title: 'Payment Mode',
          width: 150,
        }, {
          field: 'amount_allocated',
          title: 'Amount Alllocated',
        }, {
          field: 'Actions',
          width: 110,
          title: 'Actions',
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
          },
        }],
    });

    var query = datatable.getDataSourceQuery();

    $('#m_form_status').on('change', function () {
      datatable.search($(this).val().toLowerCase(), 'Status');
    });

    $('#m_form_type').on('change', function () {
      datatable.search($(this).val().toLowerCase(), 'Type');
    });

    $('#m_form_status, #m_form_type').selectpicker();

  };

  return {
    // public functions
    init: function () {
      demo();
    },
  };
}();

jQuery(document).ready(function () {
  DatatableRemoteAjaxDemo.init();
});