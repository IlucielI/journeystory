<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Hak Cipta &copy; KPP Decima 2020</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Pilih "Keluar" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<a class="btn btn-primary" href="<?php echo base_url() ?>administrator/logout">Keluar</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>


<!-- NEW Asset2 -->

<script src="<?php echo base_url() ?>assets_2/plugins/jquery/jquery.min.js"></script>
<!-- <script src="<?php echo base_url() ?>assets_2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="<?php echo base_url() ?>assets_2/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets_2/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets_2/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets_2/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets_2/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets_2/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets_2/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets_2/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/sweetalert2/sweetalert2.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/moment.js"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/daterangepicker.js"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-timepicker.min.js"></script>
<!-- <script src="<?php echo base_url() ?>assets_2/dist/js/adminlte.min.js"></script> -->
<!-- <script src="<?php echo base_url() ?>assets_2/dist/js/demo.js"></script> -->

<script src="<?php echo base_url() ?>assets/custom/js/script.js"></script>
<!-- <script src="https://cdn.datatables.net/plug-ins/1.10.25/api/sum().js"></script> -->
<script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$('#example2').DataTable({
			"autoWidth": false,
			"responsive": true,
		});
	});
	//Date picker
	$('#datepicker_add').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd'
	})
	$('#datepicker_edit').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd'
	})

	//Timepicker
	$('.timepicker').timepicker({
		showInputs: false
	})

	//Date range picker
	$('#reservation').daterangepicker({
		locale: {
			format: 'DD-MM-YYYY',
			separator: ' s/d '
		}
	})
	//Date range picker with time picker
	$('#reservationtime').daterangepicker({
		timePicker: true,
		timePickerIncrement: 30,
		format: 'MM/DD/YYYY h:mm A'
	})
	//Date range as a button
	$('#daterange-btn').daterangepicker({
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			},
			startDate: moment().subtract(29, 'days'),
			endDate: moment()
		},
		function(start, end) {
			$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
		}
	)
</script>
<!-- END Asset2 -->

<!-- chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="application/javascript">
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>

<!-- modal hapus -->
<div class="modal fade" id="confirm-delete">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title">Konfirmasi!</h4>
			</div>

			<div class="modal-body">
				Yakin ingin menghapus data ini ?
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<a class="btn btn-danger btn-ok">Hapus saja</a>
			</div>
		</div>
	</div>
</div>

<script>
	$('#confirm-delete').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});

	// $(document).ready(function() {
	// 	if ($('.buttons-pdf')[0]) {
	// 		$('.buttons-pdf').addClass('btn btn-success');
	// 		$('.buttons-pdf').html('Export');
	// 	}
	// });
</script>

</body>

</html>
