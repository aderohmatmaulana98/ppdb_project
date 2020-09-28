<div id="auth">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-12 mx-auto">
				<div class="card pt-4">
					<div class="card-body">
						<div class="text-center mb-4">
						<img src="<?php base_url() ?>assets/assets/images/email.svg" height="48" class='mb-4'>
							<h3>Konfirmasi Email</h3>
							<p>Academic Information System</p>
							<form action="<?= base_url('auth/confirmEmail') ?>" method="POST">
								<div class="form-group position-relative mt-4">
									<div class="position-relative">
										<input type="text" class="form-control form-control-lg" name="code_confirmation" id="code_confirmation" placeholder="Masukan Kode Konfirmasi">
									</div>
								</div>
							</form>
							<div class="clearfix">
								<button type="submit" class="btn btn-primary mt-4">Konfirmasi Email</button>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
