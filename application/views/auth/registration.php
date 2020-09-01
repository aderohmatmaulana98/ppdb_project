<div id="auth">

	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-12 mx-auto">
				<div class="card pt-4">
					<div class="card-body">
						<div class="text-center mb-4">
							<img src="<?= base_url() ?>assets/assets/images/favicon.svg" height="48" class='mb-4'>
							<h3>Sign Up</h3>
							<p>Please fill the form to register.</p>
						</div>
						<div class="mb-4">
							<form action="<?= base_url('auth/registration') ?>" method="POST">
								<div class="row">
									<div class="form-group">
										<label for="name">Full name</label>
										<input type="text" id="name" class="form-control" name="name" value="<?= set_value('name') ?>">
										<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input type="text" id="email" class="form-control" name="email" value="<?= set_value('email') ?>">
										<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="col-md-6 col-12">
										<div class="form-group">
											<label for="password1">Password</label>
											<input type="password" id="password1" class="form-control" name="password1">
											<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="form-group">
											<label for="password2">Confirm Password</label>
											<input type="password" id="password2" class="form-control" name="password2">
										</div>
									</div>
								</diV>
								<div class="text-right">
									<a href="<?= base_url('auth')  ?>">Have an account? Login</a>
								</div>
								<div class="clearfix">
									<button type="submit" class="btn btn-primary float-left">Sign up</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
