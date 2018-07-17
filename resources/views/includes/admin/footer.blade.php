<!-- begin::Footer -->
			<!-- <footer class="m-grid__item	m-footer ">
				<div class="m-container m-container--fluid m-container--full-height m-page__container">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								 &copy; <?php echo date('Y') ?>
								<a href="#" class="m-link">
									DMS
								</a>
							</span>
						</div>
						<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
							
						</div>
					</div>
				</div>
			</footer> -->
			<!-- end::Footer -->
		</div>
		<!-- end:: Page -->

	

		<!-- begin::Quick Nav -->	
		<!--begin::Base Scripts -->
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

		<script src="../admin/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="../admin/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->   
        <!--begin::Page Vendors -->
		<script src="../admin/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<!--end::Page Vendors -->  
        <!--begin::Page Snippets -->
		<script src="../admin/assets/app/js/dashboard.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/forms/widgets/input-mask.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/forms/widgets/form-repeater.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/base/mike.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/forms/widgets/bootstrap-select.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/forms/widgets/select2.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/base/sweetalert2.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/base/bootstrap-notify.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/forms/widgets/bootstrap-daterangepicker.js" type="text/javascript"></script>
		
		<script src="../admin/assets/demo/default/custom/components/datatables/base/advanced-search.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/datatables/base/datatables.bundle.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/datatables/base/local-sort.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/forms/widgets/form-repeater.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/forms/widgets/summernote.js" type="text/javascript"></script>

		<script src="../admin/assets/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>


		
		<!--end::Page Snippets -->

		<script>
			$('div.alert').not('.alert-important').delay(2000).fadeOut(350);
		</script>

		<script>
			var select = document.getElementById('m_select2_procedure');
			var input = document.getElementById('procedure_cost');
			select.onchange = function() {
				input.value = select.value.amount

			}
		</script>

		<script type="text/javascript">
			$(document).ready(function() {
				oTable = $('#users-table').DataTable({
					"processing": true,
					"serverSide": true,
					"ajax": "{{ url('all-patients-admin') }}",
					"columns": [
						{data: 'id', name: 'id'},
						{data: 'firstname', name: 'firstname'},
						{data: 'lastname', name: 'lastname'},
						{data: 'payment_mode', name: 'payment_mode'},
						{data: 'amount_allocated', name: 'amount_allocated'},
						{data: 'action', name: 'action'}
					]
				});
			});
        </script>
		
	</body>
	<!-- end::Body -->
</html>





