<div class="main-content container-fluid">
	<div class="page-title">
		<h3><?= $title; ?></h3>
	</div>
	<div class="row">
		<div class="col-sm">
			<?= $this->session->flashdata('message');  ?>
			<h5>Role : <?= $role['role']; ?></h5>
			<div class="card">
				<div class="card-header py-3 " style="background-color: 	#1E90FF; color: black; font-weight: bolder;">

				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Menu</th>
									<th scope="col">Access</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1;
								foreach ($menu as $m) : ?>
									<tr>
										<th scope="row"><?= $i++ ?></th>
										<td><?= $m['menu'];  ?></td>
										<td>
											<div class='form-check'>
												<div class="custom-control custom-checkbox ">
													<input type="checkbox" class="form-check-input" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
												</div>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
