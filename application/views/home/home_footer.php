 <footer>
 	<div class="footer clearfix mb-0 text-muted">
 		<div class="float-left">
 			<p>2020 &copy; Voler</p>
 		</div>
 		<div class="float-right">
 			<p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="http://ahmadsaugi.com">Ahmad Saugi</a></p>
 		</div>
 	</div>
 </footer>
 </div>
 </div>
 <script src="<?= base_url() ?>assets/assets/js/feather-icons/feather.min.js"></script>
 <script src="<?= base_url() ?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
 <script src="<?= base_url() ?>assets/assets/js/app.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <script src="<?= base_url() ?>assets/assets/vendors/chartjs/Chart.min.js"></script>
 <script src="<?= base_url() ?>assets/assets/vendors/apexcharts/apexcharts.min.js"></script>
 <script src="<?= base_url() ?>assets/assets/js/pages/dashboard.js"></script>

 <script src="<?= base_url() ?>assets/assets/js/main.js"></script>

 <script>
 	$('.form-check-input').on('click', function() {
 		const menuId = $(this).data('menu');
 		const roleId = $(this).data('role');

 		$.ajax({
 			url: "<?= base_url('admin/changeaccess'); ?>",
 			type: 'post',
 			data: {
 				menuId: menuId,
 				roleId: roleId,
 			},
 			success: function() {
 				document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
 			}
 		});
 	});
 </script>
 </body>

 </html>
