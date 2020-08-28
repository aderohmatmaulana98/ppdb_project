<div id="auth">

	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-12 mx-auto">
				<div class="card pt-4">
					<div class="card-body">
						<div class="text-center mb-4">
							<img src="<?php base_url() ?>assets/assets/images/favicon.svg" height="48" class='mb-4'>
							<h3>Sign In</h3>
							<p>Academic Information System</p>
						</div>
						<?= $this->session->flashdata('message');  ?>
						<div class="mb-4">
							<form action="<?= base_url('auth') ?>" method="POST">
								<div class="form-group position-relative has-icon-left">
									<label for="username">Email</label>
									<div class="position-relative">
										<input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
										<div class="form-control-icon">
											<i data-feather="user"></i>
										</div>
									</div>
									<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="form-group position-relative has-icon-left">
									<div class="clearfix">
										<label for="password">Password</label>
										<a href="auth-forgot-password.html" class='float-right'>
											<small>Forgot password?</small>
										</a>
									</div>
									<div class="position-relative">
										<input type="password" class="form-control" name="password" id="password">
										<div class="form-control-icon">
											<i data-feather="lock"></i>
										</div>
									</div>
									<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>

								<div class='form-check clearfix my-4'>
									<div class="checkbox float-left">
										<input type="checkbox" id="checkbox1" class='form-check-input'>
										<label for="checkbox1">Remember me</label>
									</div>
									<div class="float-right">
										<a href="<?= base_url('auth/registration')  ?>">Don't have an account?</a>
									</div>
								</div>
								<div class="clearfix">
									<button class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
